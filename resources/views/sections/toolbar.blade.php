@if ($items)
    <nav aria-label="tools"
         class="fixed right-0 top-1/2 -translate-y-1/2 shadow-md p-1.5 pr-0 bg-bg-section rounded-2xl rounded-r-none border-utility-bar-border"
    >
            <div class="px-2 py-5 border border-r-0 rounded-xl rounded-r-none flex flex-col items-center gap-4">
                @foreach ($items as $item)
                    <a href="{{ $item->url }}"
                        class="flex flex-col items-center gap-1 text-xs text-utility-bar-text">
                        {!! wp_get_attachment_image($item->icon, 'thumbnail', true, ['class' => 'size-7']) !!}
                        {{ $item->label }}
                    </a>
                    @unless ($loop->last)
                        <span class="w-1/3 h-px bg-utility-bar-separator"></span>
                    @endunless
                @endforeach
            </div>
    </nav>
@endif
