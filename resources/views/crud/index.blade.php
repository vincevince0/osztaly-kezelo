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
                        <option value="0">-- Adattáblák --</option>
                            <option value="{{ route('crud.students') }}">
                                    Tanulók
                            </option>
                            <option value="2" {{ request()->get('crud') == 2 ? 'selected' : '' }}>
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
</x-app-layout>