<?php

namespace App\Http\Controllers\Test;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Anchu\Ftp\FtpManager;

class TestController extends Controller
{

    public function hola(){
      return 'Hola';
    }

    public function testftp(){
      $listing = FTP::connection('alpine')->getDirListing();
      return 'Hola';
    }

    public function testftplist(){
      $files = Storage::disk('alpine')->directories('/');
      return view('test.testftplist', compact('files'));
    }

    public function testftpupload(Request $request){

      foreach ($request->photos as $photo) {
            $name = $photo->getClientOriginalName();
            Storage::disk('alpine')->putFileAs('contenido', new File($photo), $name);
        }

        return 'Upload successful!';

    }

}
