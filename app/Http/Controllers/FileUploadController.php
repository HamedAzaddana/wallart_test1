<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FileUploadController extends Controller
{
    public function index()
    {
        $is_file_picker = request("template") =="file-picker";
        $selector_fp = request("selector_fp");
        if(!is_dir(public_path("uploader"))){
            mkdir(public_path("uploader"));
        }
        if(!is_dir(public_path("media"))){
            mkdir(public_path("media"));
        }
        $files = scandir(public_path("uploader"));
        unset($files[0]);
        unset($files[1]);
        $files_number = count($files);
        return view('pages.file_uploader',compact('files','files_number','is_file_picker','selector_fp'));
    }
    public function upload()
    {
        //TDOD:authorize only
        $messages = get_validation_messages([
            "file_upload.max" => "حجم فایل آپلود شده زیاد است.",
        ]);
        $data = request()->validate([
            'file_upload' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
        ], $messages);
        if (request()->file('file_upload')) {
            $file = request()->file('file_upload');
            $filename = bin2hex(random_bytes(20)) . '.' .  $file->getClientOriginalExtension();
            $file->move(public_path('uploader'), $filename);
            $file_url = url("/")."/uploader/" . $filename;
            return redirect()->back()->with('success', "با موفقیت آپلود شد !");
        }
    }
}
