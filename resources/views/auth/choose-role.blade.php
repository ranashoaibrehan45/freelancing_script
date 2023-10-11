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
                                        <div class="fs-16 mb-6 font-weight-bold text-white">{{__('Join as a client or freelancer')}}</div>
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
                                <form method="GET" action="{{ route('register') }}" class="mt-5">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group ">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="as" value="client">
                                                        <span class="custom-control-label">
                                                            I’m a client, hiring for a project
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group ">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="as" value="freelancer">
                                                        <span class="custom-control-label">
                                                            I’m a freelancer, looking for work
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center mb-3">
                                        <button type="submit" disabled="true" class="btn btn-primary submit btn-lg w-100 br-7">Create Account</button>
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
    @section('page-specific-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[name="as"]').change(function() {
                let as = $(this).val();
                if (as == 'client') {
                    btnContent = 'Join as a client';
                } else {
                    btnContent = 'Apply as a freelancer';
                }
                $('button').attr('disabled', false);
                $('button').text(btnContent);
            })

            $(".submit").click(function() {
                if ($('input[name="as"]:checked').length == 0) {
                    alert('Please choose your role to continue!');
                    return false;
                }
                return true;
            });
        })
    </script>
    @endsection
</x-guest-layout>