<x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
<x-auth-session-status class="mb-4 alert alert-danger" :status="session('error')" />

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif