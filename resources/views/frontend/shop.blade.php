@extends('frontend.master')

@section('content')

 
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{Url('/')}}">home</a></li>
                           
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h2>Product categories</h2>
                                <ul>
                                @foreach($categorys as $item)
                                    <li><a href="#">{{$item->catagory_name}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </aside>

                    
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                   
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                     @foreach($allproducts as $item)

                        <div class="col-lg-4 ">
                        
                        <article class="single_product">
                        <form action="{{url('add/to/cart')}}" method="post" enctype="multipart/form-data">
                         @csrf
                                   

                                    
                                <figure>
                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                    <input type="hidden" name="qty" value="1">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{url('product/details')}}/{{$item->id}}"><img src="{{url($item->image)}}" alt=""></a>
                                       
                                        <div class="label_product">
                                            <span class="label_sale">sale</span>
                                        </div>

                                        <div class="add_to_cart">
                                        <button class="button" type="submit">add to cart</button>  
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                       <div class="price_box">
                                            <span class="old_price">{{$item->price}}</span>  
                                            <span name="price" class="current_price">{{$item->price}}</span>  
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">{{$item->name}}</span>  
                                            
                                        </div>
                                    </div>
                                   
                                </figure>
                               
                        </form>
                            </article>
                                  
                               
                        </div>
                        @endforeach
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
         
        </div>
    </div>
    <!--shop  area end-->
    



@endsection