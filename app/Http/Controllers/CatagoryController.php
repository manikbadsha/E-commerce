<?php

namespace App\Http\Controllers;
use App\Catagory;
use App\Product;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
   public function catagorypage(){
       $categories=Catagory::orderBy('id','desc')->paginate(5);
       return view('backend.catagory',compact('categories'));
   }

   public function addNewCatagory(Request $request){

    // DB::table('catagories')-> Insert([
    //     'catagory_name' ->$request->catagory_name 
    //  ]);
    $validatedData = $request->validate([
        'catagory_name' => 'required||min:3',
        
    ]);

    if(Catagory::where('catagory_name',$request->catagory_name)->exists()){
        Toastr::warning('Catagory Already Inserted ', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
    }
    else{
        Catagory::insert ([
            'catagory_name' => $request->catagory_name,
            'created_at' => Carbon::now()
        ]);
                Toastr::success('Catagory Inserted ', 'Success', ["positionClass" => "toast-top-right"]);
    
                return back();

    }
      
   

   }

   public function DeleteCategory($id){
    
    if(product::where('category_id',$id)->exists()){
        Toastr::warning('This Category Has a product', 'Success', ["positionClass" => "toast-top-right"]);
 
        return back();
    }
    else{
        Catagory::where('id',$id)->delete();
        Toastr::error('Catagory Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
 
             return back();
        
    }
     
    
   }


   public function editCategory($id){
       $data=Catagory::where('id',$id)->first();
       return view('backend.edit_category',compact('data'));
   }

   public function updateCategory(Request $request){

    $validatedData = $request->validate([
        'catagory_name' => 'required||min:3',
        
    ]);

       Catagory::where('id',$request->catagory_id)->update([
           'catagory_name'=>$request->catagory_name
       ]);
       return redirect('catagory/backend/page');
   }

}
