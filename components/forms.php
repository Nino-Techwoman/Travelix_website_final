<?php

    function displaySignupForm($error = '') {
        if ($error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo '
        <div class="d-flex justify-content-center align-items-center register_form">
            <form method="POST" action="" class="p-5 rounded shadow w-75">
                <h2 class="text-center mb-4">Register</h2>

                <input type="text" name="first_name" class="form-control mt-3" placeholder="Enter your firstname" required>
                <input type="text" name="last_name" class="form-control mt-3" placeholder="Enter your lastname" required>
                <input type="email" name="email" class="form-control mt-3" placeholder="Enter your email" required>
                <input type="text" name="username" class="form-control mt-3" placeholder="Enter your username" required>
                <input type="password" name="password" class="form-control mt-3" placeholder="Enter your password" required>
                <input type="password" name="confirm_password" class="form-control mt-3" placeholder="Repeat your password" required>
                <button type="submit" class="bg-success text-light border-0 w-100 mt-3">Register</button>

                <p class="text-center mt-3 mb-0">
                    Already have an account? <a href="login.php" class="text-decoration-none text-info">Login</a>
                </p>
            </form>
        </div>
        ';
    }

    function displayLoginForm($error = '') {
        if ($error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo '
        <div class="d-flex justify-content-center align-items-center login_form">
            <form method="POST" action="" class="p-5 rounded shadow w-75">
                <h2 class="text-center mb-4">Login</h2>

                <input type="text" name="username" class="form-control mt-3" placeholder="Enter your username" required>
                <input type="password" name="password" class="form-control my-3" placeholder="Enter your password" required>
                <button type="submit" class="bg-primary text-light border-0 w-100">Login</button>

                <p class="text-center mt-3 mb-0">
                    Don’t have an account? <a href="register.php" class="text-decoration-none text-info">Register</a>
                </p>
            </form>
        </div>
        ';
    }

?>
