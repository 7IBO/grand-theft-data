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

        <label class="form-label" for="email">Entrez votre email :</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email"/>

        <label class="form-label" for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe"/>

        <input type="submit" id="submit" class="btn btn-success mt-4" value="Connexion"/>
    </form>
</body>