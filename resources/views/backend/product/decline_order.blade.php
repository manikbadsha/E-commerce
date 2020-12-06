@extends('backend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    Decline Orders
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">SL</th>
                                <th scope="col">User Name</th>
  
                                <th scope="col">Date</th>
                                <th scope="col">Shipping Cost</th>
                                <th scope="col">Price</th>
                                <th scope="col">Address</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Total</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            
                                 @foreach($data as $index=>$item)
                                    <tr>
                                    <th scope="row">{{$index+$data->firstItem()}}</th>
                                    <td>{{$item->user_name}}</td>
                                    @php
                                    $newdate=Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                      
                                    @endphp
                                    <td>{{ $newdate}}</td>
                                    <td>{{$item->shipping_cost}}</td>
                                    <td>{{$item->sub_total}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->payment_type}}</td>
                                    <td>{{$item->amount}}</td>                                   
                                    <td>{{$item->discount}}</td>
                                    
                                    
                                   
                                    <td><a href="" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                     <a href="" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
                                     <br><br><a href="" class="btn btn-sm btn-warning rounded"><i class="fas fa-check-circle"></i></a>
                                     <a href="" class="btn btn-sm btn-warning rounded"> <i class="fas fa-times"></i></a>
                                    </td>
                                
                                </tr>
                                @endforeach
                                
                             
                                

                            
                            
                            </tbody>
                    </table>
                    {{$data->links()}} 
               
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection