<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Új Tanuló Létrehozása') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('studentscrud.store') }}">
                        @csrf

                        {{-- Név --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Név</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" required>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nem --}}
                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Nem</label>
                            <select name="gender" id="gender" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                                <option value="">-- Válassz nemet --</option>
                                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Férfi</option>
                                <option value="N" {{ old('gender') == 'N' ? 'selected' : '' }}>Nő</option>
                            </select>
                            @error('gender')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Osztály --}}
                        <div class="mb-4">
                            <label for="class_id" class="block text-sm font-medium text-gray-700">Osztály</label>
                            <select name="class_id" id="class_id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                                <option value="">-- Válassz osztályt --</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }} ({{ $class->year }})
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gombok --}}
                        <div class="flex justify-end">
                            <a href="{{ route('crud.students') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition mr-2">
                                Mégse
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Mentés
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
