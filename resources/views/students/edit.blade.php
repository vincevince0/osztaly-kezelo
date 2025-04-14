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
                        $id = $student->first()->id;
                        $name = $student->first()->name; 
                        $classid = $student->first()->class_id
                    @endphp
                    <h3 class="font-semibold text-lg mt-4"> A {{ $name }} {{ __(' áthelyezése új osztályhoz:') }}</h3>
                    <form action="{{route('students.update', $id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <fieldset>
                            <label for="class_id">Osztályok:</label>
                            <select name="class_id" id="class_id">
                                @foreach($classes->where('id', $classid) as $class)
                                    <option value="{{$class->id}}" selected>--{{$class->name}}--</option>
                                @endforeach
                                @foreach($classes->where('year', $year) as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <input type="hidden" name="name" value="{{ $name }}">
                        <input type="hidden" name="gender" value="{{ $student->first()->gender;  }}">
                        <button class="btn btn-save"type="submit">Ment</button>
                    </form>
                    <a href="{{ route('classes.index') }}"><button class="btn btn-cancel">Mégse</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>