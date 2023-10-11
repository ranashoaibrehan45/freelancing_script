@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Ready for your next big opportunity?')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form method="post" action="{{route('freelancer.profile.started')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h3>
                        <i class="fa fa-user mx-5"></i>
                        Answer a few question and start building your profile
                    </h3>
                    <hr>
                    <h3>
                        <i class="fa fa-envelope-open-o mx-5"></i>
                        Apply for open roles or list services for clients to buy
                    </h3>
                    <hr>
                    <h3>
                        <i class="fa fa-dollar mx-5"></i>
                        Get paid safely and know we're there for help
                    </h3>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success">Get Started</button>
                    <p>
                        It only takes 5-10 minutes and you can edit it later. We'll save as you go.
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection