@extends('layouts.ecommerce')

@section('title', $page->title . ' | Mayor de Repuesto LA CIMA, C.A.')

@push('meta')
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keywords }}">
@endpush

@section('content')
<main class="flex-grow pt-32 pb-12 px-6 max-w-7xl mx-auto w-full">
    <!-- Header Decorativo del CMS -->
    <div class="text-center mb-16 relative">
        <h1 class="font-headline text-5xl md:text-6xl font-black uppercase tracking-tighter relative z-10 text-black">
            {{ $page->title }}
        </h1>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-9xl font-black text-stone-100 opacity-50 z-0 pointer-events-none uppercase w-full overflow-hidden truncate">
            {{ $page->title }}
        </div>
    </div>

    <!-- Contenido Inyectado Seguro desde la BD -->
    <div class="bg-white rounded-3xl p-8 md:p-16 shadow-lg border border-outline relative">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary rounded-bl-[100px] -z-10 opacity-20"></div>
        {!! $page->content_html !!}
    </div>
</main>
@endsection
