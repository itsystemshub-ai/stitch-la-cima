@extends('layouts.erp')

@section('title', 'Sincronizador Access | Mayor de Repuesto La Cima, C.A.')
@section('breadcrumb_active', 'Sincronizador')

@section('content')
    <div class="px-5 py-6 border-b border-stone-200 bg-white flex justify-between items-center sticky top-0 z-40 shadow-sm rounded-t-2xl">
        <h1 class="text-2xl font-headline font-black text-stone-900 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">sync</span>
            Sincronización Avanzada (DB Legacy)
        </h1>
    </div>

    <div class="p-6 md:p-10 max-w-4xl w-full">
        <div class="bg-white p-8 rounded-b-2xl rounded-tr-2xl shadow-sm border border-stone-200">
            <div class="mb-8">
                <h2 class="text-xl font-headline font-bold text-stone-900 mb-2">Motor de Extracción ODBC (Access -> MySQL)</h2>
                <p class="text-sm text-stone-500">Sube el archivo <code>CIMA2026.accdb</code> para sincronizar automáticamente el Inventario, Clientes y Lista de Precios de tu sistema Legacy a la nube.</p>
            </div>

            <!-- Zona de Carga -->
            <form id="syncForm" class="space-y-6">
                <!-- CSRF Token Laravel -->
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="border-2 border-dashed border-stone-300 rounded-xl p-10 text-center hover:bg-stone-50 transition-colors">
                    <span class="material-symbols-outlined text-5xl text-stone-400 mb-4 block">database</span>
                    <h3 class="text-stone-900 font-bold mb-1">Cargar Archivo Microsoft Access</h3>
                    <p class="text-xs text-stone-500 mb-4">Soporta: .accdb o .mdb (Max 100MB)</p>
                    
                    <input type="file" id="accdbFile" accept=".accdb, .mdb" class="hidden">
                    <button type="button" onclick="document.getElementById('accdbFile').click()" class="bg-black text-white px-6 py-2 rounded-lg text-sm font-bold shadow-md hover:-translate-y-0.5 transition-transform">
                        Seleccionar Archivo
                    </button>
                    <p id="fileNameDisplay" class="mt-4 text-xs font-mono font-bold text-primary bg-black inline-block px-2 py-1 rounded hidden"></p>
                </div>

                <div id="progressArea" class="hidden">
                    <div class="flex justify-between text-xs font-bold mb-1">
                        <span>Extrayendo Datos...</span>
                        <span id="progressText">0%</span>
                    </div>
                    <div class="w-full bg-stone-200 rounded-full h-2">
                        <div id="progressBar" class="bg-primary h-2 rounded-full" style="width: 0%"></div>
                    </div>
                </div>

                <div id="resultMessage" class="hidden p-4 rounded-lg text-sm font-bold"></div>

                <div class="flex justify-end gap-3">
                    <button type="reset" class="px-4 py-2 text-sm font-bold text-stone-500 hover:text-black">Cancelar</button>
                    <button type="submit" id="submitBtn" disabled class="bg-primary text-black px-6 py-2 rounded-lg text-sm font-bold opacity-50 cursor-not-allowed transition-all">Sincronizar a la Nube</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@stack('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('accdbFile');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const submitBtn = document.getElementById('submitBtn');
        const form = document.getElementById('syncForm');
        const progressArea = document.getElementById('progressArea');
        const progressBar = document.getElementById('progressBar');
        const resultMessage = document.getElementById('resultMessage');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileNameDisplay.textContent = this.files[0].name;
                fileNameDisplay.classList.remove('hidden');
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        });

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            if (!fileInput.files[0]) return;

            // UI Feedback
            submitBtn.disabled = true;
            progressArea.classList.remove('hidden');
            resultMessage.classList.add('hidden');
            progressBar.style.width = '30%';

            const formData = new FormData();
            formData.append('accdb_file', fileInput.files[0]);

            try {
                // Animación simulada de procesamiento antes del request real
                setTimeout(() => { progressBar.style.width = '60%'; }, 1000);

                // Fetch a nuestra API route asegurada
                const response = await fetch('/erp/sync/upload-accdb', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });

                const data = await response.json();
                progressBar.style.width = '100%';
                
                resultMessage.classList.remove('hidden', 'bg-red-50', 'text-red-700');
                if (response.ok) {
                    resultMessage.classList.add('bg-green-50', 'text-green-700');
                    resultMessage.innerHTML = `<span class="material-symbols-outlined align-middle mr-2">check_circle</span> ${data.message}`;
                } else {
                    throw new Error(data.message || 'Error en validación Server');
                }

            } catch (error) {
                progressBar.style.width = '0%';
                resultMessage.classList.remove('hidden', 'bg-green-50', 'text-green-700');
                resultMessage.classList.add('bg-red-50', 'text-red-700');
                resultMessage.innerHTML = `<span class="material-symbols-outlined align-middle mr-2">error</span> Error Crítico: ${error.message}`;
            }
        });
    });
</script>
