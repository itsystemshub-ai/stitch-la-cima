@extends('layouts.auth')

@section('title', 'Crear Cuenta | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/auth/css/crear_cuenta.css">
@endpush

@section('content')
<main
      class="min-h-screen pt-20 pb-12 bg-gradient-to-br from-stone-50 to-stone-100"
    >
      <div class="max-w-6xl mx-auto px-4 md:px-8 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
          <div
            class="inline-flex items-center gap-2 bg-primary/10 text-stone-700 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest mb-6"
          >
            <span class="material-symbols-outlined text-primary text-sm"
              >verified_user</span
            >
            Registro Empresarial
          </div>
          <h1
            class="text-4xl md:text-5xl font-headline font-black text-stone-900 uppercase tracking-tight mb-4"
          >
            Mayor de Repuesto <span class="text-primary">La Cima, C.A.</span>
          </h1>
          <p class="text-stone-500 text-lg max-w-2xl mx-auto">
            Complete el formulario para crear su cuenta empresarial y acceder a
            nuestro catálogo industrial.
          </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start">
          <!-- Left: Benefits -->
          <div class="lg:col-span-2 space-y-6">
            <div
              class="bg-white p-6 rounded-xl shadow-sm border border-stone-100"
            >
              <div class="flex items-start gap-4">
                <div
                  class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0"
                >
                  <span class="material-symbols-outlined text-blue-600"
                    >inventory_2</span
                  >
                </div>
                <div>
                  <h3
                    class="font-headline font-bold text-stone-900 uppercase text-sm mb-1"
                  >
                    Inventario OEM
                  </h3>
                  <p class="text-xs text-stone-500 leading-relaxed">
                    Acceso en tiempo real a componentes industriales
                    verificados.
                  </p>
                </div>
              </div>
            </div>

            <div
              class="bg-white p-6 rounded-xl shadow-sm border border-stone-100"
            >
              <div class="flex items-start gap-4">
                <div
                  class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0"
                >
                  <span class="material-symbols-outlined text-green-600"
                    >payments</span
                  >
                </div>
                <div>
                  <h3
                    class="font-headline font-bold text-stone-900 uppercase text-sm mb-1"
                  >
                    Precios B2B
                  </h3>
                  <p class="text-xs text-stone-500 leading-relaxed">
                    Tarifas especiales por volumen para reparaciones
                    industriales.
                  </p>
                </div>
              </div>
            </div>

            <div
              class="bg-white p-6 rounded-xl shadow-sm border border-stone-100"
            >
              <div class="flex items-start gap-4">
                <div
                  class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center flex-shrink-0"
                >
                  <span class="material-symbols-outlined text-purple-600"
                    >local_shipping</span
                  >
                </div>
                <div>
                  <h3
                    class="font-headline font-bold text-stone-900 uppercase text-sm mb-1"
                  >
                    Envío Rápido
                  </h3>
                  <p class="text-xs text-stone-500 leading-relaxed">
                    Despacho desde Valencia a toda la región de Carabobo.
                  </p>
                </div>
              </div>
            </div>

            <div
              class="bg-white p-6 rounded-xl shadow-sm border border-stone-100"
            >
              <div class="flex items-start gap-4">
                <div
                  class="w-12 h-12 bg-orange-50 rounded-lg flex items-center justify-center flex-shrink-0"
                >
                  <span class="material-symbols-outlined text-orange-600"
                    >headset_mic</span
                  >
                </div>
                <div>
                  <h3
                    class="font-headline font-bold text-stone-900 uppercase text-sm mb-1"
                  >
                    Soporte Técnico
                  </h3>
                  <p class="text-xs text-stone-500 leading-relaxed">
                    Asistencia especializada para selección de repuestos.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Form -->
          <div class="lg:col-span-3">
            <div
              class="bg-white rounded-2xl shadow-lg border border-stone-100 p-8 md:p-10"
            >
              <h2
                class="font-headline text-2xl font-bold text-stone-900 uppercase tracking-tight mb-2"
              >
                Crear Cuenta
              </h2>
              <p class="text-sm text-stone-500 mb-8">
                Complete los datos de su empresa para comenzar.
              </p>

              <form
                id="registerForm"
                class="space-y-5"
                onsubmit="
                  event.preventDefault();
                  handleRegister();
                "
              >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                  <!-- Company Name -->
                  <div>
                    <label
                      class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-2 block"
                      >Empresa</label
                    >
                    <div class="relative">
                      <input
                        id="companyName"
                        name="companyName"
                        class="w-full bg-stone-50 border border-stone-200 p-3 pl-10 text-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                        placeholder="METALÚRGICA CIMA S.A."
                        type="text"
                        required
                      />
                      <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-lg"
                        >factory</span
                      >
                    </div>
                  </div>

                  <!-- RIF -->
                  <div>
                    <label
                      class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-2 block"
                      >RIF</label
                    >
                    <input
                      id="rif"
                      name="rif"
                      class="w-full bg-stone-50 border border-stone-200 p-3 text-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                      placeholder="J-12345678-0"
                      type="text"
                      required
                    />
                  </div>
                </div>

                <!-- Work Email -->
                <div>
                  <label
                    class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-2 block"
                    >Correo de Trabajo</label
                  >
                  <div class="relative">
                    <input
                      id="workEmail"
                      name="workEmail"
                      class="w-full bg-stone-50 border border-stone-200 p-3 pl-10 text-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                      placeholder="compras@empresa.com"
                      type="email"
                      required
                    />
                    <span
                      class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-lg"
                      >alternate_email</span
                    >
                  </div>
                </div>

                <!-- Phone -->
                <div>
                  <label
                    class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-2 block"
                    >Teléfono</label
                  >
                  <input
                    id="phone"
                    name="phone"
                    class="w-full bg-stone-50 border border-stone-200 p-3 text-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                    placeholder="+58 412-000-0000"
                    type="tel"
                  />
                </div>

                <!-- Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                  <div>
                    <label
                      class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-2 block"
                      >Contraseña</label
                    >
                    <div class="relative">
                      <input
                        id="password"
                        name="password"
                        class="w-full bg-stone-50 border border-stone-200 p-3 pl-10 text-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                        placeholder="••••••••"
                        type="password"
                        required
                        minlength="6"
                      />
                      <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-lg"
                        >lock</span
                      >
                    </div>
                  </div>
                  <div>
                    <label
                      class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-2 block"
                      >Confirmar</label
                    >
                    <div class="relative">
                      <input
                        id="confirmPassword"
                        name="confirmPassword"
                        class="w-full bg-stone-50 border border-stone-200 p-3 pl-10 text-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                        placeholder="••••••••"
                        type="password"
                        required
                        minlength="6"
                      />
                      <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-lg"
                        >lock_reset</span
                      >
                    </div>
                  </div>
                </div>

                <div class="pt-2">
                  <button
                    class="w-full bg-primary text-stone-900 py-4 px-6 font-headline font-bold uppercase tracking-widest rounded-lg hover:brightness-110 active:scale-[0.98] transition-all shadow-lg shadow-primary/20 flex items-center justify-center gap-2"
                    type="submit"
                  >
                    <span class="material-symbols-outlined text-xl"
                      >person_add</span
                    >
                    Crear Cuenta
                  </button>
                </div>

                <p class="text-center text-xs text-stone-400">
                  ¿Ya tiene cuenta?
                  <a
                    href="/auth/login"
                    class="text-primary font-bold hover:underline"
                    >Iniciar Sesión</a
                  >
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@push('scripts')
    <script src="/frontend/public/auth/js/crear_cuenta.js"></script>
@endpush
