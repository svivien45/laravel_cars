@extends('layout')

@section('content')

@error('name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('students.destroy', $student->id) }}" method="delete">
    @csrf
    @method('DELETE')

@endsection
