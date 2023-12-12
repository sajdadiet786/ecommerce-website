@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category
                    <a href="{{route('index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        {!!Form::label('', 'Category Name')!!} 
                        {!!Form::text('name',null,[
                            'class'=>"form-control",'id'=>"name"
                            ])!!}
                    </div>
                    <div class="mb-3">
                     
                    </div>
                    <div class="mb-3">
                        {!!Form::label('', 'Description')!!}
                        {!!Form::textarea('description',null,[
                            'class'=>"form-control",'id'=>"mySummernote", 'rows'=>"5"
                            ])!!}
                    </div>
                    <div class="mb-3">
                            {!!Form::label('', 'Image')!!}
                            <input type="file" name="image" required class="form-control"> 
                    </div>
                    <div class="mb-3">
                        {!!Form::label('', 'Title')!!}
                        {!!Form::text('title',null,[
                            'class'=>"form-control",'id'=>"title"
                            ])!!}
                    </div>
                    
                    <h6>Publised </h6>
                    <div class="row">
                            <div class="col-md-3 mb-3">
                                 {!!Form::label('', 'Yes')!!}
                           {!!Form::checkbox('status',null,[
                               ])!!}

                            </div>
                               <div class="col-md-12 mb-3">
                                   <button type="submit" class="btn btn-primary float-end">Save Category</button>
                               </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection