<?php

namespace App\Http\Controllers;


use App\Catagory;
use App\Product;

use App\subCetegory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Photo;
use App\allproduct;
use App\product_appear;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProductpage(){
        $data=Catagory::all();
        
        return view('backend.product.add_product',compact('data'));
    }



    public function AddnewProduct(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required||min:3',
            'image'=>'required',           
        ]);
     
        if($request->hasfile('photo')){
            $photos=array();
            $photos=$request->file('photo');
            foreach($photos as $photo){
                $destinationpath=public_path().'/Product_images/';
                $extra_image_name=time().".".$photo->getClientOriginalExtension();
                $photo->move($destinationpath,$extra_image_name);
                
    
            }
       
        }
       
        
        if($request->hasFile('image')){
           

            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            $img=Image::make($get_image)-> save('Product_images/'.$image_name);
            //$img->insert('Product_images/'.$image_name, 'bottom-right', 10, 10);
            $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);
            //$img->fit(200);
            //$img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');


            $slugSpace=str_replace(" ","-",$request->name);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            Product::insert([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>'Product_images/'.$image_name,               
                'price'=>$request->price,
                'stock'=>$request->stock,
                'slug'=>$slug,
                'created_at'=> Carbon::now()


            ]);
            
            // Photo::insert([
            //     'product_id'=>$request->product_id,
            //     'image'=>'Product_images/'.$extra_image_name,
            //     'created_at'=> Carbon::now()

            // ]);

            Toastr::success('Product has been insearted', 'Success', ["positionClass" => "toast-top-right"]);
    
            return back();

        }


    }


    public function subcategoryBycatergory($id){
        $subcategories=subCetegory::where('category_id',$id)->get();
        return response()->json($subcategories);
    }

    public function viewallproduct(){
        $products=DB::table('products')
        ->join('catagories','products.category_id','=','catagories.id')
        ->select('products.*','catagories.catagory_name')
        ->orderBy('id','desc')
        ->paginate(2);

        return view('backend.product.view_product',compact('products'));
    }

    public function deleteproduct($id){
        
        $data=Product::where('id',$id)->first();
        if($data->image!=null){
            unlink($data->image);
           
        }
        Product::where('id',$id)->delete();
        Toastr::error('Product Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
 
             return back();
       
    }
    
    public function editProduct($id){
        $product=Product::where('id',$id)->first();
        $data=Catagory::all();
       
        return view('backend.product.edit_product',compact('product','data'));
    }

    public function updateProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required||min:3',
            
        ]);

        if($request->image !=null){
            $product_info=Product::where('id',$request->product_id)->first();
            if($product_info->image !=null){
                unlink($product_info->image);
            }
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            $img=Image::make($get_image)-> save('Product_images/'.$image_name);
            //$img->insert('Product_images/'.$image_name, 'bottom-right', 10, 10);
            $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);
            //$img->fit(200);
            //$img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');


            $slugSpace=str_replace(" ","-",$request->name);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            Product::where('id',$request->product_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>'Product_images/'.$image_name,               
                'price'=>$request->price,
                'stock'=>$request->stock,
                'slug'=>$slug,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('view/all/product');
        }
        else{
            $slugSpace=str_replace(" ","-",$request->name);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            Product::where('id',$request->product_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'name'=>$request->name,
                'description'=>$request->description,              
                'price'=>$request->price,
                'stock'=>$request->stock,
                'slug'=>$slug,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('view/all/product');  
        }


      
    }

    public function AddAllProduct(){
        $products=DB::table('allproducts')
        ->join('catagories','allproducts.category_id','=','catagories.id')
        ->select('allproducts.*','catagories.catagory_name')
        ->orderBy('id','desc')
        ->paginate(2);
        return view('backend.product.allproduct',compact('products'));
    }

    public function AddNewAllProduct(){
        $data=Catagory::all();
        return view('backend.product.add_all_product',compact('data'));
    }

    public function AddAllnewProduct(Request $request){

        $validatedData = $request->validate([
            'name' => 'required||min:2',
            'image'=>'required',
            'price'=> 'required',
            'stock'=> 'required',     
            'description'=> 'required||min:10',               
        ]);

        if($request->hasFile('image')){

            
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            $img=Image::make($get_image)-> save('Product_images/'.$image_name);
           
            $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);
            
            $slugSpace=str_replace(" ","-",$request->name);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            allproduct::insert([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>'Product_images/'.$image_name,               
                'price'=>$request->price,
                'stock'=>$request->stock,
                'slug'=>$slug,
                'deals'=>$request->deals,
                'featured'=>$request->featured,
                'trending'=>$request->trending,
                'new'=>$request->new,
                'top'=>$request->top,
                'created_at'=> Carbon::now()


            ]);

            Toastr::success('Product has been insearted', 'Success', ["positionClass" => "toast-top-right"]);
    
            return back();


            

          }
    }

    public function editAllProduct($id){
        $product=allproduct::where('id',$id)->first();
        $data=Catagory::all();
        return view('backend.product.edit_all_product',compact('product','data'));
    }
    public function updateAllProduct(Request $request){
        $validatedData = $request->validate([
            'name' => 'required||min:3',
            
        ]);

        if($request->image !=null){
            $product_info=allproduct::where('id',$request->product_id)->first();
            if($product_info->image !=null){
                unlink($product_info->image);
            }
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            $img=Image::make($get_image)-> save('Product_images/'.$image_name);
            //$img->insert('Product_images/'.$image_name, 'bottom-right', 10, 10);
            $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);
            //$img->fit(200);
            //$img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');


            $slugSpace=str_replace(" ","-",$request->name);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            allproduct::where('id',$request->product_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>'Product_images/'.$image_name,               
                'price'=>$request->price,
                'stock'=>$request->stock,
                'slug'=>$slug,
                'status'=>$request->status,
                'deals'=>$request->deals,
                'featured'=>$request->featured,
                'trending'=>$request->trending,
                'new'=>$request->new,
                'top'=>$request->top,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('add/all/product');
        }
        else{
            $slugSpace=str_replace(" ","-",$request->name);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            Product::where('id',$request->product_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'name'=>$request->name,
                'description'=>$request->description,              
                'price'=>$request->price,
                'stock'=>$request->stock,
                'slug'=>$slug,
                'status'=>$request->status,
                'deals'=>$request->deals,
                'featured'=>$request->featured,
                'trending'=>$request->trending,
                'new'=>$request->new,
                'top'=>$request->top,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('add/all/product');  
        }


      
    }

    public function deleteAllproduct($id){
        
        $data=allproduct::where('id',$id)->first();
        if($data->image!=null){
            unlink($data->image);      
        }
        allproduct::where('id',$id)->delete();
        Toastr::error('Product Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
 
             return back();
       
    }


}
