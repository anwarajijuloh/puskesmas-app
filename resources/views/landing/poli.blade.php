<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-navbar></x-navbar>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="mx-auto px-6 lg:px-8 py-24 sm:py-32">
                <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                    aria-hidden="true">
                    <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
                <div class="mx-auto lg:mx-0 text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Poli Tersedia</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">Dapatkan perawatan sesuai dengan preferensi anda.</p>
                </div>
                <div class="grid grid-cols-1 mt-6 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($polis as $poli)
                        <div class="bg-white border rounded-lg shadow-md p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $poli->nama }}</h3>
                            <p class="text-gray-700">{{ $poli->deskripsi }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

</x-layout>
