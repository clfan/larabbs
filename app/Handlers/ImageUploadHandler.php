<?php

namespace App\Handlers;

use Image;

class ImageUploadHandler
{
    // extension that allow to upload
    protected $allowd_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        // file path ex: uploads/images/avatars/201712/11/
        $folder_name = "uploads/images/avatars/". date("Ym", time()) . '/'.date("d", time()). '/';

        // file physical path ex: /var/www/larabbs/public/uploads/images/avatars/201712/11/
        $upload_path = public_path(). '/' . $folder_name;

        // file extension
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // file name with time() easy to see
        $filename = $file_prefix.'_'.time().'_'.str_random(10).'.'.$extension;

        // if not upload image, then exit
        if (!in_array($extension, $this->allowd_ext)) {
            return false;
        }

        // move file to the target des path
        $file->move($upload_path, $filename);

        // if oversize, need resize
        if ($max_width && $extension != "gif") {
            $this->reduceSize($upload_path.'/'.$filename, $max_width);
        }

        return [
            'path' => config('app.url')."/$folder_name/$filename"
        ];
    }

    public function reduceSize($file_path, $max_width) {
        $image = Image::make($file_path);

        $image->resize($max_width, null, function($constraint) {
            $constraint->aspectRatio();

            $constraint->upsize();
        });

        $image->save();
    }
}
