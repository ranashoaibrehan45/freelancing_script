@extends('layouts.admin')

@section('title', 'Edit project length')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('admin.header')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Edit length</h4>
            </div>
            <div class="page-rightheader">
                <div class="btn-list">
                    <a href="{{route('admin.length.index')}}" class="btn btn-outline-primary">
                        <i class="fe fe-plus me-2"></i>
                        All project length
                    </a>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Edit length')}} </h3>
                    </div>
                    <div class="card-body pb-2">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

                        <form method="post" action="{{route('admin.length.update', ['length' => $length])}}">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">{{__('Title')}}</label>
                                    <input type="text" name="title" value="{{old('title') ?? $length->title}}" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" required="">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2 invalid-feedback" />
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="note" class="form-label">{{__('Note')}}</label>
                                    <input type="text" name="note" value="{{old('note') ?? $length->note}}" @class(['form-control', 'is-invalid' => $errors->has('note')]) id="note">
                                    <x-input-error :messages="$errors->get('note')" class="mt-2 invalid-feedback" />
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="note" class="form-label">Skip Size</label>
                                    <select class="form-control" name="size_id">
                                        <option value="0">--Skip Size--</option>
                                        @foreach (\App\Models\Size::all() as $size)
                                        <option value="{{$size->id}}" @selected($size->id == $length->size_id)>{{$size->name}}</option>    
                                        @endforeach
                                    </select>
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