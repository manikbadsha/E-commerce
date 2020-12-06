@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2  align-items-center">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white text-center">
                     <b>Edit Poster</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('update/poster')}}"  method="POST" enctype="multipart/form-data"> 
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

