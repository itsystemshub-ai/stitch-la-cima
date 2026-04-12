<!doctype html>
<html class="light" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta
      name="description"
      content="Contacto - MAYOR DE REPUESTO LA CIMA, C.A. Repuestos industriales."
    />
    <meta name="theme-color" content="#ceff5e" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
    />
    <meta name="apple-mobile-web-app-title" content="LA CIMA" />
    <link rel="manifest" href="../manifest.json" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}" />
    <title>Contacto | Mayor de Repuesto LA CIMA, C.A.</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet"
    />
    <script src="js/contacto.js"></script>
    <link rel="stylesheet" href="css/contacto.css" />
  </head>
  <body class="bg-background text-on-surface selection:bg-primary/30">
    <!-- TopNavBar -->
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
        <a href="{{ url('/tienda/' . 'index') }}" class="flex items-center gap-2 group">
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
            href="{{ url('/tienda/' . 'index') }}"
            >Inicio</a
          >
          <a
            class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors"
            href="{{ url('/tienda/' . 'catalogo_general') }}"
            >Catálogo</a
          >
          <a
            class="text-xs uppercase tracking-widest font-bold text-on-surface-variant hover:text-black transition-colors"
            href="{{ url('/tienda/' . 'Nosotros') }}"
            >Nosotros</a
          >
          <a
            class="text-xs uppercase tracking-widest font-bold text-black border-b-2 border-primary"
            href="{{ url('/tienda/' . 'contacto') }}"
            >Contacto</a
          >
        </div>
        <div class="flex items-center gap-4">
          <div class="relative hidden lg:block">
            <input
              id="searchInput"
              class="bg-stone-100 border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary w-64"
              placeholder="Buscar por OEM o VIN..."
              type="text"
            />
            <span
              class="material-symbols-outlined absolute left-3 top-2 text-on-surface-variant text-lg"
              >search</span
            >
          </div>
          <a
            href="{{ url('/tienda/' . 'carrito') }}"
            class="relative p-2 text-black hover:bg-stone-100 rounded-full transition-colors"
          >
            <span class="material-symbols-outlined">shopping_cart</span>
            <span
              id="cart-count"
              class="cart-badge absolute top-0 right-0 bg-primary text-black text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full border border-white"
              >0</span
            >
          </a>
          <div class="h-6 w-px bg-outline mx-2 hidden sm:block"></div>
          <a
            href="{{ url('/auth/' . 'login') }}"
            class="hidden sm:flex items-center gap-2 bg-black text-white px-4 py-2 rounded-md font-bold text-[10px] uppercase tracking-widest hover:bg-stone-800 transition-all"
          >
            <span class="material-symbols-outlined text-primary text-sm"
              >database</span
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
          href="{{ url('/tienda/' . 'index') }}"
          class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors"
          >Inicio</a
        >
        <a
          href="{{ url('/tienda/' . 'catalogo_general') }}"
          class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors"
          >Catálogo</a
        >
        <a
          href="{{ url('/tienda/' . 'Nosotros') }}"
          class="block text-sm font-bold uppercase tracking-widest text-on-surface-variant hover:text-black pl-4 py-2 transition-colors"
          >Nosotros</a
        >
        <a
          href="{{ url('/tienda/' . 'contacto') }}"
          class="block text-sm font-bold uppercase tracking-widest text-black border-l-4 border-primary pl-4 py-2"
          >Contacto</a
        >
      </nav>
      <div class="p-6 border-t border-outline">
        <a
          href="{{ url('/auth/' . 'login') }}"
          class="flex items-center gap-2 bg-black text-white px-4 py-3 rounded-md font-bold text-xs uppercase tracking-widest"
        >
          <span class="material-symbols-outlined text-primary text-sm"
            >database</span
          >
          Login ERP
        </a>
      </div>
    </div>
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

    <!-- Scroll to Top Button -->
    <button
      id="scrollTopBtn"
      onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
      class="fixed bottom-8 right-8 bg-primary text-black p-4 shadow-xl hover:bg-white transition-all z-30 border border-black/10 hidden"
    >
      <span class="material-symbols-outlined font-black">arrow_upward</span>
    </button>

    <!-- PWA Install Button -->
    <div id="pwaInstallContainer" class="fixed bottom-8 left-8 z-30 hidden">
      <button
        id="pwaInstallBtn"
        class="bg-black text-primary px-6 py-4 rounded-lg shadow-xl hover:bg-stone-800 transition-all flex items-center gap-3 font-bold text-xs uppercase tracking-widest"
      >
        <span class="material-symbols-outlined text-primary">download</span>
        Instalar App
      </button>
    </div>

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
              href="{{ url('/tienda/' . 'catalogo_general') }}"
              >Nuevos Ingresos</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="{{ url('/tienda/' . 'catalogo_general') }}"
              >Sistemas de Motor</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="{{ url('/tienda/' . 'catalogo_general') }}"
              >Frenado</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="{{ url('/tienda/' . 'catalogo_general') }}"
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
              href="{{ url('/auth/' . 'login') }}"
              >Portal ERP</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="{{ url('/tienda/' . 'terminos_b2b') }}"
              >Términos B2B</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="{{ url('/tienda/' . 'soporte') }}"
              >Soporte Técnico</a
            >
            <a
              class="text-stone-500 text-xs uppercase tracking-widest hover:text-primary transition-colors"
              href="{{ url('/tienda/' . 'contacto') }}"
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
          © 2026 MAYOR DE REPUESTO LA CIMA, C.A. TODOS LOS DERECHOS RESERVADOS.
        </p>
        <div class="flex gap-6">
          <a
            class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white"
            href="{{ url('/tienda/' . 'soporte') }}"
            >Soporte</a
          >
          <a
            class="text-[9px] text-stone-600 uppercase tracking-widest cursor-pointer hover:text-white"
            href="{{ url('/tienda/' . 'terminos_b2b') }}"
            >Legal</a
          >
        </div>
      </div>
    </footer>

    <script src="js/contacto.js"></script>
  </body>
</html>
