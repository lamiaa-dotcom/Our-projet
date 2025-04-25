<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Ajouter une catégorie</h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom de la catégorie</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image de la catégorie (optionnel)</label>
                <input type="file" name="image" id="image" class="w-full border rounded p-2">
                <p class="text-sm text-gray-500">Formats acceptés : JPEG, PNG, JPG, GIF. Taille maximale : 2MB.</p>
                @error('image')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Créer la catégorie</button>
            <a href="{{ route('categories.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded ml-2">Annuler</a>
        </form>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Boutique d'Huiles Naturelles - Admin. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>