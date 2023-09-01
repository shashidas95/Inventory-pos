<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function ProductPage(Request $request)
    {
        return view('pages.dashboard.product-page');
    }
    public function ListProduct(Request $request)
    {
        $user_id = $request->header('id');
        return Product::where('user_id', $user_id)->get();
    }
    public function ProductCreate(Request $request)
    {
        $user_id = $request->header('id');
        $img = $request->file('img');
        $file_name = $img->getClientOriginalName();
        $time = time();
        $image_name = "{$user_id}-{$time}-{$file_name}";

        $img->move(public_path('uploads'), $image_name);


        return Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
            'category_id' => $request->input('category_id'),
            'user_id' => $user_id,
            'img_url' => "uploads/{$image_name}"
        ]);
    }
    public function ProductUpdate(Request $request)
    {


        $user_id = $request->header('id');
        $product_id = $request->input('id');
        if ($request->hasFile('img')) {

            $img = $request->file('img');
            $file_name = $img->getClientOriginalName();
            $time = time();
            $image_name = "{$user_id}-{$time}-{$file_name}";
            $img->move(public_path('uploads'), $image_name);

            //delete old file
            $filePath = $request->input('file_path');
            File::delete($filePath);

            return Product::where('id', $product_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'category_id' => $request->input('category_id'),
                'img_url' => "uploads/{$image_name}"
            ]);
        } else {
            $img = $request->file('img');
            $file_name = $img->getClientOriginalName();
            $time = time();
            $image_name = "{$user_id}-{$time}-{$file_name}";
            $img->move(public_path('uploads'), $image_name);
            return Product::where('id', $product_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'category_id' => $request->input('category_id'),
                'img_url' => "uploads/{$image_name}"
            ]);
        }
    }
    public function ProductDelete(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');

        //delete old file
        $filePath = $request->input('file_path');
        File::delete($filePath);
        return Product::where('id', $product_id)->where('user_id', $user_id)->delete();
    }
    public function ProductById(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }
    public function ProductByCategory(Request $request)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('category_id');
        return Product::where('category_id', $category_id)->where('user_id', $user_id)->get();
    }
}
