@extends('erp.layouts.app')

@section('title', 'Carga Masiva de Precios & Existencias')

@push('styles')
<style>
    .drop-zone {
        transition: all 0.3s ease;
    }
    .drop-zone--over {
        border-color: #f7d54d !important;
        background: rgba(247, 213, 77, 0.05) !important;
        transform: scale(1.01);
    }
</style>
@endpush

@section('breadcrumb')
    <a href="{{ url('/erp/dashboard') }}" class="hover:text-stone-900 transition-colors">ERP</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="hover:text-stone-900 transition-colors">Inventario</a>
    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
    <span class="text-stone-900">Lista de Precios</span>
@endsection

@section('content')
    <!-- Alert System for Feedback -->
    <div class="mb-6">
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-600 p-6 rounded-[24px] flex items-center gap-4 animate-in fade-in slide-in-from-top-4 duration-500">
                <span class="material-symbols-outlined text-green-500">check_circle</span>
                <p class="text-[11px] font-black uppercase tracking-widest">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/20 text-red-600 p-6 rounded-[24px] flex items-center gap-4 animate-in fade-in slide-in-from-top-4 duration-500">
                <span class="material-symbols-outlined text-red-500">error</span>
                <p class="text-[11px] font-black uppercase tracking-widest">{{ session('error') }}</p>
            </div>
        @endif
    </div>

    <!-- Page Header: High-Performance Bulk Operations -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-10 pb-8 border-b border-stone-100">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="w-8 h-[2px] bg-primary"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Gestión de Valorización Global</p>
            </div>
            <h1 class="text-5xl font-headline font-black text-stone-900 tracking-tighter uppercase leading-none">Lista de <span class="text-stone-400">Precios</span></h1>
            <p class="text-xs text-stone-400 mt-2 font-medium uppercase tracking-widest text-[#9ca3af]">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-3">
             <button id="downloadTemplate" class="bg-white border border-stone-200 text-stone-900 px-8 py-4 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:border-primary transition-all rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-lg">download</span>
                Descargar Plantilla
            </button>
        </div>
    </div>

    <!-- Live Sync Status -->
    <div class="grid grid-cols-12 gap-8 mb-12">
        <div class="col-span-12 lg:col-span-8 bg-white border border-stone-200 rounded-[40px] p-10 relative overflow-hidden flex flex-col justify-between min-h-[400px] shadow-sm">
            <div class="absolute -right-10 -bottom-10 opacity-[0.03]">
                <span class="material-symbols-outlined text-[200px] text-stone-900">cloud_upload</span>
            </div>
            
            <div class="relative z-10 w-full h-full flex flex-col">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.4em] mb-4">Procesador de Lotes Inteligente (.xlsx / .xls)</p>
                
                <div id="dropZone" class="flex-1 border-2 border-dashed border-stone-100 rounded-[32px] flex flex-col items-center justify-center p-8 cursor-pointer drop-zone hover:border-primary group transition-all bg-stone-50/30">
                    <input type="file" id="fileInput" class="hidden" accept=".xlsx, .xls">
                    <div id="dropZoneUI" class="text-center">
                        <span class="material-symbols-outlined text-6xl text-stone-200 group-hover:text-primary transition-colors mb-4">upload_file</span>
                        <h4 class="text-stone-900 font-headline font-bold text-xl uppercase tracking-tight">Arrastra tu Excel aquí</h4>
                        <p class="text-stone-400 text-[10px] uppercase font-bold tracking-widest mt-2">O haz click para seleccionar el archivo oficial</p>
                    </div>
                    <div id="fileInfo" class="hidden text-center">
                        <span class="material-symbols-outlined text-6xl text-primary mb-4">description</span>
                        <h4 id="fileName" class="text-stone-900 font-headline font-bold text-xl uppercase tracking-tight">nombre_archivo.xlsx</h4>
                        <p id="fileSize" class="text-primary text-[10px] uppercase font-bold tracking-widest mt-2">0.0 MB</p>
                        <button id="removeFile" class="mt-4 text-[10px] font-black text-red-500 uppercase hover:text-red-600 transition-colors">Quitar archivo</button>
                    </div>
                </div>

                <form id="massUpdateForm" action="{{ route('erp.inventario.lista-precios.update') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="excel_data" id="excelDataInput">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                            </span>
                            <span class="text-[10px] font-black text-stone-900 uppercase tracking-widest">Pre-procesamiento en cliente: <span class="text-primary">ACTIVO</span></span>
                        </div>
                        <button type="submit" id="submitBtn" disabled class="bg-stone-100 text-stone-400 px-10 py-4 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all cursor-not-allowed">
                            Sincronizar Lote Digital
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 flex flex-col gap-6">
            <div class="bg-white border border-stone-200 p-8 rounded-[32px] shadow-sm flex-1 group">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-4">Última Actualización</p>
                <h3 class="text-3xl font-headline font-black text-stone-900 uppercase leading-tight group-hover:text-primary transition-colors">{{ $stats['last_sync'] }}</h3>
                <p class="text-[10px] text-stone-500 mt-2 font-bold uppercase">Base de Datos Centralizada</p>
            </div>
            <div class="bg-primary border border-primary p-8 rounded-[32px] shadow-sm flex-1 group hover:bg-stone-900 transition-all duration-500 cursor-pointer">
                <p class="text-[10px] font-black text-stone-900 group-hover:text-primary uppercase tracking-widest mb-4">Items en Maestro</p>
                <h3 id="itemsToProcess" class="text-5xl font-headline font-black text-stone-900 group-hover:text-white uppercase leading-tight tracking-tighter">{{ number_format($stats['total_items']) }}</h3>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-[10px] font-black text-stone-900/60 group-hover:text-primary/60 uppercase">Detección de Columnas</span>
                    <span class="material-symbols-outlined text-stone-900 group-hover:text-primary">check_circle</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Integrity Dashboard: Preview Table -->
    <section class="bg-white border border-stone-200 rounded-[32px] shadow-sm overflow-hidden mb-12">
        <div class="p-8 border-b border-stone-50 flex justify-between items-center">
            <h3 class="text-[10px] font-black text-stone-900 uppercase tracking-[0.2em]">Pre-visualización de Datos (Excel Oficial)</h3>
            <div class="flex gap-4">
                <button type="button" onclick="location.reload()" class="text-[10px] font-black text-stone-400 uppercase hover:text-red-500 transition-colors">Limpiar Vista</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[2000px]">
                <thead>
                    <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-400">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center italic">N°</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Foto</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Código</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Categoría</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Fabricante</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Marca</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Material</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Espesor</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest">Descripción</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Medidas</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-right">Precio</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Stock</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-center">Incorporación</th>
                    </tr>
                </thead>
                <tbody id="previewTableBody" class="divide-y divide-stone-50 font-body text-xs">
                    @forelse($stats['latest_changes'] as $product)
                    <tr class="hover:bg-stone-50 transition-colors opacity-80">
                        <td class="p-6 text-center text-stone-400 font-mono">{{ $product->id }}</td>
                        <td class="p-6">
                            <div class="w-10 h-10 bg-stone-100 rounded-lg flex items-center justify-center overflow-hidden">
                                @if($product->foto_path)
                                    <img src="{{ $product->foto_path }}" class="w-full h-full object-cover">
                                @else
                                    <span class="material-symbols-outlined text-stone-300">image</span>
                                @endif
                            </div>
                        </td>
                        <td class="p-6 font-black text-stone-900 uppercase tracking-tighter">{{ $product->codigo_oem }}</td>
                        <td class="p-6 uppercase text-stone-500">{{ $product->categoria }}</td>
                        <td class="p-6 text-center uppercase text-stone-500 font-bold">{{ $product->fabricante ?? '-' }}</td>
                        <td class="p-6 text-center font-bold text-stone-900 uppercase">{{ $product->marca }}</td>
                        <td class="p-6 text-center text-stone-500 uppercase">{{ $product->material ?? '-' }}</td>
                        <td class="p-6 text-center font-mono text-stone-500">{{ $product->espesor ?? '-' }}</td>
                        <td class="p-6 font-medium text-stone-700 uppercase max-w-[300px] truncate">{{ $product->nombre }}</td>
                        <td class="p-6 text-center font-mono text-stone-500">{{ $product->medidas ?? '-' }}</td>
                        <td class="p-6 text-right font-headline font-black text-stone-900 text-base">$ {{ number_format($product->precio_mayor, 2) }}</td>
                        <td class="p-6 text-center font-black {{ $product->stock_actual > 0 ? 'text-stone-900' : 'text-red-500' }}">{{ $product->stock_actual }}</td>
                        <td class="p-6 text-center text-stone-400 text-[10px] uppercase font-bold">{{ $product->updated_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" class="p-20 text-center text-stone-400 italic font-medium">Sube un archivo para pre-visualizar la información aquí...</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const dropZoneUI = document.getElementById('dropZoneUI');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const itemsCount = document.getElementById('itemsToProcess');
    const previewBody = document.getElementById('previewTableBody');
    const excelDataInput = document.getElementById('excelDataInput');
    const submitBtn = document.getElementById('submitBtn');

    // Click to select
    dropZone.addEventListener('click', () => fileInput.click());

    // Drag and drop handlers
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('drop-zone--over'));
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('drop-zone--over'));
    });

    dropZone.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        if (files.length) handleFile(files[0]);
    });

    fileInput.addEventListener('change', e => {
        if (e.target.files.length) handleFile(e.target.files[0]);
    });

    function handleFile(file) {
        // UI Update
        fileName.textContent = file.name;
        fileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
        dropZoneUI.classList.add('hidden');
        fileInfo.classList.remove('hidden');

        // Excel Reading
        const reader = new FileReader();
        reader.onload = function(e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, {type: 'array'});
            const firstSheet = workbook.SheetNames[0];
            const worksheet = workbook.Sheets[firstSheet];
            const jsonData = XLSX.utils.sheet_to_json(worksheet, {header: 1});

            processExcelData(jsonData);
        };
        reader.readAsArrayBuffer(file);
    }

    function processExcelData(rows) {
        if (rows.length < 2) {
            alert('El archivo parece estar vacío o no contiene suficientes filas.');
            return;
        }

        // Get headers (first row with data)
        let headerRow = rows[0];
        let dataRows = rows.slice(1);

        console.log("Headers detectados:", headerRow);

        // Map column indices based on the user's header structure (Fuzzy matching)
        const findIdx = (regex) => {
            const idx = headerRow.findIndex(h => h && regex.test(h.toString()));
            return idx !== -1 ? idx : null;
        };

        const mapIndices = {
            id: findIdx(/N/i),
            foto: findIdx(/FOTO/i),
            codigo: findIdx(/C.digo/i) ?? findIdx(/SKU/i) ?? findIdx(/ITEM/i),
            categoria: findIdx(/Categor.a/i),
            fabricante: findIdx(/Fabricante/i),
            marca: findIdx(/Marca/i),
            material: findIdx(/Material/i),
            espesor: findIdx(/espesor/i),
            descripcion: findIdx(/Descripci.n/i) ?? findIdx(/Nombre/i),
            medidas: findIdx(/Medidas/i),
            precio: findIdx(/Precio/i) ?? findIdx(/PVP/i) ?? findIdx(/Costo/i),
            stock: findIdx(/Stock/i) ?? findIdx(/Existencia/i) ?? findIdx(/Cant/i),
            incorporacion: findIdx(/incorporacion/i)
        };

        console.log("Mapeo resultante:", mapIndices);

        // Validar que al menos tengamos Código/SKU para procesar
        if (mapIndices.codigo === null) {
            alert('EROR: No se encontró la columna "Código" o "SKU" en el archivo. Por favor verifica los encabezados.');
            location.reload();
            return;
        }

        // Filter empty rows
        dataRows = dataRows.filter(row => row.length > 0 && row[mapIndices.codigo]);

        itemsCount.textContent = dataRows.length.toString().padStart(2, '0');
        previewBody.innerHTML = '';

        const finalData = dataRows.map((row, index) => {
            const item = {
                id: row[mapIndices.id] || index + 1,
                foto: row[mapIndices.foto] || '',
                codigo: row[mapIndices.codigo] || '',
                categoria: row[mapIndices.categoria] || '',
                fabricante: row[mapIndices.fabricante] || '',
                marca: row[mapIndices.marca] || '',
                material: row[mapIndices.material] || '',
                espesor: row[mapIndices.espesor] || '',
                descripcion: row[mapIndices.descripcion] || '',
                medidas: row[mapIndices.medidas] || '',
                precio: parseFloat(row[mapIndices.precio]) || 0,
                stock: parseInt(row[mapIndices.stock]) || 0,
                incorporacion: row[mapIndices.incorporacion] || ''
            };

            // HTML for Preview
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-stone-50 transition-colors';
            tr.innerHTML = `
                <td class="p-6 text-center text-stone-400 font-mono">${item.id}</td>
                <td class="p-6"><div class="w-10 h-10 bg-stone-100 rounded-lg flex items-center justify-center"><span class="material-symbols-outlined text-stone-300">image</span></div></td>
                <td class="p-6 font-black text-stone-900 uppercase tracking-tighter">${item.codigo}</td>
                <td class="p-6 uppercase text-stone-500">${item.categoria}</td>
                <td class="p-6 text-center uppercase text-stone-500">${item.fabricante}</td>
                <td class="p-6 text-center font-bold text-stone-900 uppercase">${item.marca}</td>
                <td class="p-6 text-center text-stone-500 uppercase">${item.material}</td>
                <td class="p-6 text-center font-mono text-stone-500">${item.espesor}</td>
                <td class="p-6 font-medium text-stone-700 uppercase max-w-[300px] truncate">${item.descripcion}</td>
                <td class="p-6 text-center font-mono text-stone-500">${item.medidas}</td>
                <td class="p-6 text-right font-headline font-black text-stone-900 text-base">$ ${item.precio.toFixed(2)}</td>
                <td class="p-6 text-center font-black ${item.stock > 0 ? 'text-stone-900' : 'text-red-500'}">${item.stock}</td>
                <td class="p-6 text-center text-stone-400 text-[10px] uppercase font-bold">${item.incorporacion}</td>
            `;
            previewBody.appendChild(tr);

            return item;
        });

        // Enable Submit
        excelDataInput.value = JSON.stringify(finalData);
        submitBtn.disabled = false;
        submitBtn.className = 'bg-primary text-stone-900 px-10 py-4 rounded-xl text-[10px] font-black uppercase tracking-widest hover:scale-105 transition-all shadow-lg active:scale-95';
    }

    document.getElementById('removeFile').addEventListener('click', (e) => {
        e.stopPropagation();
        location.reload();
    });

    document.getElementById('downloadTemplate').addEventListener('click', () => {
        const headers = [["N°", "FOTO", "Código", "Categoria", "Fabricante", "Marca", "Material", "espesor", "Descripción", "Medidas", "Precio", "Stock", "incorporacion"]];
        const ws = XLSX.utils.aoa_to_sheet(headers);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Plantilla");
        XLSX.writeFile(wb, "Plantilla_Inventario_CIMA.xlsx");
    });
</script>
@endpush
