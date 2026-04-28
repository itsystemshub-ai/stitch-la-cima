@extends('erp.layouts.app')

@section('title', 'Configuración del Sistema | ERP Zenith')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10">
  <div>
    <p class="text-[12px] font-black text-stone-400 tracking-[0.3em] uppercase mb-1 italic">Módulo de Administración Central</p>
    <h2 class="text-4xl md:text-5xl font-headline font-black text-stone-950 tracking-tighter uppercase italic">Control <span class="text-stone-400">Panel</span></h2>
    <p class="text-stone-500 text-[10px] font-black uppercase tracking-[0.2em] mt-3 italic">
      MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5 • SECURE_NODE_01
    </p>
  </div>
  <div class="flex gap-4">
    <a href="{{ url('/erp/configuracion/backups') }}" class="flex items-center gap-3 bg-primary text-stone-950 px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-stone-950 hover:text-primary transition-all shadow-xl shadow-primary/20 italic">
      <span class="material-symbols-outlined text-[18px]">cloud_sync</span>
      EXECUTE BACKUP
    </a>
  </div>
</div>

<!-- Quick Access Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-10">
  <a href="{{ url('/erp/configuracion/parametros') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-primary text-stone-950 rounded-[32px] transition-all hover:bg-stone-950 group hover:text-primary relative overflow-hidden active:scale-95 shadow-xl shadow-primary/20">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform">tune</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Parameters</span>
  </a>
  <a href="{{ url('/erp/configuracion/fiscal') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-white border border-stone-100 text-stone-950 rounded-[32px] transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">policy</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Fiscal Hub</span>
  </a>
  <a href="{{ url('/erp/configuracion/usuarios') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-white border border-stone-100 text-stone-950 rounded-[32px] transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">admin_panel_settings</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Agents</span>
  </a>
  <a href="{{ url('/erp/configuracion/estado-sistema') }}" class="flex flex-col items-center justify-center gap-4 p-10 bg-white border border-stone-100 text-stone-950 rounded-[32px] transition-all hover:border-primary group hover:bg-primary/5 active:scale-95 shadow-sm">
    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform text-stone-300 group-hover:text-primary">terminal</span>
    <span class="text-[11px] font-black uppercase tracking-[0.3em] italic text-center leading-none">Sys Status</span>
  </a>
</div>

<!-- Monitoring & Ops Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-10">
  <!-- System Health Card -->
  <div class="bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm relative overflow-hidden">
    <div class="flex items-center gap-6 mb-10">
      <div class="w-14 h-14 bg-stone-950 rounded-2xl flex items-center justify-center text-primary shadow-2xl shadow-stone-950/20">
        <span class="material-symbols-outlined text-2xl">sensors</span>
      </div>
      <div>
        <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic">Operational Heartbeat</h3>
        <p class="text-[10px] text-stone-400 font-black uppercase tracking-[0.3em] mt-1 italic italic">Infrastructure Real-time Scan</p>
      </div>
    </div>

    <div class="space-y-6">
      <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
        <span class="text-[12px] font-black text-stone-600 uppercase tracking-tight italic italic">Core Engine Latency</span>
        <span class="px-4 py-1 bg-green-500 text-stone-950 text-[9px] font-black rounded-full uppercase tracking-widest italic">Stable • 14ms</span>
      </div>
      <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
        <span class="text-[12px] font-black text-stone-600 uppercase tracking-tight italic italic">SQL Cluster Connectivity</span>
        <span class="px-4 py-1 bg-green-500 text-stone-950 text-[9px] font-black rounded-full uppercase tracking-widest italic">Optimal</span>
      </div>
      <div class="flex items-center justify-between p-4 bg-stone-50 rounded-2xl border border-stone-100">
        <span class="text-[12px] font-black text-stone-600 uppercase tracking-tight italic italic">Active Terminal Session</span>
        <span class="text-[14px] font-mono font-black text-stone-950 uppercase italic italic">12 Operators Online</span>
      </div>
      <div class="space-y-3 px-2 pt-4">
        <div class="flex justify-between items-center mb-2">
          <span class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] italic italic">Total Node Storage Capacity</span>
          <span class="text-[11px] font-mono font-black text-stone-950 uppercase italic tracking-tighter">45.2% Utilization</span>
        </div>
        <div class="w-full h-3 bg-stone-100 rounded-full overflow-hidden border border-stone-50 p-1">
          <div class="h-full bg-primary rounded-full shadow-[0_0_15px_rgba(206,255,94,0.4)] transition-all duration-1000" style="width: 45.2%"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Backup Activity -->
  <div class="bg-stone-950 rounded-[40px] p-10 shadow-2xl relative overflow-hidden border border-stone-800 transition-all hover:border-primary/20 group">
    <div class="relative z-10">
      <div class="flex items-center gap-6 mb-10">
        <div class="w-14 h-14 bg-stone-900 rounded-2xl flex items-center justify-center text-primary border border-stone-800 shadow-2xl">
          <span class="material-symbols-outlined text-2xl">database</span>
        </div>
        <div>
          <h3 class="text-2xl font-headline font-black text-white uppercase tracking-tighter italic">Integrity Protocol</h3>
          <p class="text-[10px] text-stone-500 font-black uppercase tracking-[0.3em] mt-1 italic italic">Data Redundancy Management</p>
        </div>
      </div>

      <div class="space-y-4">
        <div class="p-6 bg-stone-900 border border-stone-800 rounded-2xl flex items-center justify-between group hover:border-primary/20 transition-all transition-all">
          <div class="flex items-center gap-5">
            <span class="material-symbols-outlined text-primary text-3xl group-hover:scale-110 transition-transform">verified</span>
            <div>
              <p class="text-[12px] font-black text-white uppercase tracking-tight italic">Automated Ledger Backup</p>
              <p class="text-[10px] text-stone-500 font-black uppercase tracking-widest mt-1 italic">Next Scan: 23:00 Zulu</p>
            </div>
          </div>
          <span class="px-3 py-1 bg-primary/20 text-primary text-[9px] font-black rounded uppercase border border-primary/30 italic italic">Active Monitor</span>
        </div>
        <div class="p-6 bg-stone-900 border border-stone-800 rounded-2xl flex items-center justify-between group hover:border-primary/20 transition-all transition-all">
          <div class="flex items-center gap-5">
            <span class="material-symbols-outlined text-stone-600 text-3xl group-hover:scale-110 transition-transform">cloud_upload</span>
            <div>
              <p class="text-[12px] font-black text-white uppercase tracking-tight italic">Cross-Regional Sync</p>
              <p class="text-[10px] text-stone-500 font-black uppercase tracking-widest mt-1 italic">Last Sync: Alpha-Node Success</p>
            </div>
          </div>
          <span class="px-3 py-1 bg-stone-800 text-stone-500 text-[9px] font-black rounded uppercase border border-stone-700 italic italic">Secured</span>
        </div>
      </div>
      
      <div class="mt-10 p-6 bg-stone-900/50 border border-stone-800 rounded-2xl backdrop-blur-md">
        <p class="text-[9px] text-stone-600 font-black uppercase tracking-[0.4em] mb-4 italic">Latest Encrypted System Snapshot</p>
        <div class="flex justify-between items-center gap-6">
          <div class="text-stone-300 font-mono font-black text-[12px] uppercase italic tracking-tighter">DB_ZENITH_FINAL_V4.SQL.ENC</div>
          <button class="bg-primary text-stone-950 text-[10px] font-black uppercase tracking-[0.3em] px-6 py-2 rounded-lg italic hover:brightness-110 transition-all shadow-xl shadow-primary/10">Restore</button>
        </div>
      </div>
    </div>
    <span class="material-symbols-outlined absolute -right-16 -bottom-16 text-[320px] opacity-[0.03] text-primary pointer-events-none rotate-12 group-hover:opacity-[0.05] transition-opacity">security</span>
  </div>
