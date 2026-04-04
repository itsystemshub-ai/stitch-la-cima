# Design System Specification

## 1. Overview & Creative North Star: The Technical Monolith
This design system moves away from the generic "software-as-a-service" aesthetic toward a **Technical Monolith** philosophy. It is designed to feel like high-performance automotive engineering: precise, heavy, yet incredibly efficient. 

We achieve a signature "Editorial Industrial" look by breaking the rigid, predictable grid. We utilize intentional asymmetry—such as oversized display typography paired with ultra-dense technical data—and overlapping surfaces to create a sense of mechanical assembly. This isn't just an interface; it is a professional tool that commands authority in the B2B/B2C automotive aftermarket.

---

## 2. Colors & Surface Philosophy
The palette is rooted in industrial strength. We use deep, "oily" blacks and architectural grays, punctuated by a high-visibility lime green that functions as a "system status" and "action" signal.

### The "No-Line" Rule
To achieve a high-end, bespoke feel, **1px solid borders are strictly prohibited for sectioning.** Traditional dividers make an interface feel cluttered and "templated." 
- **Definition through Tone:** Define boundaries solely through background color shifts. For instance, a `surface-container-low` section should sit on a `surface` background to define its edge.
- **Surface Hierarchy & Nesting:** Treat the UI as physical layers. Use `surface-container-lowest` (#ffffff) for primary content cards to make them "pop" against a `surface-container-low` (#f0f0f3) dashboard background.

### The Glass & Gradient Rule
- **Glassmorphism:** Use for floating elements like complex search overlays or navigation bars. Use a semi-transparent `surface` color with a 12px-20px backdrop blur to allow the technical data beneath to peak through, creating depth without clutter.
- **Signature Gradients:** For primary CTAs and high-impact Hero sections, use a subtle linear gradient transitioning from `primary` (#4a6400) to `primary-fixed-dim` (#bded4f). This mimics the metallic sheen of precision-machined parts.

---

## 3. Typography: The Industrial Editorial
We utilize a dual-font strategy to balance brand authority with technical legibility.

- **Display & Headlines (Manrope):** This is our "Editorial" voice. Use `display-lg` and `headline-lg` with tight letter-spacing (-0.02em) to create a bold, authoritative presence. Headlines should be treated as design elements—don't be afraid of large scale.
- **Body & Technical Data (Inter):** Our "Workhorse." Inter’s high x-height is perfect for the dense tables required for automotive parts data. Use `body-md` for standard text and `label-sm` for technical specifications and part numbers.
- **Hierarchy as Identity:** Create contrast by pairing a `display-md` headline with a `label-md` uppercase caption in `primary` (#4a6400). This gap in scale is what separates custom design from generic templates.

---

## 4. Elevation & Depth: Tonal Layering
In an "Industrial Modern" aesthetic, shadows should be felt, not seen.

- **The Layering Principle:** Stack `surface-container` tiers to create hierarchy. 
  - *Base:* `surface`
  - *Secondary Area:* `surface-container-low`
  - *Floating Component:* `surface-container-lowest`
- **Ambient Shadows:** When a component must "float" (like a modal or a primary search bar), use a shadow with a 24px-32px blur and 4% opacity. The shadow color must be a tinted version of `on-surface` (#2d2f31), never pure black.
- **The "Ghost Border" Fallback:** If a border is mission-critical for accessibility in dense data tables, use the `outline-variant` token at **15% opacity**. This creates a "hint" of a line without breaking the tonal flow.

---

## 5. Components

### High-Performance Search & Input
- **Complex Search:** Use a wide, `surface-container-lowest` container with a `lg` (0.5rem) corner radius. The active state should be signaled by a 2px `primary` (#4a6400) bottom-only glow, rather than a full outline.
- **Inputs:** Use `surface-container-high` for the field background. Labels should use `label-md` in `on-surface-variant` for a muted, professional look.

### Buttons: Precision Actuators
- **Primary:** High-contrast `primary` background with `on-primary` text. Use `md` (0.375rem) corner radius for a "precision-tooled" feel.
- **Secondary:** Use `secondary-container` with no border. 
- **Interaction:** On hover, apply a subtle shift to `primary-dim` rather than a standard brightness change.

### Data-Dense Tables & Cards
- **Forgo Dividers:** In tables, separate rows using alternating `surface` and `surface-container-low` backgrounds (Zebra striping). 
- **Content Spacing:** Use the `xl` spacing scale (at least 24px) between data clusters to allow the "Industrial" density to breathe.
- **Chips:** For part status (e.g., "In Stock"), use `tertiary-container` with `on-tertiary-container` text. Keep corners sharp (`sm` - 0.125rem) to maintain the industrial vibe.

---

## 6. Do's and Don'ts

### Do:
- **Do** use `primary-container` (#cbfc5c) for subtle background highlights behind important technical specs.
- **Do** align technical data to a strict baseline grid; precision is the core of this brand.
- **Do** use high-contrast typography scales (e.g., placing `label-sm` metadata immediately under a `headline-sm` title).

### Don't:
- **Don't** use 100% opaque, high-contrast borders for any container.
- **Don't** use "standard" blue for links or success states. Use the `primary` or `tertiary` tiers provided.
- **Don't** use rounded corners larger than `xl` (0.75rem). We are building an industrial tool, not a consumer social app; maintain the "sharp" edge of reliability.
- **Don't** clutter the interface with icons. Let the typography and color shifts do the heavy lifting of navigation.