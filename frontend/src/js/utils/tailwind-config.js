/**
 * Tailwind CSS Configuration - La Cima Zenith ERP
 * Design System: Colors from AdobeColor - Logo QSP
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
        // Primary - Logo Lime Green (#B3D92A)
        primary: {
          DEFAULT: "#B3D92A",
          dim: "#9BC020",
          light: "#C9E045",
          dark: "#8AA619",
          50: "#f5f9e6",
          100: "#ebf3cc",
          200: "#d7e799",
          300: "#c4db66",
          400: "#B3D92A",
          500: "#9BC020",
          600: "#8AA619",
          700: "#6F8514",
          800: "#556510",
          900: "#3A450B",
        },
        // Secondary - Logo Lime Light (#C1D96B)
        secondary: {
          DEFAULT: "#C1D96B",
          light: "#D4E690",
          dark: "#A8C44A",
          50: "#f6f9ee",
          100: "#ecf3dd",
          200: "#d9e7bb",
          300: "#C1D96B",
          400: "#A8C44A",
          500: "#8AA619",
          600: "#6F8514",
          700: "#556510",
          800: "#3A450B",
          900: "#202506",
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
          lighter: "#262626",
        },
        // Neutral - Logo Grays
        neutral: {
          50: "#FEFEFE",
          100: "#F7F7F7",
          200: "#F2F2F2",
          300: "#E8E8E8",
          400: "#CCCCCC",
          500: "#999999",
          600: "#666666",
          700: "#333333",
          800: "#1A1A1A",
          900: "#0D0D0D",
        },
        // Surface
        surface: {
          DEFAULT: "#FFFFFF",
          dim: "#F7F7F7",
          variant: "#F2F2F2",
        },
        outline: {
          DEFAULT: "#E8E8E8",
          variant: "#CCCCCC",
        },
        // Semantic
        success: {
          DEFAULT: "#B3D92A",
          light: "#C9E045",
          dark: "#8AA619",
        },
        warning: {
          DEFAULT: "#D4A52A",
          light: "#E6B83D",
          dark: "#B38A1E",
        },
        error: {
          DEFAULT: "#D92A2A",
          light: "#E64545",
          dark: "#B31E1E",
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
        card: "0 1px 3px rgba(13,13,13,0.08), 0 1px 2px rgba(13,13,13,0.04)",
        "card-hover": "0 4px 12px rgba(13,13,13,0.12), 0 2px 4px rgba(13,13,13,0.06)",
        modal: "0 20px 60px rgba(13,13,13,0.15), 0 8px 20px rgba(13,13,13,0.1)",
        dropdown: "0 4px 16px rgba(13,13,13,0.1)",
        glass: "0 8px 32px rgba(179,217,42,0.08)",
      },
    },
  },
  plugins: [],
};
