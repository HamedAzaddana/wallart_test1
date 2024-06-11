@extends('layouts.template')
@section('title','فایل آپلودر')
@section('content')
<div>
    <h3>فرم آپلود فایل</h3>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="file" name="file_upload" id="file_upload">
        @error('file_upload')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <p> فرمت های قابل قبول : png,jpg,jpeg</p>
        <p> حداکثر حجم قابل قبول : 2MB</p>
        <br>
        <button type="submit" class="btn btn-success">آپلود</button>
    </form>
</div>
<hr>
<div>
    <h3>فایل های آپلود شده تاکنون</h3>
    <div class="card">
        @if($files_number !=0)
        <div>
            <table class="table table-hover table-responsive" style="overflow: auto;">
                <thead class="text-center">
                    <tr class="table table-dark">
                        <th style="width: 30%">ردیف</th>
                        <th style="width: 30%">مشاهده</th>
                        <th style="width: 5%">عملیات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($files as $file)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td><a target="_blank" href='{{url("/uploader/$file/")}}' class="btn btn-primary"> لینک </a></td>
                        <td>
                            <button type="button" class="btn btn-danger"> حذف </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-3">
            <div style="text-align: center;" class="alert alert-secondary">
                فایلی آپلود نشده است !
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('more_style')
<style>
    tr td {
        text-align: center;
    }
</style>
@endsection
@section('more_js')
<script>
</script>
@endsection