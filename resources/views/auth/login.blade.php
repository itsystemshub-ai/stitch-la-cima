<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Acceso Corporativo | Zenith Platinum</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        luxury: {
                            base: "#fcfcfc",
                            border: "#f1f1f1",
                            text: "#111111",
                            muted: "#888888"
                        }
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        display: ["Outfit", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #fcfcfc; color: #111; overflow-x: hidden; }
        .frost-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.08);
        }
        .input-luxury {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .input-luxury:focus {
            border-color: #111;
            box-shadow: 0 0 0 4px rgba(0,0,0,0.02);
            transform: translateY(-1px);
        }
        .btn-luxury {
            background: #111111;
            color: #ffffff;
            transition: all 0.3s ease;
        }
        .btn-luxury:hover {
            background: #000;
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        @keyframes reveal {
            from { opacity: 0; transform: scale(0.98) translateY(10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        .animate-reveal { animation: reveal 1s cubic-bezier(0.2, 1, 0.3, 1) forwards; }
    </style>
</head>
<body class="font-sans antialiased selection:bg-black selection:text-white">
    <!-- Sophisticated background pattern -->
    <div class="fixed inset-0 z-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(#000 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>

    <main class="relative z-10 min-h-screen flex items-center justify-center p-6">
        <div class="max-w-[460px] w-full animate-reveal">
            <!-- Header section -->
            <div class="text-center mb-10">
                <div class="mb-6 flex justify-center">
                    <div class="w-14 h-14 bg-white border border- luxury-border rounded-2xl flex items-center justify-center shadow-sm">
                        <span class="material-symbols-outlined text-3xl font-light">account_circle</span>
                    </div>
                </div>
                <h1 class="font-display text-4xl font-black uppercase tracking-[-0.04em] text-luxury-text mb-1 italic">
                    ZENITH<span class="font-light opacity-30 tracking-tight">PLATINUM</span>
                </h1>
                <p class="text-[10px] font-black text-luxury-muted uppercase tracking-[0.4em]">Corporate Access Terminal • v6.1</p>
            </div>

            <!-- Login Container -->
            <div class="frost-card rounded-[40px] p-12 relative">
                <div class="mb-10">
                    <h2 class="text-[22px] font-black tracking-tight text-luxury-text">Inicie su sesión</h2>
                    <p class="text-xs text-luxury-muted mt-1">Gestión corporativa y comercial de alto nivel.</p>
                </div>

                <form class="space-y-7" method="POST" action="{{ url('/auth/login') }}">
                    @csrf
                    <!-- Identity Input -->
                    <div class="space-y-3">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-luxury-text/40 ml-1">Dirección de correo</label>
                        <div class="relative group">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 material-symbols-outlined text-luxury-muted text-lg group-focus-within:text-black transition-colors">alternate_email</span>
                            <input name="email" class="input-luxury w-full pl-14 pr-6 py-4 rounded-2xl outline-none text-[15px] font-medium" placeholder="usuario@zenith.com" type="email" value="{{ old('email') }}" required autofocus/>
                        </div>
                    </div>

                    <!-- Security Key Input -->
                    <div class="space-y-3">
                        <div class="flex justify-between items-center px-1">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-luxury-text/40">Clave de seguridad</label>
                            <a href="#" class="text-[9px] font-black uppercase text-luxury-muted hover:text-black transition-colors tracking-widest">Recuperar</a>
                        </div>
                        <div class="relative group" x-data="{ show: false }">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 material-symbols-outlined text-luxury-muted text-lg group-focus-within:text-black transition-colors">fingerprint</span>
                            <input id="password" name="password" class="input-luxury w-full pl-14 pr-14 py-4 rounded-2xl outline-none text-[15px] font-medium" placeholder="••••••••" type="password" required/>
                            <button type="button" onclick="togglePassword()" class="absolute right-5 top-1/2 -translate-y-1/2 text-luxury-muted hover:text-black transition-colors">
                                <span id="toggleIcon" class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center gap-3 px-1">
                        <input name="remember" type="checkbox" class="w-4 h-4 rounded border-luxury-border text-black focus:ring-black/5 transition-all"/>
                        <span class="text-[10px] font-black text-luxury-muted uppercase tracking-[0.1em]">Recordar identidad comercial</span>
                    </div>

                    <!-- Action Button -->
                    <button class="btn-luxury w-full py-5 rounded-2xl font-display font-black uppercase tracking-[0.25em] text-xs flex items-center justify-center gap-4 group active:scale-[0.98]" type="submit">
                        AUTENTICAR ACCESO
                        <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">login</span>
                    </button>
                </form>

                <!-- System Info -->
                <div class="mt-12 pt-8 border-t border- luxury-border flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="flex -space-x-2">
                            <div class="w-6 h-6 rounded-full bg-stone-100 border-2 border-white"></div>
                            <div class="w-6 h-6 rounded-full bg-stone-200 border-2 border-white"></div>
                        </div>
                        <span class="text-[9px] font-black text-luxury-muted uppercase tracking-widest italic">Sesión Segura TLS 1.3</span>
                    </div>
                    <span class="text-[10px] font-black text-luxury-text opacity-10">ZNT-PRM</span>
                </div>
            </div>

            <!-- Global Footer -->
            <div class="mt-10 text-center space-y-4">
                <p class="text-[9px] font-bold text-luxury-muted uppercase tracking-[0.4em] leading-loose">
                    Protegido por Zenith Shield™ • 2026 LA CIMA C.A.<br/>
                    Sistema de Gestión de Recursos Empresariales
                </p>
                <div class="flex justify-center gap-6">
                    <span class="text-[8px] font-black uppercase text-luxury-muted/40 tracking-widest cursor-pointer hover:text-black transition-colors">Términos</span>
                    <span class="text-[8px] font-black uppercase text-luxury-muted/40 tracking-widest cursor-pointer hover:text-black transition-colors">Privacidad</span>
                    <span class="text-[8px] font-black uppercase text-luxury-muted/40 tracking-widest cursor-pointer hover:text-black transition-colors">Soporte</span>
                </div>
            </div>
        </div>
    </main>

    <script>
        function togglePassword() {
            const pass = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (pass.type === 'password') {
                pass.type = 'text';
                icon.innerText = 'visibility_off';
            } else {
                pass.type = 'password';
                icon.innerText = 'visibility';
            }
        }
    </script>
</body>
</html>