<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Catagory;
use App\Product;
use App\cart;
use App\allproduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



use App\Poster;
use App\shippingmethod;
use App\Contact;
use App\slider;
use App\subCetegory;
use App\childcategory;
use App\Sale;
use Brian2694\Toastr\Facades\Toastr;

class ShippingController extends Controller
{
    public function viewShipping(){
        $data=shippingmethod::orderBy('id','desc')->paginate(5);
        return view('backend.shipping.view_shipping',compact('data'));
    }

    public function addShipping(){
        return view('backend.shipping.add_shipping');
    }

    public function AddtoShipping(Request $request){
        shippingmethod::insert([
            'title'=>$request->title,
            'duration'=>$request->duration,
            'price'=>$request->price,
            'created_at' => Carbon::now()
        ]);
        Toastr::success('Catagory Inserted ', 'Success', ["positionClass" => "toast-top-right"]);
    
        return back();
    }

    public function calcShipping(Request $request){
       
        if($request->check_method=="Inside Dhaka"){
         shippingmethod::where('title','Inside Dhaka')->update([
                'price'=>90
         ]);
         Toastr::success('Shipping Cost Update  ', 'Success', ["positionClass" => "toast-top-right"]);
    
         return back();

            }
            else{
                shippingmethod::where('title','outside Dhaka')->update([
                    'price'=>160
             ]);
             Toastr::success('Shipping Cost Update  ', 'Success', ["positionClass" => "toast-top-right"]);
    
             return back();
       
            }
        }
       

       

        

    
}
