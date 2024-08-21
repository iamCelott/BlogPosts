<?php 
include "./query/register.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PostHir</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div
      class="flex min-h-screen w-full bg-[#45474B] justify-center items-center"
    >
      <div class="bg-[#57595e] text-white">
        <h1 class="text-center py-5 text-xl">REGISTER</h1>
        <form class="flex flex-col px-10 pb-5" method="post">
          <label for="name">Name: </label>
          <input
            class="py-2 px-3 bg-transparent border-2 border-white outline-none"
            type="text"
            placeholder="name"
            id="name"
            name="name"
            required
          />
          <label for="email" class="pt-3">Email: </label>
          <input
            class="py-2 px-3 bg-transparent border-2 border-white outline-none"
            type="email"
            placeholder="email"
            id="email"
            name="email"
            required
          />
          <label for="username" class="pt-3">Username: </label>
          <input
            class="py-2 px-3 bg-transparent border-2 border-white outline-none"
            type="text"
            placeholder="username"
            id="username"
            name="username"
            required
          />
          <label for="password" class="pt-3">Password: </label>
          <input
            class="py-2 px-3 bg-transparent border-2 border-white outline-none"
            type="password"
            placeholder="password"
            id="password"
            name="password"
            required
          />
          <button
            class="w-full bg-white text-black py-2 mt-3"
            type="submit"
            name="submit"
          >
            Register
          </button>
          <h1>Already Have an Account? <a href="./login.php" class="text-blue-400">Login</a></h1>
        </form>
      </div>
    </div>
  </body>
</html>
