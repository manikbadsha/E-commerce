@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                     <b>New subCatagory</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('new/sub/catagory')}}"  method="POST"> 
                        @csrf

                        <div class="form-group">
                            <label >Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select One</option>

                                @foreach($categories as $category)
                                <option value="{{$category->id}}" >{{$category->catagory_name}}</option>

                                @endforeach
                                
                            </select>
                        </div>
                            <div class="form-group">
                                <label>subCatagory Name</label>
                                <input type="text" id="subcatagory_name" name="subcatagory_name" class="form-control" class="@error('subcatagory_name') is-invalid @enderror" require placeholder="subCatagory Name">    

                            </div>

                                @error('subcatagory_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <div class="form-group text-center">
                                <input type="submit" value="Add subCatagory" class="btn btn-sm btn-success rounded">
                            
                            </div>
                        
                        
                        </form>
                   
                    </div>


                </div>
        
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <b>View All SubCategory</b>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Catergory Name</th>
                            <th scope="col">Sub-Catergory Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                           
                            @foreach($subCategorys as $index=>$subCategory)
                                <tr>
                                <th scope="row">{{$index+$subCategorys->firstItem()}}</th>
                                <td>{{$subCategory->catagory_name}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>{{$subCategory->created_at}}</td>
                                <td><a href="{{url('delete/subcategory')}}/{{$subCategory->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td> <td> <a href="{{url('edit/subcategory')}}/{{$subCategory->id}}" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
                                </td>
                            
                            </tr>
                            @endforeach
                            
                           
                            

                           
                           
                        </tbody>
                </table>
                {{$subCategorys->links()}}
                    
                </div>
            </div>
        </div>
    
    </div>


</div>

@endsection