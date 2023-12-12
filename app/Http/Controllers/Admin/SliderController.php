<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request){
        $validateData =$request->validated();
        $slider=new Slider;
        
        $slider->title=$validateData['title'];
       
        $slider->description=$validateData['description'];
        if($request->hasfile('image')){
            $file=$request->file('image');
           
            $filename=time() . '-' .$file->getClientOriginalName();
        
            // Storage::disk('local')->put(('uploads/category/'),$filename);
            $uploaded= $file->move(public_path('uploads/slider/'),$filename);
        }
        $slider->image=$filename;
        $slider->status=$request->status ==true ? '0':'1';
        $slider->save();
        
        return redirect('admin/sliders')->with('message','slider is added successfully');
    }
    public function edit($slider_id){
        $slider=Slider::find($slider_id);
        // return ($category);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(SliderFormRequest $request ,$slider_id){
        $data=$request->validated();
        $slider=Slider::find($slider_id);
        $slider->title=$data['title'];
        
        $slider->description=$data['description']; 
        if($request->hasfile('image')){
            $destination='uploads/slider/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $filename=time() . '-' .$file->getClientOriginalName();
            $uploaded= $file->move(public_path('uploads/slider/'),$filename);
            $slider->image=$filename;

        } 
        $slider->status=$request->status ==true ? '0':'1';
        $slider->save();
        return redirect('admin/sliders')->with('message','Slider is Updated Successfully'); 

    }
    public function destroy(Slider $slider,$slider_id){
        // $slider=Slider::findOrFail($slider_id);
        if($slider->count()>0){
            $destination='uploads/slider/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete(); 
            return redirect('admin/sliders')->with('message','Slider is deleted successfully');

        }
        return redirect('admin/sliders')->with('message',' something went wrong'); 
    }
    }



