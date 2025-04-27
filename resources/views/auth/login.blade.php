<x-layouts.app>
    <div class="flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat bg-[url('/public/img/homeImage.jpeg')] bg-gray-400 bg-blend-multiply" >
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg md:max-w-sm bg-opacity-60 backdrop-blur-lg">
            <div class="flex items-center justify-center mb-5">
                <img src="https://cdn-icons-png.flaticon.com/128/159/159037.png" alt="Lock_Icon" class="w-6 h-6 mr-2">
                <h2 class="text-2xl font-semibold text-center text-gray-900 dark:text-white">Sign In</h2>
            </div>

            <form action="/auth/login" method="POST" class="space-y-5">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror" placeholder="E-mail" required />
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-500 @enderror" placeholder="•••••••••" required />
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            </form>
            <p class="mt-4 text-sm text-center text-gray-600 dark:text-gray-400">
                Not registered?
                <a href="{{ route('register') }}" class="text-blue-700 hover:underline dark:text-blue-500">Create an account</a>
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        const alertBox = document.getElementById('alertBox');
        if (alertBox) {
            alertBox.addEventListener('click', function () {
                alertBox.style.display = 'none';
            });
            setTimeout(function () {
                if (alertBox) {
                    alertBox.style.display = 'none'; /
                }
            }, 2000);
        }
    </script>
</x-layouts.app>
