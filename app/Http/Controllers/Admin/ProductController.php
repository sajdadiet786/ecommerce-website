<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        $categories=Category::all();
        $brands=Brand::all();
        $colors=Color::where('status','0')->get();
        return view('admin.products.create',compact('categories','brands','colors'));
    }
    public function store(ProductFormRequest $request){
    $validatedData =$request->validated();
    // $colors=Color::where('status','0')->get();
    $category=Category::findorFail($validatedData['category_id']);
    // $brand=Brand::findorFail($validatedData['']);
    $product=$category->products()->create([
        'category_id' =>$validatedData['category_id'],
        'name' =>$validatedData['name'],
        'slug'=>\Str::slug($request->name),
        // 'brand'=>Brand::brands()->name,
        'brand' =>$validatedData['brand'],
        'description' =>$validatedData['description'],
        'original_price' =>$validatedData['original_price'],
        'selling_price' =>$validatedData['selling_price'],
        'quantity' =>$validatedData['quantity'],
        'trending' =>$request->trending==true ? '0':'1',
        'status' =>$request->status==true ? '0':'1'
    ]); 

    if($request->hasFile('image')){
        $uploadPath='uploads/products/';
        foreach ($request->file('image') as $key => $imageFile) {
           $i=1;
           $file=$request->file('image')[$key];
        //   echo"<pre>";
        //    print_r($file);
        //    die;
            $extention=$imageFile->getClientOriginalExtension();
            $filename =time().$i++.'.'.$extention;
            $imageFile=$file->move($uploadPath,$filename);
            $finalImagePathName= $uploadPath.$filename; 
            $product->productImages()->create([
            'product_id'=>$product->id,
            'image'=>$finalImagePathName,
        ]); 
        }

}
if($request->colors){
    foreach ($request->colors as $key=>$color) {
        $product->productColors()->create([
            'product_id'=>$product->id,
            'color_id'=>$color,
            'quantity'=>$request->colorquantity[$key] ?? 0
        ]);
    }

}

   
                return redirect('/admin/products')->with('message','Product Added Successfully'); 
}
public function edit($product_id){
    $categories=Category::all();
    $brands=Brand::all();
    $product=Product::findorFail($product_id);
    return view('admin.products.edit',compact('product','categories','brands'));
}
public function update(ProductFormRequest $request,$product_id){
    $validatedData =$request->validated();
    $product=Category::findorFail($validatedData['category_id'])
    ->products()->where('id',$product_id)->first();
if($product)
{
    $product->update([
        'category_id' =>$validatedData['category_id'],
        'name' =>$validatedData['name'],
        'slug'=>\Str::slug($request->name),
        // 'brand'=>Brand::brands()->name,
        'brand' =>$validatedData['brand'],
        'description' =>$validatedData['description'],
        'original_price' =>$validatedData['original_price'],
        'selling_price' =>$validatedData['selling_price'],
        'quantity' =>$validatedData['quantity'],
        'trending' =>$request->trending==true ? '0':'1',
        'status' =>$request->status==true ? '0':'1'
    ]);
    if($request->hasFile('image')){
        $uploadPath='uploads/products/';
        foreach ($request->file('image') as $key => $imageFile) {
           $i=1;
           $file=$request->file('image')[$key];
        //   echo"<pre>";
        //    print_r($file);
        //    die;
            $extention=$imageFile->getClientOriginalExtension();
            $filename =time().$i++.'.'.$extention;
            $imageFile=$file->move($uploadPath,$filename);
            $finalImagePathName= $uploadPath.$filename; 
            $product->productImages()->update([
            'product_id'=>$product->id,
            'image'=>$finalImagePathName,
        ]); 
        }
    }
    return redirect('/admin/products')->with('message','Product updated   Successfully'); 
}
else
{
    return redirect('admin/products')->with('message','No Such Product Id found');
}
}
public function destroyImage($product_image_id){
    $productImage=ProductImage::findorFail($product_image_id);
    // dd($product_image_id);
    if(File::exists($productImage->image)){
        File::delete($productImage->image);

    }
    $productImage->delete();
    return redirect()->back()->with('message','Product Image deleted');
}
public function destroy($product_id){
    $product=Product::findOrFail($product_id);
   if( $product->productImages){
    foreach ($product->productImages as $key => $image) {
        if(File::exists($image->image)){
            File::delete($image->image);
        }
    }
   }
   $product->delete();
   return redirect()->back()->with('message','Product is deleted successfully');
}
}
