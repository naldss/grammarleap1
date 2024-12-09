<html>
@include('partials.head')
<title>GrammarLeap - Register</title>
<body class="dots-bg">

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="col-xl-10 col-lg-12 col-md-9 card o-hidden shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div
                        class="bg-gradient-primary col-lg-5 d-flex flex-column justify-content-center align-items-center p-5">
                        <div class="home logo"></div>
                        <div class="app-name text-gray-100">
                            GrammarLeap
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                            </div>



                            <form class="user" method="POST" action="{{ route('register.submit') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="First Name" name="fname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Last Name" name="lname" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 text-s">Birthdate:</div>
                                    <div class="col-6 text-s">Sex:</div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user"
                                        name="birthdate" required>
                                    </div>
                                    <div class="form-group col-6 d-flex align-items-center">
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" name="sex" id="male"
                                                value="male" required>
                                            <label class="form-check-label text-s" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" name="sex" id="female"
                                                value="female" required>
                                            <label class="form-check-label text-s" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email Address" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="text-danger text-s p-2">ⓘ {{ $error }}</div>
                                    @endforeach
                                @endif

                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    Register Account
                                </button>
                            </form>



                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('home') }}">Already have an account?</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</html>
