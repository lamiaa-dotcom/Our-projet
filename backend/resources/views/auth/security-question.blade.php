<!DOCTYPE html>
<html>
<head>
    <title>Vérifier la question de sécurité</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Vérifier la question de sécurité</div>
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
                        <form method="POST" action="{{ route('password.security-answer') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="form-group">
                                <label>Question de sécurité</label>
                                <p class="form-control">{{ $security_question }}</p>
                            </div>
                            <div class="form-group">
                                <label>Votre réponse</label>
                                <input type="text" name="security_answer" class="form-control" required>
                                @error('security_answer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Vérifier la réponse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>