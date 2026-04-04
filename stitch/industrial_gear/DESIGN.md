```markdown
# Design System Document: Industrial Precision & Kinetic Depth

## 1. Overview & Creative North Star: "The Machined Monolith"
This design system moves away from the "generic catalog" look of industrial e-commerce and adopts an editorial, high-end engineering aesthetic. Our Creative North Star is **"The Machined Monolith."** 

Like a precision-engineered engine block or a high-performance chassis, the UI should feel heavy, reliable, and intentional. We achieve this by breaking the traditional rigid grid with **intentional asymmetry**, using dense information clusters balanced by expansive "breathing" gutters, and replacing structural lines with **tonal layering**. The result is a digital environment that feels as robust as the hardware it sells.

---

## 2. Colors: Tonal Engineering
Our palette is not just a set of colors; it is a system of functional depths. We utilize a high-contrast foundation to ensure professional authority.

### The "No-Line" Rule
**Explicit Instruction:** Do not use 1px solid borders to section content. Boundaries must be defined through background color shifts. For example, a `surface-container-low` section should sit directly on a `surface` background. If you feel the need for a line, use a vertical whitespace shift or a background color change instead.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical layers. Use the surface tiers to create "nested" depth:
*   **Base Layer:** `surface` (#f7f9ff) – The canvas.
*   **Sectional Depth:** `surface-container-low` (#edf4ff) – Use for large layout blocks.
*   **Component Elevation:** `surface-container-highest` (#d1e4fb) – For active cards or sidebars.
*   **The Inset:** `surface-dim` (#c9dcf3) – For "well" patterns where technical data or specs are displayed.

### Signature Textures & Gradients
To avoid a flat "Bootstrap" feel, apply a **Subtle Kinetic Gradient** to primary CTAs. Transition from `primary` (#944a00) to `primary_container` (#e67e22) at a 135° angle. This mimics the sheen of industrial coating or polished metal.

---

## 3. Typography: Authoritative Clarity
We utilize a dual-typeface system to balance technical precision with modern accessibility.

*   **Display & Headlines (Manrope):** Use Manrope for all `display` and `headline` levels. Its geometric construction provides a "machined" feel that signals authority. 
    *   *Directorial Note:* Use `display-lg` (3.5rem) with tight letter-spacing (-0.02em) for hero sections to create an editorial, "poster-like" impact.
*   **Technical Data & Body (Inter):** Inter is our workhorse for high-density information. Its high x-height ensures legibility in spec sheets and part descriptions.
    *   *Directorial Note:* Use `label-md` for technical attributes (e.g., "Torque," "Dimensions") in uppercase with +0.05em tracking to evoke industrial stamping.

---

## 4. Elevation & Depth: The Layering Principle
We reject traditional drop shadows in favor of **Tonal Layering** and **Ambient Light**.

*   **Layering over Lines:** Achieve hierarchy by "stacking." A `surface-container-lowest` card placed on a `surface-container-low` section creates a soft, natural lift without the clutter of shadows.
*   **Ambient Shadows:** When a "floating" effect is required (e.g., a parts-selector modal), use an extra-diffused shadow: `box-shadow: 0 20px 40px rgba(9, 29, 46, 0.06)`. The shadow color must be a tinted version of `on-surface` (#091d2e), never pure black.
*   **The "Ghost Border":** If a container requires a boundary (e.g., search inputs), use the `outline-variant` (#dcc1b1) at **15% opacity**. 100% opaque borders are forbidden.
*   **Glassmorphism:** For navigation overlays or floating action toolbars, use `surface` at 80% opacity with a `backdrop-blur: 12px`. This keeps the user connected to the industrial environment beneath.

---

## 5. Components

### Buttons: High-Torque Actions
*   **Primary:** A gradient from `primary` to `primary_container`. Border-radius: `md` (0.375rem). Text: `title-sm` (Inter, Semi-bold).
*   **Secondary:** `surface-container-highest` background with `on-surface` text. No border.
*   **Tertiary:** No background. `on-surface` text with a `primary` underline that expands on hover.

### Cards: The Spec-First Module
Forbid the use of divider lines within cards. Separate the product image, title, and price using `surface-container` shifts.
*   **The Data Grid:** Use `body-sm` for SKU numbers and compatibility codes, nested in a `surface-dim` micro-container within the card.

### Input Fields: Precision Entry
Inputs should feel like a dashboard.
*   **State:** Use `surface-container-lowest` for the background.
*   **Focus:** Instead of a thick border, use a 2px `primary` underline and a subtle `surface-tint` glow.

### Technical Chips
Selection chips for part categories (e.g., "Transmission," "Engine") should use `secondary_container` (#cfe2f9) with `on-secondary_container` text. Use `radius-full` for chips to contrast against the `md` radius of the main containers.

---

## 6. Do’s and Don’ts

### Do:
*   **Embrace Density:** Industrial buyers need data. Use `body-sm` and `label-sm` to create rich information clusters, but use 32px or 48px gutters to prevent visual noise.
*   **Use Asymmetry:** Place a large product image off-center, overlapping a background color block to create a high-end editorial feel.
*   **Tint Your Greys:** Every "grey" in this system is slightly blue-tinted (`secondary` tokens) to maintain a cold, professional, automotive steel vibe.

### Don't:
*   **No "Flat" Buttons:** Avoid buttons that look like stickers. Use subtle gradients or elevation to give them physical "clickability."
*   **No Standard Dividers:** Never use a `<hr>` or a 1px border to separate list items. Use 16px of vertical space or a 2% background tint shift.
*   **No High-Contrast Shadows:** Avoid harsh, dark shadows that "dirty" the clean `surface` background. Depth should be felt, not seen.

---

## 7. Spacing & Roundedness
*   **Corner Strategy:** Use `md` (6px) for all primary components (cards, buttons, inputs). This creates a "precision-milled" look—neither sharp nor soft.
*   **Rhythm:** Use a strict 8px grid. Large sections should be separated by 80px or 120px to provide the luxury of space amidst technical density.```