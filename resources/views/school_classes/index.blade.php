@extends('layout')

@section('content')

<h1>Osztályok</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<button><a href="{{route('school_classes.create')}}">Új osztály</a></button>
<ul>
    @foreach($school_classes as $school_class)
    <li class="actions">
        {{ $school_class->name}} - {{$school_class->year}}
        <a href="{{route('school_classes.show' , $school_class->id)}}" class="button">Megjelenítés</a>
        <a href="{{route('school_classes.edit', $school_class->id)}}" class="button">Szerkesztés</a>
        <form action="{{route('school_classes.destroy' , $school_class->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection