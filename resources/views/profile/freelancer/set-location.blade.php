@extends('layouts.app')

@section('title', 'Hourly Rate')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('A few last details, then you can check and publish your profile.')}}</h1>
    </div>
</div>

<div class="page-body">
    @include('partial.validation-errors')
    
    <form action="{{route('freelancer.profile.overview')}}" method="post" class="form-horizontal">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5>{{__("A professional photo helpts you build trust with your clients. To keep things simple and safe, They will pay you through us - which is why we need your personal information.")}}</h5>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="date_of_birth" class="form-label"></label>
                            <input type="date" name="" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-services'])}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Next, add your photo and location</a>
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
            
        })
    </script>
@endsection