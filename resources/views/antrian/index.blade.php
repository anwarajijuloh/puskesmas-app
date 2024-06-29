<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4 flex items-center justify-between">
                @if (!Auth::guard('dokter')->check())
                <a href="#"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Daftar
                    Antrian</a>
                    <form action="{{ route('dokter.antrian') }}" method="GET" class="mr-4">
                        <select name="poli_id"
                            class="border rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Filter by Poli</option>
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}" @if (request()->get('poli_id') == $poli->id) selected @endif>
                                    {{ $poli->nama }}</option>
                            @endforeach
                        </select>
                        <select name="prioritas"
                            class="border rounded py-2 px-3 ml-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Filter by Prioritas</option>
                            <option value="umum" @if (request()->get('prioritas') == 'umum') selected @endif>Umum</option>
                            <option value="tingkat lanjut" @if (request()->get('prioritas') == 'tingkat lanjut') selected @endif>Tingkat Lanjut</option>
                            <option value="darurat" @if (request()->get('prioritas') == 'darurat') selected @endif>Darurat</option>
                        </select>
                        <select name="sort"
                            class="border rounded py-2 px-3 ml-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="asc" @if (request()->get('sort') == 'asc') selected @endif>Terbaru</option>
                            <option value="desc" @if (request()->get('sort') == 'desc') selected @endif>Terlama</option>
                        </select>
                        <button type="submit"
                            class="ml-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500">Filter</button>
                    </form>
                @endif
            </div>

            @if ($antrians->isEmpty())
                <p class="text-gray-600">Belum ada antrian dibuat.</p>
            @else
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-green-600 text-white">
                        <tr class="text-start">
                            <th class="py-2">Dokter</th>
                            <th class="py-2">Tanggal</th>
                            <th class="py-2">Prioritas</th>
                            <th class="py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($antrians as $antrian)
                            <tr>
                                <td class="border px-4 py-2">
                                    <div class="flex items-center min-w-0 gap-x-4">
                                        <img class="h-12 w-12 flex-none rounded-full object-cover bg-gray-50"
                                            src="{{ asset($antrian->dokter->photo) }}" alt="">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                                {{ $antrian->dokter->user->name }}</p>
                                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                                {{ $antrian->dokter->poli->nama }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">{{ $antrian->created_at->format('D, d m') }}</td>
                                <td class="border px-4 py-2">{{ $antrian->prioritas }}</td>
                                <td class="border px-4 py-2">{{ $antrian->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app>
