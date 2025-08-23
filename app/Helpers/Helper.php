<?php

namespace App\Helpers;

trait Helper
{
    function uploadImage($disk,$image)
    {
        $image->store('/', $disk);
        $filename = $image->hashName();
        // $path = 'images/' . $folder . '/' . $filename;
        return $filename;
    }
}
