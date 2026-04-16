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
        <div class="lg:col-span-7 space-y-8">
            <div class="bg-white p-8 rounded-2xl border border-stone-200">
                <h2 class="text-2xl font-black uppercase tracking-tight mb-6">Datos del Cliente</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Cliente</label>
                        <select name="customer_id" class="w-full px-4 py-4 bg-stone-50 border border-stone-100 rounded-xl text-stone-900 focus:ring-2 focus:ring-primary" required>
                            <option value="">Seleccionar cliente...</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->razon_social }} ({{ $customer->rif }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-stone-200">
                <h2 class="text-2xl font-black uppercase tracking-tight mb-6">Método de Pago</h2>
                <div class="space-y-4">
                    <label class="flex items-center gap-4 p-4 border border-stone-200 rounded-xl cursor-pointer hover:border-primary transition-colors">
                        <input type="radio" name="metodo_pago" value="contado" checked class="text-primary focus:ring-primary">
                        <span class="font-bold">Pago de Contado</span>
                    </label>
                    <label class="flex items-center gap-4 p-4 border border-stone-200 rounded-xl cursor-pointer hover:border-primary transition-colors">
                        <input type="radio" name="metodo_pago" value="credito" class="text-primary focus:ring-primary">
                        <span class="font-bold">Crédito (clientes autorizados)</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="bg-stone-900 p-8 rounded-2xl sticky top-32">
                <h2 class="text-xl font-black text-primary uppercase tracking-tight mb-6">Resumen del Pedido</h2>
                
                <div class="space-y-4 mb-6">
                    @foreach($cart as $item)
                    <div class="flex justify-between text-stone-300 text-sm">
                        <span>{{ $item['cantidad'] }}x {{ $item['nombre'] }}</span>
                        <span>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="border-t border-stone-700 pt-4 space-y-2">
                    <div class="flex justify-between text-stone-400">
                        <span>Subtotal</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-stone-400">
                        <span>IVA (16%)</span>
                        <span>${{ number_format($impuesto, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-primary text-xl font-black pt-2">
                        <span>TOTAL</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <input type="hidden" name="items" value="{{ json_encode(array_values($cart)) }}">

                <button type="submit" class="w-full bg-primary text-black font-black uppercase py-5 mt-6 tracking-[0.2em] hover:bg-white transition-colors">
                    Confirmar Pedido
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