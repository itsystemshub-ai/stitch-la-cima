// Toggle sidebar en mobile
      const menuToggle = document.getElementById("menuToggle");
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("sidebarOverlay");

      if (menuToggle) {
        menuToggle.addEventListener("click", () => {
          sidebar.classList.toggle("open");
          overlay.classList.toggle("hidden");
        });
      }

      // Toggle Dropdown Menu (hacia la derecha)
      function toggleDropdown(menuItem) {
        const parent = menuItem.closest(".menu-parent");
        const wasOpen = parent.classList.contains("open");

        // Cerrar todos los demás dropdowns
        document.querySelectorAll(".menu-parent.open").forEach((el) => {
          if (el !== parent) el.classList.remove("open");
        });

        // Toggle el actual
        if (!wasOpen) {
          parent.classList.add("open");
        }
      }

      // Cerrar dropdowns al hacer clic fuera
      document.addEventListener("click", (e) => {
        if (!e.target.closest(".menu-parent")) {
          document.querySelectorAll(".menu-parent.open").forEach((el) => {
            el.classList.remove("open");
          });
        }
      });