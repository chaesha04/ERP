<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <body>
        <main>
            <div class="sidebar">
            <a href="/product/accommodation" class="{{ request()->is('product*') ? 'active' : '' }}">Product</a>

            {{-- <a href="/pnp" class="{{ request()->is('pnp*') ? 'active' : '' }}">Procurement and Purchasing</a> --}}
            </div>
            {{ $slot }}
        </main>
    </body>

</x-layout>