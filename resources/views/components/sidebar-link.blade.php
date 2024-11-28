@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center p-2 text-base font-normal rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white'
                : 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $icon ?? '' }}
    <span class="ml-3">{{ $slot }}</span>
</a>
