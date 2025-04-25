<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Ajouter un produit</h1>
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
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Prix (DH)</label>
                <input type="number" name="price" id="price" step="0.01" class="w-full border rounded p-2" value="{{ old('price') }}" required>
                @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded p-2" value="{{ old('stock') }}" required>
                @error('stock')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="capacite" class="block text-gray-700">Capacité (ml)</label>
                <input type="number" name="capacite" id="capacite" step="1" class="w-full border rounded p-2" value="{{ old('capacite') }}">
                @error('capacite')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" class="w-full border rounded p-2" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700">Images</label>
                <input type="file" name="images[]" id="images" class="w-full border rounded p-2" multiple>
                <p class="text-sm text-gray-500">Vous pouvez sélectionner plusieurs images (JPEG, PNG, JPG, GIF, max 2MB).</p>
                @error('images.*')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="alt_texts" class="block text-gray-700">Textes alternatifs pour les images (optionnel)</label>
                <textarea name="alt_texts[]" id="alt_texts" class="w-full border rounded p-2" placeholder="Entrez un texte alternatif pour chaque image, séparé par des virgules"></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Créer le produit</button>
        </form>
    </main>
</body>
</html>