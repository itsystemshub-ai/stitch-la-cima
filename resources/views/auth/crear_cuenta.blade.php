<!doctype html>

<html class="light" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta
      name="description"
      content="Registro empresarial - MAYOR DE REPUESTO LA CIMA, C.A."
    />
    <meta name="theme-color" content="#ceff5e" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
    />
    <meta name="apple-mobile-web-app-title" content="LA CIMA" />
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}" />
    <title>Crear Cuenta | Mayor de Repuesto LA CIMA, C.A.</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;family=Inter:wght@300;400;500;600;700&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet"
    />
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/crear_cuenta.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/crear_cuenta.css') }}" />
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#ceff5e",
              secondary: "#1c1c1c",
              background: "#f6f6f9",
              surface: "#ffffff",
              outline: "#e2e2e5",
            },
            fontFamily: {
              headline: ["League Spartan", "sans-serif"],
              body: ["Inter", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-surface font-body text-on-surface">
    <!-- Top Navigation -->
    <nav
      class="fixed top-0 w-full z-40 bg-white/90 backdrop-blur-md border-b border-outline shadow-sm"
    >
      <div class="flex justify-between items-center px-6 py-3">
        <button
          onclick="openMobileMenu()"
          class="md:hidden p-2 hover:bg-stone-100 rounded-full"
        >
          <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="{{ url('/') }}" class="flex items-center gap-2 group">
          <img
            src="{{ asset('assets/images/logo.png') }}"
            alt="LA CIMA"
            class="h-8 md:h-10 w-auto object-contain"
          />
          <div class="flex flex-col">
            <span
              class="text-xs md:text-sm font-black text-black leading-tight tracking-tighter uppercase whitespace-nowrap"
              >MAYOR DE REPUESTO LA CIMA, C.A</span
            >
            <span
              class="text-[8px] md:text-[9px] font-medium text-stone-500 tracking-[0.15em] uppercase leading-none mt-1"
              >RIF.: J-40308741-5</span
            >
          </div>
        </a>
        <div class="hidden md:flex items-center gap-6">
          <a
            class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors"
            href="{{ url('/') }}"
            >Inicio</a
          >
          <a
            class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors"
            href="{{ url('/tienda/catalogo_general') }}"
            >Catálogo</a
          >
          <a
            class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors"
            href="{{ url('/auth/' . 'Nosotros') }}"
            >Nosotros</a
          >
          <a
            class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors"
            href="{{ url('/auth/' . 'contacto') }}"
            >Contacto</a
          >
        </div>
        <div class="flex items-center gap-4">
          <a
            href="{{ url('/auth/login') }}"
            class="hidden sm:flex items-center gap-2 bg-black text-white px-4 py-2 rounded-md font-bold text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all"
          >
            <span class="material-symbols-outlined text-primary text-sm"
              >login</span
            >
            Login
          </a>
        </div>
      </div>
    </nav>

    <!-- Mobile Menu -->
    <div
      id="mobileMenu"
      class="fixed inset-0 bg-black/50 z-50 hidden md:hidden"
      onclick="closeMobileMenu()"
    ></div>
    <div
      id="mobileNav"
      class="mobile-menu fixed top-0 left-0 h-full w-80 bg-white z-50 shadow-2xl transform -translate-x-full transition-transform duration-300 md:hidden"
    >
      <div
        class="p-6 border-b border-outline flex justify-between items-center"
      >
        <div class="flex items-center gap-2">
          <img
            src="{{ asset('assets/images/logo.png') }}"
            alt="LA CIMA"
            class="h-8 w-auto"
          />
          <span class="text-xs font-black uppercase">LA CIMA, C.A</span>
        </div>
        <button
          onclick="closeMobileMenu()"
          class="p-2 hover:bg-stone-100 rounded-full"
        >
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>
      <nav class="p-6 space-y-4">
        <a
          href="{{ url('/') }}"
          class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors"
          >Inicio</a
        >
        <a
          href="{{ url('/tienda/catalogo_general') }}"
          class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors"
          >Catálogo</a
        >
        <a
          href="{{ url('/auth/login') }}"
          class="block text-sm font-bold uppercase tracking-widest text-black border-l-4 border-primary pl-4 py-2"
          >Iniciar Sesión</a
        >
      </nav>
    </div>
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
                    href="{{ url('/auth/login') }}"
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
    <!-- Footer -->
    <footer
      class="bg-black text-white w-full py-16 px-8 border-t border-zinc-900"
    >
      <div
        class="grid grid-cols-1 md:grid-cols-4 gap-12 w-full max-w-7xl mx-auto"
      >
        <div class="md:col-span-1">
          <div class="flex items-center gap-3 mb-6">
            <img
              src="{{ asset('assets/images/logo.png') }}"
              alt="Logo"
              class="h-12 w-auto"
            />

            <div class="flex flex-col justify-center">
              <span
                class="text-primary font-black text-sm block uppercase tracking-tighter leading-none"
              >
                MAYOR DE REPUESTO LA CIMA, C.A
              </span>
              <span
                class="text-primary font-black text-xs block uppercase tracking-tighter leading-none mt-1"
              >
                RIF.: J-40308741-5
              </span>
            </div>
          </div>

          <div class="flex gap-4">
            <div
              class="h-10 w-10 bg-zinc-900 rounded-full flex items-center justify-center hover:bg-primary hover:text-black cursor-pointer transition-all"
            >
              <span class="material-symbols-outlined text-sm">facebook</span>
            </div>
            <div
              class="h-10 w-10 bg-zinc-900 rounded-full flex items-center justify-center hover:bg-primary hover:text-black cursor-pointer transition-all"
            >
              <span class="material-symbols-outlined text-sm"
                >alternate_email</span
              >
            </div>
          </div>
        </div>
        <div>
          <span
            class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block"
            >Catálogo</span
          >
          <nav class="flex flex-col gap-4">
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Nuevos Ingresos</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Sistemas de Motor</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Frenado</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Transmisión</a
            >
          </nav>
        </div>
        <div>
          <span
            class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block"
            >Empresa</span
          >
          <nav class="flex flex-col gap-4">
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Portal ERP</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Términos B2B</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Soporte Técnico</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="#"
              >Contacto</a
            >
          </nav>
        </div>
        <div>
          <span
            class="text-white font-black text-xs uppercase tracking-[0.2em] mb-6 block"
            >Sede Central</span
          >
          <p
            class="text-stone-500 text-xs uppercase tracking-widest leading-relaxed"
          >
            AV. 119, EDIF. MULTICENTRO PASEO EL PARRAL, OFICINA NO. 2-3-C, URB.
            EL PARRAL, 2001, VALENCIA, EDO. CARABOBO
          </p>
          <div class="mt-6 p-4 bg-zinc-900 rounded-lg border border-white/5">
            <p
              class="text-[10px] text-primary font-bold uppercase tracking-widest"
            >
              ¿Necesitas ayuda?
            </p>
            <p class="text-white text-xs font-bold mt-1">
              LACIMA.REPUESTOS@GMAIL.COM
            </p>
            <p class="text-white text-xs font-bold mt-1">
              PEDIDOSLACIMA@GMAIL.COM
            </p>
          </div>
        </div>
      </div>
      <div
        class="max-w-7xl mx-auto border-t border-zinc-900 mt-16 pt-8 flex justify-between items-center"
      >
        <p class="text-[9px] text-stone-600 uppercase tracking-widest">
          © 2024 MAYOR DE REPUESTO LA CIMA, C.A. TODOS LOS DERECHOS RESERVADOS.
        </p>
        <div class="flex gap-6">
          <span
            class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white"
            >Privacidad</span
          >
          <span
            class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white"
            >Legal</span
          >
        </div>
      </div>
    </footer>

    <script src="{{ asset('js/crear_cuenta.js') }}"></script>
  </body>
</html>