</div>

<!-- Detailed Params Summary -->
<div class="bg-white rounded-[40px] border border-stone-100 p-10 shadow-sm">
  <div class="flex flex-col md:flex-row justify-between items-center mb-12 border-b border-stone-50 pb-8 gap-6">
    <div class="flex items-center gap-6">
      <div class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center text-stone-300">
        <span class="material-symbols-outlined text-2xl">manufacturing</span>
      </div>
      <h3 class="text-2xl font-headline font-black text-stone-950 uppercase tracking-tighter italic">System Parameters</h3>
    </div>
    <a href="{{ url('/erp/configuracion/parametros') }}" class="text-[10px] font-black text-primary uppercase tracking-[0.4em] flex items-center gap-3 group hover:text-stone-950 transition-all italic">
      ADVANCED CORE OPTIONS
      <span class="material-symbols-outlined text-[20px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
    </a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    <div class="flex flex-col gap-5 p-2 transition-all">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-l-4 border-primary pl-4 italic">Corporate Identity</p>
      <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 shadow-inner">
        <p class="text-[14px] font-black text-stone-950 uppercase italic tracking-tight">MAYOR DE REPUESTO LA CIMA</p>
        <p class="text-[11px] text-stone-500 font-mono font-black uppercase tracking-tighter mt-1 italic">RIF: J-40308741-5</p>
      </div>
    </div>
    <div class="flex flex-col gap-5 p-2 transition-all">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-l-4 border-stone-900 pl-4 italic">Fiscal Governance</p>
      <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 shadow-inner">
        <p class="text-[14px] font-black text-stone-950 uppercase italic tracking-tight">Standard VAT: 16% / 0%</p>
        <p class="text-[11px] text-stone-500 font-black uppercase tracking-widest mt-1 italic italic">Withholding Agent Status: Active</p>
      </div>
    </div>
    <div class="flex flex-col gap-5 p-2 transition-all">
      <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em] border-l-4 border-stone-400 pl-4 italic">Logistics Logic</p>
      <div class="p-6 bg-stone-50 rounded-3xl border border-stone-100 shadow-inner">
        <p class="text-[14px] font-black text-stone-950 uppercase italic tracking-tight">Valuation Method: W.A.P.</p>
        <p class="text-[11px] text-stone-500 font-black uppercase tracking-widest mt-1 italic italic">Purchase Threshold: $500.00 Limit</p>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/configuracion.js') }}"></script>
@endpush
