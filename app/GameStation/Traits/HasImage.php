<?php

namespace GameStation\Traits;

use Image;
use Storage;

trait HasImage
{
    public function setImageAttribute($image)
    {
        if ( ! request()->hasFile('image')) {
            $this->attributes['image'] = $image;
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

        return $this->getDefaultImage();
    }

    public function getDefaultImage()
    {
        if (property_exists($this, 'defaultImage')) {
            return asset($this->defaultImage);
        }

        throw new \Exception('Property $defaultImage was not set correctly in ' . get_class($this));
    }

    protected function saveImage($image)
    {
        $originalImage = Image::make($image->getRealPath());

        $originalImage->orientate()
            ->resize(300, 300, function ($constraint) {
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

        $image = $this->attributes['image'];

        if ($this->imageExists($image)) {
            Storage::disk('public')->delete($this->imagePath($image));
        }
    }

    protected function imageExists($image = null)
    {
        return $image
            ? Storage::disk('public')->exists($this->imagePath($image))
            : false;
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
