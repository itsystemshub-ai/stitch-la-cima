@extends('layouts.ecommerce')

@section('title', 'Contacto | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/contacto.css">
@endpush

@section('content')
<main class="flex-grow pt-24 pb-12">
      <!-- Hero Section -->
      <section
        class="h-[400px] flex items-center overflow-hidden bg-black relative"
      >
        <div class="absolute inset-0 z-0">
          <img
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAXDDoopL1vJGvj43_2EcixnT0qcffP-8sugqc3PJmetlM42HxR7EiDaACitBpmwFEGPY-d0LPOMheDO8XJC_vDkZ0NGhadXT3P0f67reZI-WnouLsKv14pyDyoOT8dU2KDqwTVwiQO7apJ_kQ5mUQ43bKNXlPy0n8itI7-GxJBnEoLXqAGm4Lc218ApwlfA93ICa2tzs84XoB3YvCguieK7UMsUIQ6QITRFgZwmKhnd-3jYDRMGtcZ5G-7Alrjd3kFtkJEppsOsA"
            alt="Fondo Industrial"
            class="w-full h-full object-cover opacity-50 grayscale mix-blend-luminosity"
            loading="eager"
            onerror="this.style.display = 'none'"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-background via-black/60 to-transparent"
          ></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
          <span
            class="text-primary font-bold uppercase tracking-[0.3em] text-xs mb-4 block"
            >Centro de Soporte Industrial</span
          >
          <h1
            class="text-5xl md:text-7xl font-headline font-black text-white tracking-tighter uppercase leading-[0.9]"
          >
            CONTACTO <br />
            <span class="text-primary-dim">DIRECTO</span>
          </h1>
        </div>
      </section>

      <!-- Bento About (RESTORING ALL ORIGINAL DATA) -->
      <section class="py-24 container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-24">
          <div class="md:col-span-2 bg-stone-100 p-8 rounded-lg group">
            <h3
              class="font-headline text-2xl font-bold uppercase mb-4 group-hover:text-primary transition-colors"
            >
              Nuestra Historia
            </h3>
            <p class="text-on-surface-variant leading-relaxed">
              Nacimos en Valencia con la visión de centralizar el suministro de
              repuestos de alta precisión para la flota industrial más exigente
              del país.
            </p>
            <div class="mt-8 text-4xl font-black text-black">
              VENEZUELA <span class="text-primary">2024</span>
            </div>
          </div>
          <div
            class="md:col-span-1 bg-black text-white p-8 rounded-lg flex flex-col justify-between"
          >
            <div>
              <h3
                class="font-headline text-xl font-bold uppercase mb-2 text-primary"
              >
                Evolución Industrial
              </h3>
              <p class="text-stone-400 text-xs">
                Adaptándonos a las nuevas tecnologías de motorización Cummins y
                Volvo.
              </p>
            </div>
            <span class="material-symbols-outlined text-4xl text-primary mt-4"
              >query_stats</span
            >
          </div>
          <div
            class="md:col-span-1 bg-white border border-outline p-8 rounded-lg"
          >
            <h3 class="font-headline text-xl font-bold uppercase mb-2">
              Misión
            </h3>
            <p class="text-on-surface-variant text-xs leading-relaxed italic">
              "Garantizar que ninguna máquina se detenga por falta de una pieza
              crítica."
            </p>
          </div>
        </div>

        <!-- Contact Section (RESTORING ALL DATA) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
          <div class="space-y-12">
            <div>
              <h2
                class="text-4xl font-headline font-black uppercase tracking-tight mb-8"
              >
                Oficinas Centrales
              </h2>
              <div class="space-y-8">
                <div
                  class="flex items-start gap-4 p-6 bg-white border border-outline rounded-lg"
                >
                  <span
                    class="material-symbols-outlined text-black bg-primary p-3 rounded-full"
                    >location_on</span
                  >
                  <div>
                    <h4
                      class="font-headline font-black uppercase text-sm tracking-[0.2em] text-[#5a5c5e] mb-2"
                    >
                      Dirección Física
                    </h4>
                    <p class="text-on-surface font-medium leading-relaxed">
                      AV. 119, EDIF. MULTICENTRO PASEO EL PARRAL, OFICINA NO.
                      2-3-C, URB. EL PARRAL, 2001, VALENCIA, EDO. CARABOBO
                    </p>
                  </div>
                </div>
                <div
                  class="flex items-start gap-4 p-6 bg-white border border-outline rounded-lg"
                >
                  <span
                    class="material-symbols-outlined text-black bg-primary p-3 rounded-full"
                    >phone_in_talk</span
                  >
                  <div>
                    <h4
                      class="font-headline font-black uppercase text-sm tracking-[0.2em] text-[#5a5c5e] mb-2"
                    >
                      Línea de Atención
                    </h4>
                    <p class="text-on-surface font-black text-lg">
                      +58 (241) 555-0101
                    </p>
                    <p class="text-on-surface-variant text-sm">
                      atencion@lacima.com.ve
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Form -->
          <div
            class="bg-black p-12 rounded-xl text-white shadow-2xl relative overflow-hidden"
          >
            <div
              class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl"
            ></div>
            <h3
              class="text-2xl font-headline font-black uppercase tracking-tight mb-8 text-primary"
            >
              Consulta Técnica
            </h3>
            <form class="space-y-6 relative z-10">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                  <label
                    class="text-xs uppercase tracking-[0.2em] font-black text-stone-500"
                    >Nombre Completo</label
                  >
                  <input
                    class="w-full bg-stone-900 border-stone-800 focus:ring-2 focus:ring-primary p-4 rounded text-sm text-white placeholder:text-stone-700"
                    placeholder="Ej. Juan Pérez"
                    type="text"
                  />
                </div>
                <div class="space-y-2">
                  <label
                    class="text-xs uppercase tracking-[0.2em] font-black text-stone-500"
                    >Correo Electrónico</label
                  >
                  <input
                    class="w-full bg-stone-900 border-stone-800 focus:ring-2 focus:ring-primary p-4 rounded text-sm text-white placeholder:text-stone-700"
                    placeholder="juan@empresa.com"
                    type="email"
                  />
                </div>
              </div>
              <div class="space-y-2">
                <label
                  class="text-xs uppercase tracking-[0.2em] font-black text-stone-500"
                  >Mensaje / Requerimiento Técnica</label
                >
                <textarea
                  class="w-full bg-stone-900 border-stone-800 focus:ring-2 focus:ring-primary p-4 rounded text-sm text-white placeholder:text-stone-700 resize-none"
                  placeholder="Indique número de parte o VIN..."
                  rows="4"
                ></textarea>
              </div>
              <button
                class="w-full bg-primary text-black font-headline font-black uppercase tracking-[0.2em] py-5 px-8 hover:bg-white transition-all transform active:scale-95"
                type="submit"
              >
                Enviar Solicitud
              </button>
            </form>
          </div>
        </div>
      </section>
    </main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/contacto.js"></script>
@endpush
