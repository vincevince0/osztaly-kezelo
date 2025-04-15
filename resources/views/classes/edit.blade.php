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
                    <h3 class="font-semibold text-lg mt-4"> A {{ $name }} {{ __(' névsora:') }} <a href="{{ route('students.create', [$year,$name]) }}" class="btn-class"><button class="btn btn-new"><i>{{ 'Új tanuló' }}</i></button></a></h3>            
                    @foreach($classes->where('year', $year)->where('name', $name) as $class)
                        @foreach($students->where('class_id',$class->id)->sortBy('name') as $student)
                            <option value="">{{$student->name}}</option>
                            <a href="{{ route('students.edit', [$student->id,$student->class_id]) }}">
                                <button class="btn btn-edit">Áthelyezés</button>
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Törlés</button>
                            </form>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>