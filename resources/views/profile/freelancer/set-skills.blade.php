@extends('layouts.app')

@section('title', 'Add Languages')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Nearly there! What work are you here to do.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card">
            <div class="card-body">
                @php
                $skills = \App\Models\FreelancerSkill::where('user_id', Auth::id())->pluck('skill_id')->toArray();
                @endphp
                <h5>{{__("Your skills show clients what you can offer, and help us choose which jobs to recommend to you. Add or remove the ones we've suggested, start typing to pick more. It's up to you.")}}</h5>
                <a href="#" class="text-primary">{{__('Why choosing carefully matters')}}</a>
                <div class="form-group my-5">
                    <label class="form-label">Users list</label>
                    <select class="form-control select2" id="profileskills" data-placeholder="Enter skills here" multiple>
                        @foreach(\App\Models\Skill::all() as $obj)
                        <option value="{{$obj->id}}" @selected(in_array($obj->id, $skills))>{{$obj->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-skills'])}}" class="btn btn-secondary">Back</a>
                <a href="{{route('freelancer.profile.create', ['page' => 'set-overview'])}}" class="btn btn-primary">Next, write an overview</a>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4">
        <div class="card box-widget widget-user">
            <div class="widget-user-image mx-auto mt-5">
                <img alt="User Avatar" class="rounded-circle" src="{{url('assets/images/users/shoaib.jpg')}}">
            </div>
            <div class="card-body text-center mt-5">
                <p>
                "{{config('app.name')}}'s algorithm will recommend specific jobs posts to you based on your skills, so choose them carefully to get the best match!"
                </p>
                <a href="#">{{config('app.name')}} Pro Tips</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-specific-js')
    @include('js/functions')
    <script src="{{url('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{url('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{url('assets/js/form-elements.js')}}"></script>
@endsection