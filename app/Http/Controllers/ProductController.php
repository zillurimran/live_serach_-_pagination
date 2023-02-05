<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
//        $products= Product::latest()->paginate(5);
//        return view('products',compact('products'));
        return view('products',[
            'products'=>Product::latest()->paginate(5)
        ]);

    }


    public function addProduct(Request $request){

        $request->validate([
            'name'=>'required|unique:products',
            'price'=>'required'
        ],[
            'name.required'=>'Please insert product name',
            'name.unique'=>'Name already exists',
            'price.required'=>'Price is required'
        ]);

        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->save();
        return response()->json([
            'status'=>'success'
        ]);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'up_name'=>'required|unique:products,name,'.$request->id,
            'up_price'=>'required'
        ],
            [
                'up_name.required'=>'Please insert product name',
                'up_name.unique'=>'Name already exists',
                'up_price.required'=>'Price is required'
        ]);

//        Product::where('id',$request->up_id)->update([
//                'name'=> $request->up_name,
//                'price'=> $request->up_price
//        ]);

        $product = Product::find($request->up_id);
        $product->name = $request->up_name;
        $product->price = $request->up_price;
        $product->save();

        return response()->json([
            'status'=>'success'
        ]);
    }


    public function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }

    public function pagination(){
        $products= Product::latest()->paginate(5);
        return view('paginate-products',compact('products'))->render();
    }

    public function search(Request $request){
        $products = Product::where('name','like','%'.$request->search_string.'%')
            ->orWhere('price','like','%'.$request->search_string.'%')
            ->orderBy('id','desc')
            ->paginate(5);

        if ($products->count() >= 1){
            return view('paginate-products',compact('products'))->render();
        }else{
            return response()->json([
                'status'=>'nothing_found'
            ]);
        }
    }

}
