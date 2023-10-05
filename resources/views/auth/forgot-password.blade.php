@section('title', 'Forgot Password')
<x-guest-layout>
    <div class="row">
        <div class="col mx-auto">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-12">
                    <div class="row p-0 m-0">
                        <div class="col-lg-6 p-0">
                            <div class="text-justified text-white p-5 register-1  overflow-hidden">
                                <div class="custom-content">
                                    <div class="mb-5 br-7">
                                        <img src="{{url('assets/images/brand/logo1.png')}}" class="header-brand-img desktop-lgo" alt="{{config('app.name')}} logo">
                                    </div>
                                    <div class="ms-5">
                                        <div class="fs-16 mb-6 font-weight-bold text-white">Welcome Back To {{config('app.name')}} !</div>
                                        <div class="mb-6 text-white-50">
                                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                            <div class="bg-white text-dark br-7 br-tl-0 br-bl-0" style="height: 100%">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h1 class="mb-2">Forget Password</h1>
                                        <a href="javascript:void(0);" class="">OOps....</a>
                                    </div>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="input-group mb-4">
                                            <div class="input-group-text">
                                                <i class="fe fe-mail"></i>
                                            </div>
                                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button>
                                                {{ __('Email Password Reset Link') }}
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
