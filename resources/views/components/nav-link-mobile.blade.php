@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'font-bold text-green-600 hover:bg-gray-50' : 'font-semibold hover:text-green-600 hover:bg-gray-50' }} -mx-3 block rounded-lg px-3 py-2 leading-7"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>