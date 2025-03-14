<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite('resources/css/app.css')
    </head>
    <body class="flex items-center justify-center min-h-screen bg-[#001f3d] ">
        <div class="container p-5 bg-[#001f3d]">
            <div class="my-5 row">
                <div class="mx-auto col-md-6">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="p-5 bg-[#d99a00] shadow-sm card">
                        <div class="text-center bg-[#001f3d] card-header">
                            <h3 class="mt-2 bg-[#001f3d] text-white">
                                Login
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.auth') }}" method="post">
                                @csrf
                                <div class="mb-3 form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                                        name="email" placeholder="name@example.com">
                                    <label for="floatingInput">Email address*</label>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3 form-floating">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password*</label>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-lg bg-[#001f3d] text-white hover:bg-[#001a33] border-none">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
