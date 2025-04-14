<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Osztály-Tantárgy kapcsolat szerkesztése') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('classes_subjects.update', $classes_subjects->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="class_id" class="block text-sm font-medium text-gray-700">Osztály</label>
                            <select name="class_id" id="class_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ $classes_subjects->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }} ({{ $class->year }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Tantárgy</label>
                            <select name="subject_id" id="subject_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $classes_subjects->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('crud.classes_subjects') }}" class="mr-4 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Mégse</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Mentés</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>