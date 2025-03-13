<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-center text-3xl font-bold bg-gray-800 text-white p-4">
        𝗔𝗱𝗺𝗶𝗻 𝗗𝗮𝘀𝗵𝗯𝗼𝗮𝗿𝗱
    </h1>
    <form action="{{ route('admin.logout') }}" method="post" class="text-center mt-4">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
            Logout
        </button>
</body>
</html>
