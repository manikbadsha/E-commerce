@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-light ">
                        <b>Poster</b>
                        <div class="float-right">
                            <a href="{{url('Add/poster')}}" >
                               <button class="btn btn-info text-white btn-lg"> Add New Poster</button>
                                
                            </a>
                        </div>
                     
                    </div>
                    
                </div>
                    <div class="card-body">
                        
                                        <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col-lg-6">Image</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach($data as $index=>$item)
                                            <tr> 
                                                <th scope="row">{{$index+$data->firstItem()}}</th>
                                            
                                                <td> 
                                                    @if($item->image != null)
                                                    <img src="{{url($item->image)}}" class="image-fluid" width="500px" height="100px">

                                                    @endif
                                                </td>
                                              
                                                @php
                                                $newdate=Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                                
                                                @endphp
                                                <td>{{$newdate}}</td>
                                                

                                                
                                                <td><a href="{{url('delete/poster')}}/{{$item->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                 <a href="{{url('edit/poster')}}/{{$item->id}}" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
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