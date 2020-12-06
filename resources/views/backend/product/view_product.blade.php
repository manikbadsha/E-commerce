@extends('backend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    View All Products
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Date</th>
                                <th scope="col">Catergory</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            
                                 @foreach($products as $index=>$item)
                                    <tr>
                                    <th scope="row">{{$index+$products->firstItem()}}</th>
                                    @php
                                    $newdate=Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                      
                                    @endphp
                                    <td>{{ $newdate}}</td>
                                    <td>{{$item->catagory_name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if($item->image != null)
                                        <img src="{{url($item->image)}}" class="image-fluid" style="height: 80px; width:80px;">

                                        @endif
                                    </td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->stock}}</td>
                                    

                                    
                                    <td><a href="{{url('delete/product')}}/{{$item->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                     <a href="{{url('edit/product')}}/{{$item->id}}" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
                                    </td>
                                
                                </tr>
                                @endforeach
                                
                             
                                

                            
                            
                            </tbody>
                    </table>
                {{$products->links()}} 
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection