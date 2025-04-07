@extends('layout')

@section('content')
<h1>Új tantárgy</h1>

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('subjects.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Tantárgy neve:</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection