<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Új Tantárgy Létrehozása') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('subjectscrud.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tantárgy neve</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300"
                               required>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('crud.subjects') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition mr-2">
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
</x-app-layout>