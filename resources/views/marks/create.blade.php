@extends('layout')

@section('content')
<h1>Új jegy</h1>

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('marks.store') }}" method="post">
    @csrf
    <fieldset>
        <label for="student_id">Tanuló:</label>
        <select name="student_id" id="select-student" title="Tanulók">
            <option value="0">Válassz tanulót</option>
            @foreach ($students as $student)
                <option value="{{$student->id}}">{{$student->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="subject_id">Tantárgy:</label>
        <select name="subject_id" id="select-subject" title="Tantárgyak">
            <option value="0">Válassz tantárgyat</option>
            @foreach ($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="mark">Értékelés:</label>
        <input type="text" name="mark" id="mark">
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection