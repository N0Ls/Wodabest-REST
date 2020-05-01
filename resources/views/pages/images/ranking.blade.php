@extends('layouts.app')

@section('title', 'Stats | Wodabest')

@section('content')

@component('components.title', ['title' => 'Top 12'])@endcomponent

{{--@component('components.filter', ['categories' => $categories, 'path' => $path])@endcomponent--}}

@component('components.gallery.statsGallery')@endcomponent

@endsection