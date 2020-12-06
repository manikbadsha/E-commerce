@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2  align-items-center">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white text-center">
                     <b>Edit Slider</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('update/slider')}}"  method="POST" enctype="multipart/form-data"> 
                        @csrf
                         <input type="hidden" name="slider_id" value="{{$data->id}}">
                        <div class="form-group">
                                <div class="row mt-3">
                                    <div class="col-lg-3"> 
                                        <label >Previous Image:</label>
                                        @if($data->image !=null)
                                            <img src="{{url($data->image)}}" alt="" height="150px" width="200px">
                                        @endif
                                    </div>
                
                                </div>
                         </div>

                            <div class="row mt-3">
                            <div  class="col-lg-12" class='imgContainer' visible="false">
                                    <label>Slider Image:</label>
                                    <input type="file" name="image" value="" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" width="200px" height="150px">
                                    <img id='img' alt="" class="form-fluid mt-1">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-10">
                                    <label>Slider Title:</label>
                                    <input type="text" value="{{$data->title}}" class="form-control" name="title" required>
                                </div>
                                <div class="col-lg-2">
                                    <label>Color:</label>
                                    <input type="color" value="{{$data->title_color}}" class="form-control" name="title_color" required>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-10">
                                    <label>Slider Sub_Title:</label>
                                    <input type="text" value="{{$data->subtitle}}" class="form-control" name="subtitle" required>
                                </div>
                                <div class="col-lg-2">
                                    <label>Color:</label>
                                    <input type="color" value="{{$data->subtitle_color}}" class="form-control" name="subtitle_color" required>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-10">
                                    <label>Slider Text:</label>
                                    <input type="text" value="{{$data->text}}" class="form-control" name="text" required>
                                </div>
                                <div class="col-lg-2">
                                    <label>Color:</label>
                                    <input type="color" value="{{$data->text_color}}" class="form-control" name="text_color" required>
                                </div>

                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-lg-10">
                                    <label>Slider Link:</label>
                                    <input type="url" value="{{$data->link}}" class="form-control" name="link" required placeholder="LInk">
                                </div>
                            
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12 text-center">
                                <input type="submit" value="Update Slider" class="btn btn-success rounded">
                             </div>
            </div>
                            
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>

        
    
    </div>


</div>

@endsection

