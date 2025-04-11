<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Értékelések') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ request()->url() }}">
                        {{ __('Válassz Osztályt: ') }}
                        <select name="class_id" id="select-class" title="Osztály" onchange="this.form.submit()">
                            <option value="0">-- Osztályok --</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id-36 }}" {{ request()->get('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }} 
                                </option>
                            @endforeach
                        </select>
                    </form>

                    <div id="items-container" class="mt-4">
                        @if(request()->has('class_id'))
                            <h3 class="font-semibold text-lg mt-4">{{ __('Diákok az osztályban: ') }}</h3>
                            <ul>
                                @foreach($students->where('class_id',request()->get('class_id'))->sortBy('name') as $student)
                                <option value="">{{$student->name}}</option>
                            @endforeach

                            </ul>
                        @else
                            <p>{{ __('Válasszon ki egy osztályt.') }}</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>