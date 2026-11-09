<header class="flex flex-row justify-between items-center h-fit px-14 py-4 bg-bg-page">
  <a class="" href="{{ home_url('/') }}">
    <img src="{{ Vite::asset('resources/images/logos/otc.svg') }}" alt="{{ $siteName }}" class="h-28 w-auto">
  </a>

  @if ($primaryNavigation)
    <nav aria-label="{{ $primaryNavigationName }}">
      <ul class="flex flex-row gap-12">
        @foreach ($primaryNavigation as $item)
          <li><a href="{{ $item->url }}">{{ $item->label }}</a></li>
        @endforeach
      </ul>
    </nav>
  @endif
</header>
