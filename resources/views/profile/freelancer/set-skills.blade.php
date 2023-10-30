@extends('layouts.app')

@section('title', 'Add Languages')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Nearly there! What work are you here to do.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5>{{__("Your skills show clients what you can offer, and help us choose which jobs to recommend to you. Add or remove the ones we've suggested, start typing to pick more. It's up to you.")}}</h5>
                <a href="#" class="text-primary">{{__('Why choosing carefully matters')}}</a>
                <div class="form-group my-5">
                    <label class="form-label">Users list</label>
                    <select class="form-control select2" data-placeholder="Enter skills here" multiple>
                        @foreach(\App\Models\Skill::all() as $obj)
                        <option value="{{$obj->id}}">{{$obj->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-language'])}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Next, write an overview</button>
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
@endsection