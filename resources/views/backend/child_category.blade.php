@extends('backend.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                     <b>New Child Catagory</b>
                    </div>
                    <div class="card-body">

                        <form action="{{url('new/child/catagory')}}"  method="POST"> 
                        @csrf

                        <div class="form-group">
                            <label >Select Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select One</option>

                                @foreach($data as $item)
                                <option value="{{$item->id}}" >{{$item->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Select subCatagory Name</label>
                            <select  class="form-control" id="subcategory_id" name="subcategory_id">

   
                            </select>
                        </div>

                            
                            <div class="form-group">
                                <label>Child Category Name</label>
                                <input type="text" id="name" name="name" class="form-control" class="@error('name') is-invalid @enderror" require placeholder="subCatagory Name">    

                            </div>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            <div class="form-group text-center">
                                <input type="submit" value="Add ChildCategory" class="btn btn-sm btn-success rounded">
                            
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
                            <th scope="col">Child-Category Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                           
                            
                               
                                    @foreach($childCategorys as $index=>$item)
                                 <tr>
                                <th scope="row">{{$index+$childCategorys->firstItem()}}</th>
                                <td>{{$item->catagory_name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><a href="{{url('delete/childcategory')}}/{{$item->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                 <a href="" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
                                </td>
                                </tr>
                                    @endforeach
                          
                            
                            
                           
                            

                           
                           
                        </tbody>
                </table>
                {{$childCategorys->links()}}
               
                    
                </div>
            </div>
        </div>
    
    </div>


</div>

@endsection

@section('footer_js')
<script>
$(document).ready(function() {
$('#category_id').on('change', function() {
var type_id = $(this).val();
if(type_id) {
$.ajax({
url: '/find/subcategory/by/category/'+type_id,
type: "GET",
data : {"_token":"{{ csrf_token() }}"},
dataType: "json",
success:function(data) {
// console.log(data);
if(data){
$('#subcategory_id').empty();
$('#subcategory_id').focus;
$('#subcategory_id').append('<option value="">-- Select Sub-Category --</option>');
$.each(data, function(key, value){
$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
});
}
else{
$('#subcategory_id').empty();
}
}
});
}else{
$('#subcategory_id').empty();
}
});
});
</script>
@endsection