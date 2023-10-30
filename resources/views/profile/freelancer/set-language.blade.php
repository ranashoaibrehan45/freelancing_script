@extends('layouts.app')

@section('title', 'Add Languages')

@section('page-specific-css')
<link rel="stylesheet" href="{{url('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h1 class="page-title mb-0 text-primary">{{__('Looking good. Next, tell us which languages you speak.')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5>{{__(config('app.name')." is global, so clients are aften interested to know what languages you speak. English is must, but do you speak any other languages.")}}</h5>
                <div class="row my-5">
                    <div class="col-md-5 fw-bold"><h4>Language</h4></div>
                    <div class="col-md-5"><h4>Proficiency</h4></div>
                    <div class="col-md-2">&nbsp;</div>
                </div>
                <div id="langs_container">
                    <div class="row">
                        <div class="col-md-5">
                            <h5>English (all profiles include this)</h5>
                        </div>
                        <div class="col-md-5">
                            <select class="form-select language_proficiency" data-language="{{\App\Models\Language::where('name', 'English')->first()->id}}">
                                @foreach(\App\Models\LanguageProficiency::all() as $obj)
                                <option value="{{$obj->id}}" @selected($obj->id == Auth::user()->lanProficiency(\App\Models\Language::where('name', 'English')->first()->id))>{{$obj->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach(Auth::user()->languages as $userLang)
                        @if ($userLang->language_id == \App\Models\Language::where('name', 'English')->first()->id)
                            @continue
                        @endif
                        <form class="addlangform">
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="hidden" class="language_id" value="{{$userLang->language_id}}" />
                                    <h5>{{$userLang->language->name}}</h5>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-select language_proficiency" data-language="{{\App\Models\Language::where('name', 'English')->first()->id}}">
                                        @foreach(\App\Models\LanguageProficiency::all() as $obj)
                                        <option value="{{$obj->id}}" @selected($obj->id == $userLang->language_proficiency_id)>{{$obj->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn bg-danger-transparent btn_del_lang"><i class="fe fe-trash"></i></button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <hr>
                <button type="button" class="btn btn-primary" id="addLang">
                    <i class="fe fe-plus me-2"></i>Add Language
                </button>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('freelancer.profile.create', ['page' => 'set-education'])}}" class="btn btn-secondary">Back</a>
                <a href="{{route('freelancer.profile.create', ['page' => 'set-skills'])}}" class="btn btn-primary">Next, add your skills</a>
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
    <script type="text/javascript">
    function addLang(language_id, language_proficiency_id)
    {
        $.post("{{route('profile.language.store')}}", {
            '_token' : '{{csrf_token()}}',
            'language_id' : language_id,
            'language_proficiency_id' : language_proficiency_id
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
        })
    }
    $(document).ready(function() {
        $("#addLang").click(function() {
            $.get("{{route('profile.languages.addbody')}}", function(data) {
                if (data.success) {
                    $("#langs_container").append(data.languages);
                }
            })
        });

        // Add new language body
        $(document).on('change', ".language_proficiency", function() {
            let language_proficiency_id = $(this).val();
            let form = $(this).closest("form");
            let language_id = form.find('.language_id').val();
            if (language_proficiency_id > 0 && language_id > 0) {
                addLang(language_id, language_proficiency_id)
            }
        });

        $(document).on('change', ".language_id", function() {
            let language_id = $(this).val();
            let form = $(this).closest("form");
            let language_proficiency_id = form.find('.language_proficiency').val();
            if (language_proficiency_id > 0 && language_id > 0) {
                addLang(language_id, language_proficiency_id)
            }
        });

        // delete the language
        $(document).on('click', '.btn_del_lang', function() {
            let form = $(this).closest("form");
            let language_id = form.find('.language_id').val();

            if (language_id > 0) {
                $.post("{{url('profile/language')}}/" + language_id, {
                    '_token' : '{{csrf_token()}}',
                    '_method' : 'delete',
                }, function(data) {
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
            }
            form.remove();
        });


        $(".language_proficiency").change(function() {
            let language_id = $(this).data('language');
            let language_proficiency_id = $(this).val();
            
            if (language_proficiency_id > 0 && language_id > 0) {
                addLang(language_id, language_proficiency_id)
            }
        });
    });
    </script>
@endsection