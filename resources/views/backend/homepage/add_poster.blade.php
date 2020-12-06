@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2  align-items-center">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white text-center">
                     <b>Add New Poster</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('new/add/poster')}}"  method="POST" enctype="multipart/form-data"> 
                        @csrf
                            <div class="row mt-3">
                            <div  class="col-lg-12" class='imgContainer' visible="false">
                                    <label>Poster Image:</label>
                                    <input type="file" name="image" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control"  required>
                                    <img id='img' alt="" width="100px" height="100px" class="form-fluid mt-1">
                                </div>
                            </div>                                                     
                            <div class="row mt-4">
                                <div class="col-lg-12 text-center">
                                <input type="submit" value="Add Slider" class="btn btn-success rounded">
                             </div>
            </div>
                            
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>

        
    
    </div>


</div>

@endsection

