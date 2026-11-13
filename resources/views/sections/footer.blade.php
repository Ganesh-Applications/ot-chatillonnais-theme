<footer class="flex flex-col px-20 xl:px-48 pt-28 pb-36 gap-16 bg-bg-footer">
    <div class="flex flex-col lg:flex-row justify-between gap-16 items-center md:items-start">

        <div class="flex flex-col md:flex-row gap-12">
            {{-- Logo --}}
            <a class="w-80" href="{{ home_url('/') }}">
                <img src="{{ Vite::asset('resources/images/logos/otc_dark.svg') }}" alt="{{ $siteName }}" class="w-full">
            </a>

            {{-- Coordonées --}}
            <div class="flex flex-col">
                @foreach ($contacts as $contact)
                    @if ($contact['acf_fc_layout'] === 'simple_text')
                        <p>{{ $contact['text'] }}</p>
                    @elseif ($contact['acf_fc_layout'] === 'link' && $contact['link'])
                        <a href="{{ $contact['link']['url'] }}" target="{{ $contact['link']['target'] ?: '_self' }}">
                            {{ $contact['link']['title'] }}
                        </a>
                    @endif
                @endforeach
                <address class="mt-10 not-italic">
                    @if ($address)
                        <p>{{ $address['name'] }}</p>
                        <p>{{ $address['street_number'] }} {{ $address['street_name'] }} </p>
                        <p>{{ $address['post_code'] }} {{ $address['city'] }}</p>
                    @endif
                </address>
            </div>
        </div>

        {{-- Menus --}}
        <div class="flex gap-24">
            @if ($leftNav)
                <ul class="flex flex-col gap-3">
                    @foreach ($leftNav as $item)
                        <li class="flex items-center gap-1">
                            <img src="{{ Vite::asset('resources/images/icons/arrow-right.svg') }}">
                            <a href="{{ $item->url }}">{{ strtoupper($item->label) }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if ($rightNav)
                <ul class="flex flex-col gap-3">
                    @foreach ($rightNav as $item)
                        <li class="flex items-center">
                            <img src="{{ Vite::asset('resources/images/icons/arrow-right.svg') }}">
                            <a href="{{ $item->url }}">{{ mb_strtoupper($item->label) }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    {{-- Partenaires --}}
    <div class="flex gap-4 justify-center flex-wrap">
        @foreach($partners as $partner)
            {!! wp_get_attachment_image($partner['logo']['ID'], 'thumbnail', false, ['class' => 'h-20 w-auto']) !!}
        @endforeach
    </div>
</footer>
