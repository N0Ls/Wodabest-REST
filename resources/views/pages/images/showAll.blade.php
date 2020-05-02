@extends('layouts.app')

@section('title', 'Stats | Wodabest')

@section('content')

@component('components.title', ['title' => 'Statistiques'])@endcomponent

{{--@component('components.filter', ['images' => $images, 'categories' => $categories,
'path' => $path])@endcomponent--}}

@component('components.gallery.statsgallery')@endcomponent

@stop