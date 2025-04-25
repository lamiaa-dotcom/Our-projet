<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier {{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Modifier {{ $product->name }}</h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Prix (DH)</label>
                <input type="number" name="price" id="price" step="0.01" class="w-full border rounded p-2" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded p-2" value="{{ old('stock', $product->stock) }}" required>
                @error('stock')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="capacity" class="block text-gray-700">Capacité (ml)</label>
                <input type="number" name="capacity" id="capacity" step="0.01" class="w-full border rounded p-2" value="{{ old('capacity', $product->capacity) }}">
                @error('capacity')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Catégorie</label>
                <select name="category_id" id="category_id" class="w-full border rounded p-2" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700">Nouvelles images (optionnel)</label>
                <input type="file" name="images[]" id="images" class="w-full border rounded p-2" multiple>
                @error('images.*')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="alt_texts" class="block text-gray-700">Textes alternatifs pour les nouvelles images (optionnel)</label>
                <textarea name="alt_texts[]" id="alt_texts" class="w-full border rounded p-2" placeholder="Entrez un texte alternatif pour chaque image, séparé par des virgules"></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Mettre à jour</button>
        </form>
    </main>
</body>
</html>