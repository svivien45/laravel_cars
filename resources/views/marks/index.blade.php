@extends('layout')

@section('content')

<h1>Jegyek</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<button><a href="{{route('marks.create')}}">Új jegy</a></button>
<ul>
    @foreach($marks as $mark)
    <li class="actions">
        {{ $mark->student->name}} - {{$mark->subject->name}} - {{$mark->mark}}
        <a href="{{route('marks.show' , $mark->id)}}" class="button">Megjelenítés</a>
        <a href="{{route('marks.edit', $mark->id)}}" class="button">Szerkesztés</a>
        <form action="{{route('marks.destroy' , $mark->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="danger">Törlés</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection