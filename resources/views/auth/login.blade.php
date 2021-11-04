@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">

    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{session()->get('error')}}
        </div>
    @endif

    <form method="POST">
        @csrf

        <label class="form-label" for="email">Entrez votre email :</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email"/>

        <label class="form-label" for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe"/>

        <input type="submit" id="submit" class="btn btn-success mt-4" value="Connexion"/>
    </form>
</div>
@endsection