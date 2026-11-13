@extends('layouts.app')

@section('content')
    @include('partials.page-header')

  <div class="px-24 py-20 mx-auto max-w-[1600px]">
    @if (! have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'ot-chatillonnais') !!}
      </x-alert>

      {!! get_search_form(false) !!}
    @endif

    @if (have_posts())
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @while(have_posts()) @php(the_post())
        <x-post-card :post="get_post()" />
        @endwhile
      </div>
    @endif
  </div>
@endsection
