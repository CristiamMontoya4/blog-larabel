@extends('template')

{{-- Esto es un comentario --}}

@section('content')
    <div class="max-w-3xl mx-auto">
    <h1 class="text-5xl mb-8">{{ $post->title }}</h1>
    {{-- title es una propiedad de post --}}
    <p class="leading-loose text-lg text-gray-700">
    {{ $post->body }}
    </p>
    </div>


   
@endsection