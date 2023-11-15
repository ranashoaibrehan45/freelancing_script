@extends('layouts.app')

@section('title', 'Set Overview')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('What are the main services you offer.')}}</h1>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>{{__("Choose at least one service that best describes the type of work you do. This helps us match you with clients who need your unique expertise.")}}</h5>
                <div class="form-group my-5">
                    <textarea name="" id="" rows="5" placeholder="{{__('Enter your top skills, experiences, and interests. This is one of the first things clients will see on your profile.')}}" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-overview'])}}" class="btn btn-secondary">Back</a>
                <a href="{{route('freelancer.profile.create', ['page' => 'set-rate'])}}" class="btn btn-primary">Next, Set your rate</a>
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
    <script>
        $(document).ready(function(e) {
            
        })
    </script>
@endsection