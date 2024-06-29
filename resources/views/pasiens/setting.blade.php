<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif
    
            <form action="{{ route('pasien.updateprofile') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir', $pasien->tgl_lahir) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tgl_lahir') border-red-500 @enderror">
                    @error('tgl_lahir')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">{{ __('Alamat') }}</label>
                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $pasien->alamat) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror">
                    @error('alamat')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">{{ __('Photo') }}</label>
                    <input type="file" name="photo" id="photo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('photo') border-red-500 @enderror">
                    @error('photo')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
    
                    @if ($pasien->photo)
                        <div class="mt-2">
                            <img src="{{ asset($pasien->photo) }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover">
                        </div>
                    @endif
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
    
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Update Profile') }}</button>
                </div>
            </form>
        </div>
    </div>
</x-app>
