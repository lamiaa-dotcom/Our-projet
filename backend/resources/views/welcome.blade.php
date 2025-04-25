<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Boutique d'Huiles Naturelles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Boutique d'Huiles Naturelles</h1>
            <div>
                @auth
                    <span class="mr-4">Bienvenue, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4 text-white hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="text-white hover:underline">Inscription</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <h2 class="text-2xl font-semibold mb-4">Bienvenue dans notre boutique</h2>
            <p class="text-gray-600 mb-6">Découvrez notre sélection d'huiles naturelles de haute qualité.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('products.index') }}" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                    Voir les produits
                </a>
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                            Tableau de bord admin
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Boutique d'Huiles Naturelles. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>