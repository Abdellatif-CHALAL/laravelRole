<?php

namespace App\Http\Controllers;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;

class FileController extends Controller
{
    public function create(){

        return view('admin.user.upload');
    
    }

    public function dropzone(Request $request){
        $file = $request->file('file');
        File::create()
    }
}
