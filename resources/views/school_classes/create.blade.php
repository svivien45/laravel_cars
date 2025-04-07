@extends('layout')

@section('content')
<h1>Új osztály</h1>

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('school_classes.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Osztály neve:</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="year">Osztály éve:</label>
        <input type="text" name="year" id="year">
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection