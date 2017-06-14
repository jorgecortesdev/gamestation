<?php

namespace GameStation\Traits;

use Image;
use Storage;

trait Imageable
{
    public function setImageAttribute($image)
    {
        if ( ! request()->hasFile('image')) {
            return;
        }

        $this->deletePreviousImage();

        $this->attributes['image'] = $image->hashName();

        $this->saveImage($image);
    }

    public function getImageAttribute($image)
    {
        if ($this->imageExists($image)) {
            return asset('storage/' . $this->imagePath($image));
        }

        if (property_exists($this, 'defaultImage')) {
            return asset($this->defaultImage);
        }

        throw new \Exception('Property $defaultImage was not set correctly in ' . get_class($this));
    }

    protected function saveImage($image)
    {
        $originalImage = Image::make($image->getRealPath());

        $originalImage->orientate()
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();

        Storage::disk('public')->put(
            $this->imagePath($image->hashName()),
            $originalImage
        );
    }

    protected function deletePreviousImage()
    {
        if ( ! isset($this->attributes['image'])) {
            return;
        }

        if ($this->imageExists()) {
            Storage::disk('public')->delete($this->imagePath());
        }
    }

    protected function imageExists($image = null)
    {
        return Storage::disk('public')->exists($this->imagePath($image));
    }

    protected function imagePath($image = null)
    {
        return $this->modelPath() . '/' . ($image ?: $this->attributes['image']);
    }

    protected function modelPath()
    {
        return strtolower(
            str_plural((new \ReflectionClass($this))->getShortName())
        );
    }
}
