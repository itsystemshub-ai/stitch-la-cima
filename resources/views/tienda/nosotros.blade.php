@extends('layouts.ecommerce')

@section('title', 'Nosotros | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/nosotros.css" />
@endpush

@section('content')
<main class="pt-16">
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center overflow-hidden bg-black">
      <div class="absolute inset-0 z-0 text-white">
        <img
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuCagO0b8fbL5mHd01cJKj-yY4TXKz3pJKApoPR3XypDtgxQeE3kAgK8IKYXiuiYy9wlITkGEIPukkyY37Z1EAvCyEsp_fOGYMfm-yAA4YALLy7Tp8-eplYfdagRdehPNAtC9eKAB0i7xqZWA-p44Ux73Mdw8xGQL2B0vm-_HDUE23-j79iRANyUhPfEYlBl45QJV2nNltmDGc9-75xUPuZyU_BBKdOaqXrAwMAqH6q70D_uCpd4wp0fgKcMXUlvkne4AE13G63F4y4"
          class="w-full h-full object-cover opacity-40 mix-blend-luminosity"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl">
          <div class="inline-block px-3 py-1 bg-primary text-black font-bold text-xs tracking-widest uppercase mb-6">
            Industrial Grade Precision
          </div>
          <h1 class="text-white font-headline text-6xl md:text-8xl font-black tracking-tighter uppercase leading-[0.9] mb-8">
            POWERING THE <br />
            <span class="text-primary">HEAVY INDUSTRY</span>
          </h1>
          <p class="text-stone-300 text-lg md:text-xl max-w-xl mb-10 leading-relaxed">
            Especialistas en repuestos de alta gama para motores industriales.
            Garantizamos la continuidad operativa de su maquinaria con
            componentes de ingeniería superior.
          </p>
          <div class="flex flex-wrap gap-4">
            <a href="{{ url('/tienda/catalogo_detallado') }}" class="bg-primary hover:bg-white text-black px-8 py-4 font-bold uppercase tracking-widest transition-all inline-block text-center">Explorar Catálogo</a>
            <a href="{{ url('/tienda/soporte') }}" class="border border-white text-white px-8 py-4 font-bold uppercase tracking-widest hover:bg-white/10 transition-all inline-block text-center">Soporte Técnico</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Trayectoria Section -->
    <section class="py-24 bg-white" id="nosotros">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div class="relative">
            <div class="relative z-10 bg-stone-100 p-8 shadow-sm">
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCm3jFTQ3PoO4em45uCZSlunRbf5f1RLNx11asJVof5pQBRtyfRKDlf_Wp5bzDEHP9RsY_fauatq2CU1MqEhbLKXz3c7V2GEFyzlhOGnecCYYB5SVPwdYuOJyKkgT3qlSQ5feGZsNsl-NW1InKGL0vJOFONrdPjDtMuEijlG6ZYSz_FbxKCAUukdLROlQJNWGK1uuApP-aSZMmhCvafBLgQSWgomz52WSit4tjPD9CXuLmw996vITZRuQ3KlLjp1hDqO9RdWTb13Ok"
                class="w-full grayscale hover:grayscale-0 transition-all duration-700"
              />
            </div>
          </div>
          <div>
            <h2 class="font-headline text-4xl md:text-5xl font-black uppercase tracking-tight text-black mb-8">
              Nuestra <span class="text-primary">Trayectoria</span>
            </h2>
            <div class="space-y-6 text-on-surface-variant leading-relaxed">
              <p>
                En **MAYOR DE REPUESTO LA CIMA, C.A.**, nos hemos consolidado
                como el aliado estratégico número uno para la industria pesada
                en Venezuela. Con sede en Valencia, nuestra misión es proveer
                soluciones mecánicas que excedan los estándares internacionales
                de calidad.
              </p>
              <p>
                Nuestra infraestructura logística nos permite despachar
                repuestos críticos para motores, transmisiones y sistemas
                eléctricos con una precisión quirúrgica, minimizando los tiempos
                de inactividad de nuestros clientes.
              </p>
            </div>
            <div class="grid grid-cols-2 gap-8 mt-12">
              <div class="border-l-4 border-primary pl-4">
                <div class="font-headline font-bold text-2xl">ISO 9001</div>
                <div class="text-xs uppercase tracking-widest text-[#5a5c5e] font-black">Calidad Certificada</div>
              </div>
              <div class="border-l-4 border-primary pl-4">
                <div class="font-headline font-bold text-2xl">RIF</div>
                <div class="text-xs uppercase tracking-widest text-[#5a5c5e] font-black">J-40308741-5</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Map Section -->
    <section class="py-24 bg-white" id="contacto">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <h2 class="font-headline text-5xl font-black uppercase tracking-tighter mb-8 leading-none">
              Estamos en el <br /><span class="text-primary-dim px-2 bg-black text-white">Corazón Industrial</span>
            </h2>
            <p class="text-on-surface-variant mb-12 text-lg">
              Nuestras oficinas centrales se encuentran ubicadas
              estratégicamente para atender los principales parques industriales
              de la región central.
            </p>
            <div class="space-y-8">
              <div class="flex gap-4">
                <span class="material-symbols-outlined text-black bg-primary p-2 rounded">location_on</span>
                <div>
                  <h4 class="font-bold uppercase text-[10px] tracking-widest text-[#5a5c5e] mb-1">Dirección</h4>
                  <p class="text-sm font-medium">
                    Zona Industrial Norte, Av. Henry Ford, Galpón 12-A.
                    Valencia, Carabobo, Venezuela.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="h-[500px] bg-stone-100 relative overflow-hidden group shadow-2xl">
            <img
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfQpDEf_ON7rzmUkiNT0c1oFQlGPuXuyA7rZ0BeUup78pHwd7Vo4po27Nwdzm_P9IqcC4R6iVDEtRsWqe9OXllKPeo8ExbKGSLo0yOO7P2l6HJxjRMPVab8gn6G5k2D3NKB4GL3mSnnaBuZO_PbZTO2Qfjdry4W4buRcEYsUPy1FFDNSM3IbJAuByC4pvEcXvMyEC5Xa-4rHFug4FFMX64FwbBMEfyimPVyaQACGeFtNovQhWoS8neZpN78o5oyWOa1SeRJlb6Ouc"
              class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-1000"
            />
            <div class="absolute bottom-6 left-6 bg-black p-6 text-white max-w-sm">
              <h3 class="font-bold uppercase text-primary mb-2">Visítanos</h3>
              <p class="text-xs uppercase font-bold tracking-widest text-stone-500">Lunes a Viernes: 8:00 AM - 5:00 PM</p>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection

@push('scripts')
    <script src="js/nosotros.js"></script>
@endpush
