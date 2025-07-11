<x-layoutlogin>
    <x-slot:title>Tanjung Lesung Enterprise Resource Planning</x-slot:title>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form action="login" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-80">
            @csrf 

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-sm">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" id="email" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" name="password" id="password" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" class="w-full bg-pink-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                LOG IN
            </button>
        </form>
    </div>
</x-layoutlogin>
