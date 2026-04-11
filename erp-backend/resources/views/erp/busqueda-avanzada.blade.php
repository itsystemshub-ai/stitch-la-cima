@extends('layouts.erp')

@section('title', 'Advanced Search | MAYOR DE REPUESTO LA CIMA, C.A. | ERP La Cima')

@push('styles')
    <link rel="stylesheet" href="/frontend/public/erp/css/busqueda-avanzada.css">
@endpush

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Página';
  });
</script>

<main class="min-h-screen blueprint-bg">
<!-- Hero Search Section -->
<section class="max-w-[1920px] mx-auto px-6 py-12 md:py-20 flex flex-col items-center">
<div class="w-full max-w-4xl text-center mb-12">
<h1 class="font-headline text-5xl md:text-7xl font-bold uppercase tracking-tighter text-on-surface mb-4">
                    Technical <span class="text-primary">Component</span> Search
                </h1>
<p class="text-secondary text-lg max-w-2xl mx-auto font-light">
                    Precision engineering requires exact specifications. Locate high-performance industrial parts through our advanced technical filtering system.
                </p>
</div>
<!-- Main Search Interface -->
<div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-12 gap-8">
<!-- Sidebar Filters -->
<aside class="lg:col-span-3 space-y-6">
<div class="bg-surface-container-lowest p-6 rounded-lg shadow-sm">
<h3 class="font-headline font-bold text-sm uppercase tracking-widest text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">tune</span> Filter Matrix
                        </h3>
<!-- Brand -->
<div class="mb-8">
<label class="block font-headline text-xs font-bold uppercase tracking-wider text-secondary mb-3">Manufacturer</label>
<div class="space-y-2">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded-sm border-outline-variant text-primary focus:ring-primary w-4 h-4" type="checkbox"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Cummins</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input checked="" class="rounded-sm border-outline-variant text-primary focus:ring-primary w-4 h-4" type="checkbox"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Volvo Penta</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded-sm border-outline-variant text-primary focus:ring-primary w-4 h-4" type="checkbox"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Detroit Diesel</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded-sm border-outline-variant text-primary focus:ring-primary w-4 h-4" type="checkbox"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Caterpillar</span>
</label>
</div>
</div>
<!-- Engine Series -->
<div class="mb-8">
<label class="block font-headline text-xs font-bold uppercase tracking-wider text-secondary mb-3">Series / Platform</label>
<select class="w-full bg-surface-container-highest border-none text-sm py-2 px-3 rounded focus:ring-2 focus:ring-primary">
<option>All Series</option>
<option>ISX15 / X15</option>
<option>D13 / D16</option>
<option>Series 60</option>
<option>C15 / C18 ACERT</option>
</select>
</div>
<!-- Category -->
<div class="mb-8">
<label class="block font-headline text-xs font-bold uppercase tracking-wider text-secondary mb-3">Part Category</label>
<div class="space-y-2">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="border-outline-variant text-primary focus:ring-primary w-4 h-4" name="cat" type="radio"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Cylinder Heads</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input checked="" class="border-outline-variant text-primary focus:ring-primary w-4 h-4" name="cat" type="radio"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Fuel Systems</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="border-outline-variant text-primary focus:ring-primary w-4 h-4" name="cat" type="radio"/>
<span class="text-sm text-on-surface group-hover:text-primary transition-colors">Turbochargers</span>
</label>
</div>
</div>
<!-- Price Range -->
<div>
<label class="block font-headline text-xs font-bold uppercase tracking-wider text-secondary mb-3">Price Range (USD)</label>
<div class="flex gap-2 items-center">
<input class="w-full bg-surface-container-highest border-none text-xs p-2 rounded" placeholder="Min" type="number"/>
<span class="text-outline-variant">â€”</span>
<input class="w-full bg-surface-container-highest border-none text-xs p-2 rounded" placeholder="Max" type="number"/>
</div>
</div>
<button class="w-full mt-8 bg-on-surface text-surface py-3 font-headline font-bold text-xs uppercase tracking-widest hover:bg-primary transition-colors">
                            Apply Parameters
                        </button>
</div>
</aside>
<!-- Search Results Area -->
<div class="lg:col-span-9 space-y-8">
<!-- Advanced Search Bar -->
<div class="relative">
<div class="flex items-center bg-surface-container-lowest shadow-xl rounded-lg overflow-hidden border-2 border-transparent focus-within:border-primary transition-all">
<span class="material-symbols-outlined ml-6 text-outline">search</span>
<input class="w-full border-none bg-transparent py-6 px-4 text-xl font-headline focus:ring-0 placeholder:text-outline/50" placeholder="Search by Part Number or Keyword..." type="text" value="High pressure fuel injector assembly"/>
<button class="bg-primary text-on-primary px-10 py-6 font-headline font-black uppercase tracking-tighter hover:bg-on-primary-container transition-colors">
                                Search
                            </button>
