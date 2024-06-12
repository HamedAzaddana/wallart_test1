@extends('layouts.template')
@section('title','فایل آپلودر')
@section('content')
<div id="FormSection">
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
<div id="TableSection">
    <h3>فایل های آپلود شده تاکنون</h3>
    <div class="card">
        @if($files_number !=0)
        <div>
            <table class="table table-hover table-responsive" style="overflow: auto;">
                <thead class="text-center">
                    <tr class="table table-dark">
                        <th style="width: 30%">ردیف</th>
                        <th style="width: 30%">مشاهده</th>
                        @if($is_file_picker)
                        <th style="width: 10%">انتخاب</th>
                        @endif
                        <th style="width: 5%">عملیات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($files as $file)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td><a target="_blank" href='{{url("/uploader/$file/")}}' class="btn btn-primary"> لینک </a></td>
                        @if($is_file_picker)
                        <td>
                            <button data-url='{{url("/uploader/$file/")}}' type="button" class="btn btn-info picked-file"> انتخاب فایل </button>
                        </td>
                        @endif
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
    jQuery(document).ready(function($) {
        <?php
        if ($is_file_picker) {
            echo "$('.nav-wal-page').hide();\n";
            echo "$('.footer-wal-page').hide();\n";
        }
        ?>
        $('.picked-file').click(function() {
            var url_picked = $(this).attr('data-url');
            var selector_fp = "{{$selector_fp}}";
            var post = {
                url_picked,
                selector_fp,
                case:"file_uploader"
            }
            if (selector_fp && url_picked) {
                window.parent.postMessage(post, "*");
            }
        });
    })
</script>
@endsection