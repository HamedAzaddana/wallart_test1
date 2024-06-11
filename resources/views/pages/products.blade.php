@extends('layouts.template')
@section('title','محصولات')
@section('content')
<div>
    <h3>فرم محصول</h3>
    <form method="POST" enctype="multipart/form-data">
        @csrf

        <br>
        <button type="submit" class="btn btn-success">افزودن</button>
    </form>
</div>
<hr>
<div>
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
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        
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