<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tanulók') }}
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
                            <option value="{{ route('crud.students') }}" selected>
                                    Tanulók
                            </option>
                            <option value="{{ route('crud.subjects') }}">
                                    Tantárgyak
                            </option>
                            <option value="{{ route('crud.classes') }}">
                                    Osztályok
                            </option>
                            <option value="{{ route('crud.classes_subjects') }}">
                                    Osztályok_Tantárgyai
                            </option>
                            <option value="5" {{ request()->get('crud') == 5 ? 'selected' : '' }}>
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
                    <h2 class="text-xl font-bold">Tanulók Listája</h2>
                    <a href="{{ route('studentscrud.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        + Új Tanuló
                    </a>
                </div>

                @if($students->isEmpty())
                    <p class="text-gray-500">---</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Név</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nem</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Osztály_ID</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Műveletek</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($students as $student)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $student->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $student->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                    {{ $student->gender === 'F' ? 'Férfi' : ($student->gender === 'N' ? 'Nő' : 'Ismeretlen') }}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-900">
                                        {{ $student->class ? $student->class->name : 'Nincs osztály' }}
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('studentscrud.edit', $student->id) }}" class="text-indigo-600 hover:underline mr-4">Módosítás</a>
                
                                        <form action="{{ route('studentscrud.destroy', $student->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Biztos vagy benne?');">
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