<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-navbar></x-navbar>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="relative isolate px-6 pt-4 lg:px-8">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
                <div class="mx-auto max-w-2xl py-16">
                    <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                        <div
                            class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                            Aplikasi puskesmas melayani berbagai poli. <a href="#"
                                class="font-semibold text-green-600"><span class="absolute inset-0"
                                    aria-hidden="true"></span>Lihat selengkapnya <span
                                    aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Tangani dengan cepat
                            agar selalu
                            tetap sehat.</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-600">Kini tidak perlu antri panjang lagi untuk
                            menunggu
                            ditangani, cukup daftar online dan ambil antrian agar langsung ditangani saat datang.</p>

                    </div>
                </div>
                <div class="py-2 sm:py-2">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                <dt class="text-base leading-7 text-gray-600">Pasien terbantu</dt>
                                <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                    {{ $pasienCount }}</dd>
                            </div>
                            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                <dt class="text-base leading-7 text-gray-600">Janji temu terselesaikan</dt>
                                <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                    {{ $antrianDoneCount }}</dd>
                            </div>
                            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                <dt class="text-base leading-7 text-gray-600">Antrian tercatat sistem</dt>
                                <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                    {{ $antrianCount }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
