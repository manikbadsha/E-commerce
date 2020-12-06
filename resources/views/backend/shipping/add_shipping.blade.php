@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2  align-items-center">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white text-center">
                     <b>Add New Shipping</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('add/shipping/data')}}"  method="POST" enctype="multipart/form-data"> 
                        @csrf
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name='title'  placeholder="Inside/outside dhaka" require>
                                    </div>
                                </div>
                            
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="text" class="form-control" name='duration'  placeholder="duration" require>
                                    </div>
                                </div>
                             
                                
                              

                            </div>  
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name='price'  placeholder="price" require>
                                    </div>
                                </div>                            
                            </div>                                                   
                            <div class="row mt-4">
                                <div class="col-lg-12 text-center">
                                <input type="submit" value="Add shipping" class="btn btn-success rounded">
                             </div>
            </div>
                            
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>

        
    
    </div>


</div>

@endsection

