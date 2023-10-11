@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__("Got it. What's your biggest goal for freelancing?")}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form method="post" action="{{route('freelancer.profile.goal')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>Different people come to {{config('app.name')}} for various reasons. We want to highlight the opportunities that fit your goals best while still showing you all the possibilities.</h5>
                    <div class="row my-5">
                        <div class="col-md-3">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="goal" value="To earn my main income" class="selectgroup-input" @checked($user->profile->goal == 'To earn my main income')>
                                <span class="selectgroup-button">To earn my main income</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="goal" value="To make money on the side" class="selectgroup-input" @checked($user->profile->goal == 'To make money on the side')>
                                <span class="selectgroup-button">To make money on the side</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="goal" value="To get experience, for a full-time job" class="selectgroup-input" @checked($user->profile->goal == 'To get experience, for a full-time job')>
                                <span class="selectgroup-button">To get experience, for a full-time job</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="selectgroup-item col-md-12">
                                <input type="radio" name="goal" value="I don't have a goal in mind yet" class="selectgroup-input" @checked($user->profile->goal == 'I don\'t have a goal in mind yet')>
                                <span class="selectgroup-button">I don't have a goal in mind yet</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('freelancer.profile.create', ['page' => 'experience-level'])}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection