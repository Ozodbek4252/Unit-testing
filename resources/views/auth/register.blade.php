@include('components.admin.links')

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <x-jet-validation-errors class="mb-4" />

                        <div class="text-center mt-2">
                            <h5 class="text-primary">Register Account</h5>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input name="name" type="text" class="form-control" id="name" autofocus
                                        placeholder="Enter name" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input name="email" type="email" class="form-control" id="useremail"
                                        placeholder="Enter email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input name="password" type="password" class="form-control" id="userpassword"
                                        placeholder="Enter password" required autocomplete="new-password">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password_confirmation">Password</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                        id="password_confirmation" required placeholder="Confirm your password"
                                        autocomplete="new-password">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                    <label class="form-check-label" for="auth-terms-condition-check">I accept <a
                                            href="javascript: void(0);" class="text-dark">Terms and
                                            Conditions</a></label>
                                </div>




                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary w-sm waves-effect waves-light"
                                        type="submit">Register</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 title">Sign up using</h5>
                                    </div>


                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                                class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                                class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                                class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="text-muted mb-0">Already have an account ? <a href="{{ Route('login') }}"
                                            class="fw-medium text-primary"> Login</a></p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Vortex. Created with <i class="mdi mdi-heart text-danger"></i> by
                        Ozodbek
                    </p>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
