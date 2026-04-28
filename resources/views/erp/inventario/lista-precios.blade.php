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
    <a href="{{ url('/erp/inicio') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ERP_CORE</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <a href="{{ url('/erp/inventario') }}" class="text-stone-500 hover:text-primary transition-colors font-black text-[12px] uppercase tracking-widest italic">ASSET_CONTROL</a>
    <span class="material-symbols-outlined text-[14px] text-stone-700">chevron_right</span>
    <span class="text-primary font-black text-[12px] uppercase tracking-widest italic">PRICE_MATRIX</span>
@endsection

@section('content')
    <!-- Alert System for Feedback -->
    <div class="mb-8">
        @if(session('success'))
            <div class="bg-primary/10 border border-primary/20 text-primary p-6 rounded-[24px] flex items-center gap-4 animate-in fade-in slide-in-from-top-4 duration-500">
                <span class="material-symbols-outlined text-primary">check_circle</span>
                <p class="text-[12px] font-black uppercase tracking-widest italic">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-6 rounded-[24px] flex items-center gap-4 animate-in fade-in slide-in-from-top-4 duration-500">
                <span class="material-symbols-outlined text-red-500">error</span>
                <p class="text-[12px] font-black uppercase tracking-widest italic">{{ session('error') }}</p>
            </div>
        @endif
    </div>

    <!-- Page Header: High-Performance Bulk Operations -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12 pb-10 border-b border-white/5">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <span class="w-12 h-[2px] bg-primary"></span>
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] italic">GLOBAL_VALUATION_LOGIC</p>
            </div>
            <h1 class="text-6xl font-headline font-black text-white tracking-tighter uppercase leading-none">Price <span class="text-stone-600">Matrix</span></h1>
            <p class="text-[12px] text-stone-500 mt-4 font-black uppercase tracking-[0.2em] italic">MAYOR DE REPUESTO LA CIMA, C.A. • RIF: J-40308741-5</p>
        </div>
        <div class="flex gap-4">
             <button id="downloadTemplate" class="bg-stone-900 border border-white/10 text-white px-10 py-5 text-[12px] font-black uppercase tracking-widest flex items-center gap-4 hover:border-primary/40 transition-all rounded-xl shadow-2xl relative group overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/0 via-primary/5 to-primary/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                <span class="material-symbols-outlined text-xl text-primary">download</span>
                GET_TEMPLATE.XLSX
            </button>
        </div>
    </div>

    <!-- Live Sync Status -->
    <div class="grid grid-cols-12 gap-10 mb-16">
        <div class="col-span-12 lg:col-span-8 bg-stone-900 border border-white/5 rounded-[40px] p-12 relative overflow-hidden flex flex-col justify-between min-h-[450px] shadow-3xl">
            <div class="absolute -right-20 -bottom-20 opacity-[0.02]">
                <span class="material-symbols-outlined text-[300px] text-white">cloud_upload</span>
            </div>
            
            <div class="relative z-10 w-full h-full flex flex-col">
                <p class="text-[12px] font-black text-stone-500 uppercase tracking-[0.4em] mb-6 italic">BATCH_PROCESSOR_CORE_v2.0</p>
                
                <div id="dropZone" class="flex-1 border-2 border-dashed border-white/5 rounded-[32px] flex flex-col items-center justify-center p-12 cursor-pointer drop-zone hover:border-primary/30 group transition-all bg-stone-950/50">
                    <input type="file" id="fileInput" class="hidden" accept=".xlsx, .xls">
                    <div id="dropZoneUI" class="text-center">
                        <div class="w-20 h-20 bg-stone-900 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform border border-white/5">
                            <span class="material-symbols-outlined text-4xl text-stone-700 group-hover:text-primary transition-colors">upload_file</span>
                        </div>
                        <h4 class="text-white font-headline font-black text-2xl uppercase tracking-tighter italic">DRAG_DATA_STREAM</h4>
                        <p class="text-stone-500 text-[12px] uppercase font-black tracking-[0.2em] mt-3 italic">OR SELECT OFFICIAL SPREADSHEET</p>
                    </div>
                    <div id="fileInfo" class="hidden text-center">
                        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 border border-primary/20">
                            <span class="material-symbols-outlined text-4xl text-primary">description</span>
                        </div>
                        <h4 id="fileName" class="text-white font-headline font-black text-2xl uppercase tracking-tighter italic">FILE_NAME.XLSX</h4>
                        <p id="fileSize" class="text-primary text-[12px] uppercase font-black tracking-[0.2em] mt-3 italic">0.00 MB_DETECTED</p>
                        <button id="removeFile" class="mt-6 text-[12px] font-black text-red-500 uppercase hover:text-red-400 transition-colors tracking-widest italic underline decoration-red-500/30">TERMINATE_PROCESS</button>
                    </div>
                </div>

                <form id="massUpdateForm" action="{{ route('erp.inventario.lista-precios.update') }}" method="POST" class="mt-8">
                    @csrf
                    <input type="hidden" name="excel_data" id="excelDataInput">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4 bg-stone-950 px-6 py-3 rounded-full border border-white/5">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                            </span>
                            <span class="text-[12px] font-black text-stone-400 uppercase tracking-widest italic">PRE_SYNC_STATE: <span class="text-primary">ACTIVE</span></span>
                        </div>
                        <button type="submit" id="submitBtn" disabled class="bg-stone-800 text-stone-600 px-12 py-5 rounded-xl text-[12px] font-black uppercase tracking-[0.2em] transition-all cursor-not-allowed border border-white/5 italic">
                            EXECUTE_DATABASE_OVERWRITE
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-4 flex flex-col gap-8">
            <div class="bg-stone-900 border border-white/5 p-10 rounded-[40px] shadow-3xl flex-1 group relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4">
                    <span class="material-symbols-outlined text-stone-800 text-4xl group-hover:text-primary/20 transition-colors">history</span>
                </div>
                <p class="text-[12px] font-black text-stone-600 uppercase tracking-[0.3em] mb-6 italic">LAST_SYNC_LATENCY</p>
                <h3 class="text-4xl font-headline font-black text-white uppercase leading-tight group-hover:text-primary transition-colors tracking-tighter">{{ $stats['last_sync'] }}</h3>
                <p class="text-[12px] text-stone-600 mt-4 font-black uppercase tracking-widest italic">CIMA_CENTRAL_DB</p>
            </div>
            <div class="bg-primary border border-primary p-10 rounded-[40px] shadow-3xl flex-1 group hover:bg-stone-950 transition-all duration-700 cursor-pointer relative overflow-hidden">
                <div class="absolute -right-8 -bottom-8 opacity-10 rotate-12">
                    <span class="material-symbols-outlined text-[150px] text-stone-900">inventory_2</span>
                </div>
                <p class="text-[12px] font-black text-stone-900 group-hover:text-primary uppercase tracking-[0.3em] mb-6 italic">MASTER_SKU_COUNT</p>
                <h3 id="itemsToProcess" class="text-7xl font-headline font-black text-stone-900 group-hover:text-white uppercase leading-tight tracking-[calc(-0.05em)] italic">{{ number_format($stats['total_items']) }}</h3>
                <div class="mt-8 flex items-center justify-between">
                    <span class="text-[12px] font-black text-stone-900/40 group-hover:text-primary/40 uppercase tracking-widest italic">SCHEMA_VALIDATED</span>
                    <span class="material-symbols-outlined text-stone-900 group-hover:text-primary text-3xl">verified</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Integrity Dashboard: Preview Table -->
    <section class="bg-stone-900 border border-white/5 rounded-[40px] shadow-3xl overflow-hidden mb-20 relative">
        <div class="p-10 border-b border-white/5 flex justify-between items-center bg-stone-950/30">
            <div class="flex items-center gap-4">
                <span class="w-3 h-3 bg-primary rounded-full"></span>
                <h3 class="text-[12px] font-black text-white uppercase tracking-[0.3em] italic">DATA_STREAM_PREVIEW [OFFICIAL_CIMA_SPEC]</h3>
            </div>
            <div class="flex gap-6">
                <button type="button" onclick="location.reload()" class="text-[12px] font-black text-stone-500 uppercase hover:text-red-400 transition-colors tracking-widest italic underline decoration-stone-800">PURGE_BUFFER</button>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[2200px]">
                <thead>
                    <tr class="bg-stone-950">
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center w-20">REF_ID</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">VISUAL</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">SKU_PROTOCOL</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">CATEGORY</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">OEM_VENDOR</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">BRAND</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">METAL_COMP</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">GAUGE</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic">NOMENCLATURE</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">DIMENSIONS</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-right">VALUATION</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">MAGNITUDE</th>
                        <th class="p-8 text-[11px] font-black text-stone-600 uppercase tracking-widest italic text-center">TIMESTAMP</th>
                    </tr>
                </thead>
                <tbody id="previewTableBody" class="divide-y divide-white/5">
                    @forelse($stats['latest_changes'] as $product)
                    <tr class="hover:bg-white/[0.02] transition-colors group">
                        <td class="p-8 text-center text-stone-700 font-mono text-[12px] italic">{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="p-8">
                            <div class="w-14 h-14 bg-stone-950 border border-white/5 rounded-xl flex items-center justify-center overflow-hidden group-hover:border-primary/30 transition-all">
                                @if($product->foto_path)
                                    <img src="{{ $product->foto_path }}" class="w-full h-full object-cover">
                                @else
                                    <span class="material-symbols-outlined text-stone-800 group-hover:text-primary/20 transition-colors">image</span>
                                @endif
                            </div>
                        </td>
                        <td class="p-8">
                            <span class="text-[14px] font-black text-white italic tracking-tighter uppercase group-hover:text-primary transition-colors">{{ $product->codigo_oem }}</span>
                        </td>
                        <td class="p-8">
                            <span class="text-[12px] font-black text-stone-500 uppercase tracking-widest italic">{{ $product->categoria }}</span>
                        </td>
                        <td class="p-8 text-center">
                            <span class="text-[12px] font-black text-stone-600 uppercase tracking-widest italic">{{ $product->fabricante ?? 'N/A' }}</span>
                        </td>
                        <td class="p-8 text-center">
                            <span class="text-[13px] font-black text-stone-400 uppercase italic tracking-tight">{{ $product->marca }}</span>
                        </td>
                        <td class="p-8 text-center">
                            <span class="text-[12px] font-black text-stone-600 uppercase tracking-widest italic">{{ $product->material ?? '-' }}</span>
                        </td>
                        <td class="p-8 text-center">
                            <span class="text-[13px] font-black text-white italic">{{ $product->espesor ?? '-' }}</span>
                        </td>
                        <td class="p-8">
                            <p class="text-[13px] font-black text-stone-400 uppercase tracking-tight italic max-w-[350px] truncate group-hover:text-white transition-colors">{{ $product->nombre }}</p>
                        </td>
                        <td class="p-8 text-center">
                            <span class="text-[12px] font-black text-stone-600 italic tracking-widest uppercase">{{ $product->medidas ?? '-' }}</span>
                        </td>
                        <td class="p-8 text-right">
                            <span class="text-[18px] font-black text-primary italic tracking-tighter">$ {{ number_format($product->precio_mayor, 2) }}</span>
                        </td>
                        <td class="p-8 text-center">
                            <div class="flex flex-col items-center">
                                <span class="text-[16px] font-black {{ $product->stock_actual > 0 ? 'text-white' : 'text-red-500' }} italic tracking-tighter">{{ $product->stock_actual }}</span>
                                <span class="text-[9px] font-black text-stone-700 uppercase tracking-[0.2em] mt-1">UNITS</span>
                            </div>
                        </td>
                        <td class="p-8 text-center">
                            <span class="text-[12px] font-black text-stone-600 uppercase tracking-widest italic">{{ $product->updated_at->format('d/m/Y') }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" class="p-32 text-center text-stone-700 italic font-black uppercase text-[14px] tracking-[0.5em]">
                            <div class="flex flex-col items-center gap-6">
                                <span class="material-symbols-outlined text-6xl opacity-10">database_off</span>
                                AWAITING_DATA_STREAM_INJECTION...
                            </div>
                        </td>
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
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-primary/50', 'bg-primary/5');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-primary/50', 'bg-primary/5');
        });
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
        fileName.textContent = file.name.toUpperCase();
        fileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB_DETECTED';
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
            alert('ERROR: EMPTY_STREAM_DETECTED');
            return;
        }

        let headerRow = rows[0];
        let dataRows = rows.slice(1);

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

        if (mapIndices.codigo === null) {
            alert('FATAL: SKU_COLUMN_NOT_FOUND');
            location.reload();
            return;
        }

        dataRows = dataRows.filter(row => row.length > 0 && row[mapIndices.codigo]);

        itemsCount.textContent = dataRows.length.toLocaleString();
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

            const tr = document.createElement('tr');
            tr.className = 'hover:bg-white/[0.02] transition-colors group';
            tr.innerHTML = `
                <td class="p-8 text-center text-stone-700 font-mono text-[12px] italic">${item.id.toString().padStart(4, '0')}</td>
                <td class="p-8"><div class="w-14 h-14 bg-stone-950 border border-white/5 rounded-xl flex items-center justify-center group-hover:border-primary/30 transition-all"><span class="material-symbols-outlined text-stone-800">image</span></div></td>
                <td class="p-8 font-black text-white italic tracking-tighter uppercase text-[14px] group-hover:text-primary transition-colors">${item.codigo}</td>
                <td class="p-8 uppercase text-stone-500 text-[12px] font-black italic tracking-widest">${item.categoria}</td>
                <td class="p-8 text-center uppercase text-stone-600 text-[12px] font-black italic tracking-widest">${item.fabricante}</td>
                <td class="p-8 text-center font-black text-stone-400 uppercase text-[13px] italic tracking-tight">${item.marca}</td>
                <td class="p-8 text-center text-stone-600 uppercase text-[12px] font-black italic tracking-widest">${item.material}</td>
                <td class="p-8 text-center font-black text-white italic text-[13px]">${item.espesor}</td>
                <td class="p-8 font-black text-stone-400 uppercase max-w-[350px] truncate text-[13px] italic tracking-tight group-hover:text-white transition-colors">${item.descripcion}</td>
                <td class="p-8 text-center font-black text-stone-600 text-[12px] italic tracking-widest uppercase">${item.medidas}</td>
                <td class="p-8 text-right font-black text-primary text-[18px] italic tracking-tighter">$ ${item.precio.toFixed(2)}</td>
                <td class="p-8 text-center">
                     <div class="flex flex-col items-center">
                        <span class="text-[16px] font-black italic tracking-tighter ${item.stock > 0 ? 'text-white' : 'text-red-500 animate-pulse'}">${item.stock}</span>
                        <span class="text-[9px] font-black text-stone-700 uppercase tracking-[0.2em] mt-1">UNITS</span>
                    </div>
                </td>
                <td class="p-8 text-center text-stone-600 text-[12px] font-black italic tracking-widest uppercase">${item.incorporacion}</td>
            `;
            previewBody.appendChild(tr);

            return item;
        });

        excelDataInput.value = JSON.stringify(finalData);
        submitBtn.disabled = false;
        submitBtn.className = 'bg-primary text-stone-900 px-12 py-5 rounded-xl text-[12px] font-black uppercase tracking-[0.2em] hover:scale-105 transition-all shadow-2xl active:scale-95 italic';
        submitBtn.textContent = 'EXECUTE_DATABASE_OVERWRITE';
    }

    document.getElementById('removeFile').addEventListener('click', (e) => {
        e.stopPropagation();
        location.reload();
    });

    document.getElementById('downloadTemplate').addEventListener('click', () => {
        const headers = [["N°", "FOTO", "Código", "Categoria", "Fabricante", "Marca", "Material", "espesor", "Descripción", "Medidas", "Precio", "Stock", "incorporacion"]];
        const ws = XLSX.utils.aoa_to_sheet(headers);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "PLANTILLA_CIMA");
        XLSX.writeFile(wb, "CIMA_INVENTARIO_SPEC_v2.xlsx");
    });
</script>
@endpush

