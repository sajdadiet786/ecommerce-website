@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Add Slider
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
                    <form action="{{route('slider.create')}}" method="post" enctype="multipart/form-data" files = 'true'>
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" style="width:30px;height:30px;" name="status" >checked=Visible,Unchecked=Hidden
                        </div>
                        <div class="mb-3 float-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection