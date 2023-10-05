@section('title', 'Reset Password')
<x-guest-layout>
    <div class="row">
        <div class="col mx-auto">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-12">
                    <div class="row p-0 m-0">
                        <div class="col-lg-6 p-0">
                            <div class="text-justified text-white p-5 register-1">
                                <div class="custom-content">
                                    <div class="mb-5 br-7">
                                        <img src="{{url('assets/images/brand/logo1.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                    </div>
                                    <div class="ms-5">
                                        <div class="fs-16 mb-6 font-weight-bold text-white">Welcome Back To {{config('app.name')}} !</div>
                                        <div class="mb-6 text-white-50">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem et esse in velit deleniti facilis quo, placeat totam aliquam veniam, quis rerum itaque!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                            <div class="bg-white text-dark br-7 br-tl-0 br-bl-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h1 class="mb-2">Password</h1>
                                        <a href="javascript:void(0);" class="">Create New Password</a>
                                    </div>

                                    <form method="POST" action="{{ route('password.store') }}" class="mt-5">
                                        @csrf
                                
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                
                                        <!-- Email Address -->
                                        <div class="input-group mb-4">
                                            <div class="input-group" id="Password-toggle">
                                                <a href="" class="input-group-text">
                                                    <i class="fe fe-user" aria-hidden="true"></i>
                                                </a>
                                                <x-text-input type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="email" />
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="text-red mt-2" />
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group" id="Password-toggle">
                                                <a href="" class="input-group-text">
                                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                                </a>
                                                <x-text-input type="password" 
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
                                                <x-text-input
                                                    type="password"
                                                    name="password_confirmation" 
                                                    required 
                                                    autocomplete="new-password"
                                                    placeholder="Confirm password" />
                                            </div>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                
                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button>
                                                {{ __('Reset Password') }}
                                            </x-primary-button>
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
</x-guest-layout>
