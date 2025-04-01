<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Osztályok Átlaga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($classes->unique('name') as $class)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="items-container" class="mt-4">
                        {{$class->name}}
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</x-app-layout>