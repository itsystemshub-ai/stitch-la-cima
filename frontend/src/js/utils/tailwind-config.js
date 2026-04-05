tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      "colors": {
        "primary": "#ceff5e", // Verde Lima Cima
        "primary-dim": "#bded4f",
        "on-primary": "#000000",
        "secondary": "#1c1c1c", // Negro/Gris Muy Oscuro
        "background": "#f6f6f9",
        "surface": "#ffffff",
        "on-surface": "#0c0e10",
        "on-surface-variant": "#5a5c5e",
        "outline": "#e2e2e5"
      },
      "borderRadius": {
        "DEFAULT": "0.125rem",
        "lg": "0.25rem",
        "xl": "0.5rem",
        "full": "9999px"
      },
      "fontFamily": {
        "headline": ["Manrope", "sans-serif"],
        "body": ["Manrope", "sans-serif"],
        "label": ["Manrope", "sans-serif"]
      }
    },
  },
}
