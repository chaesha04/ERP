<x-layoutlogin>
    <x-slot:title>404 Not Found</x-slot:title>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-100">
            <table class="table-auto mx-auto">
                <tr>
                    <td rowspan="3" class="align-top pr-6">
                        <img src="{{ asset('404.png') }}" alt="Page not found" class="mx-auto w-60">
                    </td>
                    <td class="align-bottom">
                        <h1 class="text-3xl font-bold">Oops! Page Not Found</h1>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">
                        <p class="text-gray-600 mt-2">The page you're looking for doesn't exist.</p>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">
                        <div class="text-center">
                            <button onclick="history.back()" class="text-blue-500 hover:underline">
                                ← Back to Previous Page
                            </button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</x-layoutlogin>
