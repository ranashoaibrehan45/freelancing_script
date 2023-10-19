@extends('layouts.app')

@section('title', 'Add education')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Clients like to know what you know - add your education here.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form method="post" action="{{route('user_experience.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>{{__("You don't have to have a degree. Adding any relevant education helps make your profile more visible.")}}</h5>
                    <div class="row my-5">
                        <div class="col-md-4">
                            <a data-bs-target="#modalAddExperience" data-bs-toggle="modal">
                                <span class="selectgroup-button">
                                    <i class="fa fa-plus text-success"></i>
                                    <h3>Add education</h3>
                                </span>
                            <a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('freelancer.profile.create', ['page' => 'set-experience'])}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next, add language</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('profile.education.add-edu-modal')
@endsection

@section('page-specific-js')
    @include('js/functions')
    <script src="{{url('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{url('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{url('assets/js/form-elements.js')}}"></script>
@endsection