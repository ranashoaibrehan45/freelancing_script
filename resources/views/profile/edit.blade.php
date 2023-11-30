@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">{{__('Edit Profile')}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('partial.validation-errors')
    </div>
    <div class="col-xl-3 col-lg-4">
        <div class="card box-widget widget-user">
            <div id="profile_image">
                <x-profile.image :photo="$user->photo" />
            </div>
            <hr>
            <div class="card-body">
                <form id="profileImageUploadForm" action="{{url("profile/image")}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="profile_photo">Profile Picture</label>
                        <x-text-input type="file" name="profile_photo" id="profile_photo" />
                    </div>
                </form>
                <p>
                    Must be an actual photo of you.
                    Logos, clip-art, group photos, and digitally-altered images are not allowed. 
                    Opens in new window:  <a href="">Learn more</a>
                </p>
            </div>

            @if (Auth::user()->role == 'freelancer')
                @include('profile.components.languages')
                @include('profile.components.education')
            @endif
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-header ">
                    <div class="card-title">{{__('Edit Profile')}}</div>
                </div>
                <div class="card-body">
                    @include('partial.validation-errors')
                    <div class="card-title font-weight-bold">{{__('Basic info:')}}</div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label">{{__('First Name')}}</label>
                                <x-text-input type="text" name="first_name" value="{{old('first_name') ?? $user->first_name}}" required autocomplete="first_name" id="first_name" @class(['is-invalid' => $errors->has('first_name')]) />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2 invalid-feedback" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="form-label">{{__('Last Name')}}</label>
                                <x-text-input type="text" name="last_name" :value="old('last_name') ?? $user->last_name" required autocomplete="last_name" id="last_name" @class(['is-invalid' => $errors->has('last_name')]) />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2 invalid-feedback" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <x-text-input type="text" :value="$user->email" :disabled="true" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <x-text-input type="tel" name="phone" :value="old('phone') ?? $user->phone" id="mobile-number" placeholder="e.g. +1 702 123 4567" />
							</div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <x-text-input type="text" name="address" :value="old('address') ?? $user->address" required autocomplete="address" id="address" @class(['is-invalid' => $errors->has('address')]) />
                                <x-input-error :messages="$errors->get('address')" class="mt-2 invalid-feedback" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="zipcode" class="form-label">Postal Code</label>
                                <x-text-input type="number" name="zipcode" :value="old('zipcode') ?? $user->zipcode" required autocomplete="zipcode" id="zipcode" @class(['is-invalid' => $errors->has('zipcode')]) />
                                <x-input-error :messages="$errors->get('zipcode')" class="mt-2 invalid-feedback" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select name="country_id" id="country_id" class="form-control select2">
                                    <option>--Select--</option>
                                    @foreach(\App\Models\Country::orderBy('name')->get() as $country)
                                    <option value="{{$country->id}}" @selected($country->id == old('country_id') || $country->id == $user->country_id)>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <select name="state_id" id="state_id" class="form-control select2"></select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <select name="city_id" id="city_id" class="form-control select2"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success">Updated</button>
                    <a href="{{route('profile.show')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>

        @if (Auth::user()->role == 'freelancer')
        <div class="card">
            <div class="card-body">
                @include('profile.freelancer.edit')
            </div>
        </div>
        @endif
    </div>
</div>

    @if (Auth::user()->role == 'freelancer')
    @include('profile.education.add-edu-modal')
    @include('profile.education.edit-edu-modal')
    @endif
@endsection

@section('page-specific-js')
    @include('js/functions')
    <script src="{{url('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{url('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{url('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <script src="{{url('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{url('assets/js/form-elements.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            @if (Auth::user()->role == 'freelancer')
            // load educations
            loadEducations();
            // Load experience
            loadExperiences();
            @endif

            @if(old('country_id'))
            let countryId = parseInt("{{old('country_id')}}");
            let stateId = parseInt("{{old('state_id')}}");
            getCountryStates(countryId, stateId);

            @elseif($user->country_id > 0)
            let countryId = parseInt("{{$user->country_id}}");
            let stateId = parseInt("{{$user->state_id}}");
            getCountryStates(countryId, stateId);
            @endif

            @if(old('state_id'))
            getStateCities("{{old('state_id')}}", "{{old('city_id')}}");
            
            @elseif($user->state_id > 0)
            getStateCities("{{$user->state_id}}", "{{$user->city_id}}");
            @endif
            

            $('#country_id').change(function() {
                var countryId = $(this).val();
                getCountryStates(countryId);
            });

            $('#state_id').change(function() {
                var stateId = $(this).val();
                getStateCities(stateId, 0);
            });
        });
    </script>
@endsection