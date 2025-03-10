@extends('layout')
 
        <main>
            @yield('content')
        </main>
 
   
@section('content')
<h1>Új jármű</h1>
<div>
 
<form action="{{route('vehicles.store')}}" method="post">
    @csrf
<fieldset>
    <label for="makers_id">Gyártó</label>
        <select name="makers_id" id="select-makers" title="Gyártók">
            <option value="0">-- Válassz gyártót --</option>
            @foreach($makers as $maker)
                <option value="{{ $maker->id }}">{{ $maker->name }}</option>
            @endforeach
        </select>
</fieldset>
<fieldset>
    <label for="models_id">Model</label>
        <select name="models_id" id="select-model"  title="Modellek">
            <option value="0">-- Válassz modelt --</option>
            @foreach($models as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        </select>
</fieldset>
<fieldset>
    <label for="bodies_id">Karosszéria</label>
        <select name="bodies_id" id="select-body"  title="Karosszériák">
            <option value="0">-- Válassz karosszériát --</option>
            @foreach($bodies as $body)
                <option value="{{ $body->id }}">{{ $body->name }}</option>
            @endforeach
        </select>
</fieldset>
<fieldset>
    <label for="reg_plate">Rendszám</label>
    <input type="text" id="reg_plate" name="reg_plate">
</fieldset>
<fieldset>
    <label for="vin">Alvázszám</label>
    <input type="text" id="vin" name="vin">
</fieldset>
<button type="submit">Ment</button>
        <a href="{{ route('vehicles.index') }}">Mégse</a>
</form>
 
</div>
 
@endsection
 