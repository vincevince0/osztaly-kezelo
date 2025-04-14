<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adattáblák') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ request()->url() }}">
                        {{ __('Válassz adattáblát: ') }}
                        <select name="crud" id="crud" title="Adattábla" onchange="location = this.value">
                        <option value="{{ route('crud.index') }}" selected>-- Adattáblák --</option>
                            <option value="{{ route('crud.students') }}" >
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
                            <option value="{{ route('crud.marks') }}">
                                    Osztályzatok
                            </option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>