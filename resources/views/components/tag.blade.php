@props([
  'label',
  'sublabel' => null,
  'color' => 'blue',
])

@php
  // Classes écrites en entier pour que Tailwind les détecte
  $colors = [
    'blue' => ['bg-tag-blue-soft-bg text-tag-blue-soft-text', 'bg-tag-blue-strong-bg text-tag-blue-strong-text'],
    'green' => ['bg-tag-green-soft-bg text-tag-green-soft-text', 'bg-tag-green-strong-bg text-tag-green-strong-text'],
    'purple' => ['bg-tag-purple-soft-bg text-tag-purple-soft-text', 'bg-tag-purple-strong-bg text-tag-purple-strong-text'],
    'red' => ['bg-tag-red-soft-bg text-tag-red-soft-text', 'bg-tag-red-strong-bg text-tag-red-strong-text'],
  ];

  [$soft, $strong] = $colors[$color];
@endphp

<span {{ $attributes->class(['inline-flex items-center gap-3 rounded-full', $soft, 'pr-5' => $sublabel]) }}>
  <span class="{{ $strong }} rounded-full px-3 py-0.5 text-xs/[22px] font-semibold">{{ $label }}</span>

  @if ($sublabel)
    <span class="text-sm font-medium">{{ ucfirst(strtolower($sublabel)) }}</span>
  @endif
</span>
