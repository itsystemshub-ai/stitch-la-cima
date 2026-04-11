@extends('layouts.ecommerce')

@section('title', 'Catálogo Detallado | Mayor de Repuesto LA CIMA, C.A.')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/ecommerce/css/catalogo_detallado.css">
@endpush

@section('content')
<main class="flex-grow pt-24 pb-12 px-6 max-w-[1920px] mx-auto w-full">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-72 flex-shrink-0 space-y-8">
            <div class="bg-white border border-outline p-6 rounded-lg shadow-sm">
                <h2 class="font-headline text-lg font-bold uppercase tracking-tighter mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">filter_list</span>
                    Filtrado Técnico
                </h2>
                <div class="space-y-6">
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest">Tipo de Motor</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Diesel V8 Heavy Duty</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input checked="" class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Inline 6 Turbo</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary" type="checkbox"/>
                                <span class="text-sm font-medium group-hover:text-primary transition-colors">Gas Turbine Aux</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest text-[#5a5c5e]">Marca / Fabricante</label>
                        <select class="w-full bg-stone-100 border-none rounded-lg text-sm p-3 focus:ring-2 focus:ring-primary">
                            <option>Cummins Engine Co.</option>
                            <option>Volvo Penta</option>
                            <option>Caterpillar Inc.</option>
                            <option>Detroit Diesel</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-headline text-xs font-bold uppercase text-on-surface-variant block mb-3 tracking-widest text-[#5a5c5e]">Tipo de Maquinaria</label>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">Excavator</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded bg-primary text-black uppercase">Truck</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">Marine</button>
                            <button class="p-2 text-xs font-bold border border-outline rounded hover:bg-black hover:text-white transition-all uppercase">GenSet</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Support Card -->
            <div class="bg-black text-white p-6 rounded-lg relative overflow-hidden group">
                <div class="relative z-10">
                    <h3 class="font-headline text-xl font-black uppercase leading-none mb-2 text-primary">Soporte Técnico</h3>
                    <p class="text-stone-400 text-xs mb-4">Piezas críticas y asistencia en instalación industrial.</p>
                    <button class="text-primary text-xs font-bold uppercase flex items-center gap-1 group-hover:gap-2 transition-all">
                        Hablar con Ingeniero
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">engineering</span>
                </div>
            </div>
        </aside>

        <!-- Product Listing -->
        <section class="flex-grow">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="text-primary font-bold text-xs uppercase tracking-widest block mb-1">Precision Inventory</span>
                    <h1 class="font-headline text-4xl font-black uppercase tracking-tighter">Catálogo Completo</h1>
                </div>
                <div class="text-right">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Mostrando 12 de 842 Items</p>
                    <div class="flex gap-2 mt-2 justify-end">
                        <button id="gridViewBtn" class="view-btn active w-8 h-8 flex items-center justify-center bg-black text-white rounded" onclick="switchToGrid()"><span class="material-symbols-outlined text-sm">grid_view</span></button>
                        <button id="listViewBtn" class="view-btn w-8 h-8 flex items-center justify-center text-on-surface-variant hover:bg-stone-200 rounded transition-colors" onclick="switchToList()"><span class="material-symbols-outlined text-sm">list</span></button>
                    </div>
                </div>
            </div>

            <div id="productGrid" class="editorial-grid">
                <!-- 1 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwVKDQ8J7uUIFrNwpCuRmbejTuDOgw9_vpIwmz0wCrb4RslhmWPIoHV-t9eB4FyM3zcmveZ6mYBdAXGjvwj1FHk7cEEzeYIktIFoXowi9VI-JA1CWSp_qrVPgv7Xb9_V6w8wnpIIJnoESwkpmJqeE9LP1q4_Wz96dbs7VcbstxzQiEDaxroiRcqohgVDXieSFSCkDwngw0mknMmsdwRC3JB4obyrVRzYkfHNUbN9wshqpV_XyeF9RIy3vmSk3NTwq-ekPZ-C2wVUQ" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-xs font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: CUM-9928-HJ</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Junta de culata Cummins QSB6.7</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$284.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 2 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQKD29s0z6GuS4uPSiUeQyw70ldIFl3871UjP1-u9TQTaoCIMjKqWVYf7vjLiRsk-6ggNcyvjOtMnh0Mdju6jWKG76OQKCbleekn-DTwlFAGhQGfIXROTK57Phh8C0XzugExcdoE7eGfV5Li66UjyA7Sw8tByNp7MulgucBI1tD5xgkPM-viyQr1WLFdmyQNTjZOo1QzliRygUM3ddoPLKdvFd6ifJrPGWai6WB6d2pnrTotXOVPtPuWBJu1GO7m7nCGbmB_13mek" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: VOL-P901-LP</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Filtro de Aceite Volvo Penta D13</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$45.50</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 3 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbPP-XFkK6zkczQlnJ0syN052qGxQ9Rj-hlorwmbSZIobuLFXOel2ZMx0xu6dwLm9-7Ubl0F2lzgVQ9DmZ9aBpYK8U6OEIRoY7anE1Esb-iCtFH7QjfwnGbXQqUkSaEkdrFKthlP8ErjHnt8sdiQWx4hVhDWfz79PgQ5U5869M8Wvi6zCxv6CSXXNqnUgGKIIQF2s1hQvlIJcaEfVIfzhL9lTiMBPL-6dmN6QYh7jai-A4a8yMUvreZnN2WsiryiSjUCufA4sWu3I" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: CAT-T40-99</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Turbocargador Caterpillar C15</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$1,420.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 4 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIn0RkeL7SWo_eG05JQuzVMLn7doFBFF7OpIHfDkWl6wZNAvi_1ZRIdJaIVb7a4iDU4D_xMPMwP1PwALo5h5Ne8BeQ6IYJyR5Toi0SScObpCgrDYb9pJcmIDEu8LMBWvn4ErCt93id7lunEM7-qeA4b_9GAXvUPZ4R2NbJ2iwlpFpnmQqi9yDn3DX6RtOLX6S_nes72O7ZOPAzaUA_laYrmrxqNDUBi9HF74lajrW3XH8c3vNOglhQV_mA3b7yPUnw_7OzGx-fL4k" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: DEL-24V-HD</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Alternador 24V Detroit Diesel</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$312.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 5 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcq0FTn4sixsza9CVtPOnPKQJov8Ui8XYA3uGRpWC4LDD1Ze8Gg-2xj-O9jKECyJsf6PWKzcAP587qr46eOqqlv0ITwFAOGg9qxHstfdMaVcO13OY1Y43qVQhaQL0N9fEioYTxTcnUjuYC2VZLrFJAgMr_d9gGNwMWkd5tTzJ94ESTCuNWfpLOavRKnF76xuxrOANZKwOUUtEEqpu5exJOvPc5wGxgjew4_6X2fRisUN82VMogfrxsFPZqweCdlMiG8PcxWexovxQ" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: BOS-6701-IN</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Inyector Bosch Common Rail</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$580.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 6 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWEohmAw6eWxzZ0isaHUZlU9cOvgrjklSgykQalVfOYZjL7qpFC9-FV6LmS9RIY5UcJfa-IDSmjpStTpdObb10qNTIOJuZpo-VXSDINLYw_NacgWn7-C6XvF7I6UnQoSXSOgNfqitJ1gcjbw5DdAiBmXQX89pAwFe1_5df3bM8k3-weKsaPWlmyLHvLBLkb0ywwgbPXjfB1kWHVmNfCx5gdA5eB-GuYD_aiBMLpQb2oSH1PQdn7qfRneQGFFuTAQUR1gzSjZQ4ahs" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: CUM-PIS-6</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Kit de Pistones Cummins N14</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$1,150.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 7 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvii9sNQqqDnze22RTwuNH4tSqUrMSJEXQ_FZFjPwG7dYtpNrQJAq0iwera4ziKWQKtyKYIL3Msi0Ss1lb_0rAdSz18URZSXeNKR778JJHXa9fh-w_0xuxoiVzGWVmi51yNMm5KiF0vGlydUl4uQOHa2rxq6mLGP-mxNA4hDD6OPLg6oq6Bc1XiiwKu8x-iLpFbE2WTYWPtUz4UsWUlPEbLEvWMu82shO_LQJ9o2VuAd2XKqP2YRA3aO_XtOwzJ8hZqiF8RgaCt5U" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: PER-BR-50</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Cojinetes de Bancada Perkins</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$185.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 8 -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnCBaJGHx-KHBLQMmi3di8svfE3nGssoVmApRyiRUq5UrT_y5Pmr6_1ffSS1IY-q5a5uldF0WDPUwWSd54IKetwTlV9chBnwD3zo5BSzAt6P6ztwcNISdloAaVQmOHdN3yZEDhMG7zUUIvZIckDDA4jU0vV0JDZnPJkVr9QulcoKSKbKqwfuLrXrypbTwNii03VYK3j6peId5g5vf6YclbW5jlhIr8u00SlBVCPvoW_1L0z6FOb_TeDtNKLKbNdpjPqlAEdSaZkXA" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: KOM-CAM-10</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Árbol de Levas Komatsu SAA6D</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$940.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 9 - Toyota Corolla -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col" data-tags="toyota corolla sedan motor filtro aceite">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: TOY-COR-18</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Filtro de Aceite Toyota Corolla 2018-2024</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$18.50</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 10 - Toyota Hilux -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col" data-tags="toyota hilux pickup camioneta freno disco">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: TOY-HIL-22</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Kit de Discos de Freno Toyota Hilux 2020-2024</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$125.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 11 - Toyota Corolla Bujías -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col" data-tags="toyota corolla bujia encendido motor">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: TOY-SPK-04</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Bujías de Encendido Toyota Corolla 1.8L</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$32.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- 12 - Toyota Filtro Aire -->
                <article class="bg-white border border-outline rounded-xl overflow-hidden hover:shadow-xl transition-all group flex flex-col" data-tags="toyota corolla filtro aire motor mantenimiento">
                    <div class="aspect-square bg-stone-100 relative overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIn0RkeL7SWo_eG05JQuzVMLn7doFBFF7OpIHfDkWl6wZNAvi_1ZRIdJaIVb7a4iDU4D_xMPMwP1PwALo5h5Ne8BeQ6IYJyR5Toi0SScObpCgrDYb9pJcmIDEu8LMBWvn4ErCt93id7lunEM7-qeA4b_9GAXvUPZ4R2NbJ2iwlpFpnmQqi9yDn3DX6RtOLX6S_nes72O7ZOPAzaUA_laYrmrxqNDUBi9HF74lajrW3XH8c3vNOglhQV_mA3b7yPUnw_7OzGx-fL4k" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-[10px] font-black uppercase text-on-surface-variant tracking-widest mb-1 text-primary">SKU: TOY-AIR-19</p>
                        <h3 class="text-lg font-bold uppercase tracking-tight mb-4 group-hover:text-primary transition-colors">Filtro de Aire Toyota Corolla 2019-2024</h3>
                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-xl font-black text-black tracking-tighter">$24.00</span>
                            <button class="bg-black text-white p-2 rounded-lg hover:bg-primary hover:text-black transition-colors">
                                <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center items-center gap-4">
                <button class="w-10 h-10 flex items-center justify-center rounded border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <div class="flex items-center gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded bg-black text-primary font-bold">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">3</button>
                    <span class="px-2 text-stone-400">...</span>
                    <button class="w-10 h-10 flex items-center justify-center rounded border border-outline hover:border-primary font-bold">24</button>
                </div>
                <button class="w-10 h-10 flex items-center justify-center rounded border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>

            <!-- Technical Compatibility Table (RESTORING DATA) -->
            <div class="mt-24">
                <h2 class="font-headline text-2xl font-bold uppercase tracking-widest mb-8 flex items-center gap-4">
                    <span class="w-12 h-[2px] bg-primary"></span>
                    Compatibilidad Técnica
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="font-headline uppercase text-xs tracking-widest text-on-surface-variant border-b border-outline">
                            <tr>
                                <th class="pb-4 px-4 font-black">Componente</th>
                                <th class="pb-4 px-4 font-black">Marca Compatible</th>
                                <th class="pb-4 px-4 font-black">Origen</th>
                                <th class="pb-4 px-4 font-black">Certificación</th>
                                <th class="pb-4 px-4 font-black">Disponibilidad</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="bg-white hover:bg-stone-50 transition-colors border-b border-outline">
                                <td class="py-4 px-4 font-bold">Inyectores de Combustible</td>
                                <td class="py-4 px-4">CAT / Perkins</td>
                                <td class="py-4 px-4">USA / Germany</td>
                                <td class="py-4 px-4 font-medium uppercase text-xs">OEM Specification</td>
                                <td class="py-4 px-4 text-primary font-bold">In Stock</td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50 transition-colors border-b border-outline">
                                <td class="py-4 px-4 font-bold">Kits de Empacadura</td>
                                <td class="py-4 px-4">Detroit Diesel</td>
                                <td class="py-4 px-4">USA</td>
                                <td class="py-4 px-4 font-medium uppercase text-[10px]">SAE Standard</td>
                                <td class="py-4 px-4 text-primary font-bold">In Stock</td>
                            </tr>
                            <tr class="bg-white hover:bg-stone-50 transition-colors">
                                <td class="py-4 px-4 font-bold">Bombas de Agua</td>
                                <td class="py-4 px-4">Mack / Volvo</td>
                                <td class="py-4 px-4">Brazil</td>
                                <td class="py-4 px-4 font-medium uppercase text-[10px]">Heavy Duty Grade</td>
                                <td class="py-4 px-4 text-red-600 font-bold">Low Stock</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/ecommerce/js/catalogo_detallado.js"></script>
@endpush
