@extends('layouts.app')

@section('content')
<h1>Diák nevének módosítása</h1>

<div>
    @error('name')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <fieldset>
            <label for="name">Név:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" required><br><br>
        </fieldset>

        <button type="submit">Mentés</button>
    </form>

    <a href="{{ route('marks.index') }}"><button>Mégse</button></a>
</div>
@endsection
