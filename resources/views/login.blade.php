<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>

<body>
    <div class="container flex justify-center">
        <!-- login box -->
        <div class="container-md login-box rounded-xl border-2 border-gray-300  p-10 self-center justify-center">
            <div class="flex justify-center items-center">
                <img src="img/download.jpeg" alt="University Logo" class="logo" width="100px" style="display: center;">
            </div>
            <br>
            <h1 class="text-3xl mb-5 font-medium text-center leading-6 text-gray-900 ">SISKARA</h1>
            <form action="#" method="POST">
                <div class="sm:col-span-3">
                    <label for="email"
                        class="block text-sm text-center font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="text" name="email" id="email" autocomplete="given-email"
                            class="block w-96 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm text-center font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="text" name="password" id="password" autocomplete="family-name"
                            class="block w-96 mb-5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <button type="submit"
                    class="mb-5 block rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                <a href="#" class="forgot-password block text-sm text-right font-medium text-blue-700">Forgot password?</a>
            </form>
            <p class="block text-sm font-medium ">Don't have an account? <a href="#" class="signup-link text-blue-700">Sign Up</a></p>
        </div>
    </div>
</body>

</html>