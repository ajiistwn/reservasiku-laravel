<x-layouts.app>
    <div class="flex items-center justify-center min-h-screen  bg-cover bg-center bg-no-repeat bg-[url('/public/img/homeImage.jpeg')] bg-gray-400 bg-blend-multiply" >
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg md:max-w-xl my-30 bg-opacity-60 backdrop-blur-lg">
            <div class="flex items-center justify-center mb-5">
                <img src="https://cdn-icons-png.flaticon.com/128/159/159037.png" alt="Lock Icon" class="w-6 h-6 mr-2">
                <h2 class="text-2xl font-semibold text-center text-gray-900 dark:text-white">Update</h2>
            </div>
            <form action="{{route('update')}}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="flex justify-center mb-5">
                        <img class="w-56 border-2 border-transparent rounded-full md:w-35 group-hover:border-cyan-500" src="{{ asset(Auth::user()->image) }}" alt="i{{ Auth::user()->name }}" />
                    </div>
                    <div class="flex items-center ">
                        <div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="large_size">Large file input</label>
                            <input class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file">

                        </div>
                    </div>


                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror" placeholder="Username" required />
                        @error('name')
                            <p class="text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone') border-red-500 @enderror" placeholder="Enter phone number" pattern="(\d{3}[-\s]?)?\d{4}[-\s]?\d{3}" value="{{ Auth::user()->phone }}"
                        required />
                        @error('phone')
                            <p class="text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                        <input type="text" id="city" name="city" value="{{ Auth::user()->city }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="City" required />
                    </div>
                    <div>
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                        <input type="text" id="country" name="country" value="{{ Auth::user()->country }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Country" required />
                    </div>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E-mail" required />
                </div>
                <div class="mb-6">
                    <label for="password_old" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Verify data changes with password !!
                    </p>
                    <input type="password" id="password_old" name="password_old" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" autocomplete="new-password" required/>
                </div>
                <div class="mb-6">
                    <label for="password_new" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Fill in if you want to change the password to a new one.
                    </p>
                    <input type="password" id="password_new" name="password_new" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••"  />
                </div>

                <div class="flex gap-2 mb-5">
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center " >Update</button>

                    <a href="{{route('profile') }}">
                        <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Cancel</button>
                    </a>
                </div>
            </form>

        </div>
    </div>

</x-layouts.app>
