<?php

namespace App\Http\Controllers;
use App\Catagory;
use App\childcategory;
use App\subCetegory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;

class childController extends Controller
{
    public function childCategoryPage(){
        $data=Catagory::all();
      
        $childCategorys=DB::table('childcategories')
        ->join('catagories','childcategories.category_id','=','catagories.id')
        ->select('childcategories.*','catagories.catagory_name')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('backend.child_category',compact('data','childCategorys'));
    }

    public function subcategoryBycatergory($id){
        $subcategories=subCetegory::where('category_id',$id)->get();
        return response()->json($subcategories);
    }

    public function addchildCategory(Request $request){
        childcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'name'=>$request->name,
            'created_at'=> Carbon::now()

        ]);
        Toastr::success('ChildCategory has been insearted', 'Success', ["positionClass" => "toast-top-right"]);
    
        return back();

    }

    public function deleteChildCategory($id){
        childcategory::where('id',$id)->delete();
        Toastr::error('ChildCatagory Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
 
             return back();
    }
}
