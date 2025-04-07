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
                            <option value="3" {{ request()->get('crud') == 3 ? 'selected' : '' }}>
                                    Osztályok
                            </option>
                            <option value="4" {{ request()->get('crud') == 4 ? 'selected' : '' }}>
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
                    <h2 class="text-xl font-bold">Subjects List</h2>
                    <a href="{{ route('subjects.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        + New Subject
                    </a>
                </div>

                @if($subjects->isEmpty())
                    <p class="text-gray-500">No subjects found.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Subject Name</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($subjects as $subject)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $subject->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900">{{ $subject->name }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="text-indigo-600 hover:underline mr-4">Edit</a>
                                        
                                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $subjects->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>