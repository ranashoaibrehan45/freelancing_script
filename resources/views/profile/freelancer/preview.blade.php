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
            @if ($user->freelancer->profile == 'details')
            <p>{{__("Make any edits you want, then submit your profile. You can make more changes after it's live.")}}</p>
            <form action="{{route('freelancer.profile.submit')}}" method="post">
                @csrf
                <input type="submit" class="btn btn-primary" value="Submit profile" />
            </form>
            @endif
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
                @include('profile.components.education')
            </div>
            <div class="col-md-8">
                @include('profile.freelancer.edit')
            </div>
        </div>
    </div>

@include('profile.education.add-edu-modal')
@include('profile.education.edit-edu-modal')
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
        });
    </script>
@endsection