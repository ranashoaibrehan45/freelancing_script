@extends('layouts.app')

@section('title', 'Hourly Rate')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
<link href="{{url('assets/plugins/date-picker/date-picker.css')}}" rel="stylesheet" />
<link href="{{url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{url('assets/plugins/multi/multi.min.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('A few last details, then you can check and publish your profile.')}}</h1>
    </div>
</div>

<div class="page-body">
    @php
        $user = Auth::user();
    @endphp
    <div class="card box-widget widget-user">
        <div class="row">
            <div class="col-md-12 py-5 px-5">
                <h5>A professional photo helpts you build trust with your clients. To keep things safe and simple, they'll pay you through us - which is why we need your personal information.</h5>
            </div>
            <div class="col-xl-3 col-lg-4">
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
            </div>

            <div class="col-xl-9 col-lg-8">
                @include('partial.validation-errors')
                <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    
                    <div class="card-body">
                        @include('partial.validation-errors')

                        <div class="card-title font-weight-bold">{{__('Date of birth:')}}</div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mt-4 mt-md-0">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fe fe-clock"></span>
                                        </div>
                                    </div>
                                    <x-text-input type="text" name="dob" id="datepicker-dob" value="{{old('dob') ?? $user->dob}}" required autocomplete="dob" @class(['is-invalid' => $errors->has('dob')]) placeholder="Date of birth" />
                                    <x-input-error :messages="$errors->get('dob')" class="mt-2 invalid-feedback" />
                                </div>
                            </div>
                        </div>
                        <hr>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country_id" id="country_id" class="search-box">
                                        <option>--Select--</option>
                                        @foreach(\App\Models\Country::orderBy('name')->get() as $country)
                                            <option value="{{$country->id}}" @selected($country->id == old('country_id') || $country->id == $user->country_id)>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <x-text-input type="text" name="address" :value="old('address') ?? $user->address" required autocomplete="address" id="address" @class(['is-invalid' => $errors->has('address')]) />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2 invalid-feedback" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address" class="form-label">Apt/Suite (Optional)</label>
                                    <x-text-input type="text" name="apt" :value="old('apt') ?? $user->apt" autocomplete="apt" id="apt" @class(['is-invalid' => $errors->has('apt')]) />
                                    <x-input-error :messages="$errors->get('apt')" class="mt-2 invalid-feedback" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">State</label>
                                    <select name="state_id" id="state_id" class="select2"></select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <select name="city_id" id="city_id" class="select2"></select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="zipcode" class="form-label">Postal Code</label>
                                    <x-text-input type="number" name="zipcode" :value="old('zipcode') ?? $user->zipcode" required autocomplete="zipcode" id="zipcode" @class(['is-invalid' => $errors->has('zipcode')]) />
                                    <x-input-error :messages="$errors->get('zipcode')" class="mt-2 invalid-feedback" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <x-text-input type="tel" name="phone" :value="old('phone') ?? $user->phone" id="mobile-number" placeholder="e.g. +1 702 123 4567" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success">Review your profile</button>
                        <a href="{{route('profile.show')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-specific-js')
    @include('js/functions')
    <script src="{{url('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    
    <script src="{{url('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
	<script src="{{url('assets/plugins/time-picker/toggles.min.js')}}"></script>

    <script src="{{url('assets/plugins/date-picker/date-picker.js')}}"></script>
    <script src="{{url('assets/plugins/date-picker/jquery-ui.js')}}"></script>
    <script src="{{url('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <script src="{{url('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{url('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

    <script src="{{url('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{url('assets/js/form-elements.js')}}"></script>
    
    <script src="{{url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datepicker-dob').bootstrapdatepicker({
                format: "dd-mm-yyyy",
                viewMode: "date",
            })
            
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