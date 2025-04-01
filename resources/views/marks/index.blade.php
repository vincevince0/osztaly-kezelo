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
                        {{ __('Válassz Évfolyamot: ') }}
                        <select name="year_id" id="select-year" title="Évfolyam" onchange="this.form.submit()">
                        <option value="0">-- Évfolyamok --</option>
                            @foreach($classes->unique('year') as $class)
                                <option value="{{ $class->year }}" {{ request()->get('year_id') == $class->year ? 'selected' : '' }}>
                                    {{ $class->year }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    <div id="items-container" class="mt-4">
                        @if(request()->has('year_id'))
                            <h3 class="font-semibold text-lg mt-4">{{ request()->get('year_id') }} {{ __(' osztályai: ') }}</h3>
                            <ul>
                                @foreach($classes->where('year', request()->get('year_id')) as $class)
                                    <a href="{{ route('login') }}" class="btn-class"><button><i>{{ $class->name }}</i></button></a>   
                                @endforeach
                            </ul>
                        @else
                            <p>{{ __('Válasszon ki egy évfolyamot.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
