@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between gap-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-stone-600 cursor-not-allowed text-xs font-black">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">
                <span class="material-symbols-outlined text-sm">chevron_left</span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="flex items-center px-4 text-outline" aria-disabled="true">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="w-10 h-10 flex items-center justify-center bg-primary text-black text-xs font-black">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-on-surface-variant hover:text-primary hover:border-primary transition-all text-xs font-black">
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
        @else
            <span class="w-10 h-10 flex items-center justify-center bg-surface border border-outline text-stone-600 cursor-not-allowed text-xs font-black">
                <span class="material-symbols-outlined text-sm">chevron_right</span>
            </span>
        @endif
    </nav>
@endif
