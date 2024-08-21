{{-- @extends('source')
@section('title','Modification')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification</title>
</head>
<body>
    <form action="{{route('rectification',$employe->id)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- <input type="text" name="id" value="{{$employe->id}}"> --}}
        @if(session('affichage.ressources'))
                <div>
                    {{(session('affichage.ressources'))}}
                </div>
            @endif
        <div>
            <label for="name">nom</label>
            <input name="name" id="name" value="{{$employe->name}}" type="text">

        </div>
        <div>
            <label for="email">adresse mail</label>
            <input name="email" id="email" value="{{$employe->email}}" type="email">
        </div>
        <div>
            <label for="position">position</label>
            <input name="position" id="position" value="{{$employe->position}}" type="text">
        </div>
        <div>
            <label for="departement">Département</label>
            <select name="departement" id="departement">
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}" {{($departement->id==$employe->departement_id)?'selected':''}}>{{ $departement->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Mise a jour</button>
    </form>
</body>
</html>
{{-- @endsection --}}
