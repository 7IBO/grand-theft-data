<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <form method="POST">
        @csrf

        <label class="form-label" for="first_name">Entrez votre prénom : </label>
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder='Entrez votre prénom'/>

        <label class="form-label" for="last_name">Entrez votre nom :</label>
        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Entrez votre nom"/>

        <label class="form-label" for="email">Entrez votre Mail :</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email"/>

        <label class="form-label" for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe"/>

        <label class="form-label" for="genre"></label>
        <select name="genre" class="form-select" id="genre">
            <option value="male">Homme</option>
            <option value="female">Femme</option>
            <option value="autre">Autre</option>
        </select>

        <label for="pokemon">Pokémon préféré</label>
        <select name="pokemon" class="form-select" id="pokemon">
            @foreach (\App\Models\Pokemon::all() as $pokemon)
                <option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>
            @endforeach
        </select>

        <input type="submit" id="submit" class="btn btn-success mt-4" value="Valider"/>
    </form>
</body>