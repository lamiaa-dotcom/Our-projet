<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huiles Naturelles - Boutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">Boutique d'Huiles Naturelles</h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('products.index') }}" class="mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                <input type="text" name="search" placeholder="Rechercher un produit..."
                       value="{{ request('search') }}"
                       class="border border-gray-300 rounded px-4 py-2 w-full md:w-1/3">

                @if(request('search'))
                    <a href="{{ route('products.index') }}" class="text-blue-600 underline mt-2 md:mt-0">Réinitialiser</a>
                @endif
            </div>
        </form>

        <!-- Lien Ajouter -->
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white py-2 px-4 rounded mb-6 inline-block">Ajouter un produit</a>

        <!-- Affichage des produits -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="relative">
                        <div class="carousel flex overflow-x-auto snap-x snap-mandatory">
                            @if ($product->images->isNotEmpty())
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->alt_text ?? $product->name }}"
                                         class="w-full h-64 object-cover snap-center rounded-t-lg">
                                @endforeach
                            @else
                                <img src="{{ asset('images/placeholder.jpg') }}" alt="Image par défaut"
                                     class="w-full h-64 object-cover snap-center rounded-t-lg">
                            @endif
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold mt-4">{{ $product->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                    <p class="text-green-600 font-bold mt-2">{{ number_format($product->price, 2) }} DH</p>
                    <p class="text-gray-500 mt-1">Stock: {{ $product->stock }}</p>
                    <p class="text-gray-500 mt-1">Capacité: {{ $product->capacity ? $product->capacity . ' ml' : 'Non spécifiée' }}</p>
                    <p class="text-gray-500 mt-1">Catégorie: {{ $product->category->name }}</p>
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('products.show', $product) }}" class="bg-blue-600 text-white py-2 px-4 rounded">Voir</a>
                        <a href="{{ route('products.edit', $product) }}" class="bg-yellow-600 text-white py-2 px-4 rounded">Modifier</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Supprimer</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-3">Aucun produit disponible.</p>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Boutique d'Huiles Naturelles. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
