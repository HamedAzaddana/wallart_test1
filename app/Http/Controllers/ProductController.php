<?php

namespace App\Http\Controllers;

use App\Models\Product as ProductModel;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $products = ProductModel::get()->toArray();
        $products_number = count($products);
        return view('pages.products', compact('products', 'products_number'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductModel $product)
    {
        //TDOD:authorize only
        $messages = get_validation_messages();
        $data = request()->validate([
            'title' =>  ['required', 'string', 'max:255'],
            'price' =>  ['required', 'string', 'max:255'],
            'description' =>  ['nullable', 'string'],
            'fpath' =>  ['nullable', 'string'],
        ], $messages);
        $data['create_date'] = \Carbon\Carbon::now();
        $product_id = $product->create($data)->id;
        $fpath = @$data['fpath'];
        if($fpath && $product_id){
            $fpath = str_replace(env("APP_URL"),public_path(),$fpath);
            $ProductModel = ProductModel::find($product_id); 
            $ProductModel->addMedia($fpath)->toMediaCollection('images');
        }
        return redirect()->back()->with('success', "محصول با موفقیت ایجاد شد !");

    }
}
