@extends('erp.layouts.app')

@section('title', 'Gestión de Usuarios y Roles | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
  <div>
    <p class="text-xs font-bold text-stone-400 tracking-[0.2em] uppercase mb-1">Seguridad & Acceso</p>
    <h2 class="text-3xl font-headline font-black text-stone-900 tracking-tight">Usuarios y Permisos</h2>
    <p class="text-stone-500 text-sm mt-1">Control de Roles y Auditoría de Acceso • MAYOR DE REPUESTO LA CIMA, C.A.</p>
  </div>
  <div class="flex gap-3">
    <button class="bg-stone-900 text-primary px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:brightness-110 transition-all active:scale-95 shadow-lg shadow-stone-900/10 flex items-center gap-2">
      <span class="material-symbols-outlined text-sm">person_add</span>
      Nuevo Usuario
    </button>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <!-- Left Column: User List & Roles -->
  <div class="lg:col-span-8 space-y-8">
    <!-- User Table -->
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
      <div class="px-8 py-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
        <h3 class="font-headline font-bold text-lg text-stone-900 uppercase">Directorio de Usuarios Activos</h3>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-400">
            <span class="material-symbols-outlined text-sm">search</span>
          </span>
          <input type="text" placeholder="Buscar usuario..." class="bg-white border-stone-200 text-xs pl-9 pr-4 py-2 rounded-lg focus:ring-2 focus:ring-primary/50 transition-all w-64"/>
        </div>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="zenith-table-header">
              <th class="p-6">Identidad / Nodo de Acceso</th>
              <th class="p-6">Rol Jerárquico</th>
              <th class="p-6 text-center">Último Log-In</th>
              <th class="p-6">Estatus Seguridad</th>
              <th class="p-6 text-right">Auditoría</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-50">
            <tr class="zenith-table-row group">
              <td class="p-6">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-stone-900 rounded-xl flex items-center justify-center text-primary font-black text-xs shadow-lg transform group-hover:scale-110 transition-all">AD</div>
                  <div>
                    <p class="zenith-table-main">Admin_Cima</p>
                    <p class="zenith-table-secondary mt-1">admin@lacima.com</p>
                  </div>
                </div>
              </td>
              <td class="p-6">
                <span class="zenith-table-sku bg-stone-900 text-primary border-stone-800">SUPER_ADMIN</span>
              </td>
              <td class="p-6 text-center">
                <span class="zenith-table-secondary font-mono">HOY 10:24 AM</span>
              </td>
              <td class="p-6">
                <div class="flex items-center gap-2">
                  <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(34,197,94,0.5)]"></div>
                  <span class="px-2 py-0.5 rounded text-[9px] font-black uppercase tracking-widest bg-green-50 text-green-700">ONLINE</span>
                </div>
              </td>
              <td class="p-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                  <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined text-lg">edit_note</span>
                  </button>
                </div>
              </td>
            </tr>
            <tr class="zenith-table-row group transition-colors">
              <td class="p-6">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-stone-100 border border-stone-200 rounded-xl flex items-center justify-center text-stone-400 font-black text-xs">JO</div>
                  <div>
                    <p class="zenith-table-main">Javier_Ops</p>
                    <p class="zenith-table-secondary mt-1">j.ortega@lacima.com</p>
                  </div>
                </div>
              </td>
              <td class="p-6">
                <span class="zenith-table-sku">OPERATOR_01</span>
              </td>
              <td class="p-6 text-center">
                <span class="zenith-table-secondary font-mono">AYER 16:45 PM</span>
              </td>
              <td class="p-6">
                <div class="flex items-center gap-2 opacity-50">
                  <div class="w-2 h-2 bg-stone-400 rounded-full"></div>
                  <span class="px-2 py-0.5 rounded text-[9px] font-black uppercase tracking-widest bg-stone-50 text-stone-500">OFFLINE</span>
                </div>
              </td>
              <td class="p-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all">
                  <button class="p-2 hover:bg-stone-100 rounded-lg text-stone-400 hover:text-stone-900 transition-all">
                    <span class="material-symbols-outlined text-lg">history</span>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Right Column: Settings & Security -->
  <div class="lg:col-span-4 space-y-8">
    <!-- Policy Card -->
    <div class="bg-stone-900 p-8 rounded-xl shadow-2xl relative overflow-hidden border border-stone-800">
      <div class="relative z-10">
        <h3 class="text-xl font-headline font-black text-primary uppercase mb-6 flex items-center gap-2">
          <span class="material-symbols-outlined">security</span>
          Políticas Auth
        </h3>
        <div class="space-y-6">
          <div class="flex items-center justify-between p-4 bg-stone-800 rounded-xl group hover:bg-stone-750 transition-all border border-stone-700">
            <div>
              <p class="text-xs font-black text-stone-200 uppercase tracking-tighter">MFA Obligatorio</p>
              <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Doble factor para Admin</p>
            </div>
            <div class="relative inline-block w-10 h-5 transition duration-200 ease-in-out bg-primary rounded-full cursor-pointer">
              <div class="absolute w-4 h-4 transition duration-200 ease-in-out transform bg-white rounded-full left-0.5 top-0.5 shadow-sm translate-x-5"></div>
            </div>
          </div>
          <div class="flex items-center justify-between p-4 bg-stone-800 rounded-xl group hover:bg-stone-750 transition-all border border-stone-700">
            <div>
              <p class="text-xs font-black text-stone-200 uppercase tracking-tighter">Expiración Pass</p>
              <p class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">Renovación cada 90 días</p>
            </div>
            <div class="relative inline-block w-10 h-5 transition duration-200 ease-in-out bg-stone-700 rounded-full cursor-pointer">
              <div class="absolute w-4 h-4 transition duration-200 ease-in-out transform bg-white rounded-full left-0.5 top-0.5 shadow-sm"></div>
            </div>
          </div>
        </div>
        <button class="w-full mt-8 bg-stone-800 border border-stone-700 text-stone-400 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest hover:text-primary hover:border-primary transition-all">
          Auditar LOGs de Acceso
        </button>
      </div>
      <span class="material-symbols-outlined absolute -right-10 -bottom-10 text-[200px] opacity-10 text-primary pointer-events-none rotate-12">manage_accounts</span>
    </div>

    <!-- Role Summary -->
    <div class="bg-white rounded-xl border border-stone-200 p-8 shadow-sm">
      <h4 class="text-[10px] font-black text-stone-400 uppercase tracking-[0.2em] mb-6">Resumen de Roles</h4>
      <div class="space-y-4">
        <div class="flex justify-between items-center text-xs font-bold font-body">
          <span class="text-stone-500 uppercase tracking-widest">Super Admin</span>
          <span class="text-stone-900 border border-stone-100 px-2 py-0.5 rounded shadow-sm">02</span>
        </div>
        <div class="flex justify-between items-center text-xs font-bold font-body">
          <span class="text-stone-500 uppercase tracking-widest">Contador Senior</span>
          <span class="text-stone-900 border border-stone-100 px-2 py-0.5 rounded shadow-sm">03</span>
        </div>
        <div class="flex justify-between items-center text-xs font-bold font-body">
          <span class="text-stone-500 uppercase tracking-widest">Vendedor POS</span>
          <span class="text-stone-900 border border-stone-100 px-2 py-0.5 rounded shadow-sm">08</span>
        </div>
        <div class="flex justify-between items-center text-xs font-bold font-body">
          <span class="text-stone-500 uppercase tracking-widest">Almacén</span>
          <span class="text-stone-900 border border-stone-100 px-2 py-0.5 rounded shadow-sm">05</span>
        </div>
      </div>
      <button class="w-full mt-8 text-primary text-[10px] font-black uppercase tracking-widest flex items-center justify-center gap-2 hover:brightness-75 transition-all">
        Gestionar Matriz de Permisos
        <span class="material-symbols-outlined text-sm">chevron_right</span>
      </button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/usuarios-roles.js') }}"></script>
@endpush
