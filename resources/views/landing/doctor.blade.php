<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-navbar></x-navbar>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                aria-hidden="true">
                <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="py-24 sm:py-32">
                <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Janji Temu dengan Dokter
                        </h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Persiapkan untuk kontrol kesehatan anda dengan
                            dokter profesional yang telah berpengalaman dalam bidangnya.</p>
                    </div>
                    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                        @foreach ($dokters as $dokter)
                            <li>
                                <div class="flex items-center gap-x-6">
                                    <img class="h-16 w-16 object-cover rounded-full"
                                        src="{{ asset($dokter->photo) }}"
                                        alt="">
                                    <div>
                                        <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">
                                            {{ $dokter->user->name }}
                                        </h3>
                                        <p class="text-sm font-semibold leading-6 text-indigo-600">{{ $dokter->poli->nama }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>

</x-layout>
