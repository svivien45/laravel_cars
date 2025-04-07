@extends('layout')

@section('content')

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('subjects.update', $subject->id) }}" method="post">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Tantárgy neve:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $subject->name) }}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection
