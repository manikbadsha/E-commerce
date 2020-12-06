@extends('frontend.master')

@section('content')

 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
     <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">  
           
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                   <td class="product_remove"><a href="{{url('card/delete')}}/{{$cart->id}}"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{url($cart->product_image)}}" alt=""></a></td>
                                    <td class="product_name"><a href="#">{{$cart->product_name}}</a></td>
                                    <td class="product-price">TK.{{$cart->price}}</td>
                                    <td class="product_quantity">{{$cart->qty}}</td>
                                    <td class="product_total">Tk.{{$cart->qty*$cart->price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>   
                            </div>  
                                 
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                                 @php
                                                    $amount=0;
                                                    foreach($carts as $item){
                                                        $amount=$amount+($item->qty * $item->price);

                                                    }    
                                                @endphp
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">TK.{{$amount}}</p>
                                   </div>
                                  
                                   <form action="{{url('place/the/Shipping')}}" method="post" enctype="multipart/form-data">
                                     @csrf
                                   
                                      
                                   @foreach($shipping as $item)
                                   <div class="panel-default">
                                        <input id="payment_defult1" name="check_method" value="{{$item->title}}" type="radio" data-target="createp_account">
                                        <label for="payment_defult1" data-toggle="collapse" data-target="#collapsedefult1" aria-controls="collapsedefult1">{{$item->title}} {{ $item->price}}TK. <img src="assets/img/icon/papyel.png" alt=""></label>                                    
                                        </div>  
                                        @endforeach   
                                         <input type="submit" value="Calculate shipping" class="btn btn-success rounded">
                                                                                                   
                                </form>
                                                         
                                <div class="cart_subtotal ">
                                       <p>Shipping</p>
                                       <p class="cart_amount"><span>Flat Rate:</span>60 TK</p>
                                   </div>
                                  

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">TK.{{$amount+60}}</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="{{url('checkout/index')}}">Proceed to Checkout</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            
        </div>     
    </div>
     <!--shopping cart area end -->
    

@endsection


@section('footer_js')
<script>
$(document).ready(function() {
$('#category_id').on('change', function() {
var type_id = $(this).val();
if(type_id) {
$.ajax({
url: '/find/subcategory/by/category/'+type_id,
type: "GET",
data : {"_token":"{{ csrf_token() }}"},
dataType: "json",
success:function(data) {
// console.log(data);
if(data){
$('#subcategory_id').empty();
$('#subcategory_id').focus;
$('#subcategory_id').append('<option value="">-- Select Sub-Category --</option>');
$.each(data, function(key, value){
$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
});
}
else{
$('#subcategory_id').empty();
}
}
});
}else{
$('#subcategory_id').empty();
}
});
});
</script>
@endsection