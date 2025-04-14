<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tantárgyak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ request()->url() }}">
                        {{ __('Válassz adattáblát: ') }}
                        <select name="crud" id="crud" title="Adattábla" onchange="location = this.value">
                        <option value="{{ route('crud.index') }}">-- Adattáblák --</option>
                            <option value="{{ route('crud.students') }}">
                                    Tanulók
                            </option>
                            <option value="{{ route('crud.subjects') }}" selected>
                                    Tantárgyak
                            </option>
                            <option value="{{ route('crud.classes') }}">
                                    Osztályok
                            </option>
                            <option value="{{ route('crud.classes_subjects') }}">
                                    Osztályok_Tantárgyai
                            </option>
                            <option value="{{ route('crud.marks') }}">
                                    Osztályzatok
                            </option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Tantárgyak Listája</h2>
                    <a href="{{ route('subjectscrud.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        + Új Tantárgy
                    </a>
                </div>

                @if($subjects->isEmpty())
                    <p class="text-gray-500">---</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tantárgy név</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Műveletek</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($subjects as $subject)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $subject->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $subject->name }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('subjectscrud.edit', $subject->id) }}" class="text-indigo-600 hover:underline mr-4">Módosítás</a>
                                        
                                        <form action="{{ route('subjectscrud.destroy', $subject->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Biztos vagy benne?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Törlés</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>