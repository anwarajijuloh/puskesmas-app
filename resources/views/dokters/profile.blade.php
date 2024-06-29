<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center justify-center mb-6">
                @if ($dokter->photo)
                    <img src="{{ asset($dokter->photo) }}" alt="Profile Photo"
                        class="w-24 h-24 rounded-full object-cover">
                @else
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-4xl">No Photo</span>
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">{{ __('Name') }}</label>
                <input type="text" value="{{ $user->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">{{ __('Email') }}</label>
                <input type="email" value="{{ $user->email }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2"
                    for="total-antrian">{{ __('Total Antrian') }}</label>
                <input type="text" value="{{ $totalAntrian }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2"
                    for="total-riwayat">{{ __('Total Riwayat Kesehatan') }}</label>
                <input type="text" value="{{ $totalRiwayat }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    readonly>
            </div>

            <div class="mb-4">
                <a href="{{ route('dokter.setting') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Change Password') }}</a>
            </div>
        </div>
    </div>
</x-app>
