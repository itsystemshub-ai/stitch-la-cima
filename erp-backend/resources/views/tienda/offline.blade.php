@extends('layouts.ecommerce')

@section('title', 'Sin Conexión | LA CIMA')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/offline.css">
@endpush

@section('content')
<div class="offline-container">
        <span class="material-symbols-outlined icon">cloud_off</span>
        <h1>Sin Conexión</h1>
        <p>Parece que no tienes conexión a internet. Verifica tu conexión e intenta nuevamente.</p>
        <button class="retry-btn" onclick="window.location.reload()">
            <span class="material-symbols-outlined" style="vertical-align: middle; margin-right: 8px; font-size: 20px;">refresh</span>
            Reintentar
        </button>
        <a href="/tienda/index" style="display: inline-block; margin-top: 24px; color: #ceff5e; text-decoration: none; font-size: 14px; font-weight: 700;">
            ← Volver al inicio
        </a>
    </div>
@endsection
