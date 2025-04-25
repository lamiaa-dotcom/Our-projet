<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tableau de Bord - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#047857',
                        accent: '#10B981',
                        muted: '#6B7280',
                        danger: '#EF4444'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg p-6 hidden md:block">
            <h2 class="text-2xl font-bold text-primary mb-8">Panneau d'administration</h2>
            <nav class="space-y-4 text-base">
                <a href="{{ route('products.index') }}" class="block hover:text-primary transition">Gérer les produits</a>
                <a href="{{ route('products.create') }}" class="block hover:text-primary transition">Ajouter un produit</a>
                <a href="{{ route('categories.index') }}" class="block hover:text-primary transition">Gérer les catégories</a>
                <a href="{{ route('users.index') }}" class="block hover:text-primary transition">Gérer les utilisateurs</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10">
            <!-- Header -->
            <header class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-primary">Tableau de bord</h1>
                    <p class="text-muted text-sm">Bienvenue dans votre espace d’administration</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-danger hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow text-sm transition">
                        Se déconnecter
                    </button>
                </form>
            </header>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-accent hover:shadow-lg transition">
                    <p class="text-sm text-muted mb-1">Produits enregistrés</p>
                    <p class="text-3xl font-bold text-primary">{{ $totalProducts }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-blue-500 hover:shadow-lg transition">
                    <p class="text-sm text-muted mb-1">Stock total</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalStock }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-t-4 border-red-500 hover:shadow-lg transition">
                    <p class="text-sm text-muted mb-1">Produits en rupture</p>
                    <p class="text-3xl font-bold text-red-600">{{ $outOfStockProducts }}</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('products.index') }}" class="bg-primary hover:bg-green-700 text-white text-center py-3 rounded-lg shadow transition font-medium">
                    Gérer les produits
                </a>
                <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-lg shadow transition font-medium">
                    Ajouter un produit
                </a>
                <a href="{{ route('categories.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-center py-3 rounded-lg shadow transition font-medium">
                    Gérer les catégories
                </a>
                <a href="{{ route('users.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white text-center py-3 rounded-lg shadow transition font-medium">
                    Gérer les utilisateurs
                </a>
            </div>
        </main>
    </div>

    <footer class="mt-10 py-4 text-center text-sm text-muted border-t bg-white">
        © 2025 Boutique d'Huiles Naturelles - Tous droits réservés.
    </footer>

</body>
</html>
