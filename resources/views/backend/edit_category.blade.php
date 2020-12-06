@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-header bg-warning text-white">
                     <b>Edit Catagory</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('update/catagory')}}"  method="POST"> 
                        @csrf

                            <input type="hidden" name="catagory_id" value="{{$data->id}}">
                            <div class="form-group">
                                <label>Catagory Name</label>
                                <input type="text" id="catagory_name" value="{{$data->catagory_name}}" name="catagory_name" class="form-control" class="@error('catagory_name') is-invalid @enderror" require placeholder="Catagory Name">    

                            </div>

                                @error('catagory_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <div class="form-group text-center">
                                <input type="submit" value="Update Catagory" class="btn btn-sm btn-info rounded">
                            
                            </div>
                        
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>   
    </div>


</div>

@endsection