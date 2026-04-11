@extends('layouts.erp')

@section('title', 'LA CIMA - ADMIN FORGE v2.4 | USER ACCESS | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/usuarios-roles.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="ml-64 pt-24 p-8 min-h-screen">
<!-- Header Section -->
<div class="mb-12">
<h2 class="text-5xl font-black uppercase tracking-tighter text-on-surface mb-2">User Access Control</h2>
<div class="flex items-center gap-4">
<div class="h-1 w-24 bg-primary"></div>
<span class="text-xs font-bold uppercase tracking-widest text-secondary font-headline">Authorization Matrix Engine</span>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-6">
<!-- User Management Table (Large Section) -->
<section class="col-span-12 lg:col-span-8 bg-surface-container-lowest p-8 shadow-sm relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none">
<span class="material-symbols-outlined text-9xl" data-icon="shield">shield</span>
</div>
<div class="flex justify-between items-end mb-8 relative z-10">
<div>
<h3 class="text-2xl font-bold uppercase tracking-tight text-on-surface">Active Directory</h3>
<p class="text-sm text-secondary font-label">Managing 124 global identities</p>
</div>
<button class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest hover:scale-105 transition-transform">
                        Add New Operator
                    </button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-secondary font-headline text-[10px] uppercase tracking-widest">
<th class="p-4">Identity</th>
<th class="p-4">Assigned Role</th>
<th class="p-4">Node Affinity</th>
<th class="p-4">Protocol Status</th>
<th class="p-4 text-right">Direct Actions</th>
</tr>
</thead>
<tbody class="font-label text-sm">
<tr class="border-b border-surface-container hover:bg-surface-container-low/50 transition-colors">
<td class="p-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-stone-200 rounded-sm">
<img class="w-full h-full object-cover" data-alt="Headshot of a female executive in industrial engineering setting, sharp focus, professional lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBiNzBYBGGHV-3VGpBGz1jVKKXPhqOojUzWl_Z44cLfi9fpHRnI5Y-CAfgagK5KqMiM_p9Sftg3dm4plqiQL7O1_tPEMOqjocVmyTQb6XedOetAaTUsy6N5QRJYcrJRvVS3jyBpdfSQpNYBhfHF07EMAUGOfvpBAS6vXq85-WS3MUaOqGnLUOzAdhbbmU-qmXYJB4d2TqDLasysi-mrpEl2Wj8hfgkyWG-I7X4LLdNVopx2cOUWH2osA_6mrAZt0pQE2gVnRdO-Agk"/>
</div>
<div>
<span class="block font-bold">Elena Rodriguez</span>
<span class="text-[10px] text-secondary">erodriguez@lacima.erp</span>
</div>
</div>
</td>
<td class="p-4">
<span class="px-2 py-1 bg-primary-container text-on-primary-container text-[10px] font-bold uppercase">System Admin</span>
</td>
<td class="p-4 text-xs font-mono">HQ-MAIN-01</td>
<td class="p-4">
<span class="flex items-center gap-2 text-[10px] font-bold uppercase text-primary">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Encrypted
                                    </span>
</td>
<td class="p-4 text-right space-x-2">
<button class="text-[10px] font-bold uppercase text-secondary hover:text-primary underline">Edit</button>
<button class="text-[10px] font-bold uppercase text-error hover:opacity-70">Reset 2FA</button>
</td>
</tr>
<tr class="border-b border-surface-container bg-surface-container-low/20 hover:bg-surface-container-low/50 transition-colors">
<td class="p-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-stone-200 rounded-sm">
<img class="w-full h-full object-cover" data-alt="Portrait of a male accountant in a modern industrial office with steel elements" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcrPow-cvtcWz6iml-FcylCtZxh2yb5asHhqPTx-dVBuDVnba-ZXEwCB3-zBDm8GkZJ54mSTBxQhVOOS-4uM2botN1kP6MZx6NWIZvTxhhi495vWoO9lSuphyeRiZz35MghnDF0SkQ3c9gF72b0sroS2aWXSCYskkGcAzoOyNS3CrTNERegYAr-mMIDeOiEJtKvfchh5QGgFEEAvxaujvH5T2bkpp2pZU4-7zgKRDy0Qm_ySkudlScfy2ApDi0yMn-ol-QA0RfZ9U"/>
</div>
<div>
<span class="block font-bold">Marcus Chen</span>
<span class="text-[10px] text-secondary">mchen@lacima.erp</span>
</div>
</div>
</td>
<td class="p-4">
<span class="px-2 py-1 bg-surface-container-highest text-secondary text-[10px] font-bold uppercase">Accountant</span>
</td>
<td class="p-4 text-xs font-mono">FIN-OPS-12</td>
<td class="p-4">
<span class="flex items-center gap-2 text-[10px] font-bold uppercase text-primary">
<span class="w-2 h-2 rounded-full bg-primary"></span> active
                                    </span>
</td>
<td class="p-4 text-right space-x-2">
<button class="text-[10px] font-bold uppercase text-secondary hover:text-primary underline">Edit</button>
<button class="text-[10px] font-bold uppercase text-secondary/50">Reset 2FA</button>
</td>
</tr>
<tr class="border-b border-surface-container hover:bg-surface-container-low/50 transition-colors">
<td class="p-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-stone-200 rounded-sm">
<img class="w-full h-full object-cover" data-alt="Portrait of a professional woman in a logistics environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4EvYkn-yBsocrAilYHDS_nZtN9sHjwmhL_-bA5QO_0hgl7agqsvqyMKwLORBLqNELKvy0rgaLvdPbDjVjNWE3kvDYf4Z72ewwpUOijwM6G8k4dDqVHkY1AjEPj6uZiWm7dLoO5lD-16tNQAvOZe93yUWxdC9EvWkBu_YSe3M0uPLOYQsZWxK7LfR9vGl9PhU4wWnrB4ICCokdx4lDfROa2qTWcymtTA5c3ivXYKmCvS1jz2VUIcDG5VLLtnzLirMhRUAA7o_OFEY"/>
</div>
<div>
<span class="block font-bold">Sarah Jenkins</span>
<span class="text-[10px] text-secondary">sjenkins@lacima.erp</span>
</div>
</div>
</td>
<td class="p-4">
<span class="px-2 py-1 bg-surface-container-highest text-secondary text-[10px] font-bold uppercase">Seller</span>
</td>
<td class="p-4 text-xs font-mono">SALES-REM-04</td>
<td class="p-4">
<span class="flex items-center gap-2 text-[10px] font-bold uppercase text-error">
<span class="w-2 h-2 rounded-full bg-error"></span> locked
                                    </span>
</td>
<td class="p-4 text-right space-x-2">
<button class="text-[10px] font-bold uppercase text-secondary hover:text-primary underline">Edit</button>
<button class="text-[10px] font-bold uppercase text-primary font-black">Unlock</button>
</td>
</tr>
</tbody>
</table>
</div>
</section>
<!-- Quick Stats / System Health -->
<section class="col-span-12 lg:col-span-4 space-y-6">
<div class="bg-inverse-surface text-inverse-on-surface p-8 relative overflow-hidden">
<div class="absolute -bottom-6 -right-6 opacity-10">
<span class="material-symbols-outlined text-8xl" data-icon="lock_reset">lock_reset</span>
</div>
<h3 class="text-xl font-bold uppercase tracking-tight mb-6">Security Pulse</h3>
<div class="space-y-4">
<div class="flex justify-between items-center border-b border-white/10 pb-2">
<span class="text-[10px] uppercase font-headline opacity-60">Auth Success Rate</span>
<span class="text-lg font-bold text-lime-400">99.8%</span>
</div>
<div class="flex justify-between items-center border-b border-white/10 pb-2">
<span class="text-[10px] uppercase font-headline opacity-60">Pending 2FA Resets</span>
<span class="text-lg font-bold text-amber-400">03</span>
</div>
<div class="flex justify-between items-center border-b border-white/10 pb-2">
<span class="text-[10px] uppercase font-headline opacity-60">Failed Login Attempts</span>
<span class="text-lg font-bold text-error">12</span>
</div>
</div>
<button class="mt-6 w-full py-2 border border-lime-500/30 text-lime-400 text-[10px] font-bold uppercase tracking-widest hover:bg-lime-500/10 transition-colors">
                        Download Security Audit
                    </button>
</div>
<div class="bg-surface-container-high p-8">
<h3 class="text-xl font-bold uppercase tracking-tight text-on-surface mb-6">Global Roles</h3>
<div class="grid grid-cols-2 gap-4 font-headline uppercase text-[10px] font-bold">
<div class="p-4 bg-surface-container-lowest flex flex-col gap-2">
<span class="text-secondary">Admins</span>
<span class="text-3xl font-black text-primary">04</span>
</div>
<div class="p-4 bg-surface-container-lowest flex flex-col gap-2">
<span class="text-secondary">Sellers</span>
<span class="text-3xl font-black text-on-surface">42</span>
</div>
<div class="p-4 bg-surface-container-lowest flex flex-col gap-2">
<span class="text-secondary">Logistics</span>
<span class="text-3xl font-black text-on-surface">68</span>
</div>
<div class="p-4 bg-surface-container-lowest flex flex-col gap-2">
<span class="text-secondary">Guests</span>
<span class="text-3xl font-black text-secondary">10</span>
</div>
</div>
</div>
</section>
<!-- Permission Matrix (Engineered Element) -->
<section class="col-span-12 bg-surface-container-low p-8 border-l-8 border-primary">
<div class="flex items-center gap-4 mb-8">
<h3 class="text-3xl font-black uppercase tracking-tighter">Permission Matrix</h3>
<div class="h-px flex-1 bg-outline-variant/30"></div>
<span class="text-[10px] font-bold uppercase text-secondary bg-surface-container-high px-3 py-1">Mode: Structural Editing</span>
</div>
<div class="bg-surface-container-lowest overflow-hidden shadow-sm">
<table class="w-full text-left">
<thead>
<tr class="bg-stone-900 text-stone-300 font-headline text-[10px] uppercase tracking-widest">
<th class="p-6 w-1/4 border-r border-stone-800">Module / Segment</th>
<th class="p-6 text-center">View</th>
<th class="p-6 text-center">Create</th>
<th class="p-6 text-center">Edit</th>
<th class="p-6 text-center">Delete</th>
<th class="p-6 text-right">Inheritance</th>
</tr>
</thead>
<tbody class="font-label text-sm">
<tr class="border-b border-surface-container">
<td class="p-6 font-bold uppercase text-xs bg-surface-container-low/30 border-r border-surface-container">Inventory &amp; Warehouse</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
</td>
<td class="p-6 text-right text-[10px] uppercase font-bold text-secondary">Global Admin Default</td>
</tr>
<tr class="border-b border-surface-container bg-surface-container-low/10">
<td class="p-6 font-bold uppercase text-xs bg-surface-container-low/30 border-r border-surface-container">Sales &amp; CRM Engine</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
</td>
<td class="p-6 text-right text-[10px] uppercase font-bold text-secondary">Role: Regional Seller</td>
</tr>
<tr class="border-b border-surface-container">
<td class="p-6 font-bold uppercase text-xs bg-surface-container-low/30 border-r border-surface-container">Financial Ledger</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="radio_button_unchecked">radio_button_unchecked</span>
</td>
<td class="p-6 text-right text-[10px] uppercase font-bold text-secondary">Custom Policy A1</td>
</tr>
<tr class="border-b border-surface-container bg-surface-container-low/10">
<td class="p-6 font-bold uppercase text-xs bg-surface-container-low/30 border-r border-surface-container">System &amp; DB Access</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="cancel">cancel</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="cancel">cancel</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="cancel">cancel</span>
</td>
<td class="p-6 text-center">
<span class="material-symbols-outlined text-outline-variant" data-icon="cancel">cancel</span>
</td>
<td class="p-6 text-right text-[10px] uppercase font-bold text-error">Access Forbidden</td>
</tr>
</tbody>
</table>
</div>
<div class="mt-6 flex justify-end gap-4">
<button class="bg-surface-container-high text-secondary px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-surface-dim transition-colors">
                        Discard Changes
                    </button>
<button class="bg-on-surface text-surface-container-lowest px-8 py-3 text-xs font-bold uppercase tracking-widest hover:bg-black transition-colors">
                        Commit Access Schema
                    </button>
</div>
</section>
</div>
<!-- Footer / System Meta -->
<footer class="mt-12 pt-8 border-t border-surface-container flex flex-col md:flex-row justify-between items-center text-[10px] font-bold uppercase tracking-[0.2em] text-secondary">
<div class="flex gap-8 mb-4 md:mb-0">
<span>Core Engine: v4.22.0</span>
<span>DB Latency: 12ms</span>
<span>Uptime: 99.998%</span>
</div>
<div class="flex gap-4">
<span class="text-primary-container bg-on-primary-container px-2 py-0.5">Production Environment</span>
<span>Â© 2024 La Cima Industrial Systems</span>
</div>
</footer>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/usuarios-roles.js"></script>
@endpush
