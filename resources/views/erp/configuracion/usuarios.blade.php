@extends('erp.layouts.app')

@section('title', 'Gestión de Acceso | Zenith ERP')

@section('content')
<div class="p-8 bg-stone-50 min-h-screen">
    <!-- Header Industrial Light -->
    <header class="flex justify-between items-end mb-10 gap-8 border-b border-stone-200 pb-10">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-3">
                <span class="w-1 h-3 bg-primary rounded-full"></span>
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-[0.3em]">Seguridad > Usuarios & Departamentos</p>
            </div>
            <h1 class="text-4xl font-black text-stone-900 uppercase tracking-tighter leading-none">Control de <span class="text-primary-dark">Acceso</span></h1>
            <p class="text-[11px] text-stone-500 font-medium mt-3 max-w-xl leading-relaxed uppercase tracking-widest">
                Administración de credenciales y roles. Protocolos restringidos para <span class="font-bold text-stone-800">Vendedores</span> y <span class="font-bold text-stone-800">Clientes</span>.
            </p>
        </div>

        <div class="flex gap-3">
            <button onclick="openCreateModal()" class="h-12 px-6 flex items-center justify-center gap-2 bg-stone-900 text-white font-black uppercase text-[10px] tracking-widest hover:bg-stone-800 transition-all rounded-lg shadow-xl shadow-stone-200">
                <span class="material-symbols-outlined text-lg">person_add</span> Nuevo Operador
            </button>
        </div>
    </header>

    <!-- Stats Row Light -->
    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-white border border-stone-200 p-6 rounded-xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Base de Usuarios</p>
            <p class="text-2xl font-black text-stone-900 tracking-tighter">{{ $users->count() }} <span class="text-[10px] text-stone-400 font-bold ml-1 uppercase">Registros</span></p>
        </div>
        <div class="bg-white border border-stone-200 p-6 rounded-xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Administradores</p>
            <p class="text-2xl font-black text-stone-900 tracking-tighter">{{ $users->where('role', 'admin')->count() }} <span class="text-[10px] text-stone-400 font-bold ml-1 uppercase">Privilegiados</span></p>
        </div>
        <div class="bg-white border border-stone-200 p-6 rounded-xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Áreas Operativas</p>
            <p class="text-2xl font-black text-stone-900 tracking-tighter">{{ $users->pluck('departamento')->unique()->count() }} <span class="text-[10px] text-stone-400 font-bold ml-1 uppercase">Depts</span></p>
        </div>
        <div class="bg-white border border-stone-200 p-6 rounded-xl shadow-sm">
            <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] mb-1">Accesos Externos</p>
            <p class="text-2xl font-black text-stone-900 tracking-tighter">{{ $users->whereIn('role', ['vendedor', 'cliente'])->count() }} <span class="text-[10px] text-stone-400 font-bold ml-1 uppercase">Restringidos</span></p>
        </div>
    </div>

    <!-- Table Container Light -->
    <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-50 border-b border-stone-200">
                    <th class="py-4 px-6 text-[10px] font-black text-stone-500 uppercase tracking-[0.2em]">Identidad</th>
                    <th class="py-4 px-6 text-[10px] font-black text-stone-500 uppercase tracking-[0.2em]">Departamento</th>
                    <th class="py-4 px-6 text-[10px] font-black text-stone-500 uppercase tracking-[0.2em] text-center">Rol</th>
                    <th class="py-4 px-6 text-[10px] font-black text-stone-500 uppercase tracking-[0.2em] text-center">Credenciales</th>
                    <th class="py-4 px-6 text-[10px] font-black text-stone-500 uppercase tracking-[0.2em] text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @foreach($users as $user)
                <tr class="hover:bg-stone-50/50 transition-colors group">
                    <td class="py-5 px-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-stone-100 border border-stone-200 flex items-center justify-center text-stone-500 font-black text-[10px] uppercase">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                            <div>
                                <p class="text-[12px] font-black text-stone-900 uppercase tracking-tight">{{ $user->name }}</p>
                                <p class="text-[10px] text-stone-400 font-medium lowercase tracking-tight">{{ $user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-5 px-6">
                        <div class="flex flex-col">
                            <span class="text-[11px] font-black text-stone-600 uppercase tracking-widest">{{ $user->departamento ?: 'GENERAL' }}</span>
                            <span class="text-[8px] text-stone-400 uppercase tracking-tighter">ID: {{ $user->cedula_rif ?: 'N/A' }}</span>
                        </div>
                    </td>
                    <td class="py-5 px-6 text-center">
                        <span class="inline-block px-3 py-1 rounded-md text-[9px] font-black uppercase tracking-widest border
                            @if($user->role === 'admin') bg-primary/10 border-primary/20 text-primary-dark @else bg-stone-100 border-stone-200 text-stone-600 @endif">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="py-5 px-6 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <span id="pass-{{ $user->id }}" class="text-[12px] font-mono text-stone-300 tracking-[0.2em]">••••••••</span>
                            <button onclick="togglePass({{ $user->id }}, '{{ $passwords[$user->email] ?? 'N/A' }}')" class="p-1.5 hover:text-primary transition-colors text-stone-400">
                                <span class="material-symbols-outlined text-base">visibility</span>
                            </button>
                        </div>
                    </td>
                    <td class="py-5 px-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="editUser('{{ base64_encode(json_encode($user)) }}')" class="w-8 h-8 flex items-center justify-center bg-stone-50 border border-stone-200 text-stone-400 hover:bg-stone-900 hover:text-white transition-all rounded-lg">
                                <span class="material-symbols-outlined text-base">edit</span>
                            </button>
                            @if($user->email !== 'admin@lacima.com')
                            <button onclick="deleteUser({{ $user->id }})" class="w-8 h-8 flex items-center justify-center bg-stone-50 border border-stone-200 text-stone-400 hover:bg-red-500 hover:text-white transition-all rounded-lg">
                                <span class="material-symbols-outlined text-base">delete</span>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Creation Light -->
<div id="userModal" class="fixed inset-0 bg-stone-900/40 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-6">
    <div class="bg-white w-full max-w-lg rounded-2xl overflow-hidden shadow-2xl border border-stone-200">
        <div class="p-8 border-b border-stone-100 bg-stone-50">
            <h3 class="text-2xl font-black text-stone-900 uppercase tracking-tighter" id="modalTitle">Nuevo <span class="text-primary-dark">Operador</span></h3>
            <p class="text-[10px] text-stone-400 font-black uppercase tracking-widest mt-2">Configuración de credenciales institucionales.</p>
        </div>
        <form id="userForm" class="p-8 space-y-6">
            @csrf
            <input type="hidden" id="userId">
            
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-widest text-stone-400">Nombre Completo</label>
                    <input type="text" name="name" id="userName" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl text-[12px] font-bold text-stone-900 outline-none focus:border-primary/50 transition-colors">
                </div>
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-widest text-stone-400">ID / Cédula / RIF</label>
                    <input type="text" name="cedula_rif" id="userCedula" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl text-[12px] font-bold text-stone-900 outline-none focus:border-primary/50 transition-colors">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[9px] font-black uppercase tracking-widest text-stone-400">Correo Institucional</label>
                <input type="email" name="email" id="userEmail" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl text-[12px] font-bold text-stone-900 outline-none focus:border-primary/50 transition-colors">
            </div>

            <div class="space-y-2">
                <label class="text-[9px] font-black uppercase tracking-widest text-stone-400">Contraseña (Mín. 6 caracteres)</label>
                <input type="password" name="password" id="userPass" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl text-[12px] font-bold text-stone-900 outline-none focus:border-primary/50 transition-colors" placeholder="••••••••">
                <p class="text-[8px] text-stone-400 uppercase tracking-tighter">Dejar en blanco para mantener la contraseña actual (solo en edición).</p>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-widest text-stone-400">Departamento</label>
                    <select name="departamento" id="userDept" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl text-[10px] font-black text-stone-900 uppercase outline-none appearance-none">
                        <option value="ADMINISTRACIÓN">ADMINISTRACIÓN</option>
                        <option value="CONTABILIDAD">CONTABILIDAD</option>
                        <option value="VENTAS">VENTAS</option>
                        <option value="LOGÍSTICA">LOGÍSTICA</option>
                        <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                        <option value="EXTERNO">EXTERNO (VENDEDOR/CLIENTE)</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[9px] font-black uppercase tracking-widest text-stone-400">Rol Operativo</label>
                    <select name="role" id="userRole" class="w-full bg-stone-50 border border-stone-200 p-4 rounded-xl text-[10px] font-black text-stone-900 uppercase outline-none appearance-none">
                        <option value="admin">ADMINISTRADOR</option>
                        <option value="trabajador">TRABAJADOR</option>
                        <option value="vendedor">VENDEDOR (LIMITADO)</option>
                        <option value="cliente">CLIENTE (LIMITADO)</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-3 pt-6">
                <button type="button" onclick="closeModal()" class="flex-1 h-12 bg-stone-100 text-stone-500 font-black uppercase text-[10px] tracking-widest hover:bg-stone-200 transition-all rounded-xl">Cancelar</button>
                <button type="submit" class="flex-1 h-12 bg-stone-900 text-white font-black uppercase text-[10px] tracking-widest hover:bg-stone-800 transition-all rounded-xl shadow-lg">Guardar Operador</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function togglePass(id, pass) {
        const span = document.getElementById('pass-' + id);
        if(span.innerText === '••••••••') {
            span.innerText = pass;
            span.classList.remove('text-stone-300');
            span.classList.add('text-primary-dark');
            span.classList.add('font-bold');
        } else {
            span.innerText = '••••••••';
            span.classList.add('text-stone-300');
            span.classList.remove('text-primary-dark');
            span.classList.remove('font-bold');
        }
    }

    function openCreateModal() {
        document.getElementById('modalTitle').innerHTML = 'Nuevo <span class="text-primary-dark">Operador</span>';
        document.getElementById('userForm').reset();
        document.getElementById('userId').value = '';
        document.getElementById('userModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }

    function editUser(userBase64) {
        const user = JSON.parse(atob(userBase64));
        document.getElementById('modalTitle').innerHTML = 'Editar <span class="text-primary-dark">Operador</span>';
        document.getElementById('userId').value = user.id;
        document.getElementById('userName').value = user.name;
        document.getElementById('userEmail').value = user.email;
        document.getElementById('userCedula').value = user.cedula_rif || '';
        document.getElementById('userDept').value = user.departamento || 'ADMINISTRACIÓN';
        document.getElementById('userRole').value = user.role;
        document.getElementById('userPass').value = ''; // Reset password field
        document.getElementById('userModal').classList.remove('hidden');
    }

    document.getElementById('userForm').onsubmit = function(e) {
        e.preventDefault();
        const id = document.getElementById('userId').value;
        const url = id ? `/erp/configuracion/usuarios/${id}` : '/erp/configuracion/usuarios';
        const method = id ? 'PUT' : 'POST';
        
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(res => {
            if(res.success) {
                location.reload();
            } else {
                alert('Error: ' + (res.error || 'Verifique los datos'));
            }
        });
    }

    function deleteUser(id) {
        if(confirm('¿CONFIRMAR ELIMINACIÓN PERMANENTE?')) {
            fetch(`/erp/configuracion/usuarios/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(() => location.reload());
        }
    }
</script>
@endpush