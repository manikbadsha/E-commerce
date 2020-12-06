@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-header bg-warning text-white">
                     <b>Edit SubCatagory</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('update/subcatagory')}}"  method="POST"> 
                        @csrf

                            <input type="hidden" name="category_id" value="{{$data->id}}">
                            <div class="form-group">
                                <label>Catagory Name</label>
                                <input type="text" id="name" value="{{$data->name}}" name="name" class="form-control" class="@error('name') is-invalid @enderror" require placeholder="Catagory Name">    

                            </div>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <div class="form-group text-center">
                                <input type="submit" value="Update subCatagory" class="btn btn-sm btn-info rounded">
                            
                            </div>
                        
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>   
    </div>


</div>

@endsection