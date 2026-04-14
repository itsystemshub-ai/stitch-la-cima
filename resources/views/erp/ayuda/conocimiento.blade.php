@extends('erp.layouts.app')

@section('title', 'Base de Conocimiento | Zenith ERP')

@section('breadcrumb')
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <a href="{{ url('/erp/ayuda') }}" class="hover:text-stone-900">Ayuda</a>
    <span class="material-symbols-outlined text-sm text-stone-400">chevron_right</span>
    <span class="text-stone-900 font-medium">Conocimiento</span>
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-12">
    <!-- Article Header -->
    <header class="relative pl-8 mb-12">
        <div class="absolute left-0 top-0 h-full w-1.5 bg-primary rounded-full"></div>
        <div class="inline-block bg-primary/10 text-primary text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded-md mb-4">Procedimiento FP-042</div>
        <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tighter leading-tight text-stone-900 mb-6">
            Cómo realizar un <span class="text-primary bg-stone-900 px-2 rounded-sm">Cierre Mensual</span> Fiscal
        </h1>
        <p class="text-lg text-stone-500 max-w-2xl font-body leading-relaxed italic">
            Asegurando la integridad total de datos en el libro mayor y sub-mayores antes del rollover técnico del periodo.
        </p>
    </header>

    <!-- Tech Requirements Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm flex flex-col items-center text-center group hover:border-primary transition-all">
            <span class="material-symbols-outlined text-primary text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">lock</span>
            <h3 class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Nivel de Acceso</h3>
            <p class="text-sm font-bold text-stone-900">Administrador Financiero (N4)</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm flex flex-col items-center text-center group hover:border-primary transition-all">
            <span class="material-symbols-outlined text-primary text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">timer</span>
            <h3 class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Duración Estimada</h3>
            <p class="text-sm font-bold text-stone-900">45 - 60 Minutos</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm flex flex-col items-center text-center group hover:border-primary transition-all">
            <span class="material-symbols-outlined text-primary text-3xl mb-4" style="font-variation-settings: 'FILL' 1;">inventory</span>
            <h3 class="text-[10px] font-black uppercase tracking-widest text-stone-400 mb-2">Dependencias</h3>
            <p class="text-sm font-bold text-stone-900">Lotes de inventario conciliados</p>
        </div>
    </div>

    <!-- Step-by-Step Instructions -->
    <div class="space-y-16">
        <!-- Step 1 -->
        <article class="group">
            <div class="flex items-center gap-6 mb-8">
                <span class="text-5xl font-black text-stone-100 group-hover:text-primary/20 transition-colors">01</span>
                <h2 class="text-2xl font-black uppercase tracking-tight text-stone-900">Conciliar Cuentas por Cobrar y Pagar</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <div class="space-y-6">
                    <p class="text-stone-600 leading-relaxed font-body">
                        Antes de iniciar el bloqueo, verifique que todas las facturas pendientes del periodo actual hayan sido cruzadas con sus órdenes de compra/venta. Navegue a <code class="bg-stone-100 px-2 py-1 rounded text-primary font-mono text-[10px] font-black">Finanzas > Cuentas > Verificación</code>.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4 p-4 bg-stone-50 rounded-xl">
                            <span class="material-symbols-outlined text-primary">check_circle</span>
                            <div>
                                <p class="text-xs font-bold text-stone-900 uppercase mb-1">Reporte de Antigüedad</p>
                                <p class="text-[10px] text-stone-500">Genere el reporte al día 30 del mes corriente.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 p-4 bg-stone-50 rounded-xl">
                            <span class="material-symbols-outlined text-primary">check_circle</span>
                            <div>
                                <p class="text-xs font-bold text-stone-900 uppercase mb-1">Estatus "Borrador"</p>
                                <p class="text-[10px] text-stone-500">Asegure que no existan facturas en estatus borrador.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl group/img">
                    <img src="https://images.unsplash.com/photo-1551288049-bb8482c0ad85?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Financial Dashboard" 
                         class="w-full h-full object-cover aspect-video grayscale group-hover/img:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-stone-900/40 group-hover/img:bg-transparent transition-all"></div>
                </div>
            </div>
        </article>

        <!-- Step 2 -->
        <article class="group">
            <div class="flex items-center gap-6 mb-8">
                <span class="text-5xl font-black text-stone-100 group-hover:text-primary/20 transition-colors">02</span>
                <h2 class="text-2xl font-black uppercase tracking-tight text-stone-900">Snapshot de Valoración de Inventario</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <div class="space-y-6">
                    <p class="text-stone-600 leading-relaxed font-body">
                        Genere la valoración final de stock. El sistema bloqueará el libro de inventario para el periodo después de este paso. Cualquier ajuste posterior será registrado como 'Entrada de Corrección'.
                    </p>
                    <div class="bg-stone-900 p-6 rounded-2xl border-l-4 border-primary shadow-lg">
                        <p class="text-[10px] font-black uppercase text-primary tracking-widest mb-2">CONSEJO PROFESIONAL</p>
                        <p class="text-xs text-stone-300 leading-relaxed italic">Ejecute el analizador de 'Stock Muerto' para dar de baja repuestos obsoletos en esta ventana fiscal.</p>
                    </div>
                </div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl group/img">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Warehouse Logistics" 
                         class="w-full h-full object-cover aspect-video grayscale group-hover/img:grayscale-0 transition-all duration-700">
                </div>
            </div>
        </article>

        <!-- Step 3 -->
        <article class="group border-t border-stone-100 pt-16">
            <div class="flex items-center gap-6 mb-8">
                <span class="text-5xl font-black text-stone-100 group-hover:text-primary/20 transition-colors">03</span>
                <h2 class="text-2xl font-black uppercase tracking-tight text-stone-900">Bloqueo Final del Libro Mayor</h2>
            </div>
            <div class="flex flex-col md:flex-row items-center gap-8 bg-stone-50 p-8 rounded-2xl">
                <div class="flex-1">
                    <p class="text-stone-600 leading-relaxed mb-6 font-body">
                        Una vez verificados todos los sub-mayores, ejecute el cierre de periodo. Este proceso es irreversible y genera un hash permanente en el ledger financiero de Zenith ERP.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-stone-900 text-white px-8 py-3 rounded-xl font-bold uppercase text-[11px] tracking-widest hover:bg-primary hover:text-stone-900 transition-all active:scale-95 shadow-lg shadow-stone-900/20">Iniciar Cierre</button>
                        <button class="bg-white border border-stone-200 text-stone-700 px-8 py-3 rounded-xl font-bold uppercase text-[11px] tracking-widest hover:border-primary transition-all active:scale-95">Descargar Log de Auditoría</button>
                    </div>
                </div>
                <div class="w-1.5 h-32 bg-stone-200 rounded-full hidden md:block"></div>
                <div class="text-right">
                    <span class="material-symbols-outlined text-stone-200 text-7xl mb-2">security</span>
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest">Protocolo Seguro Activado</p>
                </div>
            </div>
        </article>
    </div>

    <!-- Helpfulness Section -->
    <section class="bg-white p-12 rounded-3xl border border-stone-200 shadow-sm flex flex-col items-center text-center">
        <h3 class="text-xl font-black uppercase tracking-tight text-stone-900 mb-6">¿Te ha sido útil esta guía técnica?</h3>
        <div class="flex gap-4">
            <button class="flex items-center gap-2 px-8 py-3 bg-stone-50 hover:bg-primary/10 hover:text-primary rounded-xl border border-stone-200 transition-all font-black text-[10px] uppercase tracking-widest group">
                <span class="material-symbols-outlined text-stone-400 group-hover:text-primary">thumb_up</span>
                Sí, muy clara
            </button>
            <button class="flex items-center gap-2 px-8 py-3 bg-stone-50 hover:bg-red-50 hover:text-red-500 rounded-xl border border-stone-200 transition-all font-black text-[10px] uppercase tracking-widest group">
                <span class="material-symbols-outlined text-stone-400 group-hover:text-red-500">thumb_down</span>
                Falta detalle
            </button>
        </div>
        <div class="mt-8 pt-8 border-t border-stone-100 w-full">
            <p class="text-[9px] text-stone-400 uppercase tracking-[0.2em] font-black">Actualizado: 24 Oct, 2023 | Versión 4.1.0-RE2</p>
        </div>
    </section>
</div>
@endsection
