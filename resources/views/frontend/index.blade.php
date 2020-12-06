@extends('frontend.master')


@section('content')


        <!--slider area start-->
    <section class="slider_section mb-70">
        
        <div class="slider_area owl-carousel">

             @foreach ($sliders as $slider)
                
                <div class="single_slider d-flex align-items-center" data-bgimg="{{url($slider->image)}}">
                            
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider_content">
                                        <h1 style="color:{{$slider->title_color}}"> {{$slider->title}}</h1>
                                        <h2 style="font-size:18px; width:500px; color:{{$slider->subtitle_color}}">{{$slider->subtitle}}</h2>
                                        <p style=" width:500px;color:{{$slider->text_color}}">{{$slider->text}}<span style="color: {{$slider->title_color}}"> 20% off </span> this week</p>
                                        <a class="button" href="{{$slider->link}}">shopping now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
              </div>
 
            @endforeach
        </div>
       
    </section>
    <!--slider area end-->

    <!--shipping area start-->
    <section class="shipping_area mb-70">
        <div class="container">
            <div class=" row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="{{url('/')}}/frontend_assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="{{url('/')}}/frontend_assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="{{url('/')}}/frontend_assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="{{url('/')}}/frontend_assets/img/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </section>
    <!--shipping area end-->
    
    <!--banner area start-->
    <div class="banner_area mb-40">
        <div class="container">
            <div class="row">
            @foreach($poster as $item) 
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('shop/page')}}"><img src="{{url($item->image)}}" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--banner area end-->
    
    <!--product area start-->
    <section class="product_area mb-46">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Hot Deals Products</h2>
                    </div>
                </div>
            </div> 
            <div class="product_carousel product_column5 owl-carousel">
                     @foreach($allproducts as $item)
                     @if($item->deals != null)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{url('product/details')}}/{{$item->id}}"><img src="{{url($item->image)}}" style="height: 150px;" alt=""></a>
                           
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2023/12/15"></div>
                            </div>
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">{{$item->price}} Taka</span>  
                            </div>
                            <h3 class="product_name"><a href="{{url('product/details')}}/{{$item->id}}">{{$item->name}}</a></h3>
                        </figcaption>
                    </figure>
                </article>
                @endif
                @endforeach
               
               
                
                
                   
            </div>   
        </div>
    </section>
    <!--product area end-->
    
    <!--banner area start-->
    <div class="banner_area mb-40">
        <div class="container">
            <div class="row">
            @foreach($poster as $item) 
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('shop/page')}}"><img src="{{url($item->image)}}" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--banner area end-->
    
    <!--top- category area start-->
    <section class="top_category_product mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="top_category_header">
                        <h3>Top Categories This Week</h3>
                        <p>Aliquam eget consectetuer habitasse interdum.</p>
                        <a href="shop.html">Show All Categories</a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="top_category_container category_column5 owl-carousel">
                    @foreach($allproducts as $item)
                     @if($item->top != null)
                        <div class="col-lg-2">
                            <article class="single_category">
                                <figure>
                                    <div class="category_thumb">
                                        <a href="{{url('product/details')}}/{{$item->id}}"><img src="{{url($item->image)}}" style="height: 110px;" alt=""></a>
                                    </div>
                                    <figcaption class="category_name">
                                        <h3><a href="{{url('product/details')}}/{{$item->id}}">{{$item->name}} </a></h3>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endif
                     @endforeach
            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--top- category area end-->
   <!--banner area start-->
   <div class="banner_area mb-40">
        <div class="container">
            <div class="row">
            @foreach($poster as $item) 
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('shop/page')}}"><img src="{{url($item->image)}}" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--banner area end-->
    <!--featured product area start-->
    <section class="featured_product_area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                       <h2>Featured Products</h2>
                    </div>
                </div>
            </div>
           
                    <div class="row featured_container featured_column3">

                       
                                @foreach($allproducts as $item)
                                 @if($item->featured != null)
                                    <div class="col-lg-4">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="{{url('product/details')}}/{{$item->id}}"><img src="{{url($item->image)}}" alt=""></a>
                                                
                                                    <div class="label_product">
                                                        <span class="label_sale">sale</span>
                                                    </div>
                                                </div>
                                                

                                                
                                                <figcaption class="product_content">
                                                <form action="{{url('add/to/cart')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                                    <input type="hidden" name="qty" value="1">
                                                <div class="price_box">
                                                        <span class="current_price">{{$item->price}} Taka</span>  
                                                    </div>
                                                    <h3 class="product_name"><a href="{{url('product/details')}}/{{$item->id}}">{{$item->name}}</a></h3>
                                                    <div class="add_to_cart">
                                                        <button class="mt-3"  style="position:static; font-size:30px " type="submit">Add to cart</button>                                                      
                                                       
                                                    </div>
                                                    </form> 
                                                </figcaption>
                                                
                                            </figure>
                                        </article>
                                    </div>
                                    @endif
                                @endforeach
                                
                    </div>
       </div>
    </section>
    <!--featured product area end-->
    <!--banner area start-->
    <div class="banner_area mb-40">
        <div class="container">
            <div class="row">
            @foreach($poster as $item) 
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('shop/page')}}"><img src="{{url($item->image)}}" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--banner area end-->
    <!--product area start-->
    <section class="product_area mb-46">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Computer & Laptop</h2>
                    </div>
                </div>
            </div> 
            <div class="product_carousel product_column5 owl-carousel">
            @foreach($allproducts as $item)
             @if($item->new != null)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{url('product/details')}}/{{$item->id}}"><img src="{{url($item->image)}}" style="height: 110px;" alt=""></a>
                           
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            </div>
                        <form action="{{url('add/to/cart')}}" method="post" enctype="multipart/form-data">
                             @csrf
                             <input type="hidden" name="product_id" value="{{$item->id}}">
                             <input type="hidden" name="qty" value="1">
                            <div class="add_to_cart">
                            <button class="mt-3"  style="position:static; font-size:30px " type="submit">Add to cart</button> 
                            </div>
                       
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">{{$item->price}} Taka</span>  
                            </div>
                            <h3 class="product_name"><a href="{{url('product/details')}}/{{$item->id}}">{{$item->name}}</a></h3>
                        </figcaption>
                    </form> 
                    </figure>
                </article>
                @endif
                @endforeach

                
                        
                   
                
            </div>   
        </div>
    </section>
    <!--product area end-->
    
    <!--banner area start-->
    <div class="banner_area mb-40">
        <div class="container">
            <div class="row">
            @foreach($poster as $item) 
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="{{url('shop/page')}}"><img src="{{url($item->image)}}" alt=""></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--banner area end-->
    
    <!--product area start-->
    <section class="product_area mb-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="product_left_area">
                        <div class="section_title">
                            <h2>Smartphone & Tablets</h2>
                        </div>
                        <div class="product_carousel product_column4 owl-carousel">
                        @foreach($allproducts as $item)
                        @if($item->trending	 != null)
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{url('product/details')}}/{{$item->id}}"><img src="{{url($item->image)}}" alt=""></a>
                                        
                                        <div class="label_product">
                                            <span class="label_sale">sale</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a></li>
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                            </ul>
                                        </div>
                                        <form action="{{url('add/to/cart')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                            <input type="hidden" name="qty" value="1">
                                        <div class="add_to_cart">
                                        <button class="mt-3"  style="position:static; font-size:30px " type="submit">Add to cart</button> 
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                       <div class="price_box">
                                            
                                            <span class="current_price">{{$item->price}} Taka</span>  
                                        </div>
                                        <h3 class="product_name"><a href="{{url('product/details')}}/{{$item->id}}">{{$item->name}}</a></h3>
                                    </figcaption>
                                </form> 
                                </figure>
                            </article>
                            @endif
                            @endforeach
                                                                                                                                
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <!--testimonials section start-->
                  
                     <!--testimonials section end-->
                </div>
            </div> 
        </div>
    </section>
    <!--product area end-->
    
    <!--blog area start-->
   
    <!--blog area end-->
    

    

@endsection