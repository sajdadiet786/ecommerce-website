@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Slider list
                        <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm text-white float-end">Add Slider</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if(session ('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    @if ($errors->any())
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                      <div>{{$error}}</div>
                          
                      @endforeach
                      </div>                
                  @endif
                    <table  class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>

                        </thead>
                        <tbody>
                           @foreach ($sliders as $slider)
                           <tr>
                            <td>{{$slider->id}}</td>
                             <td>{{$slider->title}}</td>
                             <td>{{$slider->description}}</td>
                             <td> <img src="{{ asset("$slider->image") }}" style="width:100px; height:100px;" alt="Img"></td>
                             <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                             <td>
                                <a href="{{route('slider.edit',['slider_id'=>$slider->id])}}" class="btn btn-success">Edit</a>
                                <a href="{{route('slider.delete',['slider_id'=>$slider->id])}}"  onclick="return confirm('Are you sure you want to delete this slider?  ')" class="btn btn-danger">Delete</a>
                             </td>
                           </tr>
                               
                           @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection