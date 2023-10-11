@extends('layouts.app')

@section('title', 'Add experience')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/telephoneinput/telephoneinput.css')}}">
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('If you have relevant work experience, add it here.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>Freelancers who add their experience are twice as likely to win work. But if you're just starting out, you can still create a great profile. Just head to the next page.</h5>
                    <div class="row my-5">
                        <div class="col-md-4">
                            <span class="selectgroup-button">
                                <i class="fa fa-plus text-success"></i>
                                <h3>Add Experience</h3>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('freelancer.profile.create')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection