@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Connexion</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required autofocus>
        </div>

        <div class="form-group mt-3">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group form-check mt-3">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label">Se souvenir de moi</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
    </form>
</div>
@endsection
