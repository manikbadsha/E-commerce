@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                     <b>New Catagory</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('new/catagory')}}"  method="POST"> 
                        @csrf
                            <div class="form-group">
                                <label>Catagory Name</label>
                                <input type="text" id="catagory_name" name="catagory_name" class="form-control" class="@error('catagory_name') is-invalid @enderror" require placeholder="Catagory Name">    

                            </div>

                                @error('catagory_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <div class="form-group text-center">
                                <input type="submit" value="Add Catagory" class="btn btn-sm btn-success rounded">
                            
                            </div>
                        
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <b>View All Category</b>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Catergory Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($categories as $index=>$category)
                            
                            <tr>
                            <th scope="row">{{$index+$categories->firstItem()}}</th>
                            <td>{{$category->catagory_name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td><a href="{{url('delete/category')}}/{{$category->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="{{url('edit/category')}}/{{$category->id}}" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
                            </td>
                            
                            </tr>
                           
                            

                            @endforeach
                           
                        </tbody>
                </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    
    </div>


</div>

@endsection