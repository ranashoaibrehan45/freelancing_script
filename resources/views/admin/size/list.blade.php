@extends('layouts.admin')

@section('title', 'Project sizes list')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('admin.header')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Project sizes</h4>
            </div>
            <div class="page-rightheader">
                <div class="btn-list">
                    <a href="{{route('admin.size.create')}}" class="btn btn-outline-primary">
                        <i class="fe fe-plus me-2"></i>
                        Add New
                    </a>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Project Sizes</h3>
                    </div>
                    <div class="card-body p-0">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sizes as $size)
                                    <tr id="row-{{$size->id}}">
                                        <th scope="row">{{$size->id}}</th>
                                        <td>{{$size->name}}</td>
                                        <td>{{$size->note}}</td>
                                        <td>
                                            <a href="{{route('admin.size.edit', ['size' => $size])}}" class="btn btn-primary btn-sm">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btnDelete btn-danger" data-id="{{$size->id}}">
                                                <i class="fe fe-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-specific-js')
<script type="text/javascript">
$(document).ready(function() {
    $(".btnDelete").click(function() {
        if (confirm('Really mean to delete this project size?')) {
            let id = $(this).data('id');

            $.post("{{url('admin/size')}}/"+id, {
                _token: '{{csrf_token()}}',
                _method: 'DELETE'
            }, function(data) {
                let type = data.success ? 'success' : 'error';
                notif({
                    msg: data.message,
                    type: type
                });
            })
        }
    })
})
</script>
@endsection