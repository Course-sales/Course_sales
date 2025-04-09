<?php 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

function getFileInfo($url) {
    $path = Storage::disk('public')->path(str_replace('storage', '', $url));
    return [
        'size' => File::size($path),
        'name' => basename($url),
        'url' => $url
    ];
}