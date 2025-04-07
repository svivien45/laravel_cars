@extends('layout')

@section('content')
<h1>Új tanuló</h1>

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('students.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="name">Tanuló neve:</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="class_id">Osztály:</label>
        <select name="class_id" id="select-class" title="Osztályok">
            <option value="0">Válassz osztályt</option>
            @foreach ($school_classes as $school_class)
                <option value="{{$school_class->id}}">{{$school_class->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="gender">Nem:</label>
        <select name="gender" required>
            <option value="N">Nő</option>
            <option value="F">Férfi</option>
        </select>
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection