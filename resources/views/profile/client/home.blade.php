@extends('layouts.app')

@section('title', 'Job post')

@section('content')
    <div class="page-header">
        <h1 class="page-title mb-0 text-primary">{{__('Welcome, '.Auth::user()->first_name.'!')}}</h1>
    </div>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <h2>{{__("Let's start with your first job post.")}}</h2>
                        <p>{{__("It's the fastest way to meet top talent.")}}</p>
                        <a href="{{route('client.profile.create', ['page' => 'set-phone'])}}" class="btn btn-primary">{{__('Get started')}}</a>
                    </div>
                    <div class="col-md-5">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

@endsection