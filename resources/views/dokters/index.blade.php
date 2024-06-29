<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Doctor's Dashboard</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="p-4 bg-blue-500 text-white rounded-lg shadow-md">
                    <div class="text-lg font-semibold">Total Patients Treated</div>
                    <div class="text-2xl">{{ $pasienCount }}</div>
                </div>
                <div class="p-4 bg-green-500 text-white rounded-lg shadow-md">
                    <div class="text-lg font-semibold">Total Queues</div>
                    <div class="text-2xl">{{ $antrianCount }}</div>
                </div>
                {{-- <div class="p-4 bg-yellow-500 text-white rounded-lg shadow-md">
                    <div class="text-lg font-semibold">Total Work Days</div>
                    <div class="text-2xl">{{ $hariKerjaCount }}</div>
                </div> --}}
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <h3 class="text-xl font-bold mb-4">Latest Queues</h3>
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">Patient Name</th>
                            <th class="px-4 py-2">Clinic</th>
                            <th class="px-4 py-2">Priority</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($antrianTerbaru as $antrian)
                            <tr>
                                <td class="border px-4 py-2">{{ $antrian->pasien->user->name }}</td>
                                <td class="border px-4 py-2">{{ $antrian->poli->nama }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($antrian->prioritas) }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($antrian->status) }}</td>
                                <td class="border px-4 py-2">{{ $antrian->created_at->format('d M Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <h3 class="text-xl font-bold mb-4">Latest Health Records</h3>
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">Patient Name</th>
                            <th class="px-4 py-2">Diagnosis</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($rekamMedisTerbaru as $record)
                            <tr>
                                <td class="border px-4 py-2">{{ $record->pasien->user->name }}</td>
                                <td class="border px-4 py-2">{{ $record->diagnosa }}</td>
                                <td class="border px-4 py-2">{{ $record->created_at->format('d M Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
