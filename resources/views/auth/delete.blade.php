@include('components.admin.links')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Sorry To See You Go!</h5>
                            <p class="text-muted">Deleting Account.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('users.delete', auth()->user()) }}">
                                @csrf
                                @method('DELETE')

                                <div class="mb-3">
                                    <label class="form-label" for="username">Email</label>
                                    <input name="email" type="text" class="form-control" id="username"
                                        placeholder="Enter email">
                                </div>

                                <div class="mb-3">
                                    <div class="float-end">
                                        <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                    </div>
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input name="password" type="password" class="form-control" id="userpassword"
                                        placeholder="Enter password">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                </div>

                                <div class="mt-3 text-end">
                                    <button class="btn btn-danger w-sm waves-effect waves-light"
                                        type="submit">Delete</button>
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
