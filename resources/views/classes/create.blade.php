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
                        $classid = $classData->first()->id;
                    @endphp
                    <h3 class="font-semibold text-lg mt-4"> A {{ $name }} {{ __(' osztályhoz új tanuló hozzáadása:') }}</h3>
                    <form action="{{route('student.store')}}" method="post">
                        @csrf
                        <fieldset>
                            <label for="name">Név</label>
                            <input type="text" id="name" name="name">
                            <label for="name">Nem</label>
                            <select name="gender" id="gender">
                                <option value="male">F</option>
                                <option value="female">N</option>
                            </select>
                            <input type="hidden" name="classid" value="{{ $classid }}">
                        </fieldset>
                        <button class="btn btn-save"type="submit">Ment</button>
                    </form>
                    <a href="{{ route('classes.edit', [$year,$name]) }}"><button class="btn btn-cancel">Mégse</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>