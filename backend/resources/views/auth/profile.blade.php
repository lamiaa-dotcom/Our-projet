@extends('layouts.app') <!-- Assure-toi d'avoir ce layout, sinon adapte -->

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Mon Profil</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Informations utilisateur -->
        <div class="col-md-6">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" name="name" id="name"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control" name="email" id="email"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="phone" id="phone"
                           value="{{ old('phone', $user->phone ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ old('address', $user->address ?? '') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </form>
        </div>

        <!-- Résumé commande -->
        <div class="col-md-6">
            <h5 class="mb-3">Historique des commandes</h5>
            <ul class="list-group">
                @forelse ($orders as $order)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>#{{ $order->id }}</strong> - {{ $order->created_at->format('d/m/Y') }}
                            <br>
                            <small>Total : {{ number_format($order->total, 2) }} DH</small>
                        </div>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                    </li>
                @empty
                    <li class="list-group-item">Aucune commande passée.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
