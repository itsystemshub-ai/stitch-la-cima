/**
 * Tailwind CDN Config - La Cima Zenith ERP
 * Colors extracted from logo + League Spartan typography
 */
window.tailwind = {
  config: {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          // Primary - Logo Blue (#2545BF, #1054D4)
          primary: {
            DEFAULT: "#2545BF",
            dim: "#1a3599",
            light: "#3b5fd4",
            dark: "#0d3d9a",
          },
          "primary-dim": "#1a3599",
          "on-primary": "#ffffff",
          // Secondary - Logo Cyan (#00D0D0)
          secondary: {
            DEFAULT: "#00D0D0",
            light: "#00FFFF",
            dark: "#00a3a3",
          },
          // Accent - Logo Green
          accent: {
            DEFAULT: "#00FF00",
            light: "#33ff33",
            dark: "#00cc00",
          },
          // Neutral tones from logo
          neutral: {
            300: "#9BAC9A",
            400: "#949AA2",
            500: "#A4A292",
          },
          // Surface
          background: "#f5f7fa",
          surface: "#ffffff",
          "surface-dim": "#f5f7fa",
          "on-surface": "#222222",
          "on-surface-variant": "#666666",
          outline: "#d1d7e0",
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
          sans: ["League Spartan", "sans-serif"],
        },
        boxShadow: {
          card: "0 1px 3px rgba(37,69,191,0.08), 0 1px 2px rgba(37,69,191,0.04)",
          "card-hover": "0 4px 12px rgba(37,69,191,0.12), 0 2px 4px rgba(37,69,191,0.06)",
          modal: "0 20px 60px rgba(0,0,0,0.15), 0 8px 20px rgba(0,0,0,0.1)",
          dropdown: "0 4px 16px rgba(37,69,191,0.1)",
        },
      },
    },
  },
};
