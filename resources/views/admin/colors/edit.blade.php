@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Add Color
                        <a href="{{route('color')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                    <form action="{{ route('color.update',['color_id'=>$color->id]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Color name</label>
                            <input type="text" name="name" value="{{$color->name}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Color Code</label>
                            <input type="text" name="code" value="{{$color->code}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label><br/>
                            <input type="checkbox" style="width:30px;height:30px;"  {{ $color->status == '0' ? 'checked' : '' }} name="status" >checked=Visible,Unchecked=Hidden
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