@extends('erp.layouts.app')

@section('title', 'Usuarios - Test')

@section('content')
@php $disableSmartNavigator = true; @endphp

<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Usuarios del Sistema</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Lista de Usuarios ({{ $users->count() }})</h2>
            <button onclick="openCreateModal()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                <span class="material-symbols-outlined text-sm">person_add</span>
                Añadir Usuario
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cédula/RIF</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $index => $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 text-center text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-3 py-2 text-sm font-mono text-gray-600">{{ $user->cedula_rif ?: '-' }}</td>
                        <td class="px-3 py-2 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="px-3 py-2 text-sm text-gray-500">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($user->role === 'admin') bg-purple-100 text-purple-800
                                @elseif($user->role === 'vendedor') bg-blue-100 text-blue-800
                                @elseif($user->role === 'cliente') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-500">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-3 py-2 text-center text-sm text-gray-500">
                            <div class="flex space-x-2 justify-center">
                                @if($user->role !== 'admin')
                                <button onclick="editUser({{ $user->id }})" class="p-2 text-blue-600 hover:bg-blue-100 rounded-md transition-colors" title="Editar usuario">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </button>
                                <button onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')" class="p-2 text-red-600 hover:bg-red-100 rounded-md transition-colors" title="Eliminar usuario">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                                @else
                                <div class="p-2 text-gray-400" title="Usuario administrador - acciones restringidas">
                                    <span class="material-symbols-outlined text-lg">admin_panel_settings</span>
                                </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Modal de Creación -->
<div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Crear Nuevo Usuario</h3>
            <form id="createForm">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cédula/RIF</label>
                    <input type="text" id="createCedulaRif" name="cedula_rif" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="V-12345678 o J-12345678-9">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo</label>
                    <input type="text" id="createName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="createEmail" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <input type="password" id="createPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required minlength="8">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rol</label>
                    <select id="createRole" name="role" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="trabajador">Trabajador</option>
                        <option value="vendedor">Vendedor</option>
                        <option value="cliente">Cliente</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" id="createIsActive" name="is_active" class="mr-2" checked>
                        <span class="text-sm font-medium text-gray-700">Usuario Activo</span>
                    </label>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Edición -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Editar Usuario</h3>
            <form id="editForm">
                <input type="hidden" id="editUserId" name="user_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cédula/RIF</label>
                    <input type="text" id="editCedulaRif" name="cedula_rif" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="V-12345678 o J-12345678-9">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                    <input type="text" id="editName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="editEmail" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rol</label>
                    <select id="editRole" name="role" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="trabajador">Trabajador</option>
                        <option value="vendedor">Vendedor</option>
                        <option value="cliente">Cliente</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" id="editIsActive" name="is_active" class="mr-2">
                        <span class="text-sm font-medium text-gray-700">Usuario Activo</span>
                    </label>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openCreateModal() {
    // Limpiar el formulario
    document.getElementById('createForm').reset();
    document.getElementById('createIsActive').checked = true;

    // Mostrar modal
    document.getElementById('createModal').classList.remove('hidden');
}

function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
}

function editUser(userId) {
    // Buscar datos del usuario (simulado - en producción usar AJAX)
    const row = document.querySelector(`button[onclick="editUser(${userId})"]`).closest('tr');
    const cedulaRif = row.cells[1].textContent.trim() === '-' ? '' : row.cells[1].textContent.trim();
    const name = row.cells[2].textContent.trim();
    const email = row.cells[3].textContent.trim();
    const roleText = row.cells[4].textContent.trim().toLowerCase();
    const statusText = row.cells[5].textContent.trim().toLowerCase();

    // Mapear texto a valores
    let role = 'trabajador';
    if (roleText.includes('admin')) role = 'admin';
    else if (roleText.includes('vendedor')) role = 'vendedor';
    else if (roleText.includes('cliente')) role = 'cliente';

    const isActive = statusText.includes('activo');

    // Llenar el modal
    document.getElementById('editUserId').value = userId;
    document.getElementById('editCedulaRif').value = cedulaRif;
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editRole').value = role;
    document.getElementById('editIsActive').checked = isActive;

    // Mostrar modal
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

// Formulario de creación
document.getElementById('createForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('/erp/configuracion/usuarios', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Usuario creado exitosamente');
            location.reload();
        } else {
            alert('Error: ' + (data.error || 'Error desconocido'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al crear el usuario');
    });
});

// Formulario de edición
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const userId = formData.get('user_id');

    fetch('/erp/configuracion/usuarios/' + userId, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-HTTP-Method-Override': 'PUT',
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Usuario actualizado exitosamente');
            location.reload();
        } else {
            alert('Error: ' + (data.error || 'Error desconocido'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al actualizar el usuario');
    });
});

function deleteUser(userId, userName) {
    if (confirm('¿Está seguro de que desea eliminar al usuario "' + userName + '"? Esta acción no se puede deshacer.')) {
        if (confirm('¿CONFIRMA que desea eliminar permanentemente al usuario "' + userName + '"?')) {
            // Enviar petición de eliminación
            fetch('/erp/configuracion/usuarios/' + userId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Usuario eliminado exitosamente');
                    location.reload();
                } else {
                    alert('Error: ' + (data.error || 'Error desconocido'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar el usuario');
            });
        }
    }
}
</script>
@endpush