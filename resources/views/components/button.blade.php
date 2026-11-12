@props(['href' => null])

{{-- Bouton avec pastille flèche. Sans href : <span> visuel, pour un bouton placé dans un élément déjà cliquable (ex. post-card) --}}
@php($tag = $href ? 'a' : 'span')

<{{ $tag }} @if ($href) href="{{ $href }}" @endif {{ $attributes->class('inline-flex items-center gap-3 rounded-3xl bg-button-subtle-bg pl-5 text-xs/[18px] font-bold text-button-subtle-text uppercase') }}>
  {{ $slot }}

  <span class="flex size-8 items-center justify-center rounded-full bg-button-subtle-icon-bg">
    <img src="{{ Vite::asset('resources/images/icons/arrow-up-right.svg') }}" width="20" height="20" alt="">
  </span>
</{{ $tag }}>
