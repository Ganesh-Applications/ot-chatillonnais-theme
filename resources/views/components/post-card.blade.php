<a href="{{ $url }}" {{ $attributes->class('relative block pt-6 text-text') }}>

  <x-tape class="absolute top-px left-1/2 -translate-x-1/2" />

  <div class="aspect-[9/6] overflow-hidden bg-bg-el-soft">
    @if ($imageId)
      {!! wp_get_attachment_image($imageId, 'medium_large', false, ['class' => 'size-full object-cover']) !!}
    @endif
  </div>

  <div class="mt-4 flex flex-col items-start gap-4">
    <x-tag :label="$type" :sublabel="$location" />

    <div class="flex flex-col gap-2">
      <h3 class="text-2xl/7 font-extrabold font-serif uppercase">{{ $title }}</h3>

      <p class="text-base/[22px]">{{ $excerpt }}</p>
    </div>

    <x-button>{{ __('Voir plus', 'ot-chatillonnais') }}</x-button>
  </div>

  @if ($favorite)
    <x-love-badge class="absolute top-10 right-4" />
  @endif
</a>
