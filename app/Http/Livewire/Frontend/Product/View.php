<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity;
    public function addToWishList($productId)
    {
// dd($productId);die;
        // die;

        if (Auth::check()) 
        {
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->first())
            {
                session()->flash('message','Already Added to wishlist');
                $this->dispatchBrowserEvent('message',
                [
                   'text' =>'Already Added to wishlist',
                   'type' =>'warning',
                   'status'=>400
               
               ]);
               
            }
            else{

                Wishlist::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$productId
    
                ]);
                session()->flash('message','wishlist Added Successfully');
                $this->dispatchBrowserEvent('message',
                [
                   'text' =>'wishlist Added Successfully',
                   'type' =>'success',
                   'status'=>200
               
               ]);
               
            }

        }
        else
        {
            $request->session()->flash('message','Please login to continue');
            $this->dispatchBrowserEvent('message',
             [
                'text' =>'Please login to continue',
                'type' =>'info',
                'status'=>401
            
            ]);
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;

    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,

        ]);
    }
}
