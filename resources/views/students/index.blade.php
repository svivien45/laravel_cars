@extends('layout')

@section('content')

<h1>Tanulók </h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<button><a href="{{route('students.create')}}">Új tanuló</a></button><br>
<br>
<select name="year" id="select-year" title="Évfolyam">
    <option value="0">Válassz évfolyamot</option>
        @foreach ($school_classes as $school_class)
            <option value="{{$school_class->id}}">{{$school_class->year}}</option>
        @endforeach
</select>
<select name="class_id" id="select-class" title="Osztályok">
    <option value="0">Válassz osztályt</option>
        @foreach ($school_classes as $school_class)
            <option value="{{$school_class->id}}">{{$school_class->name}}</option>
        @endforeach
</select>
<ul id="student-list">
    @foreach($students as $student)
    <li class="actions">
        {{ $student->name}}
        <a href="{{route('students.show' , $student->id)}}" class="button">Megjelenítés</a>
        <a href="{{route('students.edit', $student->id)}}" class="button">Szerkesztés</a>
        <form action="{{route('students.destroy' , $student->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>

<script>
    document.getElementById('select-class').addEventListener('change', function () {
        let classId = this.value;
        fetch(`/students/by-class/${classId}`)
            .then(response => response.json())
            .then(data => {
                let studentList = document.getElementById('student-list');
                studentList.innerHTML = '';
                data.forEach(student => {
                    studentList.innerHTML += `
                    <li class="actions">
                        ${student.name}
                        <a href="/students/${student.id}" class="button">Megjelenítés</a>
                        <a href="/students/${student.id}/edit" class="button">Szerkesztés</a>
                        <form action="/students/${student.id}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="danger">Törlés</button>
                        </form>
                    </li>`;
                });
            });
    });
</script>

@endsection