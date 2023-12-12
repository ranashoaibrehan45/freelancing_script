@extends('layouts.app')

@section('title', 'Set phone number')

@section('content')
    <div class="page-body mt-5">
        <div class="card">
            <div class="card-body">
                @include('partial.validation-errors')

                <form action="{{route('profile.verify.phone')}}" method="POST">
                    @csrf
                    <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>{{__("Enter your code here.")}}</h2>
                            <p>
                                {{__("We sent a text message to: ")}} {{Auth::user()->phone}} 
                                <a href="{{route('profile.phone')}}">{{__("Change phone number")}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-6">
                            <x-text-input type="number" name="verification_code" :value="old('verification_code')" id="verification_code" placeholder="Enter 6 digit verification code." />
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-6 text-center">
                            <input type="submit" value="{{__("Resend code")}}" class="btn btn-pill btn-secondary">
                            <input type="submit" value="{{__("Verify your number")}}" class="btn btn-pill btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection