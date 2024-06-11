<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('pages.file_uploader');
    }
    public function upload()
    {
        //TDOD:authorize only
        $messages = get_validation_messages([
            "file_upload.max" => "حجم فایل آپلود شده زیاد است.",
        ]);
        // dd(request()->file('file_upload'));
        $data = request()->validate([
            'file_upload' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
        ], $messages);
        if (request()->file('file_upload')) {
            $file = request()->file('picture');
            $filename = bin2hex(random_bytes(20)) . '.' .  $file->getClientOriginalExtension();
            $file->move(public_path('uploader'), $filename);
            $file_url = url()."/uploader/" . $filename;
            dd($file_url);
        }
    }
}
