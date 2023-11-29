@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">{{__('My Profile')}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card box-widget widget-user">
            <x-profile.image :photo="$user->photo" />
            <div class="card-body text-center">
                <div class="pro-user">
                    <h4 class="pro-user-username mb-1 font-weight-bold">{{$user->first_name}}</h4>
                    <div class="wideget-user-rating">
                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                        <a href="javascript:void(0);"><i class="fa fa-star-o text-warning me-1"></i></a> 
                        <span>5 (3876 Reviews)</span>
                    </div>
                    <a href="{{route('profile.edit')}}" class="btn btn-success mt-3">
                        <i class="fa fa-rss me-2"></i>Edit Profile
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header ">
                <div class="card-title">
                    <div class="card-title">{{__('Languages')}}</div>
                </div>
            </div>
            <div class="card-body" id="languages"></div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="main-content-body main-content-body-profile card">
            <div class="card-header">
                <h3 class="card-title">Biography</h3>
            </div>
            <div class="main-profile-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">Name </span>
                                    </td>
                                    <td class="">{{$user->getName()}}</td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">Location </span>
                                    </td>
                                    <td class="">
                                        {{$user->address}}
                                        @if ($user->country_id > 0)
                                        <p>
                                            {{$user->city->name}}, 
                                            {{$user->state->name}}, 
                                            {{$user->country->name}}.
                                        </p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">Languages </span>
                                    </td>
                                    <td class="">English, German</td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">Website </span>
                                    </td>
                                    <td class="">smithabgd.com</td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">Email </span>
                                    </td>
                                    <td class="">{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <span class="font-weight-semibold w-50">Phone </span>
                                    </td>
                                    <td class="">{{$user->phone}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Contact</h3>
            </div>
            <div class="card-body">
                <div class="main-profile-contact-list d-lg-flex">
                    <div class="media me-4">
                        <div class="media-icon bg-danger-transparent text-danger  me-3 mt-1">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Mobile</small>
                            <div class="font-weight-normal1">
                                {{$user->phone}}
                            </div>
                        </div>
                    </div>
                    <div class="media me-4">
                        <div class="media-icon bg-warning-transparent text-warning me-3 mt-1">
                            <i class="fe fe-mail"></i>
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Email</small>
                            <div class="font-weight-normal1">
                                {{$user->email}}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info me-3 mt-1">
                            <i class="fa fa-map"></i>
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Current Address</small>
                            <div class="font-weight-normal1">
                                {{$user->address}}
                            </div>
                        </div>
                    </div>
                </div><!-- main-profile-contact-list -->
            </div>
        </div>
    </div>
</div>
<!--End Page header-->
@endsection

@section('page-specific-js')
    @include('js/functions')
@endsection