<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class Helper
{
    public static function createImage($model, $currentImage, $image)
    {
        // Delete the previous file
        File::delete(public_path() . $currentImage);

        // Create a new file name for the image to avoid any collisions
        $fileName = str_random(20) . '.' . $image->extension();

        // Depending on the model that is passed to the function we need
        // to set the location in where we want to save it
        switch (class_basename($model)) {
            case 'User':
                $file_location = '/users/' . $model->id . '/img/';
                break;
            case 'SiteSettings':
                $file_location = '/site/img/';
            default:
                break;
        }

        // Move the image to the new location where we are going
        // to store it
        $image->move(public_path($file_location), $fileName);

        // Return the location of the file
        return $file_location . $fileName;
    }
}
