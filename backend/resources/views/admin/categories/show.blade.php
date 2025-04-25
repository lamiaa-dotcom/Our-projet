<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">{{ $category->name }}</h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            @if ($category->image_path)
                <img src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->name }}" class="w-48 h-48 object-cover rounded mb-4">
            @else
                <p class="text-gray-500 mb-4">Aucune image définie.</p>
            @endif
            <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
            <p class="text-gray-500 mt-2">Catégorie créée le : {{ $category->created_at->format('d/m/Y') }}</p>
            <a href="{{ route('categories.index') }}" class="mt-6 bg-green-600 text-white py-2 px-4 rounded inline-block">Retour</a>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Boutique d'Huiles Naturelles - Admin. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>