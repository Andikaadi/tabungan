<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Tabungan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full space-y-8 p-6 bg-white shadow rounded">
        
        <h2 class="text-center text-3xl font-bold">
            Masuk ke Tabungan
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <input type="email" name="email" placeholder="Email"
                class="w-full border p-3 rounded" required>

            <input type="password" name="password" placeholder="Password"
                class="w-full border p-3 rounded" required>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded">
                Masuk
            </button>
        </form>

    </div>
</div>

</body>
</html>