@extends('layouts.app')

@section('title', 'Set phone number')

@section('content')
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
                <x-auth-session-status class="mb-4 alert alert-danger" :status="session('error')" />
                @include('partial.validation-errors')

                <form action="{{route('profile.phone')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>{{__("Please verify your phone number.")}}</h2>
                            <p>{{__("We'll text you a code to verify your number.")}}</p>
                        </div>
                        <div class="form-group col-off-set-3">
                            <label class="form-label">Phone Number</label>
                            <x-text-input type="text" name="phone" :value="old('phone') ?? $user->phone" required autocomplete="phone" id="phone" @class(['is-invalid' => $errors->has('phone')]) />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2 invalid-feedback" />
                        </div>
                        <p>Message rate may apply. We use this for verification purpose only and won't share info with {{config('app.name')}} users or for marketing purposes.</p>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Send code">
                </form>
            </div>
        </div>
    </div>

@endsection