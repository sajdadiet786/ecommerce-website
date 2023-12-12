@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products
                        <a href="{{ route('product') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
               
                  <form action="{{ route('product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Home
                      </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        SEO Tags
                      </button>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                        Details
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                        Product Images
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                        Product Color
                      </button>
                    </li>
                    
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade  border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Select brands</label>
                        <select name="brand" id="" class="form-control">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Description (Max:200 Words)</label>
                        <textarea rows="4" name="description" class="form-control"></textarea>
                          </div>
                        </div>
                          
                
                    {{-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"></div> --}}
                    <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="">Original Price</label>
                            <input type="text"  name="original_price" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="">Selling Price</label>
                            <input type="text"  name="selling_price" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="">Trending</label>
                            <input type="checkbox"  name="trending" style="width:50px; height:50px;">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox"  name="status" style="width:50px; height:50px;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                      <div class="mb-3">
                        <label >Uploads Product Images</label>
                        <input type="file"  name="image[]" multiple class="form-control">
                    </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                      <div class="mb-3">
                        <label >Select Color</label>
                        <div class="row">
                        @forelse ($colors as $coloritem)
                        <div class="col-md-3">
                          <div class="p-2 border mb-3">

                            Color:  <input type="checkbox"  name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}">{{$coloritem->name}}
                            <br/>
                            Quantity:<input type="number" name="colorquantity[{{$coloritem->id}}]" style="width:70px; border:1px solid">
                            </div>
                          </div>
                            
                        @empty
                           <div class="col-md-12">
                            <h1>No Colors Found</h1></div> 
                        @endforelse
                        
                          

                        </div>
                    </div>
                    </div>
                  </div>
                    <div class="py-2 float-end">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </form>
                    </div>
                   
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection