@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Colors List
                        <a href="{{ route('color.create') }}" class="btn btn-primary btn-sm text-white float-end">Add Color</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if(session ('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                   @endif
                    <table  class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{route('color.edit',['color_id'=>$color->id])}}"
                                            class="btn btn-success">Edit</a>
                                        {{-- <a href="{{route('category.delete',['category_id'=>$item->id])}}" class="btn btn-danger">Delete</a> --}}
                                       
                                        <a href="{{route('color.delete',['color_id'=>$color->id])}}" onclick="return confirm('Are you sure you want to delete this color?  ')" class="btn btn-danger">Delete</a>
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