@extends('layouts.admin')

@section('title', 'Degrees')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('admin.header')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Degrees</h4>
            </div>
            <div class="page-rightheader">
                <div class="btn-list">
                    <a href="{{route('admin.degree.create')}}" class="btn btn-outline-primary">
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
                        <h3 class="card-title">All Degrees</h3>
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
                                    @foreach($degrees as $degree)
                                    <tr id="row-{{$degree->id}}">
                                        <th scope="row">{{$degree->id}}</th>
                                        <td>{{$degree->name}}</td>
                                        <td>
                                            <a href="{{route('admin.degree.edit', ['degree' => $degree])}}" class="btn btn-primary btn-sm">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                            <button @class(['btn', 'btn-sm', 'btnDelete', 'btn-danger']) data-id="{{$degree->id}}">
                                                <i @class(['fe', 'fe-delete'])class="fe fe-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            {{ $degrees->links() }}
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
    console.log('here');
    $(".btnDelete").click(function() {
        if (confirm('Really mean to delete this degree?')) {
            let id = $(this).data('id');

            $.post("{{url('admin/degree')}}/"+id, {
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