</div>
<!-- Suggestions Dropdown (Demo State) -->
<div class="absolute top-full left-0 right-0 mt-2 bg-surface-container-lowest shadow-2xl rounded-lg z-10 overflow-hidden border border-surface-container-highest">
<div class="p-3 bg-surface-container-low text-[10px] font-bold uppercase tracking-widest text-secondary">Technical Suggestions</div>
<div class="p-4 hover:bg-surface-container-high cursor-pointer flex justify-between items-center group">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-outline">settings_input_component</span>
<div>
<span class="text-on-surface font-medium">Injector 2872405</span>
<p class="text-xs text-secondary">Cummins ISX15 Engine Series</p>
</div>
</div>
<span class="text-[10px] font-headline bg-primary-container text-on-primary-container px-2 py-1 rounded-sm uppercase">In Stock</span>
</div>
<div class="p-4 hover:bg-surface-container-high cursor-pointer flex justify-between items-center">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-outline">settings_input_component</span>
<div>
<span class="text-on-surface font-medium">Fuel Rail High Pressure</span>
<p class="text-xs text-secondary">Volvo D13 Platform</p>
</div>
</div>
<span class="text-xs text-outline italic">2 variations available</span>
</div>
</div>
</div>
<!-- Active Filters Display -->
<div class="flex flex-wrap gap-2 items-center mt-4">
<span class="text-xs font-bold uppercase tracking-wider text-outline-variant mr-2">Active:</span>
<div class="bg-primary-container/20 text-on-primary-container border border-primary-container flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium">
                            Volvo Penta <button class="material-symbols-outlined text-sm">close</button>
</div>
<div class="bg-primary-container/20 text-on-primary-container border border-primary-container flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium">
                            Fuel Systems <button class="material-symbols-outlined text-sm">close</button>
</div>
<button class="text-xs text-primary font-bold uppercase hover:underline ml-2">Clear All</button>
</div>
<!-- Results Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Part Card 1 -->
<div class="bg-surface-container-lowest group relative p-1 rounded-lg overflow-hidden transition-all hover:shadow-2xl">
<div class="relative aspect-video overflow-hidden rounded-md bg-surface-container-high">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Close-up of a high-precision metal engine fuel injector with intricate metallic details and mechanical precision lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdih3XW_e6_FAaQCp97gTQ45lzDlWb-bqNy-qbZPTpjtZq6aw5z4etnzjXUGKuQFlngtq3YdAaSTr87jAH8HHYJuRCDpo1EdUd6pt6ibpk2vkdqe_GECKhP9XhwhflYVuzRE_Fvt1FvFn03r5TzKgjhfH9f5i6v5Nr9FqWaWVluKsjoAFyzG1IUTKkrrqIETfK-A3RYRPnGOUL5ww9_DE7OkFQjFgW7Z9PGLbGwE35qH4qoQ27Wop-IhkehsRBlfC9sKM-fpgeFcQ"/>
<div class="absolute top-4 left-4 bg-zinc-950 text-white text-[10px] font-black uppercase tracking-widest px-2 py-1">PN: 2872405-X</div>
</div>
<div class="p-6">
<div class="flex justify-between items-start mb-2">
<h4 class="font-headline font-bold text-lg leading-tight uppercase group-hover:text-primary transition-colors">Fuel Injector Assembly</h4>
<span class="text-primary font-headline font-black text-xl tracking-tighter">$845.00</span>
</div>
<p class="text-secondary text-sm mb-6 line-clamp-2">High-performance fuel delivery system optimized for Volvo D13 engine architectures.</p>
<div class="grid grid-cols-2 gap-4 mb-6">
<div class="bg-surface-container-low p-3 rounded">
<span class="block text-[10px] uppercase tracking-wider text-outline font-bold">Manufacturer</span>
<span class="text-xs font-bold text-on-surface">Volvo Penta</span>
</div>
<div class="bg-surface-container-low p-3 rounded">
<span class="block text-[10px] uppercase tracking-wider text-outline font-bold">Condition</span>
<span class="text-xs font-bold text-on-surface">OEM New</span>
</div>
</div>
<button class="w-full border-2 border-on-surface text-on-surface py-3 font-headline font-bold text-xs uppercase tracking-widest hover:bg-on-surface hover:text-white transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">visibility</span> View Technical Specs
                                </button>
