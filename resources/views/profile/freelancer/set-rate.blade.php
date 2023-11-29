@extends('layouts.app')

@section('title', 'Hourly Rate')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Now let`s set your hourly rate.')}}</h1>
    </div>
</div>

<div class="page-body">
    @include('partial.validation-errors')
    
    <form action="{{route('freelancer.profile.rate')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5>{{__("Clients will see this rate on your profile and in search results once you publish your profile. You can adjust your rate every time you submit a proposal.")}}</h5>
                <div class="form-group row mt-5">
                    <label for="inputName" class="col-md-8 form-label">
                        <h3>{{__('Hourly rate')}}</h3>
                        <p>{{__('Total amount the client will see')}}</p>
                    </label>
                    <div class="col-md-4">
                        <div class="input-group has-validation">
                            <span class="input-group-text">{{__('$')}}</span>
                            <input type="number" name="rate" id="profilerate" value="{{Auth::user()->freelancer->rate}}" class="form-control" required="">
                            <span class="input-group-text">{{__('/ hr')}}</span>
                          </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row mt-5">
                    <label for="inputName" class="col-md-8 form-label">
                        <strong>{{__('Service Fee')}}</strong>
                        <a href="#" class="text-primary">{{__('Learn more')}}</a>
                        <p>{{__("This helps us run the plateform and provide services like payment protection and customer support.")}}</p>
                    </label>
                    <div class="col-md-4">
                        <div class="input-group has-validation">
                            <span class="input-group-text">{{__('$')}}</span>
                            <input type="text" class="form-control" id="servicefee" readonly>
                            <span class="input-group-text">{{__('/ hr')}}</span>
                          </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row mt-5">
                    <label for="inputName" class="col-md-8 form-label">
                        <strong>{{__('You will get')}}</strong>
                        <p>{{__("The estimated amount you'll receive after service fees.")}}</p>
                    </label>
                    <div class="col-md-4">
                        <div class="input-group has-validation">
                            <span class="input-group-text">{{__('$')}}</span>
                            <input type="text" class="form-control" id="youget" readonly>
                            <span class="input-group-text">{{__('/ hr')}}</span>
                          </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-services'])}}" class="btn btn-secondary">{{__('Back')}}</a>
                <button type="submit" class="btn btn-primary">{{__('Next, add your photo and location')}}</a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('page-specific-js')
    @include('js/functions')
    <script src="{{url('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{url('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{url('assets/js/form-elements.js')}}"></script>
    <script>
        $(document).ready(function(e) {
            let rate = "{{Auth::user()->freelancer->rate}}";
            calculateRate(rate);
        })
    </script>
@endsection