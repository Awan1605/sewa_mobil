<?php
require "admin/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <section>
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card shadow-lg" style="border-radius: 15px; background: rgba(255, 255, 255, 0.95);">
                        <div class="card-body p-4">
                            <h2 class="text-center mb-5"><span class="fw-bold text-primary">Create</span> Account</h2>

                            <?php
                            if (isset($_POST["register"])) {
                                if (registrasi($_POST) > 0) {
                                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <i class='fas fa-check-circle me-2'></i>Registration successful!
                                    <button type='button' class='btn-close' data-mdb-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                                    echo "<script>
                                    setTimeout(function() {
                                        window.location.href = 'login.php';
                                    }, 2000);
                                    </script>";
                                }
                            }
                            ?>

                            <form action="" method="post">
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="email"><i
                                            class="fas fa-envelope me-2"></i>Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg" required />
                                    <label class="form-label" for="password"><i
                                            class="fas fa-lock me-2"></i>Password</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="nama" id="nama" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="nama"><i class="fas fa-user me-2"></i>Full
                                        Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="tel" name="tlpn" id="tlpn" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="tlpn"><i class="fas fa-phone me-2"></i>Phone
                                        Number</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <textarea name="alamat" id="alamat" class="form-control form-control-lg" rows="3"
                                        required></textarea>
                                    <label class="form-label" for="alamat"><i
                                            class="fas fa-map-marker-alt me-2"></i>Address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <select name="role" class="form-select form-control-lg" required>
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="penyewa">Customer</option>
                                    </select>
                                </div>

                                <button type="submit" name="register"
                                    class="btn btn-primary btn-lg btn-block w-100 mb-4">
                                    <i class="fas fa-user-plus me-2"></i>Register
                                </button>

                                <div class="text-center"></div>
                                <p>Already have an account? <a href="login.php" class="text-primary fw-bold">Login</a>
                                </p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>




    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>