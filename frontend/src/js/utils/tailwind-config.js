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
            dark: "#a8d64f"
          },
          secondary: "#1c1c1c",
          background: "#f6f6f9",
          surface: "#ffffff",
          "on-surface": "#0c0e10",
          "on-surface-variant": "#5a5c5e",
          "on-primary": "#000000",
          outline: "#e2e2e5",
          zinc: {
            50: "#fafafa",
            100: "#f4f4f5",
            200: "#e4e4e7",
            300: "#d4d4d8",
            400: "#a1a1aa",
            500: "#71717a",
            600: "#52525b",
            700: "#3f3f46",
            800: "#27272a",
            900: "#18181b",
            950: "#09090b"
          },
          stone: {
            50: "#fafaf9",
            100: "#f5f5f4",
            200: "#e7e5e4",
            300: "#d6d3d1",
            400: "#a8a29e",
            500: "#78716c",
            600: "#57534e",
            700: "#44403c",
            800: "#292524",
            900: "#1c1917"
          }
        },
        borderRadius: {
          DEFAULT: "0.125rem",
          lg: "0.25rem",
          xl: "0.5rem",
          full: "9999px"
        },
        fontFamily: {
          headline: ["Manrope", "sans-serif"],
          body: ["Manrope", "sans-serif"],
          label: ["Manrope", "sans-serif"]
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
          "7xl": ["4.5rem", { lineHeight: "1" }]
        },
        boxShadow: {
          sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)",
          DEFAULT: "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)",
          md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
          lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
          xl: "0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)",
          "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)"
        }
      }
    }
  }
};
