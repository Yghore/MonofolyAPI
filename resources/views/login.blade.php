<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    @stack('css')
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-login-image {
            background: url("{{ asset('storage/img/login_img.png') }}");
            background-position: center;
            background-size: cover;
        }
    </style>
</head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bonjour !</h1>
                                        @if($errors->any())
                                        <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                                    @endif
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login.authenticate') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Adresse email :</label>
                                            <input type="email" name="email" class="@error('email') is-invalid @enderror form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="john.doe@exemple.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mot de passe :</label>
                                            <input type="password" name="password" class="@error('password') is-invalid @enderror  form-control form-control-user"
                                                id="password" placeholder="********">
                                        </div>
                                        <input type="submit" value="Connexion" class="btn btn-primary btn-user btn-block">
                            
                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>