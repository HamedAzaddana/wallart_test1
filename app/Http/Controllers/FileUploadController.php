<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Paginate;

class FileUploadController extends Controller
{
    public function index()
    {
        $per_page = (int)env('PER_PAGE_TABLES', 10);
        $files = scandir(public_path("uploader"));
        unset($files[0]);
        unset($files[1]);
        $files = Paginate::paginate($files,$per_page);
        $files_number = $files ?  $files->total() : 0;
        return view('pages.file_uploader',compact('files','files_number'));
    }
    public function upload()
    {
        //TDOD:authorize only
        $messages = get_validation_messages([
            "file_upload.max" => "حجم فایل آپلود شده زیاد است.",
        ]);
        // dd(request()->file('file_upload'),$messages);
        $data = request()->validate([
            'file_upload' => ['required', 'mimes:png,jpg,jpeg', 'max:2048']
        ], $messages);
        if (request()->file('file_upload')) {
            $file = request()->file('file_upload');
            $filename = bin2hex(random_bytes(20)) . '.' .  $file->getClientOriginalExtension();
            $file->move(public_path('uploader'), $filename);
            $file_url = url("/")."/uploader/" . $filename;
            return redirect()->back()->with('link', $file_url);
        }
    }
}
