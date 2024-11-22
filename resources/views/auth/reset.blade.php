<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1 text-red-500">
                            RESET PASSWORD
                        </h2>
                        {{-- <h2 class="mb-4">Reset Password</h2> --}}
                    </header>

                    <form method="POST" action="">
                        @csrf
                        <div class="mb-6">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password" value="{{old('password')}}"
                            />

                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                                Confirm Password
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="cpassword" value="{{old('cpassword')}}"
                            />

                            @error('cpassword')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                reset password
                            </button>
                        </div>

                        <div class="mt-8">
                            <p>
                                Don't have an Account?
                                <a href="/register" class="text-laravel">Register</a>
                            </p>
                        </div>
                        <div class="mt-8">
                            <p>
                                Having an Account?
                                <a href="/login" class="text-laravel">login</a>
                            </p>
                        </div>

                    </form>
                </div>
    </x-card>
  </x-layout>
