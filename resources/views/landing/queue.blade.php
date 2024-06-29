<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <x-navbar></x-navbar>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="py-24 sm:py-32 lg:px-8">
                <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                    aria-hidden="true">
                    <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
                <div class="mx-auto max-w-5xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Antrian Hari ini</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">antrian dari setiap poli terdaftar</p>
                    <div class="container mx-auto px-4 py-8">
                        <div class="mx-auto bg-transparent p-6 rounded-lg shadow-md">
                            <form action="{{ route('queue') }}" method="GET" class="mb-6">
                                <div class="flex items-center justify-end">
                                    <select name="poli_id" class="border rounded px-7 focus:outline-none focus:ring-2 focus:ring-green-500">
                                        <option value="">Filter by Poli</option>
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}" {{ request('poli_id') == $poli->id ? 'selected' : '' }}>{{ $poli->nama }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500">Filter</button>
                                </div>
                            </form>
                    
                            <div class="-mx-4 overflow-x-auto">
                                <table class="min-w-full rounded-lg overflow-hidden shadow-lg">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="px-4 py-2">Pasien</th>
                                            <th class="px-4 py-2">Poli</th>
                                            <th class="px-4 py-2">Dokter</th>
                                            <th class="px-4 py-2">Prioritas</th>
                                            <th class="px-4 py-2">Status</th>
                                            <th class="px-4 py-2">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700 text-start">
                                        @foreach ($antrians as $antrian)
                                        <tr>
                                            <td class="border px-4 py-2">{{ Str::limit($antrian->pasien->user->name, 2, '...') }}</td>
                                            <td class="border px-4 py-2">{{ $antrian->poli->nama }}</td>
                                            <td class="border px-4 py-2">{{ $antrian->dokter->user->name }}</td>
                                            <td class="border px-4 py-2">{{ ucfirst($antrian->prioritas) }}</td>
                                            <td class="border px-4 py-2">{{ ucfirst($antrian->status) }}</td>
                                            <td class="border px-4 py-2">{{ $antrian->created_at->format('d M Y | H:i') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    
                            <div class="mt-4">
                                {{ $antrians->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</x-layout>
