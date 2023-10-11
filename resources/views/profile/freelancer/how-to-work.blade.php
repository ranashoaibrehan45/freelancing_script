@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('And how would you like to work?')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        @include('components.validation-errors')
        <form method="post" action="{{route('freelancer.profile.htw')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>Everybody works in different way, so we have different ways of helping you win work. You can select multiple preferences now and can always change it later!</h5>
                    <div class="row my-5">
                        <div class="col-md-6">
                            <label class="selectgroup-item col-md-12 h-150">
                                <input type="checkbox" name="find_work" value="1" class="selectgroup-input" @checked($user->profile->find_work == '1')>
                                <span class="selectgroup-button h-150">
                                    <h3>I'd like to find opportunities myself</h3>
                                    Clients post jobs on our Talent Marketplace<sup><small>TM</small></sup>: you can browse and bid for them, or get invited by client.
                                </span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="selectgroup-item col-md-12 h-150">
                                <input type="checkbox" name="sale_services" value="1" class="selectgroup-input" @checked($user->profile->sale_services == '1')>
                                <span class="selectgroup-button h-150">
                                    <h3>I'd like to pakage up my work for clients to buy.</h3>
                                    Define your services with prices and timelines: we'll list it in our project catalog<sup><small>TM</small></sup> for clients to buy right away.
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('freelancer.profile.create', ['page' => 'set-goal'])}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next, creat a profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection