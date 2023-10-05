@extends('layouts.admin')

@section('title', 'Schools')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('admin.header')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Schools</h4>
            </div>
            <div class="page-rightheader">
                <div class="btn-list">
                    <a href="{{route('admin.school.create')}}" class="btn btn-outline-primary">
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
                        <h3 class="card-title">All Schools</h3>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schools as $school)
                                    <tr id="row-{{$school->id}}">
                                        <th scope="row">{{$school->id}}</th>
                                        <td>{{$school->name}}</td>
                                        <td>
                                            <a href="{{route('admin.school.edit', ['school' => $school])}}" class="btn btn-primary btn-sm">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                            <button @class(['btn', 'btn-sm', 'btnDelete', 'btn-danger']) data-id="{{$school->id}}">
                                                <i @class(['fe', 'fe-delete'])class="fe fe-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            {{ $schools->links() }}
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
        if (confirm('Really mean to delete this school?')) {
            let id = $(this).data('id');

            $.post("{{url('admin/school')}}/"+id, {
                _token: '{{csrf_token()}}',
                _method: 'DELETE'
            }, function(data) {
                if (data.success) {
                    $("#row-"+id).hide();
                    notif({
                        msg: "<b>Success:</b> " + data.status,
                        type: "success"
                    });
                } else {
                    notif({
                        msg: "<b>Oops:</b> " + data.error,
                        type: "error"
                    });
                }
            })
        }
    })
})
</script>
@endsection