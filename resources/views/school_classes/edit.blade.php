@extends('layout')

@section('content')

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('school_classes.update', $school_class->id) }}" method="post">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Osztály neve:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $school_class->name) }}">
    </fieldset>
    <fieldset>
        <label for="year">Osztály éve:</label>
        <input type="text" name="year" id="year" value="{{ old('year', $school_class->year)}}">
    </fieldset>

    <button type="submit">Ment</button>
</form>

@endsection
