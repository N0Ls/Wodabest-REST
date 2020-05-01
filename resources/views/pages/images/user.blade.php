@extends('layouts.app')

@section('title', 'Stats | Wodabest')

@section('content')

@component('components.title', ['title' => 'Vos images'])@endcomponent

{{--@if($images->count() > 0)
@component('components.filter', ['images' => $images, 'categories' => $categories,
'path' => $path])@endcomponent
@endif--}}

@component('components.gallery.userGallery')@endcomponent

{{--@if(!str_contains(Request::fullUrl(), 'category'))
@component('components.pagination', ['content' => $images])@endcomponent
@endif--}}

@endsection