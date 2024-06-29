<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="p-4 bg-blue-500 text-white rounded-lg shadow-md">
                    <div class="text-lg font-semibold">Total Queue History</div>
                    <div class="text-2xl">{{ $antrianCount }}</div>
                </div>
                <div class="p-4 bg-green-500 text-white rounded-lg shadow-md">
                    <div class="text-lg font-semibold">Total Health Records</div>
                    <div class="text-2xl">{{ $rikesCount }}</div>
                </div>
                <div class="p-4 bg-yellow-500 text-white rounded-lg shadow-md">
                    <div class="text-lg font-semibold">Most Visited Poli</div>
                    <ul class="mt-2">
                        @foreach ($mostVisitedPoli as $poli)
                            <li>{{ $poli->poli->nama }} ({{ $poli->total }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <h3 class="text-xl font-bold mb-4">Latest Health Records</h3>
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">Doctor</th>
                            <th class="px-4 py-2">Diagnosis</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($latestRikes as $rikes)
                            <tr>
                                <td class="border px-4 py-2">{{ $rikes->dokter->user->name }}</td>
                                <td class="border px-4 py-2">{{ $rikes->diagnosa }}</td>
                                <td class="border px-4 py-2">{{ $rikes->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
