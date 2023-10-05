@section('title', 'Login')
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

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
                                        <div class="fs-18 mb-6 font-weight-bold text-white">{{__('Welcome Back To')}} {{config('app.name')}} !</div>
                                        <div class="mb-6 text-white-50">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem et esse in velit deleniti facilis quo!
                                        </div>
                                        <h6 class="text-white-50">{{__('Don\'t Have an Account?')}}</h6>
                                        <a href="{{route('register')}}" class="btn btn-white text-primary text-transparent font-weight-bold ">{{__('Create Here')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                        <div class="bg-white text-dark br-7 br-tl-0 br-bl-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h1 class="mb-2">{{__('Log In')}}</h1>
                                    <a href="javascript:void(0);" class="">{{__('Hello There !')}}</a>
                                </div>
                                @include('partial.validation-errors')
                                <form method="POST" action="{{ route('login') }}" class="mt-5">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <div class="input-group-text">
                                            <i class="fe fe-user"></i>
                                        </div>
                                        <x-text-input type="text" name="login" :value="old('login')" required autofocus autocomplete="login" placeholder="Username or Email" />
                                    </div>
                                    <x-input-error :messages="$errors->get('login')" class="text-red mt-2" />

                                    <div class="input-group mb-4">
                                        <div class="input-group" id="Password-toggle">
                                            <a href="" class="input-group-text">
                                                <i class="fe fe-eye" aria-hidden="true"></i>
                                            </a>
                                            <x-text-input id="password"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="text-red mt-2" />
                                    </div>

                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" />
                                            <span class="custom-control-label">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group text-center mb-3">
                                        <x-primary-button class="btn-lg">
                                            {{ __('Log in') }}
                                        </x-primary-button>
                                    </div>
                                    <div class="form-group fs-13 text-center">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="form-group fs-14 text-center font-weight-bold">
                                        <a href="javascript:void(0);">{{__('Click Here To Backup Mail')}}</a>
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
