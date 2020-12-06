<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Billing;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Shipping;
use PDF;

class orderManagement extends Controller
{
   public function viewSells(){
    $data=DB::table('sales')
         ->join('shippings','sales.shipping_id','=','shippings.id')
         ->select('sales.*','shippings.name as user_name','shippings.address')
         ->orderBy('sales.id','desc')
         ->where('sales.status',0)
         ->paginate(10);
    
    return view('backend.product.view_sale',compact('data'));
   }

   public function approveOrder($id){
    Sale::where('id',$id)->update([
        'status' => 1,
        'updated_at' => Carbon::now()
    ]);
    Toastr::success('order has been placed', 'Success', ["positionClass" => "toast-top-right"]);
    return back();


   }
   public function viewapproveOrder(){
    $data=DB::table('sales')
    ->join('shippings','sales.shipping_id','=','shippings.id')
    ->select('sales.*','shippings.name as user_name','shippings.address')
    ->orderBy('sales.id','desc')
    ->where('sales.status',1)
    ->paginate(10);
    return view('backend.product.approve_order',compact('data'));
   }
   public function declineOrder($id){
    Sale::where('id',$id)->update([
        'status' => null,
        'updated_at' => Carbon::now()
    ]);
    // $data="Order Declined";
    // $email=Auth::user()->email;
    // Mail::to($email)->send(new OrderMail($data));
    Toastr::success('order has been declined', 'Success', ["positionClass" => "toast-top-right"]);
    return back();
   }

   public function viewdeclineOrder(){
    $data=DB::table('sales')
    ->join('shippings','sales.shipping_id','=','shippings.id')
    ->select('sales.*','shippings.name as user_name','shippings.address')
    ->orderBy('sales.id','desc')
    ->where('sales.status',null)
    ->paginate(10);
    return view('backend.product.decline_order',compact('data'));
   }

   public function viewDetailsOrder($id){
    
    $seles_info=Sale::where('id',$id)->first();
    $shipping_info=DB::table('shippings')
                            ->join('divisions','shippings.devision','=','divisions.id')
                            ->join('districts','shippings.district','=','districts.id')
                            ->join('upazilas','shippings.upazila','=','upazilas.id')
                            ->select('shippings.*','divisions.name as division_name','districts.name as district_name','upazilas.name as upazila_name')
                            ->where('shippings.id',$seles_info->shipping_id)
                            ->first();
    //$shipping_info=Shipping::where('id',$seles_info->shipping_id)->first();
    $billng_info=DB::table('billings')
                        ->join('allproducts','billings.product_id','=','allproducts.id')
                        ->select('billings.*','allproducts.name as product_name')
                        ->where('billings.sale_id',$seles_info->id)
                        ->get();
   // Billing::where('sale_id','$seles_info->id')->get();
    return view('backend.product.details_order',compact('seles_info','shipping_info','billng_info'));
   }

   public function PrintOrder($id){
    $seles_info=Sale::where('id',$id)->first();
    $shipping_info=DB::table('shippings')
                            ->join('divisions','shippings.devision','=','divisions.id')
                            ->join('districts','shippings.district','=','districts.id')
                            ->join('upazilas','shippings.upazila','=','upazilas.id')
                            ->select('shippings.*','divisions.name as division_name','districts.name as district_name','upazilas.name as upazila_name')
                            ->where('shippings.id',$seles_info->shipping_id)
                            ->first();
    //$shipping_info=Shipping::where('id',$seles_info->shipping_id)->first();
    $billng_info=DB::table('billings')
                        ->join('allproducts','billings.product_id','=','allproducts.id')
                        ->select('billings.*','allproducts.name as product_name')
                        ->where('billings.sale_id',$seles_info->id)
                        ->get();
       $pdf=PDF::loadview('backend.order.invoice_pdf',compact('seles_info','shipping_info','billng_info'));
       return $pdf->stream('invoice.pdf');

   }
}
