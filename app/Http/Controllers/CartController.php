<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\cart;
use App\Product;
use App\allproduct;

use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function AddtoCart(Request $request){
            if(Session::has('random_number')){
                    if(cart::where('random_number',session('random_number'))->where('product_id',$request->product_id)->exists()){
                        cart::where('random_number',session('random_number'))->where('product_id',$request->product_id)->increment('qty',$request->qty);
                        Toastr::success('QTY incresed', 'Success', ["positionClass" => "toast-top-right"]);
                
                        return back();
                    }
                    else{
                        $data=allproduct::where('id',$request->product_id)->first();
                        cart::insert([
                            'random_number'=>session('random_number'),
                            'product_id'=>$request->product_id,
                            'qty'=>$request->qty,
                            'price'=>$data->price,
                            'created_at'=> Carbon::now()
            
                        ]);
                        Toastr::success('Added to Cart', 'Success', ["positionClass" => "toast-top-right"]);
                
                        return back();
                    }

              
            }
            else{

                $random_number= Str::random(10);
                session(['random_number' =>$random_number]);
                $data=allproduct::where('id',$request->product_id)->first();
                cart::insert([
                    'random_number'=>session('random_number'),
                    'product_id'=>$request->product_id,
                    'qty'=>$request->qty,
                    'price'=>$data->price,
                    'created_at'=> Carbon::now()
    
                ]);
                Toastr::success('Added to Cart', 'Success', ["positionClass" => "toast-top-right"]);
        
                return back();

            }

           
    }

    public function DeleteCart($id){
        cart::where('id',$id)->delete();
        Toastr::error('Cart Deleted', 'Success', ["positionClass" => "toast-top-right"]);
        
                return back();
    }

    public function AddtoCartDetails(Request $request){
        if(Session::has('random_number')){
                $data=allproduct::where('id',$request->product_id)->first();
                cart::insert([
                    'random_number'=>session('random_number'),
                    'product_id'=>$request->product_id,
                    'qty'=>$request->qty,
                    'price'=>$data->price,
                    'created_at'=> Carbon::now()
    
                ]);
                Toastr::success('Added to Cart', 'Success', ["positionClass" => "toast-top-right"]);
        
                return back();
            

      
    }
    else{

        $random_number= Str::random(10);
        session(['random_number' =>$random_number]);
        $data=allproduct::where('id',$request->product_id)->first();
        cart::insert([
            'random_number'=>session('random_number'),
            'product_id'=>$request->product_id,
            'qty'=>$request->qty,
            'price'=>$data->price,
            'created_at'=> Carbon::now()

        ]);
        Toastr::success('Added to Cart', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }
    }
    
}
