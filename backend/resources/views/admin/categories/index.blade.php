<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les catégories - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Gérer les catégories</h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <form action="{{ route('categories.index') }}" method="GET" class="mb-6">
            <div class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Rechercher une catégorie par nom..." 
                       value="{{ request('search') }}"
                       class="w-full md:w-1/3 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Rechercher</button>
                <a href="{{ route('categories.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded">Réinitialiser</a>
            </div>
        </form>

        <a href="{{ route('categories.create') }}" class="bg-green-600 text-white py-2 px-4 rounded mb-6 inline-block">Ajouter une catégorie</a>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white py-2 px-4 rounded mb-6 inline-block ml-2">Retour au tableau de bord</a>
        <div class="bg-white rounded-lg shadow-lg p-6">
            @forelse ($categories as $category)
                <div class="flex justify-between items-center py-2 border-b">
                    <div class="flex items-center">
                        @if ($category->image_path)
                            <img src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover rounded mr-4">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded mr-4 flex items-center justify-center">
                                <span class="text-gray-500">Aucune image</span>
                            </div>
                        @endif
                        <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('categories.show', $category) }}" class="bg-blue-600 text-white py-1 px-3 rounded">Voir</a>
                        <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-600 text-white py-1 px-3 rounded">Modifier</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded">Supprimer</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucune catégorie trouvée.</p>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Boutique d'Huiles Naturelles - Admin. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>