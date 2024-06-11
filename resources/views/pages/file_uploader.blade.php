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
</div>
@endsection
@section('more_style')
<style>
</style>
@endsection
@section('more_js')
<script>
</script>
@endsection