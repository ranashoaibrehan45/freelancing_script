@extends('layouts.app')

@section('title', 'Add Languages')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Great. Now write a bio to tell the world about yourself.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>{{__("Help people get to know you at a glance. What work do you do best? Tell them clearly, using photographes or bullet points. You can always edit later; just make sure you proof read now.")}}</h5>
                
                <div class="form-group my-5">
                    <textarea name="" id="" rows="5" placeholder="{{__('Enter your top skills, experiences, and interests. This is one of the first things clients will see on your profile.')}}" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-language'])}}" class="btn btn-secondary">Back</a>
                <a href="{{route('freelancer.profile.create', ['page' => 'set-overview'])}}" class="btn btn-primary">Next, write an overview</a>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4">
        <div class="card box-widget widget-user">
            <div class="widget-user-image mx-auto mt-5">
                <img alt="User Avatar" class="rounded-circle" src="{{url('assets/images/users/shoaib.jpg')}}">
            </div>
            <div class="card-body text-center mt-5">
                <p>
                "{{config('app.name')}}'s algorithm will recommend specific jobs posts to you based on your skills, so choose them carefully to get the best match!"
                </p>
                <a href="#">{{config('app.name')}} Pro Tips</a>
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
            $("#skills").change(function(e) {
                e.preventDefault();
                let skills = $(this).val();
                console.log(skills);
                $.post("{{route('profile.skills.store')}}", {
                    _token: "{{csrf_token()}}",
                    skills: skills
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