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
                            <li>product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            
                           
                            <a href="#">
                          
                            
                            <img id="zoom1" src="{{url($allproducts->image)}}" alt="">
                            </a>
                            
                               
                        </div>
                        
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                @foreach($productdetails as $item)
                                @if($item->deals !=null)
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url($item->image)}}" data-zoom-image="{{url($item->image)}}">
                                        <img src="{{url($item->image)}}" style="height: 90px;" alt="zo-th-1"/>
                                    </a>

                                </li>
                                @endif
                                @endforeach
                                
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="{{url('add/to/cart/details')}}" method="post" enctype="multipart/form-data">
                       @csrf
                            <input type="hidden" name="product_id" value="{{$allproducts->id}}">
                           
                           
                            <h1>{{$allproducts->name}}</h1>
                            <div class="product_nav">
                                <ul>
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul>
                                
                            </div>
                            <div class="price_box">
                                <span name="price" class="current_price">{{$allproducts->price}} TK</span>
                                
                                
                            </div>
                            <div class="product_desc">
                                <p>{!!$allproducts->description!!} </p>
                            </div>
                            <div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>color</label>
                                <ul>
                                    <li class="color1"><a href="#"></a></li>
                                    <li class="color2"><a href="#"></a></li>
                                    <li class="color3"><a href="#"></a></li>
                                    <li class="color4"><a href="#"></a></li>
                                </ul>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input name="qty" min="1" max="100" value="1" type="number">
                                <button class="button" type="submit">add to cart</button>  
                                
                            </div>
                            <div class=" product_d_action">
                               <ul>
                                   <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                   <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                               </ul>
                            </div>
                            <div class="product_meta">
                            
                                <span>Category: <a href="#">{{$allproducts->catagory_name}}</a></span>
                             
                            </div>
                            
                        </form>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                            </ul>      
                        </div>

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products	</h2>
                    </div>
                </div>
            </div> 
            <div class="product_carousel product_column5 owl-carousel">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product1.jpg" alt=""></a>
                            
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue massa commodo sit</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product3.jpg" alt=""></a>
                           
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Itaque earum velit elementum</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product5.jpg" alt=""></a>
                            <
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Mauris tincidunt eros posuere placerat</a></h3>
                        </figcaption>
                    </figure>
                </article>
                
                
               
            </div>   
        </div>
    </section>
    <!--product area end-->
    
     <!--product area start-->
    <section class="product_area upsell_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Upsell Products	</h2>
                    </div>
                </div>
            </div> 
            <div class="product_carousel product_column5 owl-carousel">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product9.jpg" alt=""></a>
                           
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue massa commodo sit</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product7.jpg" alt=""></a>
                           
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Itaque earum velit elementum</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product5.jpg" alt=""></a>
                            
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Mauris tincidunt eros posuere placerat</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product3.jpg" alt=""></a>
                            
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Morbi ornare vestibulum massa</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product1.jpg" alt=""></a>
                           
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Porro quisquam eget feugiat pretium</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product15.jpg" alt=""></a>
                           
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Laudantium enim fringilla dignissim ipsum primis</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="{{url('/')}}/frontend_assets/img/product/product17.jpg" alt=""></a>
                          
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
                        </div>
                        <figcaption class="product_content">
                           <div class="price_box">
                                <span class="old_price">$86.00</span>  
                                <span class="current_price">$79.00</span>  
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue massa commodo sit</a></h3>
                        </figcaption>
                    </figure>
                </article>
            </div>   
        </div>
    </section>
    <!--product area end-->



@endsection