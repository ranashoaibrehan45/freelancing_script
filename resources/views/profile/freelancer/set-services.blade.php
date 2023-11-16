@extends('layouts.app')

@section('title', 'Set Overview')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/multipleselect/multiple-select.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/multi/multi.min.css')}}">
<style>
    .group-label{
        font-weight: bold !important;
        font-size: 16px !important;
    }
</style>
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
                @php
                    $services = \App\Models\FreelancerService::where('user_id', $user->id)->pluck('sub_category_id')->toArray();
                @endphp
                <div class="from-group mb-5 mb-lg-0">
                    <select multiple="multiple" name="my_services" id="services_select">
                        @foreach(\App\Models\Category::all() as $category)
                            <optgroup label="{{$category->name}}">
                            @foreach($category->subcategory as $subcategory)
                                <option value="{{$subcategory->id}}" @selected(in_array($subcategory->id, $services))>{{$subcategory->name}}</option>
                            @endforeach
                            </optgroup>
                        @endforeach
                    </select>
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
    <script src="{{url('assets/plugins/multipleselect/multiple-select.js')}}"></script>
	<script src="{{url('assets/plugins/multipleselect/multi-select.js')}}"></script>
    <script src="{{url('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{url('assets/plugins/jQuerytransfer/jquery.transfer.js')}}"></script>
    <script src="{{url('assets/plugins/multi/multi.min.js')}}"></script>
    <script src="{{url('assets/js/formelementadvnced.js')}}"></script>
    <script>
        $(document).ready(function(e) {
            $("#services_select").change(function(e) {
                e.preventDefault();
                let services = $(this).val();
                $.post("{{route('profile.services.store')}}", {
                    _token: "{{csrf_token()}}",
                    services: services
                }, function (data) {
                    if (data.success) {
                        notif({
                            msg: "<b>Success:</b> " + data.status,
                            type: "success"
                        });
                    } else {
                        notif({
                            msg: "<b>Oops!</b> " + data.error,
                            type: "error",
                        });
                    }
                });
            });
        })
    </script>
@endsection