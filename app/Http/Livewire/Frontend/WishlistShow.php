<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removeWishlistItem($wishlistId){
        // dd($wishlistId);
        $wishlist=Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        session()->flash('message','Wishlist Item Remove Successfully');
        $this->dispatchBrowserEvent('message',
        [
           'text' =>'Wishlist Item Remove Successfully',
           'type' =>'success',
           'status'=>200
       
       ]);
    }
    public function render()
    {
        $wishlist=Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' =>$wishlist
        ]);
    }
}
