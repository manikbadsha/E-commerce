<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Catagory;
use App\Product;
use App\cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;


use App\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;

   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $categorys=Catagory::all();
        $carts=DB::table('carts')
                  ->join('products','carts.product_id','=','products.id')
                  ->select('carts.*','products.image as product_image','products.name as product_name')
                  ->where('random_number',session('random_number'))
                  ->orderBY('id','desc')
                  ->get();
        $product_count=cart::where('random_number',session('random_number'))->count();
        return view('frontend.stripe',compact('categorys','carts','product_count'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $amount=session('amount');
        $saleId=session('saleId');
        Stripe\Charge::create ([
                "amount" => 100 * $amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from IWSBD-2001" 
        ]);
        Sale::where('id',$saleId)->update([
            'status'=>0
        ]);
  
         //$data="Email has been send";
            $data=DB::table('billings')
            ->join('allproducts','billings.product_id','=','allproducts.id')
            ->select('billings.*','allproducts.name as product_name')
            -> where('sale_id', $saleId)
            ->get();
            $email=Auth::user()->email;
            Mail::to($email)->send(new OrderMail($data));
            Toastr::success('order success', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect('/');
    }
}