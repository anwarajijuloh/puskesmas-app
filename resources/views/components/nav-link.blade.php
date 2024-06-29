@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'font-bold text-green-600' : 'font-semibold hover:text-green-600' }} leading-6"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
