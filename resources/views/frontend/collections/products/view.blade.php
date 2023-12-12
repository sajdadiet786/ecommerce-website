@extends('layouts.app')
@section('title')
{{$category->name}}

@endsection
@section('content')
<div>
    <livewire:frontend.product.view :category="$category" :product="$product" />
</div>
@endsection