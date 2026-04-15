@extends('layouts.ecommerce')

@section('title', 'Catálogo | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="css/catalogo_general.css" />
@endpush

@section('content')

    <!-- Hero Section -->
    <header
      class="relative min-h-[85vh] flex items-center overflow-hidden bg-black pt-16"
    >
      <div class="absolute inset-0 z-0">
        <img
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAXDDoopL1vJGvj43_2EcixnT0qcffP-8sugqc3PJmetlM42HxR7EiDaACitBpmwFEGPY-d0LPOMheDO8XJC_vDkZ0NGhadXT3P0f67reZI-WnouLsKv14pyDyoOT8dU2KDqwTVwiQO7apJ_kQ5mUQ43bKNXlPy0n8itI7-GxJBnEoLXqAGm4Lc218ApwlfA93ICa2tzs84XoB3YvCguieK7UMsUIQ6QITRFgZwmKhnd-3jYDRMGtcZ5G-7Alrjd3kFtkJEppsOsA"
          class="w-full h-full object-cover opacity-40 grayscale mix-blend-luminosity"
        />
        <div
          class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent"
        ></div>
      </div>
      <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl">
          <span
            class="inline-block px-3 py-1 bg-primary text-black text-[10px] font-black uppercase tracking-[0.2em] mb-6"
            >Distribuidor Autorizado</span
          >
          <h1
            class="text-6xl md:text-8xl font-headline font-black text-white uppercase tracking-tighter leading-[0.9] mb-8"
          >
            IMPULSADO POR <br />
            <span class="text-primary-dim">LA PRECISIÓN.</span>
          </h1>
          <p
            class="text-stone-300 text-lg md:text-xl max-w-xl leading-relaxed mb-10 font-medium italic"
          >
            Suministro de piezas de motor industrial de carga pesada para
            Cummins, Volvo y Detroit Diesel. Excelencia en ingeniería para la
            base del tiempo de actividad industrial.
          </p>
          <div class="flex flex-wrap gap-4">
            <a
              href="{{ url('/tienda/' . 'catalogo_detallado') }}"
              class="bg-primary hover:bg-white text-black font-black uppercase py-5 px-10 tracking-[0.2em] text-xs transition-all inline-block"
              >Explorar Catálogo</a
            >
            <button
              class="border border-white text-white font-black uppercase py-5 px-10 tracking-[0.2em] text-xs hover:bg-white/10 transition-all"
            >
              Especificaciones Técnicas
            </button>
          </div>
        </div>
      </div>
      <div
        class="absolute bottom-12 right-12 hidden lg:block border-l-4 border-primary pl-6 bg-black/40 backdrop-blur-md p-6"
      >
        <p
          class="text-stone-400 text-[10px] font-black uppercase tracking-[0.3em] mb-2"
        >
          Integridad del Motor
        </p>
        <p
          class="text-white text-3xl font-black italic tracking-tighter uppercase"
        >
          99.9% DISPONIBILIDAD
        </p>
      </div>
    </header>

    <!-- Product Catalog -->
    <main class="max-w-screen-2xl mx-auto py-24 px-6 w-full" id="catalog">
      <div
        class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8"
      >
        <div class="max-w-xl">
          <h2
            class="text-5xl font-black uppercase tracking-tighter text-black mb-4"
          >
            Componentes de Precisión
          </h2>
          <div class="h-2 w-24 bg-primary mb-6"></div>
          <p class="text-on-surface-variant font-medium leading-relaxed">
            Explore nuestra selección curada de piezas de alto rendimiento. Cada
            componente está rigurosamente probado para durabilidad industrial.
          </p>
        </div>
        <div class="flex gap-4 overflow-x-auto pb-4 w-full md:w-auto">
          <button
            onclick="filterProducts('all')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-black text-primary text-xs font-black uppercase tracking-[0.2em]"
          >
            Todos
          </button>
          <button
            onclick="filterProducts('cummins')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Cummins
          </button>
          <button
            onclick="filterProducts('volvo')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Volvo
          </button>
          <button
            onclick="filterProducts('detroit')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Detroit
          </button>
          <button
            onclick="filterProducts('toyota')"
            class="filter-btn whitespace-nowrap px-8 py-3 bg-white border border-outline text-black text-xs font-black uppercase tracking-[0.2em] hover:bg-primary transition-colors"
          >
            Toyota
          </button>
        </div>
      </div>

      <!-- Product Grid (RESTORING ALL 8 PRODUCTS) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Part 1 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="cummins"
        >
          <a href="detalle_productos.html?id=1" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7nYKSbAGk0sNgs7oPCd8fyoeR9e60wl1s7Jym9qpDXwnXaaIfkrxG35dPa2wV94j5fhKhsSHI4p3FIiX0otqPuYO07xO5dJd67_fdC5iaU0OMvzma3OMcftTxGXR_8h-CuY0MNvIpEQtgUBoHs4Y0aWQrtQp8ZPvy2FCDe0auTRAhubbCiVTCvakNmJDOKgDPwpqWLmOg_P1hwI1D4D5VdoJ80afZqds7EAFF88xS-vm6cmgnWgiSjN6obErYH81zQhDeQ0iWub4"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
              <div
                class="absolute top-4 right-4 bg-black text-primary text-[9px] font-black uppercase tracking-[0.2em] px-2 py-1"
              >
                En Stock
              </div>
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Cummins</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#CU-8842-X</span
              >
            </div>
            <a href="detalle_productos.html?id=1" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Junta de Culata Cummins
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $145.00
              </p>
              <p
                class="text-xs font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 5,220.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  1,
                  'Junta de Culata Cummins',
                  145.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuC7nYKSbAGk0sNgs7oPCd8fyoeR9e60wl1s7Jym9qpDXwnXaaIfkrxG35dPa2wV94j5fhKhsSHI4p3FIiX0otqPuYO07xO5dJd67_fdC5iaU0OMvzma3OMcftTxGXR_8h-CuY0MNvIpEQtgUBoHs4Y0aWQrtQp8ZPvy2FCDe0auTRAhubbCiVTCvakNmJDOKgDPwpqWLmOg_P1hwI1D4D5VdoJ80afZqds7EAFF88xS-vm6cmgnWgiSjN6obErYH81zQhDeQ0iWub4',
                  'Cummins / CU-8842-X',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-xs tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 2 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="volvo"
        >
          <a href="detalle_productos.html?id=2" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCsHZ9MFD4WCJtxE7xbkGvYvm4qisOi2hGXwJ_Zav27WFtthL07jOmeBqA3uxqD9hGFJF6jtKRFwuIbqtxbKM9d222u0u570XUHOr-3TM5d4-836PCyasLIpwwaCSnEasQ3XtaGoL4RnLluZBXOHdCtMdslZuzY0-nXPEIgnykw7T83b5acMv9DZ3XU7hKUl2gO3uCqaHBWjdvytWxJcG0h1D0ClBrKUkC2J3AKzajE4r9QkGRjpLqjmKsImGg4iReJej_zOKXcihk"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Volvo</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#VO-1120-F</span
              >
            </div>
            <a href="detalle_productos.html?id=2" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Filtro de Aceite Volvo
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $38.50
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 1,386.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  2,
                  'Filtro de Aceite Volvo',
                  38.5,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuCsHZ9MFD4WCJtxE7xbkGvYvm4qisOi2hGXwJ_Zav27WFtthL07jOmeBqA3uxqD9hGFJF6jtKRFwuIbqtxbKM9d222u0u570XUHOr-3TM5d4-836PCyasLIpwwaCSnEasQ3XtaGoL4RnLluZBXOHdCtMdslZuzY0-nXPEIgnykw7T83b5acMv9DZ3XU7hKUl2gO3uCqaHBWjdvytWxJcG0h1D0ClBrKUkC2J3AKzajE4r9QkGRjpLqjmKsImGg4iReJej_zOKXcihk',
                  'Volvo / VO-1120-F',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 3 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="holset"
        >
          <a href="detalle_productos.html?id=3" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfjrGRNpjkuVD0N23eX_RV6yqwpouLC8EQL7CLZ-gZNbKywWxWd3inP-MVZR2hDLVBek4gxi0S8M2a1vyaRrrNeSO7Az-A9ojG2JNDnWXZYN-Mw4OfOBiPiHfhiudzde1KJUKBh8fLQ5PpswyaEDpkuKbGyHZWkpaF_gyP-Ge3SsLuGxew2xe1VOh-NN5PAcB0Nh9eAzk_fIks3Qi2U8CXXHJWdVHClIKUm6ddotwdSGQ6bl6u40-453SAtwWAUnFar-PMvHvR3GM"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Holset</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#HO-449-TB</span
              >
            </div>
            <a href="detalle_productos.html?id=3" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Turboalimentador Holset
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $890.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 32,040.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  3,
                  'Turboalimentador Holset',
                  890.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuCfjrGRNpjkuVD0N23eX_RV6yqwpouLC8EQL7CLZ-gZNbKywWxWd3inP-MVZR2hDLVBek4gxi0S8M2a1vyaRrrNeSO7Az-A9ojG2JNDnWXZYN-Mw4OfOBiPiHfhiudzde1KJUKBh8fLQ5PpswyaEDpkuKbGyHZWkpaF_gyP-Ge3SsLuGxew2xe1VOh-NN5PAcB0Nh9eAzk_fIks3Qi2U8CXXHJWdVHClIKUm6ddotwdSGQ6bl6u40-453SAtwWAUnFar-PMvHvR3GM',
                  'Holset / HO-449-TB',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 4 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="detroit"
        >
          <a href="detalle_productos.html?id=4" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKTyHrPtqEfaH6pvwCGdF7-I4OXbWwSSA0VVvCJ2Hwl55TX8_tQAXdhZ3cVuKigbGzyZ-9DKpo-bpZxXUzYTULV4RtW7N1-xcbkK4iXcnmfLmne7Wibg8iuRbPMF8W5ei2X3VBNRT7AFKcWTsc3vTfr3uB999UrusLMap6SuiZJ6PO7G2VuXBNNEofs60aSnQkzVNb_QrnSr8LjAzwifEWQL2LqQYwDD5786DMWsx1QXI-AQcTGwH6Mw2h-EXOxvVH05pqCGvL8BM"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >EGR</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#EG-221-V</span
              >
            </div>
            <a href="detalle_productos.html?id=4" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Válvula EGR Detroit
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $420.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 15,120.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  4,
                  'Válvula EGR Detroit',
                  420.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuCKTyHrPtqEfaH6pvwCGdF7-I4OXbWwSSA0VVvCJ2Hwl55TX8_tQAXdhZ3cVuKigbGzyZ-9DKpo-bpZxXUzYTULV4RtW7N1-xcbkK4iXcnmfLmne7Wibg8iuRbPMF8W5ei2X3VBNRT7AFKcWTsc3vTfr3uB999UrusLMap6SuiZJ6PO7G2VuXBNNEofs60aSnQkzVNb_QrnSr8LjAzwifEWQL2LqQYwDD5786DMWsx1QXI-AQcTGwH6Mw2h-EXOxvVH05pqCGvL8BM',
                  'EGR / EG-221-V',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 5 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="detroit"
        >
          <a href="detalle_productos.html?id=5" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuB08NxRqet6a7yn-HqiDUbxiUgnO6zzAUIOfOQULzuPrSc5sbGcc-NOprB3VcUd6hzLKSPRKWZJEbCO66ivfnqZb7wHn3mYKgBgrcTPxWa4NgzOoqtEwoEN6e_tiUCddWqLFtTPVRRygYBJ9w6kDBkHXFPOJcJHuhrNy5f2Ic4G3F7XqnFmO5-SJJDGBEc8wmBi2UYrKkd1a06gVhKtgBsUcd4fuwk939GqYI_OdyV4Tmjdu1GntUBwYsaVZRRuT2CbUdV_1sApZrM"
                class="w-full h-full object-cover mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Detroit</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#DD-15-FI</span
              >
            </div>
            <a href="detalle_productos.html?id=5" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Inyector Detroit DD15
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $275.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 9,900.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  5,
                  'Inyector Detroit DD15',
                  275.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuB08NxRqet6a7yn-HqiDUbxiUgnO6zzAUIOfOQULzuPrSc5sbGcc-NOprB3VcUd6hzLKSPRKWZJEbCO66ivfnqZb7wHn3mYKgBgrcTPxWa4NgzOoqtEwoEN6e_tiUCddWqLFtTPVRRygYBJ9w6kDBkHXFPOJcJHuhrNy5f2Ic4G3F7XqnFmO5-SJJDGBEc8wmBi2UYrKkd1a06gVhKtgBsUcd4fuwk939GqYI_OdyV4Tmjdu1GntUBwYsaVZRRuT2CbUdV_1sApZrM',
                  'Detroit / DD-15-FI',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 6 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="international"
        >
          <a href="detalle_productos.html?id=6" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaNx47CBOPWkbJfyEjb6QsZgO1mH3DCa8_MtQ5U0-k4sIcXRThFWPGPzROZKu7K9qxoXzKJ5OqOIPjTMcNyMzOykfg906z7p2uXkC4-czLMsRB6Q05vYAreG6rd0YiNhscyJqRN0gAQuE77ijcNXGZOn_-SG1qaNVZkdrjZm1i09JdPK1dFHQwnmBsJCznX7v2TYKQ0oEM7mWONm7BcflU6mdbl1I91kH5XND1w3w4OvLxerEcfQm5ewo6Uy73f1SeVu0cUpu9Sx4"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >International</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#IT-990-AF</span
              >
            </div>
            <a href="detalle_productos.html?id=6" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Filtro de Aire International
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $65.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 2,340.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  6,
                  'Filtro de Aire International',
                  65.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuDaNx47CBOPWkbJfyEjb6QsZgO1mH3DCa8_MtQ5U0-k4sIcXRThFWPGPzROZKu7K9qxoXzKJ5OqOIPjTMcNyMzOykfg906z7p2uXkC4-czLMsRB6Q05vYAreG6rd0YiNhscyJqRN0gAQuE77ijcNXGZOn_-SG1qaNVZkdrjZm1i09JdPK1dFHQwnmBsJCznX7v2TYKQ0oEM7mWONm7BcflU6mdbl1I91kH5XND1w3w4OvLxerEcfQm5ewo6Uy73f1SeVu0cUpu9Sx4',
                  'International / IT-990-AF',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 7 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="meritor"
        >
          <a href="detalle_productos.html?id=7" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuABkCYWjm5SnVwKp4WKcPniFG1DbN-elQgOxC9k5tpNZzJ0fow6wuHtAW5UBmdhDhQ5ka-sk-Ut5iCIuqstdEKMjg74jOH0mtQ27H4BnHdqoJPbeIF21qxhriZVOJ9u6Cqo7flM4GPe8dJif2MKYmIgVKuJ_KgrBgN7HEjlk0u_Ciw8zzx0KSVCb9Q7yF7B9-dHrMIWBhkEZr2Znha2seW05H4B3VDX4sZiKzygwu-JXeywh1QJrue0TjmWbKqYdqavXBuzzVNOPKQ"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Meritor</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#ME-QP-4515</span
              >
            </div>
            <a href="detalle_productos.html?id=7" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Zapata de Freno Meritor
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $112.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 4,032.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  7,
                  'Zapata de Freno Meritor',
                  112.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuABkCYWjm5SnVwKp4WKcPniFG1DbN-elQgOxC9k5tpNZzJ0fow6wuHtAW5UBmdhDhQ5ka-sk-Ut5iCIuqstdEKMjg74jOH0mtQ27H4BnHdqoJPbeIF21qxhriZVOJ9u6Cqo7flM4GPe8dJif2MKYmIgVKuJ_KgrBgN7HEjlk0u_Ciw8zzx0KSVCb9Q7yF7B9-dHrMIWBhkEZr2Znha2seW05H4B3VDX4sZiKzygwu-JXeywh1QJrue0TjmWbKqYdqavXBuzzVNOPKQ',
                  'Meritor / ME-QP-4515',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 8 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="cummins"
        >
          <a href="detalle_productos.html?id=8" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmnavll6Z2HmryPSzVx-xW3GSKpYRMwee8ADaDsVNpoXQAo_nfR3VIL2cZjzTaG-fCkImeSjIWmIO8i9v6LBoeieLll7gVR77QeWgG0P2KQKpvdG4N_IRSQ3jAep8EU2QgzHHuWWI4mVeSZOHnrDnV4y4YF4wX0fgwdGl38cXSfvPEjWN-D69HWSgWKfs3UJ1kRj9OMGM7gp_8_XRyzBck5ngiHeUlBEWKg2KYxImzQFIhW1QIvQg3ABFB93ZOT6REKDkau2oCmds"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Cummins</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#CU-SN-12</span
              >
            </div>
            <a href="detalle_productos.html?id=8" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Sensor Presión Aceite
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $54.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 1,944.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  8,
                  'Sensor Presión Aceite',
                  54.0,
                  'https://lh3.googleusercontent.com/aida-public/AB6AXuDmnavll6Z2HmryPSzVx-xW3GSKpYRMwee8ADaDsVNpoXQAo_nfR3VIL2cZjzTaG-fCkImeSjIWmIO8i9v6LBoeieLll7gVR77QeWgG0P2KQKpvdG4N_IRSQ3jAep8EU2QgzHHuWWI4mVeSZOHnrDnV4y4YF4wX0fgwdGl38cXSfvPEjWN-D69HWSgWKfs3UJ1kRj9OMGM7gp_8_XRyzBck5ngiHeUlBEWKg2KYxImzQFIhW1QIvQg3ABFB93ZOT6REKDkau2oCmds',
                  'Cummins / CU-SN-12',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 9 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="toyota"
        >
          <a href="detalle_productos.html?id=9" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Toyota</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#TOY-COR-18</span
              >
            </div>
            <a href="detalle_productos.html?id=9" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Filtro de Aceite Toyota Corolla
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $18.50
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 666.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  9,
                  'Filtro de Aceite Toyota Corolla',
                  18.5,
                  '',
                  'Toyota / TOY-COR-18',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 10 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="toyota"
        >
          <a href="detalle_productos.html?id=10" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Toyota</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#TOY-HIL-22</span
              >
            </div>
            <a href="detalle_productos.html?id=10" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Kit Discos de Freno Toyota Hilux
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $125.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 4,500.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  10,
                  'Kit Discos de Freno Toyota Hilux',
                  125.0,
                  '',
                  'Toyota / TOY-HIL-22',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 11 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="toyota"
        >
          <a href="detalle_productos.html?id=11" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Toyota</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#TOY-SPK-04</span
              >
            </div>
            <a href="detalle_productos.html?id=11" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Bujías Encendido Toyota Corolla
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $32.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 1,152.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  11,
                  'Bujías Encendido Toyota Corolla',
                  32.0,
                  '',
                  'Toyota / TOY-SPK-04',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>

        <!-- Part 12 -->
        <article
          class="bg-white border border-outline group overflow-hidden"
          data-category="toyota"
        >
          <a href="detalle_productos.html?id=12" class="block">
            <div
              class="relative aspect-square overflow-hidden bg-stone-50 p-8 flex items-center justify-center"
            >
              <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIn0RkeL7SWo_eG05JQuzVMLn7doFBFF7OpIHfDkWl6wZNAvi_1ZRIdJaIVb7a4iDU4D_xMPMwP1PwALo5h5Ne8BeQ6IYJyR5Toi0SScObpCgrDYb9pJcmIDEu8LMBWvn4ErCt93id7lunEM7-qeA4b_9GAXvUPZ4R2NbJ2iwlpFpnmQqi9yDn3DX6RtOLX6S_nes72O7ZOPAzaUA_laYrmrxqNDUBi9HF74lajrW3XH8c3vNOglhQV_mA3b7yPUnw_7OzGx-fL4k"
                class="w-full h-full object-contain mix-blend-multiply transition-transform duration-700 group-hover:scale-110"
              />
            </div>
          </a>
          <div class="p-6">
            <div class="flex justify-between items-start mb-2">
              <span
                class="text-[10px] font-black text-primary uppercase tracking-widest"
                >Toyota</span
              >
              <span class="text-[10px] font-mono font-bold text-stone-400"
                >#TOY-AIR-19</span
              >
            </div>
            <a href="detalle_productos.html?id=12" class="block">
              <h3
                class="text-xl font-black uppercase tracking-tight mb-4 group-hover:text-primary transition-colors"
              >
                Filtro de Aire Toyota Corolla
              </h3>
            </a>
            <div class="mb-6">
              <p class="text-3xl font-black text-black tracking-tighter">
                $24.00
              </p>
              <p
                class="text-[10px] font-bold text-stone-400 uppercase tracking-widest"
              >
                Bs. 864.00 aprox.
              </p>
            </div>
            <button
              onclick="
                addToCart(
                  12,
                  'Filtro de Aire Toyota Corolla',
                  24.0,
                  '',
                  'Toyota / TOY-AIR-19',
                )
              "
              class="w-full bg-black text-white hover:bg-primary hover:text-black py-4 font-black uppercase text-[10px] tracking-[0.2em] flex items-center justify-center gap-3 transition-all"
            >
              <span class="material-symbols-outlined text-lg"
                >add_shopping_cart</span
              >
              Agregar al Carrito
            </button>
          </div>
        </article>
      </div>
    </main>

    <!-- Features Section -->
    <section class="bg-black py-24 px-6 text-white border-y border-stone-800">
      <div
        class="max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12"
      >
        <div class="flex flex-col gap-4">
          <span class="material-symbols-outlined text-primary text-5xl"
            >precision_manufacturing</span
          >
          <h4 class="text-2xl font-black uppercase tracking-tight">
            Estándares O.E.M.
          </h4>
          <p class="text-stone-400 text-sm leading-relaxed font-medium">
            Todas las piezas cumplen o superan las especificaciones del
            fabricante de equipo original para aplicaciones industriales
            críticas.
          </p>
        </div>
        <div class="flex flex-col gap-4">
          <span class="material-symbols-outlined text-primary text-5xl"
            >local_shipping</span
          >
          <h4 class="text-2xl font-black uppercase tracking-tight">
            Logística Rápida
          </h4>
          <p class="text-stone-400 text-sm leading-relaxed font-medium">
            Distribución estratégica desde Valencia garantiza cobertura nacional
            y tiempo de inactividad mínimo para su flota.
          </p>
        </div>
        <div class="flex flex-col gap-4">
          <span class="material-symbols-outlined text-primary text-5xl"
            >verified</span
          >
          <h4 class="text-2xl font-black uppercase tracking-tight">
            Soporte Experto
          </h4>
          <p class="text-stone-400 text-sm leading-relaxed font-medium">
            Nuestro equipo técnico proporciona consulta especializada para
            compatibilidad de motores y mantenimiento.
          </p>
        </div>
      </div>
    </section>

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
@endsection

@push('scripts')
    <script src="js/catalogo_general.js"></script>
@endpush
