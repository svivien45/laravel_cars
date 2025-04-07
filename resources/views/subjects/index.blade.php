@extends('layout')

@section('content')

<h1>Tantárgyak</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<button><a href="{{route('subjects.create')}}">Új tantárgy</a></button>
<ul>
    @foreach($subjects as $subject)
    <li class="actions">
        {{ $subject->name}}
        <a href="{{route('subjects.show' , $subject->id)}}" class="button">Megjelenítés</a>
        <a href="{{route('subjects.edit', $subject->id)}}" class="button">Szerkesztés</a>
        <form action="{{route('subjects.destroy' , $subject->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection