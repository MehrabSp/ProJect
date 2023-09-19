<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">QUICK</h5>
                <button type="button" class="btn btn-floating mx-1" data-mdb-toggle="tooltip" data-mdb-placement="right" title="<?= get_browser_name($_SERVER['HTTP_USER_AGENT']) ?>">
                    <i class="fab fa-<?= get_browser_icon($_SERVER['HTTP_USER_AGENT']) ?>" style="font-size: 26px; color: #4f4f4f"></i>
                </button>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section class="h-100 gradient-form">
                    <div class="container py-1 h-100">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content p-2">
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

                                <div class="text-center mb-3">
                                    <p>Sign in with:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>

                                <p class="text-center">or:</p>

                                <p class="error"></p>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email_log" class="form-control form-control-lg" />
                                    <label class="form-label" for="email_log">Email:</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password_log" class="form-control form-control-lg" />
                                    <label class="form-label" for="password_log">Password</label>
                                </div>

                                <!-- 2 column grid layout -->
                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex justify-content-center">
                                        <!-- Checkbox -->
                                        <div class="form-check d-flex justify-content-center mb-4">
                                            <input class="form-check-input" name="def" type="checkbox" id="rememberCheck" checked />
                                            <label class="form-check-label" for="rememberCheck">
                                                default
                                            </label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 d-flex justify-content-center">
                                        <!-- Simple link -->
                                        <a href="#!">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" id="login" class="btn btn-primary btn-block mb-4">Log in</button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Not a member? <a href="#" onclick="regtr('rg')">Register</a></p>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                <p class="error text-center"></p>
                                <div class="row">
                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="name_up" class="form-control form-control-lg mb-0" maxlength="50" />
                                        <label class="form-label" for="name_up">Name</label>
                                    </div>
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" class="form-control form-control-lg mb-0" id="email_up" />
                                        <label class="form-label" for="email_up">Email address</label>
                                    </div>
                                    <!-- Password -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password_up" class="form-control form-control-lg mb-0" />
                                        <label class="form-label" for="password_up">Password</label>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" id="signup" class="btn btn-primary btn-block mb-3">Sign up</button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Pills content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->