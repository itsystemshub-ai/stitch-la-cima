/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.html",
    "./src/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#4a6400',
          dim: '#3d5200',
          light: '#5d7a00',
          '50': '#f7fce6',
          '100': '#eef8d0',
          '200': '#d9f0a5',
          '300': '#c3e87a',
          '400': '#a8d64f',
          '500': '#4a6400',
          '600': '#3d5200',
          '700': '#2d3d00',
          '800': '#1d2800',
          '900': '#0e1400',
        },
        secondary: {
          DEFAULT: '#1c1c1c',
          light: '#2a2a2a',
          dark: '#0f0f0f',
        },
        surface: {
          DEFAULT: '#ffffff',
          dim: '#f6f6f9',
          variant: '#e8e8eb',
        },
        outline: {
          DEFAULT: '#e2e2e5',
          variant: '#d0d0d5',
        },
        success: {
          DEFAULT: '#22c55e',
          light: '#4ade80',
          dark: '#16a34a',
        },
        warning: {
          DEFAULT: '#f59e0b',
          light: '#fbbf24',
          dark: '#d97706',
        },
        error: {
          DEFAULT: '#ef4444',
          light: '#f87171',
          dark: '#dc2626',
        },
        info: {
          DEFAULT: '#3b82f6',
          light: '#60a5fa',
          dark: '#2563eb',
        },
      },
      fontFamily: {
        display: ['Manrope', 'sans-serif'],
        body: ['Inter', 'sans-serif'],
        mono: ['JetBrains Mono', 'monospace'],
      },
      borderRadius: {
        none: '0px',
        sm: '4px',
        DEFAULT: '6px',
        md: '8px',
        lg: '12px',
        xl: '16px',
        '2xl': '24px',
        full: '9999px',
      },
      fontSize: {
        'display-xl': ['48px', { lineHeight: '1.1', fontWeight: '800' }],
        'display-lg': ['36px', { lineHeight: '1.15', fontWeight: '800' }],
        'display-md': ['28px', { lineHeight: '1.2', fontWeight: '700' }],
        'display-sm': ['22px', { lineHeight: '1.25', fontWeight: '700' }],
        'headline-lg': ['20px', { lineHeight: '1.3', fontWeight: '600' }],
        'headline-md': ['18px', { lineHeight: '1.35', fontWeight: '600' }],
        'headline-sm': ['16px', { lineHeight: '1.4', fontWeight: '600' }],
        'body-lg': ['16px', { lineHeight: '1.5', fontWeight: '400' }],
        'body-md': ['14px', { lineHeight: '1.5', fontWeight: '400' }],
        'body-sm': ['12px', { lineHeight: '1.5', fontWeight: '400' }],
        'label-lg': ['14px', { lineHeight: '1.4', fontWeight: '500' }],
        'label-md': ['12px', { lineHeight: '1.4', fontWeight: '500' }],
        'label-sm': ['10px', { lineHeight: '1.4', fontWeight: '500' }],
      },
      boxShadow: {
        'card': '0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04)',
        'card-hover': '0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.04)',
        'modal': '0 20px 60px rgba(0,0,0,0.15), 0 8px 20px rgba(0,0,0,0.1)',
        'dropdown': '0 4px 16px rgba(0,0,0,0.1)',
        'glass': '0 8px 32px rgba(0,0,0,0.08)',
      },
    },
  },
  plugins: [],
}
