<!DOCTYPE html>
<html>
<head>
    <title>Vérifier le code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Vérifier le code</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.verify-code-submit') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="form-group">
                                <label>Entrez le code reçu par e-mail</label>
                                <input type="text" name="code" class="form-control" required>
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Vérifier le code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>