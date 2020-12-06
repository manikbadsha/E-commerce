<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My First Laravel Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
   
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/frontend_assets/img/favicon.ico">
      
    <link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/style.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 

</head>

<body>
   
    <!--header area start-->
    
    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <p>Telephone Enquiry: <a href="tel:+6494461709">01704234500</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul>
                                   <li><a href="my-account.html"> My Account </a></li> 
                                   <li><a href="{{url('checkout/index')}}"> Checkout </a></li> 
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{url('/')}}/frontend_assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                   <form action="#">
                                       <div class="hover_category">
                                            <select class="select_option" name="select" id="categori1">
                                                <option selected value="1">All Categories</option>
                                                @foreach($categorys as $category)

                                                <option value="{{$category->id}}">{{$category->catagory_name}}</option>
   
                                               @endforeach
                                            </select>                        
                                       </div>
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text">
                                            <button type="submit">Search</button> 
                                        </div>
                                    </form>
                                </div>
                                <div class="middel_right_info">
                                   

                                                 @php
                                                    $amount=0;
                                                    foreach($carts as $item){
                                                        $amount=$amount+($item->qty * $item->price);

                                                    }    
                                                @endphp
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-shopping-bag" aria-hidden="true"></i>TK. {{$amount}}<i class="fa fa-angle-down"></i></a>
                                        <span class="cart_quantity">{{$product_count}}</span>
                                        <!--mini cart-->
                                         <div class="mini_cart">
                                             @foreach($carts as $item)
                                                <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{url($item->product_image)}}" alt=""></a>
                                                </div>
                                                    <div class="cart_info">
                                                        <a href="#">{{$item->product_name}}</a>
                                                        <p>Qty:{{$item->qty}}<span> TK.{{$item->price}} </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="{{url('card/delete')}}/{{$item->id}}"><i class="ion-android-close"></i></a>
                                                    </div>
                                                </div>
                                           @endforeach

                                               

                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">TK. {{ $amount}}</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">TK. {{ $amount}}</span>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                               <div class="cart_button">
                                                    <a href="{{url('cart/index')}}">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="{{url('checkout/index')}}">Checkout</a>
                                                </div>

                                            </div>

                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <!--header bottom satrt-->
            <div class="main_menu_area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">ALL CATEGORIES</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                                
                                    <div class="categories_menu_toggle">
                                    <ul>
                                    @foreach($categorys as $item)
                                        <li class="option" id="cat{{$item->id}}" value='{{$item->id}}'><a >{{$item->catagory_name}} <i class="fa fa-angle-right"></i></a>
                                          
                        
                                        </li>
                                       
                                        
                                        @endforeach
                                     
                                    </ul>
                                </div>
                                         
                                         
                                       
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="main_menu menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><a class="active"  href="{{url('/')}}">home<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="{{url('/')}}">Home shop 1</a></li>
                                                <li><a href="{{url('/')}}">Home shop 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega_items"><a href="{{url('shop/page')}}">shop<i class="fa fa-angle-down"></i></a> 
                                            
                                                <ul class="sub_menu pages">
                                                <li><a href="{{url('shop/page')}}">other Pages</a>
                                                        <ul>
                                                       
                                                            <li><a href="{{url('cart/index')}}">cart</a></li>
                                                           <li><a href="{{url('checkout/index')}}">Checkout</a></li>
                                                            <li><a href="{{url('myaccount/index')}}">my account</a></li>
                                                            <li><a href="{{url('404/index')}}">Error 404</a></li>
                                                            <li><a href="{{url('product/details')}}">product details</a></li>
                                                        </ul>
                                                    </li>  
                                                </ul>
                                            
                                        </li>
                                        <li><a href="{{url('blog/home')}}">blog<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{url('product/blog')}}">blog details</a></li>
                                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                <li><a href="blog-sidebar.html">blog left sidebar</a></li>
                                                <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{url('about/index')}}">About Us</a></li>
                                               
                                                <li><a href="{{url('faq/index')}}">Frequently Questions</a></li>
                                                <li><a href="{{url('contact/page')}}">contact</a></li>
                                                <li><a href="{{url('index/login')}}">login</a></li>
                                                <li><a href="{{url('404/index')}}">Error 404</a></li>
                                                <li><a href="{{url('compare/page')}}">Compare</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="{{url('about/index')}}">about Us</a></li>
                                        <li><a href="{{url('contact/page')}}"> Contact Us</a></li>
                                    </ul>  
                                </nav> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div> 
    </header>
    <!--header area end-->
    
    <!--sticky header area start-->
    <div class="sticky_header_area sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sticky_header_right menu_position">
                        <div class="main_menu"> 
                            <nav>  
                                <ul>
                                    <li><a class="active"  href="{{url('/')}}">home<i class="fa fa-angle-down"></i></a>
                                        
                                    </li>
                                    <li class="mega_items"><a href="{{'shop/page'}}">shop<i class="fa fa-angle-down"></i></a> 
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                
                                            <li><a href="#">other Pages</a>
                                                        <ul>
                                                            <li><a href="{{url('cart/index')}}">cart</a></li>
                                                           <li><a href="{{url('checkout/index')}}">Checkout</a></li>
                                                            <li><a href="{{url('myaccount/index')}}">my account</a></li>
                                                            <li><a href="{{url('404/index')}}">Error 404</a></li>
                                                            <li><a href="{{url('product/details')}}">product details</a></li>
                                                        </ul>
                                                    </li>                                  
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="{{url('blog/home')}}">blog<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{url('product/blog')}}">blog details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{url('about/index')}}">About Us</a></li>
                                                <li><a href="{{url('faq/index')}}">Frequently Questions</a></li>
                                                <li><a href="{{url('contact/page')}}">contact</a></li>
                                                <li><a href="{{url('index/login')}}">login</a></li>
                                                <li><a href="{{url('404/index')}}">Error 404</a></li>
                                                <li><a href="{{url('compare/page')}}">Compare</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="{{url('about/index')}}">about Us</a></li>
                                        <li><a href="{{url('contact/page')}}"> Contact Us</a></li>
                                </ul>  
                            </nav> 
                        </div>
                        <div class="middel_right_info">                      
                                                @php
                                                    $amount=0;
                                                    foreach($carts as $item){
                                                        $amount=$amount+($item->qty * $item->price);

                                                    }    
                                                @endphp
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-shopping-bag" aria-hidden="true"></i>TK. {{$amount}}<i class="fa fa-angle-down"></i></a>
                                        <span class="cart_quantity">{{$product_count}}</span>
                                        <!--mini cart-->
                                         <div class="mini_cart">
                                             @foreach($carts as $item)
                                                <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{url($item->product_image)}}" alt=""></a>
                                                </div>
                                                    <div class="cart_info">
                                                        <a href="#">{{$item->product_name}}</a>
                                                        <p>Qty:{{$item->qty}}<span> TK.{{$item->price}} </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="{{url('card/delete')}}/{{$item->id}}"><i class="ion-android-close"></i></a>
                                                    </div>
                                                </div>
                                           @endforeach

                                               

                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">TK. {{ $amount}}</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">TK. {{ $amount}}</span>
                                                </div>
                                            </div>

                                            <div class="mini_cart_footer">
                                               <div class="cart_button">
                                                    <a href="{{url('cart/index')}}">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="{{url('checkout/index')}}">Checkout</a>
                                                </div>

                                            </div>

                                        </div>
                                        <!--mini cart end-->
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')






    
    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="{{url('/')}}/frontend_assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>We are a team of designers and developers that 
                                create high quality HTML Template, Woocommerce, Shopify Theme.</p>
                            <p><span>Address</span> The Barn, Ullenhall, Henley in Arden B578 5C, England.</p>
                            <p><span>Mobile: </span><a href="tel:+123.456.789">+123.456.789</a>  – <a href="tel:+123.456.678">+123.456.678</a> </p>
                            <p><span>Support: </span><a target="_blank" href="https://hasthemes.com/contact-us/">https://hasthemes.com/contact-us/</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="blog.html">Delivery Information</a></li>
                                <li><a href="contact.html">Privacy Policy</a></li>
                                <li><a href="services.html">Terms & Conditions</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Gift Certificates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="faq.html">International Orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                   <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="rss" href="#" title="rss"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                           <h3>Join Our Newsletter Now</h3>
                            <form id="mc-form" class="mc-form footer-newsletter" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2019 <a href="#">Junko</a>  All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->
   
    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">  
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">    
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li >
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/product/product1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                 <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/product2.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/product3.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/product5.jpg" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>    
                                </div>  
                            </div> 
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2> 
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>    
                                        <span class="old_price" >$78.99</span>    
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>    
                                    </div> 
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                           <h2>size</h2>
                                           <select class="select_option">
                                               <option selected value="1">s</option>
                                               <option value="1">m</option>
                                               <option value="1">l</option>
                                               <option value="1">xl</option>
                                               <option value="1">xxl</option>
                                           </select>
                                        </div>
                                        <div class="variants_color">
                                           <h2>color</h2>
                                           <select class="select_option">
                                               <option selected value="1">purple</option>
                                               <option value="1">violet</option>
                                               <option value="1">black</option>
                                               <option value="1">pink</option>
                                               <option value="1">orange</option>
                                           </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="0" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>   
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>    
                                    </div>      
                                </div>    
                            </div>    
                        </div>     
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- modal area end-->
    
    <!--news letter popup start-->
     <div class="newletter-popup">
        <div id="boxes" class="newletter-container">
            <div id="dialog" class="window">
                <div id="popup2">
                    <span class="b-close"><span>close</span></span>
                </div>
                <div class="box">
                    <div class="newletter-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="box-content newleter-content">
                        <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                        <div id="frm_subscribe">
                            <form name="subscribe" id="subscribe_popup">
                                    <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                    <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here...">
                                    <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                    <div id="notification"></div>
                                    <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                            </form>
                            <div class="subscribe-bottom">
                                <input type="checkbox" id="newsletter_popup_dont_show_again">
                                <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                            </div>
                        </div>
                        <!-- /#frm_subscribe -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>

        </div>
        <!-- /.box -->
    </div>
    <!--news letter popup start-->

<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="{{url('/')}}/frontend_assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="{{url('/')}}/frontend_assets/js/main.js"></script>

<script>
$(document).ready(function() {
@foreach($categorys as $item){}
$('#cat{{$item->id}}').click(function() {
    var type_id = $(this).val();
   
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
}
else{
$('#subcategory_id').empty();
}

});
@endforeach

});
</script>

@yield('footer_js')




<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}



</body>


<!-- Mirrored from demo.hasthemes.com/junko-preview/junko/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jun 2020 12:54:25 GMT -->
</html>


