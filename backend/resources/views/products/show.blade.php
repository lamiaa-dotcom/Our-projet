<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
        </div>
    </header>

    <main class="container mx-auto py-8">
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
            <p class="text-gray-600 mt-2">{{ $product->description }}</p>
            <p class="text-green-600 font-bold mt-2">{{ number_format($product->price, 2) }} DH</p>
            <p class="text-gray-500 mt-1">Stock: {{ $product->stock }}</p>
            <p class="text-gray-500 mt-1">Capacité: {{ $product->capacite ? $product->capacite . ' ml' : 'Non spécifiée' }}</p>
            <p class="text-gray-500 mt-1">Catégorie: {{ $product->category->name }}</p>
            <a href="{{ route('products.index') }}" class="mt-6 bg-green-600 text-white py-2 px-4 rounded inline-block">Retour</a>
        </div>
    </main>
</body>
</html>