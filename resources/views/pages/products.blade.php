@extends('layouts.template')
@section('title','محصولات')
@section('content')
<div id="FormSection">
    <h3>فرم محصول</h3>
    <form method="POST" enctype="multipart/form-data" class="p-2">
        @csrf
        <div class="form-group">
            <label for="title">عنوان<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{  old('title') }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">قیمت<span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{  old('price') }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">توصیف</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div>
            <x-FilePicker name="fpath">
                تصویر شاخص
            </x-FilePicker>
        </div>
        <br>
        <button type="submit" class="btn btn-success">افزودن</button>
    </form>
</div>
<hr>
<div id="TableSection">
    <h3>جدول محصولات</h3>
    <div class="card">
        @if($products_number !=0)
        <div>
            <table class="table table-hover table-responsive" style="overflow: auto;">
                <thead class="text-center">
                    <tr class="table table-dark">
                        <th style="width: 10%">ردیف</th>
                        <th style="width: 10%">عنوان</th>
                        <th style="width: 30%">توصیف</th>
                        <th style="width: 10%">قیمت</th>
                        <th style="width: 5%">عملیات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($products as $product)
                    <?php
                    $product = (array)$product;
                    ?>
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$product['title']}}</td>
                        <td>{{$product['description']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>
                            <button type="button" class="btn btn-danger"> حذف </button>
                            <button type="button" class="btn btn-warning"> ویرایش </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-3">
            <div style="text-align: center;" class="alert alert-secondary">
                محصولی وجود ندارد !
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