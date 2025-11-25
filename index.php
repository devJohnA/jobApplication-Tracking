<?php

session_start();
if (isset($_SESSION['user_name'])) {
  header("Location: view/dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Job Tracking - Login</title>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>

<body class="min-h-screen bg-stone-200 flex items-center justify-center p-4">
  <div class="w-full max-w-md">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

      <!-- Header -->
      <div class="bg-gradient-to-r bg-slate-800 px-8 py-10 text-center">
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
          <!-- Lock Icon -->
          <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2zM8 11V7a4 4 0 1 1 8 0v4" />
          </svg>
        </div>
        <h2 class="text-3xl font-bold text-white mb-2">Welcome Back</h2>
        <p class="text-indigo-100">Sign in to continue to your account</p>
      </div>

      <!-- Form -->
      <form id="loginForm">
        <div class="px-8 py-8 space-y-6">

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 12l-4-4m0 0l-4 4m4-4v12" />
                </svg>
              </div>

              <input
                id="email"
                type="email"
                name="email"
                placeholder="johndoe@gmail.com"
                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                required />
            </div>
          </div>

          <!-- Password -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2zM8 11V7a4 4 0 1 1 8 0v4" />
                </svg>
              </div>

              <input
                id="password"
                type="password"
                name="password"
                placeholder="Enter your password"
                class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                required />

              <!-- Toggle Visibility -->
              <button
                id="togglePassword"
                type="button"
                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <svg id="eyeIcon" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none"
                  stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </button>
            </div>
          </div>


          <!-- <div class="flex justify-end">
            <button class="text-sm font-medium text-blue-500 hover:text-indigo-500">
              Forgot password?
            </button>
          </div> -->

          <!-- Submit -->
          <button type="submit"

            class="w-full bg-slate-800 text-white py-3 rounded-lg hover:from-indigo-700 hover:to-purple-700 shadow-lg">
            Sign In
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $("#loginForm").on("submit", function(e) {
      e.preventDefault();
      
      $(document).ready(function() {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        if (email === "" || password === "") {
          Swal.fire(
            'Validation Error',
            'Both email and password are required!',
            'warning'
          );
          return;
        }


        $.ajax({
          url: "backend/api/login_user.php",
          type: "POST",
          data: {
            email: email,
            password: password
          },
          dataType: "json",
          success: function(res) {
            if (res.status === "success") {
              Swal.fire({
                title: "Login Successful",
                text: res.message,
                icon: "success",
                confirmButtonText: "Continue"
              }).then(() => {
                window.location.href = "view/dashboard.php";
              });
            } else {
              Swal.fire(
                'Login Failed',
                res.message,
                'error'
              );
            }
          },
          error: function() {
            alert("An error occurred. Please try again.");
          }
        });

      });
    });

    document.getElementById("togglePassword").addEventListener("click", () => {
      const passwordInput = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");

      const isText = passwordInput.type === "text";
      passwordInput.type = isText ? "password" : "text";
    });
  </script>
</body>

</html>