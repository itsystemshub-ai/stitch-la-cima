/**
 * Tailwind CSS Configuration - La Cima Zenith ERP
 * Design System: Colors from logo + League Spartan typography
 */
window.tailwind = {
  config: {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: {
            DEFAULT: "#ceff5e",
            dim: "#bded4f",
            light: "#d4ff85",
            dark: "#a8d64f",
          },
          "primary-dim": "#bded4f",
          "on-primary": "#000000",
          secondary: "#1c1c1c",
          background: "#f6f6f9",
          surface: "#ffffff",
          "on-surface": "#0c0e10",
          "on-surface-variant": "#5a5c5e",
          outline: "#e2e2e5",
          zinc: {
            50: "#fafafa", 100: "#f4f4f5", 200: "#e4e4e7", 300: "#d4d4d8",
            400: "#a1a1aa", 500: "#71717a", 600: "#52525b", 700: "#3f3f46",
            800: "#27272a", 900: "#18181b", 950: "#09090b",
          },
          stone: {
            50: "#fafaf9", 100: "#f5f5f4", 200: "#e7e5e4", 300: "#d6d3d1",
            400: "#a8a29e", 500: "#78716c", 600: "#57534e", 700: "#44403c",
            800: "#292524", 900: "#1c1917",
          },
        },
        borderRadius: {
          DEFAULT: "0.125rem",
          lg: "0.25rem",
          xl: "0.5rem",
          full: "9999px",
        },
        fontFamily: {
          headline: ["League Spartan", "sans-serif"],
          body: ["League Spartan", "sans-serif"],
          label: ["League Spartan", "sans-serif"],
        },
      },
    },
  },
};
