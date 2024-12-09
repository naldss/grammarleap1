<html>
@include('partials.head')
<title>GrammarLeap - Login</title>

<body class="dots-bg">

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="width: 100%;">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div
                                class="bg-gradient-primary col-lg-6 d-flex flex-column justify-content-center align-items-center p-5">
                                <div class="home logo"></div>
                                <div class="app-name text-gray-100">
                                    GrammarLeap
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>



                                    <form class="user" method="POST" action="{{ route('login.submit') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                placeholder="Enter Password" required>
                                        </div>
                                        @error('error')
                                            <div class="text-danger text-s p-2">{{ $message }}</div>
                                        @enderror
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Login
                                        </button>
                                    </form>



                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Don't have an Account?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



</body>

</html>
