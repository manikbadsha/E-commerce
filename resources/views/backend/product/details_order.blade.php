@extends('backend.master')

@section('content')

<div class="container">
<div class="row mt-3">
    <div class="col-lg-12 text-right">
    <button class="btn btn-primary">  <a style="text-decoration: none; color:black;text-transform:uppercase" href="{{url('print/order')}}/{{$seles_info->id}}"> Print Order</a></button>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12 text-center lgo">
        <img src="{{url('/')}}/frontend_assets/img/logo/logo.png" alt="">
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12 text-center txt">
        <h1>KinunBD</h1>
        <h3>Shop Address:6/24A (6TH FLOOR) Gulshan Shopping Complex </h3>
        <h4>Hotline Number: +8801704234500</h4>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-6 text-left">
        <label for=""><span>Shipping Info:</span> </label>
        
        <div class="row">
            <div class="col-lg-12"><span>Name: </span> {{ $shipping_info->name}} </div>
        </div>
     
        <div class="row">
            <div class="col-lg-12"><span>Devision:</span> {{ $shipping_info->division_name}}</div>
        </div>
  
        <div class="row">
            <div class="col-lg-12"><span>District:</span> {{$shipping_info->district_name}}</div>
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Upazila:</span> {{$shipping_info->upazila_name}}</div>
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Address:</span> {{$shipping_info->address}}</div>
           
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Email:</span> {{$shipping_info->email}}</div>
            
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Phone:</span> {{$shipping_info->contact}}</div>
           
        </div>
    

    </div>

    <div class="col-lg-6 text-right">
        <label for=""><span>Invoice Info:</span></label>
        <div class="row">
            <div class="col-lg-12"><span>Invoice No:</span> {{ $seles_info->id}}</div>
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Sub Total:</span> {{$seles_info->sub_total}}</div>
            
        </div>
        <div class="row">
            <div class="col-lg-12  "><span>Payment Type:</span> {{$seles_info->payment_type}}</div>
           
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Amount to be paid:</span> {{$seles_info->amount}}</div>
        </div>
        <div class="row">
            <div class="col-lg-12"><span>Status:</span>
                @if($seles_info->status==0) Pending @elseif($seles_info->status==1) processing @elseif($seles_info->status==null) Decline @else Complete @endif        </div>
        </div>
        

    </div>
</div>

<div class="row mt-3">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    Purches Item
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                        @php
                                        $sl=1;
                                        @endphp
                                        @foreach ($billng_info as $item)
                          
                                    <tr>
                                       
                                    <th scope="">{{$sl}}</th>                                  
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->price}} TK.</td>
                                    <td>{{$item->qty}}</td>
                                    <td> {{$item->qty * $item->price}} TK</td>
                                                                    
                                   
                                   
                                </tr>

                                     @php
                                    $sl++
                                    @endphp
                                    @endforeach
                               
                          
                             
                                

                            
                            
                            </tbody>
                    </table>
                  
               
                
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3"> 
        <div class="col-lg-6 text-left"><span>Authorized By</span> </div>
        <div class="col-lg-6 text-right"><span> Kinun BD</span></div>
        
    </div>
    
</div>


<style>
    .lgo img{
       height: 50px;
       width: 100px; 
       padding-top: 2px;
    }
    .txt h1{
        padding-top:2px;
        font-size: 40px;
        font-family: 'Loto';
        text-transform: uppercase;
        font-weight: 200;
    }
    .txt h3,.txt h4{
        padding-top:2px;
        font-size: 20px;
        font-family: 'Loto';
        text-transform: uppercase;
        font-weight: 200;
    }
    span{
        text-transform: capitalize;
        font-weight: 600;
        font-size: 15px;
        font: bold;
    }

</style>

@endsection