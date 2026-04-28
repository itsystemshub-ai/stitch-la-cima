@extends('layouts.ecommerce')

@section('title', 'Checkout | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/checkout.css">
@endpush

@section('content')
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 pt-32 pb-24 relative z-10">
    <div class="mb-16">
        <h1 class="text-6xl font-black text-black uppercase tracking-tighter leading-none mb-4 italic">Finalizar <span class="text-primary italic">Pedido</span></h1>
        <p class="text-[10px] font-black text-on-surface-variant uppercase tracking-[0.4em]">Confirma tu orden de repuestos industriales</p>
    </div>

    <form id="checkoutForm" class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        @csrf
        <div class="lg:col-span-7 space-y-10">
            <div class="bg-white p-10 rounded-[40px] border border-stone-200 shadow-sm relative overflow-hidden">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center text-primary shadow-lg">
                        <span class="material-symbols-outlined text-2xl">person_search</span>
                    </div>
                    <h2 class="text-3xl font-headline font-black uppercase tracking-tighter italic">Identificación <span class="text-stone-400 not-italic">del Cliente</span></h2>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-[0.3em] text-stone-400 mb-4 ml-1">Selección de Entidad Fiscal B2B</label>
                        <select name="customer_id" class="w-full px-6 py-5 bg-stone-50 border-2 border-stone-100 rounded-3xl text-[12px] font-black uppercase tracking-tight text-stone-900 focus:ring-4 focus:ring-primary/20 focus:border-primary transition-all appearance-none cursor-pointer" required>
                            <option value="">-- ESTABLECER RECEPTOR DEL PEDIDO --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->razon_social }} (RIF: {{ $customer->rif }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[40px] border border-stone-200 shadow-sm relative overflow-hidden">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-stone-900 rounded-2xl flex items-center justify-center text-primary shadow-lg">
                        <span class="material-symbols-outlined text-2xl">account_balance_wallet</span>
                    </div>
                    <h2 class="text-3xl font-headline font-black uppercase tracking-tighter italic">Protocolo <span class="text-stone-400 not-italic">de Pago</span></h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="flex items-center gap-4 p-6 bg-stone-50 border-2 border-stone-100 rounded-3xl cursor-pointer hover:border-primary transition-all group active:scale-95">
                        <input type="radio" name="metodo_pago" value="contado" checked class="text-primary focus:ring-primary w-5 h-5 border-stone-300">
                        <div class="flex flex-col">
                            <span class="font-black text-[12px] uppercase tracking-widest text-stone-900">Transferencia / Efectivo</span>
                            <span class="text-[9px] text-stone-400 font-bold uppercase mt-1">Liquidación Inmediata</span>
                        </div>
                    </label>
                    <label class="flex items-center gap-4 p-6 bg-stone-50 border-2 border-stone-100 rounded-3xl cursor-pointer hover:border-primary transition-all group active:scale-95">
                        <input type="radio" name="metodo_pago" value="credito" class="text-primary focus:ring-primary w-5 h-5 border-stone-300">
                        <div class="flex flex-col">
                            <span class="font-black text-[12px] uppercase tracking-widest text-stone-900">Crédito Corporativo</span>
                            <span class="text-[9px] text-stone-400 font-bold uppercase mt-1">Sujeto a Límite Disponible</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="bg-stone-950 p-10 rounded-[40px] sticky top-32 shadow-2xl border border-white/5 relative overflow-hidden">
                <div class="absolute -right-20 -top-20 opacity-[0.03] pointer-events-none">
                    <span class="material-symbols-outlined text-[300px]">verified</span>
                </div>

                <h2 class="text-xl font-headline font-black text-primary uppercase tracking-widest mb-10 pb-6 border-b border-white/10 italic leading-none">Resumen Operativo</h2>
                
                <div class="space-y-5 mb-10 max-h-[300px] overflow-y-auto pr-2 custom-scrollbar">
                    @foreach($cart as $item)
                    <div class="flex justify-between items-center group">
                        <div class="flex flex-col">
                            <span class="text-[12px] font-black text-white uppercase tracking-tight group-hover:text-primary transition-colors">{{ $item['nombre'] }}</span>
                            <span class="text-[9px] text-stone-500 font-bold uppercase tracking-widest">{{ $item['cantidad'] }} UNIDADES</span>
                        </div>
                        <span class="text-[11px] font-mono font-bold text-stone-400">$ {{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="space-y-4 pt-6 border-t border-white/10">
                    <div class="flex justify-between items-center text-[11px] text-stone-500 font-black uppercase tracking-widest">
                        <span>Base Imponible</span>
                        <span class="font-mono text-white italic">$ {{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-[11px] text-stone-500 font-black uppercase tracking-widest">
                        <span>I.V.A. (16.0%)</span>
                        <span class="font-mono text-white italic">$ {{ number_format($impuesto, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-end pt-6 border-t border-primary/20">
                        <div class="flex flex-col">
                            <span class="text-primary text-[10px] font-black uppercase tracking-[0.4em] mb-1 leading-none">Total Orden</span>
                            <span class="text-stone-600 text-[8px] font-bold uppercase font-mono leading-none">Cálculo en Divisas</span>
                        </div>
                        <span class="text-5xl font-headline font-black text-primary tracking-tighter leading-none italic">$ {{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <input type="hidden" name="items" value="{{ json_encode(array_values($cart)) }}">

                <button type="submit" class="w-full bg-primary text-stone-900 font-black uppercase py-6 rounded-2xl mt-10 tracking-[0.3em] hover:bg-white transition-all shadow-xl shadow-primary/10 flex items-center justify-center gap-3 text-[11px] active:scale-95 group">
                    <span class="material-symbols-outlined font-black group-hover:translate-x-2 transition-transform">check_circle</span>
                    Garantizar Transacción
                </button>
            </div>
        </div>
    </form>
</main>

<script>
document.getElementById('checkoutForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const data = {
        customer_id: formData.get('customer_id'),
        items: JSON.parse(formData.get('items')),
        metodo_pago: formData.get('metodo_pago')
    };

    try {
        const response = await fetch('/api/tienda/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': formData.get('_token')
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        
        if (result.status === 'success') {
            window.location.href = '/tienda/confirmacion/' + result.order_id;
        } else {
            alert(result.message || 'Error al procesar el pedido');
        }
    } catch (error) {
        alert('Error de conexión');
    }
});
</script>
@endsection