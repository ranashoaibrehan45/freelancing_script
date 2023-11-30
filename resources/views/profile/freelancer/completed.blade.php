@extends('layouts.app')

@section('title', 'Profile completed')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h1 class="page-title text-primary text-center">{{__('Nice work, '.$user->first_name.'!')}}</h1>
            <h1 class="page-title text-primary text-center">{{__('Your profile is ready.')}}</h1>
            <h3 class=" text-center mt-5">
                {{__("Congratulations! With thousands to choose from, it's time to start bidding")}}
            </h3>
            <h3 class="text-center">{{__("on roles that are the perfect fit for your skills.")}}</h3>
            
            <div class="text-center mt-5">
                <a href="{{route('profile.show')}}" class="btn btn-outline-primary">View my profile</a>
                <a href="#" class="btn btn-primary">Browse projects</a>
            </div>
    </div>
@endsection