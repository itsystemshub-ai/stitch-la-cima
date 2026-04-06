/**
 * Tailwind CDN Config - La Cima Zenith ERP
 * Colors from AdobeColor - Logo QSP
 */
window.tailwind = {
  config: {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          // Primary - Logo Lime Green (#B3D92A)
          primary: {
            DEFAULT: "#B3D92A",
            dim: "#9BC020",
            light: "#C9E045",
            dark: "#8AA619",
          },
          "primary-dim": "#9BC020",
          "on-primary": "#0D0D0D",
          // Secondary - Logo Lime Light (#C1D96B)
          secondary: {
            DEFAULT: "#C1D96B",
            light: "#D4E690",
            dark: "#A8C44A",
          },
          // Accent - Logo Sage (#C9D990)
          accent: {
            DEFAULT: "#C9D990",
            light: "#DDE8B3",
            dark: "#A8BA5A",
          },
          // Dark - Logo Black (#0D0D0D)
          dark: {
            DEFAULT: "#0D0D0D",
            light: "#1A1A1A",
          },
          // Neutrals
          background: "#F7F7F7",
          surface: "#FFFFFF",
          "surface-dim": "#F7F7F7",
          "on-surface": "#0D0D0D",
          "on-surface-variant": "#666666",
          outline: "#E8E8E8",
          zinc: {
            50: "#FEFEFE", 100: "#F7F7F7", 200: "#F2F2F2", 300: "#E8E8E8",
            400: "#CCCCCC", 500: "#999999", 600: "#666666", 700: "#333333",
            800: "#1A1A1A", 900: "#0D0D0D",
          },
          stone: {
            50: "#FAFAF9", 100: "#F5F5F4", 200: "#E7E5E4", 300: "#D6D3D1",
            400: "#A8A29E", 500: "#78716C", 600: "#57534E", 700: "#44403C",
            800: "#292524", 900: "#1C1917",
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
          card: "0 1px 3px rgba(13,13,13,0.08), 0 1px 2px rgba(13,13,13,0.04)",
          "card-hover": "0 4px 12px rgba(13,13,13,0.12), 0 2px 4px rgba(13,13,13,0.06)",
        },
      },
    },
  },
};
