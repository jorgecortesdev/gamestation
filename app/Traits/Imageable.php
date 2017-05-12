<?php

namespace App\Traits;

use Image;
use Storage;

trait Imageable
{
    protected $publicPath = 'storage/';

    public function imagePath()
    {
        $image = $this->defaultImageFilename();
        $modelPath = $this->modelPath();

        if (Storage::disk('public')->exists($this->defaultImageFilename())) {
            return $image = asset($this->defaultAssetPath());
        }

        if (property_exists($this, 'defaultImage')) {
            return asset($this->defaultImage);
        }

        throw new \Exception('Property $defaultImage was not set correctly in ' . get_class($this));
    }

    public function saveImage($image)
    {
        if ($image) {
            $originalImage = Image::make($image->getRealPath());
            $originalImage->encode('png');
            $originalImage->orientate()->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();

            Storage::disk('public')->put($this->defaultImageFilename(), $originalImage);
        }
    }

    protected function defaultImageFilename()
    {
        return $image = $this->modelPath() . '/' . $this->id . '.png';
    }

    protected function defaultAssetPath()
    {
        return $this->publicPath . '/' . $this->defaultImageFilename();
    }

    protected function modelPath()
    {
        return strtolower(
            str_plural(
                (new \ReflectionClass($this))->getShortName()
            )
        );
    }
}
