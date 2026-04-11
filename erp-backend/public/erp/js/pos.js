tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#ceff5e", // Verde Lima Cima
                secondary: "#1c1c1c", // Negro Industrial
                background: "#0c0e10",
                surface: "#16181a",
                outline: "#2a2c2e",
                "on-surface": "#ffffff",
                "on-surface-variant": "#a0a0ab"
            },
            borderRadius: {
                DEFAULT: "0.125rem",
                lg: "0.25rem",
                xl: "0.5rem",
                full: "9999px"
            },
            fontFamily: {
                sans: ['League Spartan', 'sans-serif'],
                headline: ['League Spartan', 'sans-serif']
            }
        }
    }
}
