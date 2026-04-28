@extends('erp.layouts.app')

@section('title', 'Maestro de Productos')

@section('breadcrumb')
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">INVENTORY_NODE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-stone-300 font-black text-[12px] uppercase tracking-widest italic">MASTER_CATALOG</span>
@endsection

@section('content')
    <!-- Header: Master Catalog Identity Trace -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-10 pb-8 border-b border-primary/20 relative z-10">
        <div>
            <div class="flex items-center gap-4 mb-6">
                <span class="w-12 h-1 bg-primary shadow-[0_0_15px_#ceff5e]"></span>
                <p class="text-[11px] font-black text-stone-500 uppercase tracking-[0.5em] italic leading-none">ASSET_REGISTRY_PROTOCOL: MASTER_LOGIC</p>
            </div>
            <h1 class="text-6xl md:text-7xl font-headline font-black text-white tracking-tighter uppercase italic leading-none">
                MASTER_<span class="text-primary italic">CATALOG_X</span>
            </h1>
            <p class="text-stone-600 text-[11px] font-black uppercase tracking-[0.4em] mt-6 italic">MAYOR_REPUESTO_LA_CIMA // RIF: J-40308741-5</p>
        </div>
        
        <div class="flex items-center gap-6">
            <a href="{{ route('erp.inventario.lista-precios') }}" class="bg-stone-900 border border-white/5 text-stone-400 px-10 py-6 text-[12px] font-black uppercase tracking-[0.3em] flex items-center gap-4 hover:border-primary hover:text-white transition-all rounded-[32px] shadow-3xl group italic">
                <span class="material-symbols-outlined text-2xl group-hover:scale-110 transition-transform">dataset</span>
                XLSX_BULK_LOAD
            </a>
            <button onclick="openModal('createProductModal')" class="bg-primary text-stone-950 px-10 py-6 rounded-[32px] text-[12px] font-black uppercase tracking-[0.3em] flex items-center gap-4 hover:bg-white transition-all shadow-[0_0_30px_#ceff5e22] active:scale-95 italic">
                <span class="material-symbols-outlined font-black text-2xl">add</span>
                APPEND_ASSET
            </button>
        </div>
    </div>
    
    <!-- Operational Monitoring: Global Integrity -->
    <div id="tour-product-filters" class="flex flex-wrap gap-6 mb-10 relative z-10">
        <!-- Status Node: Criticality -->
        <div class="bg-stone-900 border border-white/5 px-10 py-6 rounded-[40px] shadow-3xl flex items-center gap-8 hover:border-red-500/30 transition-all group/alert min-w-[320px] {{ $low_stock_count > 0 ? 'border-l-[12px] border-l-red-500' : 'border-l-[12px] border-l-primary' }}">
            <div class="w-2 h-12 rounded-full {{ $low_stock_count > 0 ? 'bg-red-500 animate-pulse' : 'bg-primary shadow-[0_0_15px_#ceff5e]' }}"></div>
            <div>
                <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] leading-none mb-3 italic">CRITICALITY_SCAN</p>
                <h4 class="text-2xl font-headline font-black text-white uppercase tracking-tighter italic leading-none">
                    {{ $low_stock_count > 0 ? 'ALERT_STOCK_SIG' : 'OPTIMAL_FLOW' }}
                </h4>
                <p class="text-[11px] font-black text-stone-500 uppercase tracking-widest mt-2 font-mono">
                    {{ $low_stock_count }} ITEMS_CRITICAL_MAG
                </p>
            </div>
        </div>

        <!-- Value Node: Asset Vault -->
        <div class="bg-stone-950 border border-primary/10 px-10 py-6 rounded-[40px] shadow-inner flex items-center gap-8 group/vault min-w-[320px] relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#ceff5e 2px, transparent 2px); background-size: 24px 24px;"></div>
            <div class="w-14 h-14 bg-stone-900 border border-white/5 rounded-2xl flex items-center justify-center text-primary shadow-33xl relative z-10">
                <span class="material-symbols-outlined text-2xl">payments</span>
            </div>
            <div class="relative z-10">
                <p class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] leading-none mb-3 italic">ASSET_VAULT_LIQUIDITY</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-headline font-black text-white italic tracking-tighter leading-none">${{ number_format($inventory_value / 1000, 1) }}</span>
                    <span class="text-primary text-[12px] font-black font-mono">K_MAG</span>
                </div>
                <p class="text-[11px] font-black text-stone-700 uppercase tracking-widest mt-2 flex items-center gap-3 font-mono italic">
                    <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_10px_#ceff5e]"></span>
                    GLOBAL_USD_TRANS
                </p>
            </div>
        </div>
    </div>

    <!-- Main Data Matrix: High-Precision Catalog -->
    <div class="bg-stone-900 border border-white/5 rounded-[48px] shadow-33xl overflow-hidden mb-12 relative z-10">
        <div class="p-8 border-b border-white/5 bg-stone-950/50 backdrop-blur-3xl flex flex-col xl:flex-row justify-between items-start xl:items-center gap-8">
            <div class="flex items-center gap-8">
                <div class="w-20 h-20 bg-stone-950 border border-white/5 rounded-3xl flex items-center justify-center text-primary shadow-inner group">
                    <span class="material-symbols-outlined text-4xl group-hover:scale-110 transition-transform">inventory_2</span>
                </div>
                <div>
                    <h2 class="text-3xl font-headline font-black text-white uppercase tracking-tighter leading-none italic">
                        INVENTORY_<span class="text-stone-700">MASTER_X</span>
                    </h2>
                    <p class="text-[11px] text-stone-600 font-black uppercase tracking-[0.4em] mt-3 italic">CONTROL_PROTOCOL: J-40308741-5</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-6 w-full xl:w-auto">
                <form action="{{ route('erp.inventario.productos') }}" method="GET" class="relative flex-1 xl:flex-none">
                    <span class="material-symbols-outlined absolute left-6 top-1/2 -translate-y-1/2 text-stone-600 transition-colors">search</span>
                    <input name="search" value="{{ request('search') }}" onblur="this.form.submit()" class="w-full xl:w-96 bg-stone-950 border border-white/5 rounded-[24px] pl-16 pr-8 py-5 text-[12px] font-black text-white focus:border-primary transition-all placeholder:text-stone-800 uppercase tracking-[0.2em] italic font-mono shadow-inner" placeholder="SCAN_SKU_OR_NOMINAL...">
                </form>
                
                <div class="flex items-center gap-3 bg-stone-950 p-2 rounded-[28px] border border-white/5 shadow-inner">
                    <button class="w-12 h-12 flex items-center justify-center bg-stone-900 hover:bg-white text-stone-600 hover:text-stone-950 transition-all rounded-2xl shadow-3xl" title="CONFIG_NODE">
                        <span class="material-symbols-outlined text-xl">settings</span>
                    </button>
                    <a href="{{ route('erp.inventario.productos') }}" class="w-12 h-12 flex items-center justify-center bg-stone-900 hover:bg-white text-stone-600 hover:text-stone-950 transition-all rounded-2xl shadow-3xl" title="FORCE_SYNC">
                        <span class="material-symbols-outlined text-xl">sync</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto font-mono italic">
            <table class="w-full text-left border-collapse min-w-[1400px]">
                <thead>
                    <tr class="bg-stone-950 text-stone-700">
                        <th class="py-8 px-10 w-16"><input type="checkbox" class="w-5 h-5 rounded-lg border-white/10 bg-stone-900 text-primary focus:ring-primary shadow-inner"></th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">N°</th>
                        <th class="py-8 px-6 text text-center text-[11px] font-black tracking-[0.3em] uppercase">FOTO</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">IDENTIFIER_SKU</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">CATEGORY</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">FAB_ORIGIN</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">BRAND_TAG</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">MATERIAL</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">THICKNESS</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">TECHNICAL_NOMINAL</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase">MEASURES</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase text-right">VALUATION</th>
                        <th class="py-8 px-6 text-[11px] font-black tracking-[0.3em] uppercase text-center">STOCK_MAG</th>
                        <th class="py-8 px-10 text-[11px] font-black tracking-[0.3em] uppercase text-center">CMD_HUB</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 font-mono">
                    @forelse($products as $index => $product)
                    <tr class="hover:bg-primary/5 transition-all group/row">
                        <td class="py-8 px-10"><input type="checkbox" class="w-5 h-5 rounded-lg border-white/10 bg-stone-900 text-primary focus:ring-primary shadow-inner"></td>
                        <td class="py-8 px-6 text-[13px] font-black text-stone-700 italic">
                            {{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="py-8 px-6">
                            <div class="w-16 h-16 bg-stone-950 border border-white/10 rounded-2xl flex items-center justify-center overflow-hidden shadow-inner group-hover/row:border-primary/40 transition-all">
                                @if($product->foto_path)
                                    <img src="{{ asset($product->foto_path) }}" class="w-full h-full object-cover opacity-80 group-hover/row:opacity-100 transition-opacity">
                                @else
                                    <span class="material-symbols-outlined text-stone-800 text-2xl group-hover/row:text-primary transition-colors">image</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[14px] font-black text-white tracking-tighter drop-shadow-sm uppercase">
                                {{ $product->codigo_oem }}
                            </span>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[11px] font-black text-stone-500 uppercase tracking-widest bg-stone-950 px-4 py-2 rounded-xl group-hover/row:text-white transition-all shadow-inner border border-white/5">{{ $product->categoria ?? 'MASTER_NODE' }}</span>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest">{{ $product->fabricante ?? '---' }}</span>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[11px] font-black text-stone-300 uppercase tracking-widest italic">{{ $product->marca ?? '---' }}</span>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest">{{ $product->material ?? '---' }}</span>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest">{{ $product->espesor ?? '---' }}</span>
                        </td>
                        <td class="py-8 px-6">
                            <a href="{{ url('/tienda/detalle_productos?id=' . $product->id) }}" target="_blank" class="text-[14px] font-black text-stone-300 group-hover/row:text-primary transition-colors block uppercase leading-tight tracking-tight max-w-xs italic">
                                {{ $product->nombre }}
                            </a>
                            <p class="text-[10px] text-stone-700 font-black mt-2 uppercase tracking-[0.2em] italic group-hover/row:text-stone-500 transition-colors opacity-50">TRANS_ID: #{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="py-8 px-6">
                            <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest">{{ $product->medidas ?? '---' }}</span>
                        </td>
                        <td class="py-8 px-6 text-right">
                            <span class="text-[18px] font-black text-primary italic tracking-tighter shadow-primary/10 drop-shadow-md">${{ number_format($product->precio_mayor, 2) }}</span>
                        </td>
                        <td class="py-8 px-6">
                            @php $safeMinimo = max(1, (float)$product->stock_minimo); @endphp
                            @php $stockPercent = min(100, ($product->stock_actual / ($safeMinimo * 3)) * 100); @endphp
                            <div class="flex flex-col items-center">
                                <span class="text-[16px] font-black {{ $product->stock_actual <= $safeMinimo ? 'text-red-500 animate-pulse' : 'text-white' }} leading-none shadow-inner italic mb-2 tracking-tighter">
                                    {{ number_format($product->stock_actual, 0) }}_QTY
                                </span>
                                <div class="w-20 bg-stone-950 h-1.5 rounded-full overflow-hidden border border-white/5 relative shadow-inner">
                                    <div class="{{ $product->stock_actual <= $safeMinimo ? 'bg-red-500' : 'bg-primary shadow-[0_0_10px_#ceff5e]' }} h-full transition-all duration-1000" style="width: {{ $stockPercent }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="py-8 px-10 text-center">
                            <button class="w-12 h-12 bg-stone-950 border border-white/5 text-stone-700 hover:bg-white hover:text-stone-950 transition-all rounded-2xl shadow-inner flex items-center justify-center mx-auto group/btn">
                                <span class="material-symbols-outlined text-xl group-hover/btn:rotate-90 transition-transform">more_vert</span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-32 text-center">
                            <span class="material-symbols-outlined text-7xl text-stone-900 mb-6 block animate-bounce">inventory_2</span>
                            <p class="text-[12px] font-black text-stone-800 uppercase tracking-[0.6em] italic">NO_CATEGORICAL_TRACE_DETECTED_IN_MASTER_HUB</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Matrix Footer: Sync Trace -->
        <div class="p-12 border-t border-white/5 bg-stone-950/80 backdrop-blur-3xl flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex items-center gap-6">
                <span class="text-[11px] font-black text-primary uppercase tracking-[0.4em] italic shadow-[0_0_10px_#ceff5e22]">SYNC_STATUS: 100%_SECURE</span>
                <span class="w-1.5 h-6 bg-stone-800 rounded-full"></span>
                <span class="text-[11px] font-black text-stone-500 uppercase tracking-[0.3em] italic">{{ $products->total() }}_REGISTERED_ASSETS_DETECTED</span>
            </div>
            <div>
                {{ $products->appends(request()->query())->links('vendor.pagination.tailwind_zenith') }}
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <!-- Asset Technical Data Sheet Modal (Append) -->
    <div id="createProductModal" class="hidden fixed inset-0 bg-stone-950/80 backdrop-blur-3xl z-[100] flex items-center justify-center p-8">
        <div class="bg-stone-900 rounded-[56px] w-full max-w-6xl shadow-[0_0_100px_rgba(0,0,0,0.5)] border border-white/10 overflow-hidden animate-in fade-in zoom-in slide-in-from-bottom-12 duration-700 max-h-[92vh] flex flex-col relative">
            <!-- Modal Industrial Accent -->
            <div class="absolute top-0 inset-x-0 h-2 bg-primary group-hover:h-3 transition-all duration-700 shadow-[0_0_20px_#ceff5e33]"></div>
            
            <div class="p-16 border-b border-white/5 flex justify-between items-start bg-stone-950/40 backdrop-blur-3xl">
                <div class="flex items-center gap-10">
                    <div class="w-24 h-24 bg-stone-950 border border-white/10 rounded-[32px] flex items-center justify-center text-primary shadow-inner">
                        <span class="material-symbols-outlined text-[48px] font-black animate-pulse">inventory_2</span>
                    </div>
                    <div>
                        <h3 class="text-5xl font-headline font-black text-white uppercase tracking-tighter leading-none italic">APPEND_<span class="text-primary">ASSET_X</span></h3>
                        <p class="text-[12px] text-stone-600 font-black uppercase tracking-[0.4em] mt-5 italic">ASSET_REGISTRY_PROTOCOL: CALIBRATION_REQUIRED</p>
                    </div>
                </div>
                <button onclick="closeModal('createProductModal')" class="group p-5 bg-stone-950 border border-white/5 hover:bg-red-500 hover:text-white text-stone-600 rounded-[28px] transition-all shadow-inner">
                    <span class="material-symbols-outlined text-2xl group-hover:rotate-90 transition-transform">close</span>
                </button>
            </div>
            
            <form action="{{ route('erp.inventario.productos.store') }}" method="POST" class="flex-1 overflow-y-auto custom-scrollbar">
                @csrf
                <div class="p-16 space-y-16">
                    <!-- Section: Core Calibration -->
                    <div class="grid grid-cols-12 gap-10">
                        <div class="col-span-12">
                            <div class="flex items-center gap-6 mb-4">
                                <span class="w-1.5 h-6 bg-primary rounded-full shadow-[0_0_15px_#ceff5e]"></span>
                                <h4 class="text-[12px] font-black text-white uppercase tracking-[0.4em] italic">CORE_SPECIFICATION_BLOCK</h4>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-8 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">ASSET_NOMINAL_DESCRIPTION</label>
                            <input type="text" name="nombre" placeholder="EJ. EMPAQUEDADURA_CÁMARA_CORE_X7" required class="w-full bg-stone-950 border border-white/5 rounded-[24px] px-8 py-6 text-[14px] font-black text-white focus:border-primary transition-all uppercase placeholder:text-stone-800 tracking-[0.1em] italic shadow-inner">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">SKU_OEM_IDENTIFIER</label>
                            <input type="text" name="codigo_oem" placeholder="XP_PROTO_0000X" required class="w-full bg-stone-950 border border-white/5 rounded-[24px] px-8 py-6 text-[14px] font-black text-white focus:border-primary transition-all font-mono uppercase placeholder:text-stone-800 tracking-tighter italic shadow-inner">
                        </div>
                    </div>

                    <!-- Section: Technical Parameter Matrix -->
                    <div class="grid grid-cols-12 gap-10">
                        <div class="col-span-12">
                            <div class="flex items-center gap-6 mb-4">
                                <span class="w-1.5 h-6 bg-stone-600 rounded-full"></span>
                                <h4 class="text-[12px] font-black text-stone-400 uppercase tracking-[0.4em] italic">TECHNICAL_METADATA_MATRIX</h4>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">FAB_CMD_ORIGIN</label>
                            <input type="text" name="fabricante" class="w-full bg-stone-950 border border-white/5 rounded-[20px] px-8 py-5 text-[12px] font-black text-stone-300 focus:border-primary transition-all uppercase tracking-widest italic font-mono shadow-inner">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">OPERATIONAL_BRAND_TAG</label>
                            <input type="text" name="marca" class="w-full bg-stone-950 border border-white/5 rounded-[20px] px-8 py-5 text-[12px] font-black text-stone-300 focus:border-primary transition-all uppercase tracking-widest italic font-mono shadow-inner">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">SYS_CATEGORY_NODE</label>
                            <input type="text" name="categoria" class="w-full bg-stone-950 border border-white/5 rounded-[20px] px-8 py-5 text-[12px] font-black text-stone-300 focus:border-primary transition-all uppercase tracking-widest italic font-mono shadow-inner">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">MATERIAL_SPEC</label>
                            <input type="text" name="material" class="w-full bg-stone-950 border border-white/5 rounded-[20px] px-8 py-5 text-[12px] font-black text-white focus:border-primary transition-all uppercase tracking-widest italic font-mono shadow-inner">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">THICKNESS_SPEC</label>
                            <input type="text" name="espesor" class="w-full bg-stone-950 border border-white/5 rounded-[20px] px-8 py-5 text-[12px] font-black text-white focus:border-primary transition-all uppercase tracking-widest italic font-mono shadow-inner">
                        </div>
                        <div class="col-span-12 md:col-span-4 space-y-3">
                            <label class="text-[11px] font-black text-stone-600 uppercase tracking-[0.4em] ml-2 italic">MEASURES_SPEC</label>
                            <input type="text" name="medidas" class="w-full bg-stone-950 border border-white/5 rounded-[20px] px-8 py-5 text-[12px] font-black text-white focus:border-primary transition-all uppercase tracking-widest italic font-mono shadow-inner">
                        </div>
                    </div>

                    <!-- Section: Operational Magnitudes -->
                    <div class="bg-stone-950 border border-white/5 p-16 rounded-[48px] shadow-inner relative overflow-hidden group">
                        <div class="absolute inset-0 opacity-[0.02] transition-opacity group-hover:opacity-[0.05]" style="background-image: radial-gradient(#ceff5e 2px, transparent 2px); background-size: 32px 32px;"></div>
                        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-16">
                            <div class="space-y-6">
                                <label class="text-[12px] font-black text-stone-500 uppercase tracking-[0.5em] block italic">VALUATION_USD_TRANS</label>
                                <div class="relative">
                                    <span class="absolute left-10 top-1/2 -translate-y-1/2 text-stone-800 font-headline font-black text-5xl italic drop-shadow-md">$</span>
                                    <input type="number" name="precio_mayor" step="0.01" required class="w-full bg-stone-900 border border-white/5 rounded-[32px] pl-20 pr-10 py-10 text-5xl font-headline font-black text-white focus:border-primary transition-all outline-none shadow-33xl italic tracking-tighter">
                                </div>
                                <p class="text-[11px] text-stone-700 font-black uppercase tracking-[0.4em] italic mt-4 ml-2">AUTHORIZED_DISTRIBUTION_MARGINS_SYNC</p>
                            </div>
                            <div class="space-y-6">
                                <label class="text-[12px] font-black text-stone-500 uppercase tracking-[0.5em] block italic">INERTIAL_OPEN_STOCK</label>
                                <div class="relative">
                                    <input type="number" name="stock_actual" value="0" required class="w-full bg-stone-900 border border-white/5 rounded-[32px] px-10 py-10 text-5xl font-headline font-black text-white focus:border-primary transition-all outline-none shadow-33xl italic tracking-tighter">
                                    <span class="absolute right-10 top-1/2 -translate-y-1/2 text-stone-800 font-black uppercase text-[12px] tracking-[0.4em] italic font-mono">UNITS_MAG</span>
                                </div>
                                <p class="text-[11px] text-stone-700 font-black uppercase tracking-[0.4em] italic mt-4 ml-2">MASTER_DEPOT_INITIAL_AVAILABILITY</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Actions: Command Terminal -->
                <div class="p-16 bg-stone-950/60 backdrop-blur-3xl border-t border-white/5 flex flex-col md:flex-row gap-8">
                    <button type="button" onclick="closeModal('createProductModal')" class="flex-1 py-8 text-[12px] font-black uppercase text-stone-600 hover:text-red-500 transition-all tracking-[0.4em] italic border border-white/5 hover:border-red-500/20 rounded-[32px] shadow-inner font-mono">ABORT_TRANSMISSION</button>
                    <button type="submit" class="flex-[2] py-8 bg-primary text-stone-950 text-[14px] font-black uppercase tracking-[0.5em] rounded-[32px] shadow-[0_0_50px_#ceff5e22] hover:bg-white transition-all active:scale-[0.98] flex items-center justify-center gap-6 italic">
                        SYNC_ASSET_VAULT_X7
                        <span class="material-symbols-outlined text-[24px] font-black animate-spin-slow">sync</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
@endsection

