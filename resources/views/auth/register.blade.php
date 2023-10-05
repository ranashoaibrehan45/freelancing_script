@section('title', 'Sign Up')
<x-guest-layout>
    <div class="row">
        <div class="col mx-auto">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-12">
                    <div class="row p-0 m-0">
                        <div class="col-lg-6 p-0">
                            <div class="text-justified text-white p-5 register-1 overflow-hidden">
                                <div class="custom-content">
                                    <div class="mb-5 br-7">
                                        <img src="{{url('assets/images/brand/logo1.png')}}" class="header-brand-img desktop-lgo" alt="{{config('app.name')}} logo">
                                    </div>
                                    <div class="ms-5">
                                        <div class="fs-16 mb-6 font-weight-bold text-white">{{__('Welcome Back To Azea !')}}</div>
                                        <div class="mb-6 text-white-50">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem et esse in velit deleniti facilis quo, placeat totam aliquam veniam, quis rerum itaque, incidunt sequi quidem magni error est! Provident!
                                        </div>
                                        <h6 class="text-white-50">{{__('Already a member ?')}}</h6>
                                        <a href="{{route('login')}}" class="btn btn-white text-primary font-weight-bold ">{{__('Login Here')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                        <div class="bg-white  text-dark br-7 br-tl-0 br-bl-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h1 class="mb-2">{{__('Sign Up')}}</h1>
                                    <a href="javascript:void(0);" class="">{{__('Create New Account')}}</a>
                                </div>
                                <form method="POST" action="{{ route('register') }}" class="mt-5">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-text">
                                            <i class="fe fe-user"></i>
                                        </div>
                                        <x-text-input type="text" 
                                            name="username" 
                                            :value="old('username')" 
                                            required 
                                            autocomplete="username" 
                                            placeholder="Username" />
                                    </div>
                                    <x-input-error :messages="$errors->get('username')" class="text-red mt-2" />

                                    <div class="input-group mb-4">
                                        <div class="input-group-text">
                                            <i class="fe fe-mail"></i>
                                        </div>
                                        <x-text-input type="email" 
                                            name="email" 
                                            :value="old('email')" 
                                            required 
                                            autocomplete="email" 
                                            placeholder="Email address" />
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="text-red mt-2" />

                                    <div class="input-group mb-4">
                                        <div class="input-group" id="Password-toggle">
                                            <a href="" class="input-group-text">
                                                <i class="fe fe-eye" aria-hidden="true"></i>
                                            </a>
                                            <x-text-input id="password"
                                                type="password"
                                                name="password"
                                                required 
                                                autocomplete="new-password"
                                                placeholder="Password" />
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="text-red mt-2" />
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group" id="Password-toggle1">
                                            <a href="" class="input-group-text">
                                              <i class="fe fe-eye" aria-hidden="true"></i>
                                            </a>
                                            <x-text-input id="password_confirmation"
                                                type="password"
                                                name="password_confirmation"
                                                required
                                                autocomplete="new-password"
                                                placeholder="Confirm Password" />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" />
                                            <span class="custom-control-label">
                                                I Agree For<a href="javascript:void(0);" class="font-weight-bold">  Terms & Conditions.</a>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-group text-center mb-3">
                                        <button class="btn btn-primary btn-lg w-100 br-7">Sign Up</button>
                                    </div>
                                    <div class="form-group fs-12 text-center">
                                        By Clicking Sign up,Your agree to our  <a href="javascript:void(0);" class="font-weight-bold">Terms & Conditions</a> and have read and acknowledge our  <a href="javascript:void(0);" class="font-weight-bold">Privacy & Services.</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="display_name" :value="__('Display Name')" />
            <x-text-input id="display_name" class="block mt-1 w-full" type="text" name="display_name" :value="old('display_name')" required autocomplete="display_name" />
            <x-input-error :messages="$errors->get('display_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <x-input-label for="password_confirmation" :value="__('Join As')" />
            <label class="inline-flex items-center mt-4">
                <input type="radio" value="client" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="role" value="client" checked>
                <span class="ml-2 text-sm text-gray-600">{{ __('Client') }}</span>
            </label>
            <label class="inline-flex items-center mt-4">
                <input type="radio" value="client" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="role" value="freelancer">
                <span class="ml-2 text-sm text-gray-600">{{ __('Freelancer') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    --}}
</x-guest-layout>
