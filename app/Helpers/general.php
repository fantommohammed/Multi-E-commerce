<?php

define('PAGINATION_COUNT', 100);

function getFolder()
{
    return app()->getLocale() === 'ar' ? 'css-rtl' : 'css';
}

function getDirection()
{
    return app()->getLocale() === 'ar' ? '-rtl' : '';
}

function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
//    $path = 'images/'.$folder.'/'.$filename;
    return $filename;
}
