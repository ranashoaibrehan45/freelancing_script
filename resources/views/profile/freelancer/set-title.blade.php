@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Got it. Now, add a title to tell the world what you do.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form method="post" action="{{route('freelancer.profile.title')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>Its the very first thing clients see, so make it count. Stand out by describing your experties in your own words.</h5>
                    <div class="form-group  my-5">
                        <label for="title" class="form-label">{{__('Your professional role')}}</label>
                        <x-text-input type="text" name="title" value="{{old('title') ?? Auth::user()->profile->title ?? ''}}" required autocomplete="title" id="title" @class(['is-invalid' => $errors->has('title')]) placeholder="Software engineer | Javascript | iOS" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2 invalid-feedback" />
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('freelancer.profile.create', ['page' => 'how-to-work'])}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next, add your experience</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection