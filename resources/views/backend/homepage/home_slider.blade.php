@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-light ">
                        <b>slider</b>
                        <div class="float-right">
                            <a href="{{url('Add/slider')}}">
                               <button class="btn btn-info text-white btn-lg"> Add New Slider</button>
                                
                            </a>
                        </div>
                     
                    </div>
                    
                </div>
                    <div class="card-body">
                        
                                        <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col-lg-1">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Title_color</th>
                                            <th scope="col">Subtitle</th>
                                            <th scope="col">Subtitle_color</th>
                                            <th scope="col">Text</th>
                                            <th scope="col">Text_color</th>
                                            <th scope="col">Link</th>
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
                                                    <img src="{{url($item->image)}}" class="image-fluid" width="100px" height="100px">

                                                    @endif
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->title_color}}</td>
                                                <td>{{$item->subtitle}}</td>
                                                <td>{{$item->subtitle_color}}</td>
                                                <td>{{$item->text}}</td>
                                                <td>{{$item->text_color}}</td>
                                                <td>{{$item->link}}</td>
                                                @php
                                                $newdate=Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                                
                                                @endphp
                                                <td>{{$newdate}}</td>
                                                

                                                
                                                <td><a href="{{url('delete/slider')}}/{{$item->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <br><br> <a href="{{url('edit/slider')}}/{{$item->id}}" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
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