@extends('layouts.auth')

@section('title', 'Aprobación de Recuperación | Admin')

@section('content')
<main class="max-w-6xl mx-auto px-6 py-8">
      <!-- Tabs -->
      <div class="flex gap-2 mb-6 border-b border-stone-200 pb-2">
        <button
          onclick="filterByStatus('ALL')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-900 border-b-2 border-primary"
          data-tab="ALL"
        >
          Todas
        </button>
        <button
          onclick="filterByStatus('PENDING')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900"
          data-tab="PENDING"
        >
          Pendientes
        </button>
        <button
          onclick="filterByStatus('APPROVED')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900"
          data-tab="APPROVED"
        >
          Aprobadas
        </button>
        <button
          onclick="filterByStatus('REJECTED')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900"
          data-tab="REJECTED"
        >
          Rechazadas
        </button>
      </div>

      <!-- Requests List -->
      <div id="requestsList" class="space-y-4">
        <!-- Requests will be rendered here -->
      </div>

      <!-- Empty State -->
      <div id="emptyState" class="hidden text-center py-16">
        <span class="material-symbols-outlined text-stone-300 text-6xl mb-4"
          >check_circle</span
        >
        <h2 class="font-headline font-bold text-xl text-stone-900 mb-2">
          No hay solicitudes
        </h2>
        <p class="text-stone-500 text-sm">
          Todas las solicitudes de recuperación han sido procesadas.
        </p>
      </div>
    </main>
@endsection
