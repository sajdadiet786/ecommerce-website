<?php

namespace App\Http\Livewire\Admin\Brand;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
 

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $status,$brand_id,$category_id;
    public function rules(){
        return[
            'name' =>'required|string',
            'category_id' =>'required|integer',

            'slug',
            'status'=>'nullable'
            
        ];
    }
    public function resetInput(){
        $this->name=Null;
        $this->status=Null;
        $this->brand_id=Null;
        $this->category_id=Null;


    }
    public function storeBrand(){
        // $validatedData=$this->validate();
        // dd($validatedData);
        // die;
        Brand::create([
            'name'=>$this->name,
            'slug' =>\Str::slug($this->name),
            'status'=>$this->status== true? '1':'0',
            'category_id'=>$this->category_id
        ]);
        session()->flash('message','Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
    }
    public function closeModal(){
        $this->resetInput();
    }
    public function editBrand(int $brand_id){
        $this->brand_id=$brand_id;
        $brand=Brand::findOrFail($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->name;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;


    }
     public function updateBrand(){
        Brand::find($this->brand_id)->update([
            'name'=>$this->name,
            'slug' =>\Str::slug($this->name),
            'status'=>$this->status== true? '1':'0',
            'category_id'=>$this->category_id
        ]);
        session()->flash('message','Brand updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
     }
     public function deletebrand($brand_id){
        // dd($brand_id);
        $this->brand_id=$brand_id;
    }
    public function destroyBrand(){
        $brand=Brand::findOrFail($this->brand_id);
        $brand->delete();
        session()->flash('message','Brand Delete');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        $categories=Category::where('status','0')->get();
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=>$brands,'categories'=>$categories])
        ->extends('layouts.admin')->section('content');
    }
   
}
