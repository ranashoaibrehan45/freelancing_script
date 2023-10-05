@section('title', 'Verify Email')
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
                                        <img src="{{url('assets/images/brand/logo1.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                    </div>
                                    <div class="ms-5">
                                        <div class="fs-16 mb-6 font-weight-bold text-white">Welcome Back To {{config('app.name')}} !</div>
                                        <div class="mb-6 text-white-50">
                                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                        </div>

                                        <form method="POST" action="{{ route('logout') }}" class="mt-4">
                                            @csrf
                                
                                            <button type="submit" class="btn btn-white text-primary text-transparent font-weight-bold ">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 p-0 mx-auto">
                        <div class="bg-white text-dark h-300 br-7 br-tl-0 br-bl-0">
                            <div class="card-body">
                                <div class="text-center mb-4 ">
                                    <span class="avatar avatar-xxl  brround" style="background-image: url(../../assets/images/users/2.jpg)"></span>
                                </div>
                                <span class="m-4 d-none d-lg-block text-center">
                                    <span class="fs-20"><strong>{{Auth::user()->username}}</strong></span>
                                </span>
                                @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                                @endif

                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                        
                                    <div>
                                        <x-primary-button class="w-100">
                                            <i class="fe fe-lock"></i> {{ __('Resend Verification Email') }}
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
