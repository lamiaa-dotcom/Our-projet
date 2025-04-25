<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - Boutique d'Huiles Naturelles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Boutique d'Huiles Naturelles</h1>
            <div>
                <span class="mr-4">Bienvenue, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}" class="bg-red-600 text-white py-1 px-3 rounded">Déconnexion</a>
            </div>
        </div```

System: It looks like your message was cut off at the end. I’ll assume you want the complete `profile.blade.php` file and provide a fully functional user profile page, along with the necessary controller and routes to handle authentication and user profile management. Below, I’ll complete the `profile.blade.php` file, provide a basic `AuthController` for login/registration, and include routes to tie everything together. I'll also ensure compatibility with your existing Laravel application, which uses Tailwind CSS and follows the structure of your previous code (e.g., `ProductController`, `CategoryController`, and Blade templates).

---

### Completed User Profile Page (`resources/views/user/profile.blade.php`)

This page allows authenticated users to view and update their profile information (e.g., name, email) and includes a logout option.

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - Boutique d'Huiles Naturelles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Boutique d'Huiles Naturelles</h1>
            <div>
                <span class="mr-4">Bienvenue, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded">Déconnexion</button>
                </form>
            </div>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-center mb-6">Profil Utilisateur</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Adresse e-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                    Mettre à jour
                </button>
            </form>

            <p class="text-center mt-4">
                <a href="{{ route('products.index') }}" class="text-green-600 hover:underline">Retour à la boutique</a>
            </p>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>© 2025 Boutique d'Huiles Naturelles. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>