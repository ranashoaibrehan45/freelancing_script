@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('A few questions: first, have you freelanced before?')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form method="post" action="{{route('freelancer.profile.experiencelevel')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>This let us know how much help to give you along the way. We won't share your answer with anyone else, including potential clients.</h5>
                    <div class="row my-5">
                        <div class="col-md-4">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="experience_level" value="Entry level" class="selectgroup-input" @checked($user->profile->experience_level == 'Entry level')>
                                <span class="selectgroup-button">Entry level</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="experience_level" value="Intermediate" class="selectgroup-input" @checked($user->profile->experience_level == 'Intermediate')>
                                <span class="selectgroup-button">Intermediate</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="experience_level" value="Expert" class="selectgroup-input" @checked($user->profile->experience_level == 'Expert')>
                                <span class="selectgroup-button">Expert</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('freelancer.profile.create')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection