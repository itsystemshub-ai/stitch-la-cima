<!doctype html>
<html class="light" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta
      name="description"
      content="Aprobación de recuperación de contraseñas - Admin"
    />
    <meta name="theme-color" content="#ceff5e" />
    <link rel="manifest" href="../manifest.json" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
    <title>Aprobación de Recuperación | Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
      rel="stylesheet"
    />
    <script src="{{ asset('js/api.js') }}"></script>
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
    <style>
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      .no-scrollbar::-webkit-scrollbar {
        display: none;
      }
      body {
        font-family: "Inter", sans-serif;
      }
      .badge {
        @apply px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider;
      }
      .badge-pending {
        @apply bg-yellow-100 text-yellow-700;
      }
      .badge-approved {
        @apply bg-green-100 text-green-700;
      }
      .badge-rejected {
        @apply bg-red-100 text-red-700;
      }
      .card {
        @apply bg-white rounded-xl border border-stone-200 p-6 shadow-sm hover:shadow-md transition-shadow;
      }
    </style>
  </head>
  <body class="bg-background min-h-screen">
    <!-- Top Bar -->
    <header
      class="bg-white border-b border-stone-200 px-6 py-4 sticky top-0 z-40"
    >
      <div class="max-w-6xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4">
          <a
            href="{{ url('/auth/' . 'login') }}"
            class="p-2 hover:bg-stone-100 rounded-lg transition-colors"
          >
            <span class="material-symbols-outlined text-stone-500"
              >arrow_back</span
            >
          </a>
          <div>
            <h1 class="font-headline font-bold text-lg text-stone-900">
              Aprobación de Recuperación
            </h1>
            <p class="text-xs text-stone-500">
              Panel de Administración - Super Usuario
            </p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <span class="text-xs text-stone-500" id="pendingCount"
            >0 solicitudes pendientes</span
          >
          <button
            onclick="refreshRequests()"
            class="p-2 hover:bg-stone-100 rounded-lg transition-colors"
          >
            <span class="material-symbols-outlined text-stone-500"
              >refresh</span
            >
          </button>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-6 py-8">
      <!-- Tabs -->
      <div class="flex gap-2 mb-6 border-b border-stone-200 pb-2">
        <button
          onclick="filterByStatus('ALL')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-900 border-b-2 border-primary"
          data-tab="ALL"
        >
          Todas
        </button>
        <button
          onclick="filterByStatus('PENDING')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900"
          data-tab="PENDING"
        >
          Pendientes
        </button>
        <button
          onclick="filterByStatus('APPROVED')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900"
          data-tab="APPROVED"
        >
          Aprobadas
        </button>
        <button
          onclick="filterByStatus('REJECTED')"
          class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900"
          data-tab="REJECTED"
        >
          Rechazadas
        </button>
      </div>

      <!-- Requests List -->
      <div id="requestsList" class="space-y-4">
        <!-- Requests will be rendered here -->
      </div>

      <!-- Empty State -->
      <div id="emptyState" class="hidden text-center py-16">
        <span class="material-symbols-outlined text-stone-300 text-6xl mb-4"
          >check_circle</span
        >
        <h2 class="font-headline font-bold text-xl text-stone-900 mb-2">
          No hay solicitudes
        </h2>
        <p class="text-stone-500 text-sm">
          Todas las solicitudes de recuperación han sido procesadas.
        </p>
      </div>
    </main>

    <!-- Toast Notification -->
    <div
      id="toast"
      class="fixed bottom-4 right-4 bg-stone-900 text-white px-6 py-3 rounded-lg shadow-xl z-50 hidden flex items-center gap-2"
    >
      <span class="material-symbols-outlined text-primary">check</span>
      <span class="text-sm font-medium" id="toastMessage"></span>
    </div>

    <script>
      let currentFilter = "ALL";

      // Render requests on page load
      document.addEventListener("DOMContentLoaded", () => {
        // Verificar autenticación
        if (
          !window.zenithApi.isAuthenticated() &&
          localStorage.getItem("erp_session") !== "true"
        ) {
          window.location.href = "{{ route('login') }}";
          return;
        }
        renderRequests();
      });

      function filterByStatus(status) {
        currentFilter = status;

        // Update tab styles
        document.querySelectorAll(".tab-btn").forEach((btn) => {
          if (btn.dataset.tab === status) {
            btn.classList.remove("text-stone-500", "border-transparent");
            btn.classList.add("text-stone-900", "border-primary");
            btn.style.borderBottom = "2px solid #ceff5e";
          } else {
            btn.classList.add("text-stone-500");
            btn.classList.remove("text-stone-900");
            btn.style.borderBottom = "2px solid transparent";
          }
        });

        renderRequests();
      }

      async function renderRequests() {
        const list = document.getElementById("requestsList");
        const emptyState = document.getElementById("emptyState");
        const pendingCount = document.getElementById("pendingCount");

        // Obtener solicitudes de localStorage (modo offline) o del backend
        let requests = JSON.parse(
          localStorage.getItem("recoveryRequests") || "[]",
        );

        // Si el backend está disponible, obtener usuarios reales también
        if (window.zenithApi.isAuthenticated()) {
          try {
            const usersResponse = await window.zenithApi.getUsers();
            if (
              usersResponse.status === "success" &&
              usersResponse.data?.users
            ) {
              // Combinar con solicitudes locales
              console.log(
                "Usuarios cargados desde API:",
                usersResponse.data.users.length,
              );
            }
          } catch (e) {
            console.warn(
              "No se pudo conectar al backend, usando datos locales",
            );
          }
        }

        // Filtrar por estado
        if (currentFilter !== "ALL") {
          requests = requests.filter((r) => r.status === currentFilter);
        }

        // Ordenar por fecha (más reciente primero)
        requests.sort((a, b) => new Date(b.date) - new Date(a.date));

        const pending = JSON.parse(
          localStorage.getItem("recoveryRequests") || "[]",
        ).filter((r) => r.status === "PENDING").length;
        pendingCount.textContent = `${pending} solicitud${pending !== 1 ? "es" : ""} pendiente${pending !== 1 ? "s" : ""}`;

        if (requests.length === 0) {
          list.innerHTML = "";
          emptyState.classList.remove("hidden");
          return;
        }

        emptyState.classList.add("hidden");

        list.innerHTML = requests
          .map((req) => {
            const date = new Date(req.date).toLocaleDateString("es-VE", {
              year: "numeric",
              month: "short",
              day: "numeric",
              hour: "2-digit",
              minute: "2-digit",
            });

            const statusClass =
              req.status === "PENDING"
                ? "badge-pending"
                : req.status === "APPROVED"
                  ? "badge-approved"
                  : "badge-rejected";

            const statusText =
              req.status === "PENDING"
                ? "Pendiente"
                : req.status === "APPROVED"
                  ? "Aprobada"
                  : "Rechazada";

            return `
      <div class="card">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
              <span class="badge ${statusClass}">${statusText}</span>
              <span class="text-xs text-stone-400">${date}</span>
            </div>
            <p class="text-sm font-bold text-stone-900">${req.email}</p>
            <p class="text-xs text-stone-500 mt-1">ID: ${req.id}</p>
          </div>
          
          ${
            req.status === "PENDING"
              ? `
            <div class="flex gap-2">
              <button onclick="approveRequest(${req.id})" class="flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-green-700 transition-colors">
                <span class="material-symbols-outlined text-sm">check</span>
                Aprobar
              </button>
              <button onclick="rejectRequest(${req.id})" class="flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-red-700 transition-colors">
                <span class="material-symbols-outlined text-sm">close</span>
                Rechazar
              </button>
            </div>
          `
              : ""
          }
        </div>
      </div>
    `;
          })
          .join("");
      }

      async function approveRequest(id) {
        const requests = JSON.parse(
          localStorage.getItem("recoveryRequests") || "[]",
        );
        const request = requests.find((r) => r.id === id);

        if (request) {
          request.status = "APPROVED";
          request.approvedAt = new Date().toISOString();

          // Actualizar contraseña del usuario en el backend si está disponible
          if (window.zenithApi.isAuthenticated()) {
            try {
              // Buscar usuario por email y actualizar contraseña
              const usersResponse = await window.zenithApi.getUsers();
              if (
                usersResponse.status === "success" &&
                usersResponse.data?.users
              ) {
                const user = usersResponse.data.users.find(
                  (u) => u.email === request.email,
                );
                if (user) {
                  await window.zenithApi.resetUserPassword(
                    user.id,
                    request.newPassword,
                  );
                }
              }
            } catch (e) {
              console.warn(
                "No se pudo actualizar en el backend, usando localStorage",
              );
            }
          }

          // Actualizar en localStorage (fallback)
          const users = JSON.parse(localStorage.getItem("users") || "[]");
          const userIndex = users.findIndex((u) => u.email === request.email);
          if (userIndex !== -1) {
            users[userIndex].password = request.newPassword;
            localStorage.setItem("users", JSON.stringify(users));
          }

          localStorage.setItem("recoveryRequests", JSON.stringify(requests));
          showToast("Solicitud aprobada. La contraseña ha sido actualizada.");
          renderRequests();
        }
      }

      function rejectRequest(id) {
        const requests = JSON.parse(
          localStorage.getItem("recoveryRequests") || "[]",
        );
        const request = requests.find((r) => r.id === id);

        if (request) {
          request.status = "REJECTED";
          request.rejectedAt = new Date().toISOString();
          localStorage.setItem("recoveryRequests", JSON.stringify(requests));
          showToast("Solicitud rechazada.");
          renderRequests();
        }
      }

      function refreshRequests() {
        showToast("Solicitudes actualizadas.");
        renderRequests();
      }

      function showToast(message) {
        const toast = document.getElementById("toast");
        const toastMessage = document.getElementById("toastMessage");
        toastMessage.textContent = message;
        toast.classList.remove("hidden");
        toast.classList.add("flex");
        setTimeout(() => {
          toast.classList.add("hidden");
          toast.classList.remove("flex");
        }, 3000);
      }
    </script>
  </body>
</html>
