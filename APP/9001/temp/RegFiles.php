<?php

namespace App\Helpers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class RegFiles // = Bitacora
{
   public static function FileExist($disk, $dir, $name)
        {

              $files = Storage::disk($disk)->files($dir);

              if ($dir == '/'){

                if (in_array($name, $files)) {
                    return 1;
                } else {
                    return 0;
                }

              }else{

                if (in_array($dir.$name, $files)) {
                    return 1;
                } else {
                    return 0;
                }

              }
        }

    public static function DirectoryExist($disk, $base, $dir)
         {

              $directories = Storage::disk($disk)->directories($base);

              if ($base == '/'){

                if (in_array($dir, $directories)) {
                    return 1;
                } else {
                    return 0;
                }

              }else{

                if (in_array($base.'/'.$dir, $directories)) {
                    return 1;
                } else {
                    return 0;
                }

              }

         }

     public static function ListFiles($disk, $dir, $type)
          {

                $files = Storage::disk($disk)->files($dir);

                if (count($files)==0) {

                      return 0;

                }else{

                  if ($type == 'count') {

                      return count($files);

                  } elseif ($type == 'html') {

                      $totalhtml = '';

                      foreach ($files as $file) {
                            $html = basename($file).'</br>';
                            $totalhtml .= $html;
                      }

                      return $totalhtml;

                  } elseif ($type == 'array') {

                      $totalarray = '';

                      foreach ($files as $file) {
                            $array = basename($file).'|';
                            $totalarray .= $array;
                      }

                      return $totalarray;

                  } elseif ($type == 'size') {

                      $totalsize = 0;

                      foreach ($files as $file) {
                            $size = Storage::disk($disk)->size($file); 
                            $totalsize += $size;
                      }

                      return $totalsize;

                  } elseif ('ls') {}

                }
          }

}
