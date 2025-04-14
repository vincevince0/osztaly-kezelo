<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Osztályzat Szerkesztése') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('marks.update', $mark->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Tanuló</label>
                            <select name="student_id" id="student_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $mark->student_id == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }} ({{ $student->class->name ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Tantárgy</label>
                            <select name="subject_id" id="subject_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="mark" class="block text-sm font-medium text-gray-700">Osztályzat</label>
                            <input type="number" name="mark" id="mark" min="1" max="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                   value="{{ old('mark', $mark->mark) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Dátum</label>
                            <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                   value="{{ \Carbon\Carbon::parse($mark->date)->format('Y-m-d') }}" required>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('crud.students') }}"
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