<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\subCetegory;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SubCategoryController extends Controller
{
    public function subCategoryPage(){
        $categories=catagory::all();
        $subCategorys=DB::table('sub_cetegories')
        ->join('catagories','sub_cetegories.category_id','=','catagories.id')
        ->select('sub_cetegories.*','catagories.catagory_name')
        ->orderBy('id','desc')
        ->paginate(5);
       
        
        return view('backend.SubCategory',compact('categories','subCategorys'));
    }

    public function addsubCategory(Request $request){
        $validatedData = $request->validate([
            'subcatagory_name' => 'required||min:2',
            
        ]);

        subCetegory::insert([
            'category_id'=>$request->category_id,
            'name'=>$request->subcatagory_name,
            'created_at' => Carbon::now()
        ]);
       
        Toastr::success('subCatagory Inserted ', 'Success', ["positionClass" => "toast-top-right"]);
         return back();
    }

    public function DeletesubCategory($id){
        if(product::where('subcategory_id',$id)->exists()){
            Toastr::warning('This SubCategory Has a product', 'Success', ["positionClass" => "toast-top-right"]);
     
                 return back();
        }

        else{
            subCetegory::where('id',$id)->delete();
            Toastr::error('subCatagory Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
          return back();

            
        }
      

    
    }

    public function editsubCategory($id){
        $data=subCetegory::where('id',$id)->first();
        return view('backend.edit_subCategory',compact('data'));
    }

    public function updatesubCategory(Request $request){

        $validatedData = $request->validate([
            'name' => 'required||min:3',
            
        ]);


        subCetegory::where('id',$request->category_id)->update([
            'name'=>$request->name
        ]);
        return redirect('subcatagory/backend/page');
    }


}
