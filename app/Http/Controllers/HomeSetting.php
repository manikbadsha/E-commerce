<?php

namespace App\Http\Controllers;

use App\slider;
use App\Poster;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class HomeSetting extends Controller
{
    public function AddSliderpage(){

        $data=slider::orderBy('id','desc')->paginate(2);

        return view('backend.homepage.home_slider',compact('data'));
    }

    public function AddSlider(){

        return view('backend.homepage.add_slider');
    }

    public function AddNewSlider(Request $request){
        //echo 'okk';
        if($request->hasFile('image')){
            
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            Image::make($get_image)-> save('slider_image/'.$image_name);
           

            $slugSpace=str_replace(" ","-",$request->title);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);
            slider::insert([
                'image'=>'slider_image/'.$image_name,
                'title'=>$request->title,
                'title_color'=>$request->title_color,
                'subtitle'=>$request->subtitle,
                'subtitle_color'=>$request->subtitle_color,          
                'text'=>$request->text,
                'text_color'=>$request->text_color,
                'link'=>$request->link,
                'slug'=>$slug,
                'created_at'=> Carbon::now()


            ]);
            Toastr::success('Slider has been insearted', 'Success', ["positionClass" => "toast-top-right"]);
    
            return redirect('homepage/backend/page');
            



        }
    }


    public function deleteSlider($id){
        $data=slider::where('id',$id)->first();
        if($data->image != null){
            unlink($data->image);
           
        }
        slider::where('id',$id)->delete();
        Toastr::error('slider Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
 
             return back();
       
    }

    public function editSlider($id){
        $data=slider::where('id',$id)->first();
        return view('backend.homepage.edit_slider',compact('data'));
    }

    public function updateSlider(Request $request){
        if($request->image !=null){
            $slider_info=slider::where('id',$request->slider_id)->first();
            if( $slider_info->image !=null){
                unlink( $slider_info->image);
            }
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            Image::make($get_image)-> save('slider_image/'.$image_name);
            //$img->insert('Product_images/'.$image_name, 'bottom-right', 10, 10);
          
            //$img->fit(200);
            //$img = Image::make('public/foo.jpg')->resize(320, 240)->insert('public/watermark.png');


            $slugSpace=str_replace(" ","-",$request->title);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            slider::where('id',$request->slider_id)->update([
                'image'=>'slider_image/'.$image_name,
                'title'=>$request->title,
                'title_color'=>$request->title_color,
                'subtitle'=>$request->subtitle,
                'subtitle_color'=>$request->subtitle_color,          
                'text'=>$request->text,
                'text_color'=>$request->text_color,
                'link'=>$request->link,
                'slug'=>$slug,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('homepage/backend/page');
        }
        else{
            $slugSpace=str_replace(" ","-",$request->title);
            $slugSpaceslas=str_replace("/","-", $slugSpace);
            $slug=str_replace(".","-", $slugSpaceslas);

            slider::where('id',$request->slider_id)->update([
                'title'=>$request->title,
                'title_color'=>$request->title_color,
                'subtitle'=>$request->subtitle,
                'subtitle_color'=>$request->subtitle_color,          
                'text'=>$request->text,
                'text_color'=>$request->text_color,
                'link'=>$request->link,
                'slug'=>$slug,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('homepage/backend/page'); 
        }
    }

    public function Addposterpage(){
        $data=Poster::orderBy('id','desc')->paginate(5);
        return view('backend.homepage.poster',compact('data'));
    }
    public function AddPoster(){
        return view('backend.homepage.add_poster');
    }
    public function AddNewPoster(Request $request){
        if($request->hasFile('image')){
            
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            Image::make($get_image)-> save('Poster_image/'.$image_name);
           

            Poster::insert([
                'image'=>'Poster_image/'.$image_name,
                'created_at'=> Carbon::now()


            ]);
            Toastr::success('Slider has been insearted', 'Success', ["positionClass" => "toast-top-right"]);
    
            return redirect('homepage/backend/poster');
            



        }
    }

    public function deletePoster($id){
        $data=Poster::where('id',$id)->first();
        if($data->image != null){
            unlink($data->image);
           
        }
        Poster::where('id',$id)->delete();
        Toastr::error('Poster Deleted ', 'Success', ["positionClass" => "toast-top-right"]);
 
             return back();
       
    }

    public function editPoster($id){
        $data=Poster::where('id',$id)->first();
        return view('backend.homepage.edit_poster',compact('data'));
    }

    public function updatePoster(Request $request){
        if($request->image !=null){
            $poster_info=Poster::where('id',$request->slider_id)->first();
            if( $poster_info->image !=null){
                unlink( $poster_info->image);
            }
            $get_image=$request->file('image');
            $image_name=time().'.'.$get_image->getClientOriginalExtension();
            Image::make($get_image)-> save('Poster_image/'.$image_name);

            Poster::where('id',$request->slider_id)->update([
                'image'=>'Poster_image/'.$image_name,
                'updated_at'=> Carbon::now()
            ]);
            return redirect('homepage/backend/poster');
        }
        else{
           

            Poster::where('id',$request->slider_id)->update([
                'updated_at'=> Carbon::now()
            ]);
            return redirect('homepage/backend/poster'); 
        }
    }
}

