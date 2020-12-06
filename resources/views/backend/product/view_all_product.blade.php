@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            Add New All Product
        </div>
        <div class="card-body">
            <form action="{{url('Add/All/new/product')}}" method="POST" enctype="multipart/form-data">
             @csrf

             <div class="row">
                 <div class="col-lg-8">
                        <div class="row">
                            
                                <div class="col-lg-4">
                                    <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id" id="category_id" require>
                                                <option value="">select</option>
                                                @foreach($data as $item)
                                                 <option value="{{$item->id}}">{{$item->catagory_name}}</option>
                                                 @endforeach
                                             </select>
                                    </div>
                                 </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                            <label>SubCategory</label>
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">

                                            </select>
                                     </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                            <label>Product Name</label>
                                                <input type="text" class="form-control" name='name' class="@error('name') is-invalid @enderror" placeholder="Product Name" require>
                                    </div>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                </div>

                        </div>
                                        
                                

                        <div class="row mt-3">
                                <div class="col-lg-12">
                                    <label>Description</label>
                                        <!-- <textarea name="description" class="form-control" placeholder="Description" required> -->
                                    <textarea name="description"  class="form-control my-editor" class="@error('description') is-invalid @enderror"></textarea>
                                    </textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>
                        </div>


                        <div class="row mt-3">
                                <div class="col-lg-3" class='imgContainer' visible="false">
                                        <label>Image:</label>
                                        <input type="file" class="@error('image') is-invalid @enderror" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image" required>
                                        
                                        <img id='img' alt="" class="form-fluid mt-1" style="height: 120px; width:120px;" >
                                    @error('image')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-3">
                                        <label>Stock:</label>
                                        <input type="number" class="form-control" name="stock" class="@error('stock') is-invalid @enderror" required>
                                        @error('stock')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                <div class="col-lg-3">
                                        <label>Price(In Taka):</label>
                                        <input type="number" class="form-control" name="price" class="@error('price') is-invalid @enderror" required>
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                <div class="col-lg-3">
                                        <label>Status</label>
                                        <select class="form-control" name="status" id="category_id" require>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        </select>
                                 </div>
                        </div>
                        <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <br>
                                                <b>Chose Where it should appear in home page :</b>
                                                <br><br>
                                                <input type="checkbox" name="deals" id="sat"> <label for="sat">Hot Deals</label> &nbsp;&nbsp;
                                                                                
                                                <input type="checkbox" name="featured" id="sun"> <label for="sun">Featured</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="trending" id="mon"> <label for="mon">Trending</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="new" id="tue"> <label for="tue">New</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="top" id="wed"> <label for="wed">Top</label> &nbsp;&nbsp;

                                            </div>
                                        </div>
                        </div>
                                
                                
                    </div>
                

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Multiple Image (Max:(5))</label>
                                    <input type="file" class="form-control" id="upload_image" name="photo[]" onchange="priview_image()" accept=".jpg,.JPG,.png,.jpeg" multiple>
                                <div id="priview_image" >

                                </div>
                            </div>
                           

                        </div>     


                        
                </div>  
                       
                
             <div class="row mt-4">
                        <div class="col-lg-12 text-center">
                                <input type="submit" value="submit" class="btn btn-success rounded">
                        </div>

                       
             </div>
                        


         </form>
    </div>
  </div>
</div>

@endsection


@section('footer_js')
<script>
    function priview_image() {
        let total_file = document.getElementById("upload_image").files.length;
        if (total_file < 5) {
            for (var i = 0; i < total_file; i++) {
                $('#priview_image').append("<img style='height: 180px; width:180px;' src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
            }
        } else {
            $('#priview_image').append('<h5>Dont upload more then 5</h5>');
        }
    }
</script>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>


<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var type_id = $(this).val();
            if (type_id) {
                $.ajax({
                    url: '/find/subcategory/by/category/' + type_id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        if (data) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').focus;
                            $('#subcategory_id').append('<option value="">-- Select Sub-Category --</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $('#subcategory_id').empty();
                        }
                    }
                });
            } else {
                $('#subcategory_id').empty();
            }
        });
    });
</script>

@endsection