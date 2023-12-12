@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Edit Slider
                        <a href="{{ route('slider') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                            
                        @endforeach
                        </div>                
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                    <form action="{{route('slider.update',['slider_id'=>$slider->id])}}" method="post" enctype="multipart/form-data" files = 'true'>
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="5">{{$slider->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset($slider->image) }}" style="width:80px;height:80px;"
                            alt="Slider" class="me-4 border">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" style="width:30px;height:30px;"  {{ $slider->status == '0' ? 'checked' : '' }} name="status" >checked=Visible,Unchecked=Hidden
                        </div>
                        <div class="mb-3 float-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection