const menuToggle = document.getElementById("menuToggle");
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("sidebarOverlay");

      if (menuToggle) {
        menuToggle.addEventListener("click", () => {
          sidebar.classList.toggle("open");
          overlay.classList.toggle("hidden");
        });
      }

      function toggleDropdown(menuItem) {
        const parent = menuItem.closest(".menu-parent");
        const wasOpen = parent.classList.contains("open");
        document.querySelectorAll(".menu-parent.open").forEach((el) => {
          if (el !== parent) el.classList.remove("open");
        });
        if (!wasOpen) {
          parent.classList.add("open");
        }
      }

      document.addEventListener("click", (e) => {
        if (!e.target.closest(".menu-parent")) {
          document.querySelectorAll(".menu-parent.open").forEach((el) => {
            el.classList.remove("open");
          });
        }
      });