/**
 * Tailwind CSS Configuration - La Cima Zenith ERP
 * Design System: Colors extracted from logo + League Spartan typography
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
        // Primary - Logo Blue (#2545BF, #1054D4)
        primary: {
          DEFAULT: "#2545BF",
          dim: "#1a3599",
          light: "#3b5fd4",
          dark: "#1a3599",
          50: "#e8ebf8",
          100: "#d1d7f1",
          200: "#a3aee3",
          300: "#7586d5",
          400: "#475dc7",
          500: "#2545BF",
          600: "#1a3599",
          700: "#1054D4",
          800: "#0d3d9a",
          900: "#0a2e75",
        },
        // Secondary - Logo Cyan (#00D0D0, #00FFFF)
        secondary: {
          DEFAULT: "#00D0D0",
          light: "#00FFFF",
          dark: "#00a3a3",
          50: "#e5fafa",
          100: "#ccf5f5",
          200: "#99ebeb",
          300: "#66e0e0",
          400: "#33d6d6",
          500: "#00D0D0",
          600: "#00a3a3",
          700: "#007777",
          800: "#004a4a",
          900: "#002020",
        },
        // Accent - Logo Green (#00FF00)
        accent: {
          DEFAULT: "#00FF00",
          light: "#33ff33",
          dark: "#00cc00",
          50: "#e6ffe6",
          100: "#ccffcc",
          200: "#99ff99",
          300: "#66ff66",
          400: "#33ff33",
          500: "#00FF00",
          600: "#00cc00",
          700: "#009900",
          800: "#006600",
          900: "#003300",
        },
        // Neutral tones from logo (#9BAC9A, #949AA2, #A4A292)
        neutral: {
          50: "#f5f5f5",
          100: "#e8e8e8",
          200: "#d1d1d1",
          300: "#9BAC9A",
          400: "#949AA2",
          500: "#A4A292",
          600: "#666666",
          700: "#444444",
          800: "#222222",
          900: "#000000",
        },
        // Surface colors
        surface: {
          DEFAULT: "#ffffff",
          dim: "#f5f7fa",
          variant: "#e8ecef",
        },
        outline: {
          DEFAULT: "#d1d7e0",
          variant: "#b0b8c4",
        },
        // Semantic colors
        success: {
          DEFAULT: "#00cc00",
          light: "#00ff00",
          dark: "#009900",
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
          DEFAULT: "#1054D4",
          light: "#2545BF",
          dark: "#0d3d9a",
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
        card: "0 1px 3px rgba(37,69,191,0.08), 0 1px 2px rgba(37,69,191,0.04)",
        "card-hover": "0 4px 12px rgba(37,69,191,0.12), 0 2px 4px rgba(37,69,191,0.06)",
        modal: "0 20px 60px rgba(0,0,0,0.15), 0 8px 20px rgba(0,0,0,0.1)",
        dropdown: "0 4px 16px rgba(37,69,191,0.1)",
        glass: "0 8px 32px rgba(0,208,208,0.08)",
      },
    },
  },
  plugins: [],
};
