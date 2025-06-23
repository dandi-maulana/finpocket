<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FinPocket - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .gradient-card {
            background: linear-gradient(135deg, #a8c6fa 0%, #5a8cf0 50%, #2c58a0 100%);
            border: none;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(0,0,0,0.1);
        }
        .form-control:focus {
            background-color: white;
            box-shadow: 0 0 0 0.25rem rgba(88, 145, 226, 0.25);
        }
        .form-label {
            font-weight: 500;
            color: white;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #3a75e0;
            border: none;
            padding: 10px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #2c58a0;
        }
        .card-header {
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow gradient-card" style="width: 100%; max-width: 400px;">
            <div class="card-header bg-transparent text-white text-center">
                <h4 class="my-2"><i class="fas fa-wallet me-2"></i>Login FinPocket</h4>
            </div>
            <div class="card-body p-4">
                @if(session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" 
                               placeholder="Masukkan email Anda" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" 
                               placeholder="Masukkan password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>