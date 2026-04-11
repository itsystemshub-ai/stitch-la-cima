<!doctype html>
<html class="light" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Aprobación de recuperación de contraseñas - Admin" />
    <meta name="theme-color" content="#ceff5e" />
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
    <title>Aprobación de Recuperación | Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300..700&family=Inter:wght@300..700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
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
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
      .no-scrollbar::-webkit-scrollbar { display: none; }
      body { font-family: "Inter", sans-serif; }
      .badge { @apply px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider; }
      .badge-pending { @apply bg-yellow-100 text-yellow-700; }
      .badge-approved { @apply bg-green-100 text-green-700; }
      .badge-rejected { @apply bg-red-100 text-red-700; }
      .card { @apply bg-white rounded-xl border border-stone-200 p-6 shadow-sm hover:shadow-md transition-shadow; }
    </style>
  </head>
  <body class="bg-background min-h-screen">
    <!-- Top Bar -->
    <header class="bg-white border-b border-stone-200 px-6 py-4 sticky top-0 z-40">
      <div class="max-w-6xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4">
          <a href="{{ url('/auth/login') }}" class="p-2 hover:bg-stone-100 rounded-lg transition-colors">
            <span class="material-symbols-outlined text-stone-500">arrow_back</span>
          </a>
          <div>
            <h1 class="font-headline font-bold text-lg text-stone-900">Aprobación de Recuperación</h1>
            <p class="text-xs text-stone-500">Panel de Administración - Super Usuario</p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <span class="text-xs text-stone-500" id="pendingCount">0 solicitudes pendientes</span>
          <button onclick="refreshRequests()" class="p-2 hover:bg-stone-100 rounded-lg transition-colors">
            <span class="material-symbols-outlined text-stone-500">refresh</span>
          </button>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-6 py-8">
      <!-- Tabs -->
      <div class="flex gap-2 mb-6 border-b border-stone-200 pb-2">
        <button onclick="filterByStatus('ALL')" class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-900 border-b-2 border-primary" data-tab="ALL">Todas</button>
        <button onclick="filterByStatus('PENDING')" class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900" data-tab="PENDING">Pendientes</button>
        <button onclick="filterByStatus('APPROVED')" class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900" data-tab="APPROVED">Aprobadas</button>
        <button onclick="filterByStatus('REJECTED')" class="tab-btn px-4 py-2 text-sm font-bold uppercase tracking-wider text-stone-500 hover:text-stone-900" data-tab="REJECTED">Rechazadas</button>
      </div>

      <!-- Requests List -->
      <div id="requestsList" class="space-y-4"></div>

      <!-- Empty State -->
      <div id="emptyState" class="hidden text-center py-16">
        <span class="material-symbols-outlined text-stone-300 text-6xl mb-4">check_circle</span>
        <h2 class="font-headline font-bold text-xl text-stone-900 mb-2">No hay solicitudes</h2>
        <p class="text-stone-500 text-sm">Todas las solicitudes de recuperación han sido procesadas.</p>
      </div>
    </main>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 bg-stone-900 text-white px-6 py-3 rounded-lg shadow-xl z-50 hidden flex items-center gap-2">
      <span class="material-symbols-outlined text-primary">check</span>
      <span class="text-sm font-medium" id="toastMessage"></span>
    </div>

    <script>
      let currentFilter = "ALL";
      document.addEventListener("DOMContentLoaded", () => {
        if (!window.zenithApi.isAuthenticated() && localStorage.getItem("erp_session") !== "true") {
          window.location.href = "{{ url('/auth/login') }}";
          return;
        }
        renderRequests();
      });

      function filterByStatus(status) {
        currentFilter = status;
        document.querySelectorAll(".tab-btn").forEach((btn) => {
          if (btn.dataset.tab === status) {
            btn.classList.remove("text-stone-500");
            btn.classList.add("text-stone-900");
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
        const pendingCountText = document.getElementById("pendingCount");
        let requests = JSON.parse(localStorage.getItem("recoveryRequests") || "[]");
        if (currentFilter !== "ALL") requests = requests.filter((r) => r.status === currentFilter);
        requests.sort((a, b) => new Date(b.date) - new Date(a.date));
        const pending = JSON.parse(localStorage.getItem("recoveryRequests") || "[]").filter((r) => r.status === "PENDING").length;
        pendingCountText.textContent = `${pending} solicitud${pending !== 1 ? "es" : ""} pendiente${pending !== 1 ? "s" : ""}`;
        if (requests.length === 0) { list.innerHTML = ""; emptyState.classList.remove("hidden"); return; }
        emptyState.classList.add("hidden");
        list.innerHTML = requests.map((req) => {
          const date = new Date(req.date).toLocaleDateString("es-VE", { year: "numeric", month: "short", day: "numeric" });
          const statusClass = req.status === "PENDING" ? "badge-pending" : req.status === "APPROVED" ? "badge-approved" : "badge-rejected";
          return `<div class="card"><div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex-1">
            <div class="flex items-center gap-3 mb-2"><span class="badge ${statusClass}">${req.status}</span><span class="text-xs text-stone-400">${date}</span></div>
            <p class="text-sm font-bold text-stone-900">${req.email}</p></div>
          ${req.status === "PENDING" ? `<div class="flex gap-2">
            <button onclick="approveRequest(${req.id})" class="bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider">Aprobar</button>
            <button onclick="rejectRequest(${req.id})" class="bg-red-600 text-white px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider">Rechazar</button></div>` : ""}</div></div>`;
        }).join("");
      }

      function approveRequest(id) {
        const requests = JSON.parse(localStorage.getItem("recoveryRequests") || "[]");
        const req = requests.find(r => r.id === id);
        if(req) { req.status = "APPROVED"; localStorage.setItem("recoveryRequests", JSON.stringify(requests)); renderRequests(); }
      }
      function rejectRequest(id) {
        const requests = JSON.parse(localStorage.getItem("recoveryRequests") || "[]");
        const req = requests.find(r => r.id === id);
        if(req) { req.status = "REJECTED"; localStorage.setItem("recoveryRequests", JSON.stringify(requests)); renderRequests(); }
      }
      function refreshRequests() { renderRequests(); }
    </script>
  </body>
</html>
