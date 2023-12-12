<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index(){
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    public function create(){
        
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request){
        $validateData=$request->validated();
        // Color::create($validateData);
        $color=new Color;
        $color->name=$validateData['name'];
        $color->code=$validateData['code'];
        $color->status=$request->status ==true ? '1':'0';
        $color->save();
        return redirect('admin/colors/create')->with('message','color is added successfully');
         
    }
    public function edit($color_id){
        $color=Color::findorFail($color_id);
        return view('admin.colors.edit',compact('color'));

    }
    public function update(ColorFormRequest $request,$color_id){
        $validateData=$request->validated();
        // Color::create($validateData);
        $color=Color::find($color_id);
        // $color=new Color;
        $color->name=$validateData['name'];
        $color->code=$validateData['code'];
        $color->status=$request->status ==true ? '1':'0';
        $color->save();
        return redirect('admin/colors')->with('message','color is updated successfully');

    }
    public function destroy($color_id){
        $color=Color::findOrFail($color_id);
        $color->delete(); 
        return redirect('admin/colors')->with('message','color is deleted successfully');
    }
}
