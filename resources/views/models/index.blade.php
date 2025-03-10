@extends('layout')

@section('content')
<h1>Modellek</h1>
<div>
    <a href="{{ route('models.create') }}">
        <button><i class="fa fa-new" title="Új"></i> Új</button>
    </a>
</div>

<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">ID</th>
            <th style="border: 1px solid black;">Név</th>
            <th style="border: 1px solid black;">Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $model)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                <td style="border: 1px solid black;">{{ $model->id }}</td>
                <td style="border: 1px solid black;">{{ $model->name }}</td>
                <td style="display: flex; gap: 10px; justify-content: center; border: 1px solid black;">
                    <a href="{{ route('models.show', $model->id) }}">
                        <button><i class="fa fa-binoculars" title="Mutat"></i> Mutat</button>
                    </a>
                    <a href="{{ route('models.edit', $model->id) }}">
                        <button><i class="fa fa-edit edit" title="Módosít"></i> Módosít</button>
                    </a>
                    <form action="{{ route('models.destroy', $model->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="btn-del-fuel">
                            <i class="fa fa-trash-can trash" title="Töröl"></i> Töröl
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection