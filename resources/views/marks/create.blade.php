<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Új Jegy hozzáadása:') }} {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('marks.store') }}">
                    @csrf

                    <input type="hidden" name="student_id" value="{{ $student->id }}">

                    <div class="mb-4">
                        <label for="subject_id" class="block font-medium text-sm text-gray-700">
                            Tantárgy
                        </label>
                        <select name="subject_id" id="subject_id" class="w-full border-gray-300 rounded" autofocus>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="mark" class="block font-medium text-sm text-gray-700">Jegy (1-5)</label>
                        <input type="number" min="1" max="5" name="mark" id="mark" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-6">
                        <label for="date" class="block font-medium text-sm text-gray-700">Dátum</label>
                        <input type="date" name="date" id="date" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('marks.show', $student->id) }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                            Vissza
                        </a>

                        <button type="submit" class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
                            Mentés
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
