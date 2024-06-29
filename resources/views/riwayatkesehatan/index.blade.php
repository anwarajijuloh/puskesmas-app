<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @if (Auth::guard('dokter')->check())
                
            <div class="mb-4 flex items-center justify-end">
                <form action="#" method="GET" class="mr-4">
                    <input type="text" name="search" placeholder="Search Diagnosis"
                        class="border rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button type="submit"
                        class="ml-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                </form>
            </div>
            @else
            <div class="mb-4 flex items-center justify-between">
                <a href="#"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah
                    Janji Temu</a>
                <form action="#" method="GET" class="mr-4">
                    <input type="text" name="search" placeholder="Search Diagnosis"
                        class="border rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button type="submit"
                        class="ml-2 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                </form>
            </div>
                
            @endif

            @if ($riwayatkesehatans->isEmpty())
                <p class="text-gray-600">Belum ada riwayat kesehatan.</p>
            @else
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-green-600 text-white">
                        <tr class="text-start">
                            <th class="py-2">Dokter</th>
                            <th class="py-2">Diagnosa</th>
                            <th class="py-2">Resep</th>
                            <th class="py-2">Tanggal Periksa</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($riwayatkesehatans as $rikes)
                            <tr>
                                <td class="border px-4 py-2">
                                    <div class="flex items-center min-w-0 gap-x-4">
                                        <img class="h-12 w-12 flex-none rounded-full object-cover bg-gray-50"
                                            src="{{ asset($rikes->dokter->photo) }}" alt="">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                                {{ $rikes->dokter->user->name }}</p>
                                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                                {{ $rikes->dokter->poli->nama }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">{{ $rikes->diagnosa }}</td>
                                <td class="border px-4 py-2">{{ $rikes->resep }}</td>
                                <td class="border px-4 py-2 text-nowrap">
                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-center">
                                        <p class="text-sm leading-6 text-gray-900">
                                            {{ $rikes->created_at->format('d-m-Y') }}</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-500">
                                            {{ $rikes->created_at->diffForHumans() }}</time></p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app>
