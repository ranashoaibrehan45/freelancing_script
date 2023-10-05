@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('admin.header')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">{{$category->name}}</h4>
            </div>
            <div class="page-rightheader">
                <div class="btn-list">
                    <a href="{{route('admin.subcategory.index', ['category' => $category])}}" class="btn btn-outline-primary">
                        <i class="fe fe-plus me-2"></i>
                        {{__('List SubCategories')}}
                    </a>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Add New')}}</h3>
                    </div>
                    <div class="card-body pb-2">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
                        
                        <form method="post" action="{{route('admin.subcategory.store')}}">
                            @csrf
                            <input type="hidden" name="category_id" value="{{$category->id}}" />

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{__('Name')}}</label>
                                    <input type="text" name="name" value="{{old('name')}}" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" required="">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 invalid-feedback" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection