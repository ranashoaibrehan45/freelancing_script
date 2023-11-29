@extends('layouts.app')

@section('title', 'Profile Preview')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
    <div class="page-header">
        <h1 class="page-title mb-0 text-primary">{{__('Preview Profile')}}</h1>
    </div>

    <div class="card border-0">
        <div class="card-body bg-gray-100">
            <h3>{{__('Looking good, !'.$user->first_name)}}</h3>
            <p>{{__("Make any edits you want, then submit your profile. You can make more changes after it's live.")}}</p>
            <form action="">
                <input type="submit" class="btn btn-primary" value="Submit profile" />
            </form>
        </div>
    </div>

    <div class="card">
        <div class="row">
            <div class="col-md-4">
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
                @include('profile.components.languages')
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1>
                        <span id="profileTitle">{{__($user->freelancer->title)}}</span>
                        <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileTitle" data-bs-toggle="modal">
                            <i class="fe fe-edit"></i>
                        </button>
                    </h1>
                    <div class="row border p-2">
                        <div class="col-md-11 text-wrap">
                            <p class="text-justify">
                                <span id="profileBio">{!! $user->freelancer->bio !!}</span>
                            </p>
                            <p class="font-weight-bold">
                                $<span id="profileRate">{{$user->freelancer->getRate()}}</span>
                                <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileRate" data-bs-toggle="modal">
                                    <i class="fe fe-edit"></i>
                                </button>
                                <br>
                                <span class="fs-10 font-weight-normal">Hourly rate</span>
                            </p>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileBio" data-bs-toggle="modal">
                                <i class="fe fe-edit"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row border p-2 mt-4">
                        <div class="col-md-11 text-wrap">
                            <h3>Skills</h3>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileSkills" data-bs-toggle="modal">
                                <i class="fe fe-edit"></i>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="tags" id="profileSkills">
                                @foreach ($user->skills as $skill)
                                    <span class="tag">{{__($skill->skill->name)}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row border p-2 mt-4">
                        <div class="col-md-11 text-wrap">
                            <h3>Work history</h3>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalAddExperience" data-bs-toggle="modal">
                                <i class="fe fe-plus"></i>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="row my-5" id="exp_container"></div>
                        </div>
                    </div>

                    <div class="row border p-2 mt-4">
                        <div class="col-md-11 text-wrap">
                            <h3>Education</h3>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalAddEdu" data-bs-toggle="modal">
                                <i class="fe fe-plus"></i>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="row my-5" id="educations"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('profile.language.add-language')
    @include('profile.language.edit-languages')
    @include('profile.education.add-edu-modal')
    @include('profile.education.edit-edu-modal')
    @include('profile.experience.add-exp-modal')
    @include('profile.experience.edit-exp-modal')
    @include('profile.components.set-title-modal')
    @include('profile.components.set-bio-modal')
    @include('profile.components.set-rate-modal')
    @include('profile.components.set-skills-modal')
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
            // load educations
            loadEducations();

            // Load experience
            loadExperiences();

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