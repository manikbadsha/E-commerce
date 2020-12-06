<?php

namespace App\Http\Controllers;

use App\Catagory;
use App\Product;
use App\cart;
use App\allproduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;

use App\Poster;
use App\shippingmethod;
use App\Contact;
use App\slider;
use App\subCetegory;
use App\childcategory;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();

        $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.index',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

  
    public function productDetails($id){
       
        $categorys=Catagory::all();
        $products=allproduct::orderBy('id','desc')->paginate();
        $productdetails=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $allproducts=DB::table('allproducts')
            ->join('catagories','allproducts.category_id','=','catagories.id')
            ->select('allproducts.*','catagories.catagory_name')
            ->where('allproducts.id',$id)
            ->first();
        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
         
        return view('frontend.product_details',compact('categorys','products','carts','product_count','allproducts','productdetails'));

    }

    public function productBlog(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.product_blog',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }


    public function BlogIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.blog',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function AboutIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.about',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function errorIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('errors.404',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function CompareIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.compare',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function FaqIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.faq',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function myAccountIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.myaccount',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function cartIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();
        $shipping=shippingmethod::all();
        $price1=shippingmethod::where('title','Inside Dhaka')->first();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
          
        return view('frontend.cart',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys','shipping','price1'));
    }

   

    public function  LoginIndex(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.login',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }
    
    public function shopPage(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
          $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.shop',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function ContactPage(){
        $categorys=Catagory::all();

        $childcategorys=childcategory::all();
      
        $allproducts=allproduct::orderBy('id','desc')->get();
        $sliders=slider::orderBy('id','desc')->get();
        $poster=Poster::orderBy('id','desc')->get();

        $carts=DB::table('carts')
                  ->join('allproducts','carts.product_id','=','allproducts.id')
                  ->select('carts.*','allproducts.image as product_image','allproducts.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
  
          $product_count=cart::where('random_number',session('random_number'))->count();
        
        return view('frontend.contact',compact('categorys','carts','product_count','sliders','allproducts','poster','childcategorys'));
    }

    public function ContactForm(Request $request){
       Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=> Carbon::now()

        ]);
        Toastr::success('Contact has inserted ', 'Success', ["positionClass" => "toast-top-right"]);
    
        return back();
    }
    
   public function subCat(Request $request){
       echo $cat_id=$request->cat_id;
   }
    
}