</div>
</div>
<!-- Part Card 2 -->
<div class="bg-surface-container-lowest group relative p-1 rounded-lg overflow-hidden transition-all hover:shadow-2xl">
<div class="relative aspect-video overflow-hidden rounded-md bg-surface-container-high">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Technical view of heavy duty diesel engine components showing metallic textures and clean industrial engineering aesthetic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuClaz8sOkb-CeOYvXAf4B8fgMsCxBzpFNHni0H_kNdeaJBOGQLb1EzqGXvAH7ikXhhnCau00uiD-9WodcYGIVBEJSMHQEY9WkURlQh1qqQ1HgwkdWM1B6XffpkPiio0llSYq0FPi32Q2J0I_0ExDvXP9kdQyiQ_hi8k7e1f3ZbiYRX0EdNzop6YKm4DaNp0zpEABZSwMR5AbFfdppRJo3IbN0OhY7nj3RSMfVHWYVkL05m_RfxCNhjkZC4BwMR34_EHnNCh-1O10Pc"/>
<div class="absolute top-4 left-4 bg-zinc-950 text-white text-[10px] font-black uppercase tracking-widest px-2 py-1">PN: D16-FUEL-99</div>
</div>
<div class="p-6">
<div class="flex justify-between items-start mb-2">
<h4 class="font-headline font-bold text-lg leading-tight uppercase group-hover:text-primary transition-colors">Common Rail Pump</h4>
<span class="text-primary font-headline font-black text-xl tracking-tighter">$1,290.00</span>
</div>
<p class="text-secondary text-sm mb-6 line-clamp-2">Precision machined pressure pump for heavy-duty marine and industrial applications.</p>
<div class="grid grid-cols-2 gap-4 mb-6">
<div class="bg-surface-container-low p-3 rounded">
<span class="block text-[10px] uppercase tracking-wider text-outline font-bold">Manufacturer</span>
<span class="text-xs font-bold text-on-surface">Volvo Penta</span>
</div>
<div class="bg-surface-container-low p-3 rounded">
<span class="block text-[10px] uppercase tracking-wider text-outline font-bold">Condition</span>
<span class="text-xs font-bold text-on-surface">Refurbished</span>
</div>
</div>
<button class="w-full border-2 border-on-surface text-on-surface py-3 font-headline font-bold text-xs uppercase tracking-widest hover:bg-on-surface hover:text-white transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">visibility</span> View Technical Specs
                                </button>
</div>
</div>
</div>
<!-- Pagination / View More -->
<div class="pt-10 flex flex-col items-center">
<button class="group flex items-center gap-4 bg-surface-container-highest px-8 py-4 rounded-full transition-all hover:bg-primary-container">
<span class="text-xs font-headline font-bold uppercase tracking-widest">Load More Results</span>
<span class="material-symbols-outlined group-hover:translate-y-1 transition-transform">expand_more</span>
</button>
<p class="text-[10px] text-outline font-bold uppercase tracking-[0.2em] mt-6">Displaying 2 of 144 components found</p>
</div>
</div>
</div>
</section>
<!-- Technical Specs Teaser -->
<section class="bg-zinc-950 text-white py-24 overflow-hidden relative">
<div class="absolute inset-0 opacity-10 blueprint-bg grayscale invert"></div>
<div class="max-w-[1920px] mx-auto px-6 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
<div>
<h2 class="font-headline text-4xl md:text-5xl font-bold uppercase tracking-tighter mb-8 leading-none">
                            Precision <br/><span class="text-primary-container">Documentation</span>
</h2>
<div class="space-y-6">
<div class="flex gap-4">
<div class="w-12 h-12 bg-white/10 flex items-center justify-center rounded-lg">
<span class="material-symbols-outlined text-primary-container">description</span>
</div>
<div>
<h4 class="font-headline font-bold uppercase text-sm tracking-wide">Interactive CAD Views</h4>
<p class="text-zinc-500 text-sm">View component diagrams and explosive views directly in your browser.</p>
</div>
</div>
<div class="flex gap-4">
<div class="w-12 h-12 bg-white/10 flex items-center justify-center rounded-lg">
<span class="material-symbols-outlined text-primary-container">verified</span>
</div>
<div>
<h4 class="font-headline font-bold uppercase text-sm tracking-wide">OEM Cross-Reference</h4>
<p class="text-zinc-500 text-sm">Validate part compatibility across major industrial manufacturers instantly.</p>
</div>
</div>
</div>
</div>
<div class="relative">
<div class="absolute -inset-4 bg-primary-container/20 blur-3xl rounded-full"></div>
<img class="relative rounded-xl shadow-2xl border border-white/10 grayscale" data-alt="Macro photography of blueprinted mechanical plans with digital UI overlays highlighting precise engineering measurements" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDp_go7_XzNq6g-tmy9bpYLTd3_FBXd6B2kXx45Se-1-1Fgn2GasArxzKSx0cpR9a4A0wUur7EOKn0Lb-AV4Qy_mn96N86-SZYDhgs1RxIxsyp4XGlTSM-H2odaoKMCrl3yY6vTltIeNIK2XP0tOmRWCLqAjwkMLgkbAG1u1pHjCbZRYY_DIK1ARS2ZI6HlEBrk07jJqZOVZ3f4EvUOt5K1L5ttCmt9LF0Wz1DgbKDKBSV0KSa617nY1PRQVsew99Hv2CfGWqTzBow"/>
</div>
</div>
</div>
</section>
</main>
@endsection

@push('scripts')
    <script src="/frontend/public/erp/js/busqueda-avanzada.js"></script>
@endpush
