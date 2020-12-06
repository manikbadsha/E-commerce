@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-light ">
                        <b>View New Shipping Method</b>
                        <div class="float-right">
                            <a href="{{url('Add/new/shipping')}}">
                               <button class="btn btn-info text-white btn-lg"> Add New Shipping Method</button>
                                
                            </a>
                        </div>
                     
                    </div>
                    
                </div>
                    <div class="card-body">
                        
                                        <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach($data as $index=>$item)
                                            <tr> 
                                            <th scope="row">{{$index+$data->firstItem()}}</th>
                                                        @php
                                                        $newdate=Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                                        
                                                        @endphp
                                                
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->duration}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{ $newdate}}</td>
                                                

                                                
                                                <td><a href="" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                 <a href="" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
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

@endsection