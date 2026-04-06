/**
 * Tailwind CSS Configuration - La Cima Zenith ERP
 * Design System: Colors from logo + League Spartan typography
 */
module.exports = {
  content: [
    "./src/views/**/*.ejs",
    "./src/routes/**/*.js",
    "../../frontend/public/**/*.html",
    "../../frontend/src/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        // Primary - Logo Green
        primary: {
          DEFAULT: "#ceff5e",
          dim: "#bded4f",
          light: "#d4ff85",
          dark: "#a8d64f",
          50: "#f7fce6",
          100: "#eef8d0",
          200: "#d9f0a5",
          300: "#c3e87a",
          400: "#a8d64f",
          500: "#ceff5e",
          600: "#bded4f",
          700: "#a8d64f",
          800: "#8db83d",
          900: "#6e8f2e",
        },
        // Secondary - Logo Dark
        secondary: {
          DEFAULT: "#1c1c1c",
          light: "#2a2a2a",
          dark: "#0f0f0f",
          50: "#f5f5f5",
          100: "#e5e5e5",
          200: "#cccccc",
          300: "#b3b3b3",
          400: "#999999",
          500: "#808080",
          600: "#666666",
          700: "#4d4d4d",
          800: "#333333",
          900: "#1c1c1c",
        },
        // Neutral/Surface
        surface: {
          DEFAULT: "#ffffff",
          dim: "#f6f6f9",
          variant: "#e8e8eb",
        },
        outline: {
          DEFAULT: "#e2e2e5",
          variant: "#d0d0d5",
        },
        // Semantic colors
        success: {
          DEFAULT: "#22c55e",
          light: "#4ade80",
          dark: "#16a34a",
        },
        warning: {
          DEFAULT: "#f59e0b",
          light: "#fbbf24",
          dark: "#d97706",
        },
        error: {
          DEFAULT: "#ef4444",
          light: "#f87171",
          dark: "#dc2626",
        },
        info: {
          DEFAULT: "#3b82f6",
          light: "#60a5fa",
          dark: "#2563eb",
        },
      },
      fontFamily: {
        display: ["League Spartan", "sans-serif"],
        body: ["League Spartan", "sans-serif"],
        sans: ["League Spartan", "sans-serif"],
      },
      fontSize: {
        xs: ["0.625rem", { lineHeight: "0.75rem" }],
        sm: ["0.75rem", { lineHeight: "1rem" }],
        base: ["0.875rem", { lineHeight: "1.25rem" }],
        lg: ["1rem", { lineHeight: "1.5rem" }],
        xl: ["1.25rem", { lineHeight: "1.75rem" }],
        "2xl": ["1.5rem", { lineHeight: "2rem" }],
        "3xl": ["1.875rem", { lineHeight: "2.25rem" }],
        "4xl": ["2.25rem", { lineHeight: "2.5rem" }],
        "5xl": ["3rem", { lineHeight: "1" }],
        "6xl": ["3.75rem", { lineHeight: "1" }],
        "7xl": ["4.5rem", { lineHeight: "1" }],
      },
      borderRadius: {
        none: "0px",
        sm: "4px",
        DEFAULT: "6px",
        md: "8px",
        lg: "12px",
        xl: "16px",
        "2xl": "24px",
        full: "9999px",
      },
      boxShadow: {
        card: "0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04)",
        "card-hover": "0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.04)",
        modal: "0 20px 60px rgba(0,0,0,0.15), 0 8px 20px rgba(0,0,0,0.1)",
        dropdown: "0 4px 16px rgba(0,0,0,0.1)",
        glass: "0 8px 32px rgba(0,0,0,0.08)",
      },
    },
  },
  plugins: [],
};
