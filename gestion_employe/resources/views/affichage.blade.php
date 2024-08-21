{{-- @extends('base')

@section('title', 'liste des employés')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title class="btn btn-danger">Classment/Team</title>
</head>

<body>
    <a href="{{ route('creation.employe') }}">Nouveau employé</a>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('affichage.ressources')}}" method="GET">
                    <input type="text" name="search" placeholder="Recherche..." value="{{request('search')}}" >

                    <button type="submit">Rechercher  </button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead>

            <th>nom</th>
            {{-- <th>status</th>
            <th>adresse mail</th> --}}
            <th>departement</th>
            <th>Suppession</th>
            <th>modifier</th>


        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr class="table-primary">
                    <td>{{ $employe->name }}</td>
                    {{-- <td>{{ $employe->position }}</td>
                    <td>{{ $employe->email }}</td> --}}
                    <td>{{ $employe->departement->nom }}</td>

                    <td >
                        <form action="{{ route('employes.supprimes', $employe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">supprimer</button>
                        </form>

                    </td>

                    <td >
                        <a class="btn btn-success" href="{{ route('employe.edit', $employe->id) }}">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>
    <hr>
    <p>
        NOMBRE DE PERSONNEL PAR DEPARTEMENT
    </p>

    <table class="table table-striped">
        <thead >
            <th>Départements</th>
            <th >Nombre de personne</th>
        </thead>
        <tbody>
            @foreach ($departements as $departement)
                <tr class="table-warning">
                    <td class="table-light">{{ $departement->nom }}</td>
                    <td class="table-light">{{ $departement->employes_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
{{-- @endsection --}}





