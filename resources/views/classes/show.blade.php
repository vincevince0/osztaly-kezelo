<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Évfolyamok') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $year = $classData->first()->year;
                        $name = $classData->first()->name;
                    @endphp
                    <form method="GET" action="{{ request()->url() }}">
                        {{ __('Válassz Évfolasdyamot: ') }}
                        <select name="year_id" id="select-year" title="Évfolyam" onchange="this.form.submit()">
                        @foreach($classData as $class)
                                <option value="{{ $class->year }}" {{ request()->get('year_id') == $class->year ? 'selected' : '' }}>
                                    -- {{ $class->year }} --
                                </option>
                            @endforeach
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
                                    <a href="{{ route('classes.show', [$class->year,$class->name]) }}" class="btn-class"><button><i>{{ $class->name }}</i></button></a>
                                @endforeach
                            </ul>
                        @else
                            
                            <h3 class="font-semibold text-lg mt-4">{{ $year }} {{ __(' osztályai: ') }}</h3>
                            <ul>
                                @foreach($classes->where('year', $year) as $class)
                                    <a href="{{ route('classes.show', [$class->year,$class->name]) }}" class="btn-class"><button><i>{{ $class->name }}</i></button></a>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mt-4"> A {{ $name }} {{ __(' névsora: ') }}</h3>
                        @foreach($classes->where('year', $year)->where('name', $name) as $class)
                            @foreach($students->where('class_id',$class->id)->sortBy('name') as $student)
                            <option value="">{{$student->name}}</option>
                            @endforeach
                        @endforeach
                    </div>               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>