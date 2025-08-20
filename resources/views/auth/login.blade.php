@extends('layouts.login')

@section('content')

    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3">@CMKO</h1>
                    <p class="col-lg-10 fs-4">Sistema para el control de programas! </p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="name@example.com" name="email">
                            <label for="email">Correo / Usuario</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                            <label for="password">Contraseña</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Acceder</button>
                        <hr class="my-4">
                        <small class="text-muted"></small>
                    </form>
                </div>
            </div>

            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
{{--                <p class="col-md-4 mb-0 text-muted">© 2023 Codepen</p>--}}

{{--                <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                    <img src="https://img.icons8.com/ios/2x/t-key.png" width="30">--}}
{{--                </a>--}}

{{--                <ul class="nav col-md-4 justify-content-end">--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Terms</a></li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Policy</a></li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Help</a></li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contact</a></li>--}}
{{--                </ul>--}}
            </footer>
        </div>
    </main>
@endsection
