{{-- CLASS ACTIVE --}}
{{-- rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white --}}

{{-- nerima parameter herf dan current (initial false) --}}
@props(['href', 'current' => false, 'ariaCurrent' => false])

{{-- logic --}}
{{-- menerima current yang dikirim dari navbar --}}
@php
    // current mengacu ke pada props current
    // $active = $current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
    // console.log('aria current', $ariaCurrent);
    if ($current) {
        $active = 'bg-gray-900 text-white';
        $ariaCurrent = 'page';
    } else {
        $active = 'text-gray-300 hover:bg-gray-700 hover:text-white';
    }
@endphp

{{-- pasang class berdasarkan logic diatas, jika saat ini current maka akan menggunakan ternary yg pertama --}}
<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'rounded-md px-3 py-2 text-sm font-medium ' . $active,
        'aria-current' => $ariaCurrent,
    ]) }}>
    {{ $slot }}
</a>
