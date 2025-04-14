<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Új Osztály-Tantárgy Kapcsolat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('classes_subjectscrud.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="class_id" class="block text-sm font-medium text-gray-700">Osztály</label>
                            <select name="class_id" id="class_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" required>
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

                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Tantárgy</label>
                            <select name="subject_id" id="subject_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" required>
                                <option value="">-- Válassz tantárgyat --</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('crud.classes_subjects') }}"
                               class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition mr-2">
                                Mégse
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Mentés
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>