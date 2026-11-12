{{-- Données préparées par App\View\Composers\PageHeader --}}
<div class="page-header w-full px-4 h-125">
    <div class="relative isolate size-full flex flex-col items-center justify-center gap-4 px-4 ">

        <div class="absolute inset-0 -z-10 overflow-hidden bg-bg-el-soft">
            @if ($image)
                {!! wp_get_attachment_image($image, 'large', false, ['class' => 'size-full object-cover']) !!}

                <div class="absolute inset-0 bg-overlay-image-soft"></div>
            @endif
        </div>

        <h1 class="font-serif font-bold text-text-on-image-white text-6xl">
            {!! $title !!}
        </h1>

        @if ($description)
            <div class="w-full md:w-1/2 text-text-on-image-white text-xl text-center">
                {!! $description !!}
            </div>
        @endif
    </div>
</div>
