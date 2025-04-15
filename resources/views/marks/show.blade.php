{{-- resources/views/marks/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jegyek:') }} {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('marks.index', ['class_id' => request()->get('class_id')]) }}"
                       class="text-blue-600 underline mb-4 inline-block">
                        &larr; Vissza az osztályhoz
                    </a>

                    
                    <a href="{{ route('marks.create') }}?student_id={{ $student->id }}"
   class="bg-gray-200 text-black px-3 py-2 rounded hover:bg-gray-300 border border-gray-400 inline-block mb-4">
    + Új jegy hozzáadása 
</a> 

<!-- <p>Student ID: {{ $student->id }}</p>
<a href="{{ url('/marks/create') }}?student_id=36"
   class="bg-gray-200 text-black px-3 py-2 rounded hover:bg-gray-300 border border-gray-400 inline-block mb-4">
   + Új jegy hozzáadása
</a> -->



                    @if($marks->count())
                        <h3 class="font-semibold text-lg mb-4">{{ __('Jegyek listája:') }}</h3>

                        <table class="w-full border text-left">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border">{{ __('Tantárgy') }}</th>
            <th class="px-4 py-2 border">{{ __('Jegy') }}</th>
            <th class="px-4 py-2 border">{{ __('Dátum') }}</th>
            <th class="px-4 py-2 border">{{ __('Műveletek') }}</th> <!-- Add header for actions -->
        </tr>
    </thead>
    <tbody>
        @foreach($marks as $mark)
        <tr>
            <td class="px-4 py-2 border">
                {{ $mark->subject->name ?? 'Ismeretlen' }}
            </td>
            <td class="px-4 py-2 border">{{ $mark->mark }}</td>
            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($mark->date)->format('Y. m. d.') }}</td>
            <td class="px-4 py-2 border">
                <!-- Add Delete button here -->
                <form action="{{ route('marks.destroy', $mark->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                        Törlés
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                        {{-- Optional: Average --}}
                        <div class="mt-4 font-semibold">
                            {{ __('Átlag:') }} 
                            {{ round($marks->avg('mark'), 2) }}
                        </div>
                    @else
                        <p>{{ __('Nincsenek jegyek a diák számára.') }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
