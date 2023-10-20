@php
// loader image
$loader = "<div class='text-center'><img src='".url('assets/images/svgs/loader.svg')."' /></div>";   
@endphp
<script type="text/javascript">
    function loadExperiences() {
        $("#exp_container").html("{!!$loader!!}");
        $.get("{{route('user_experience.index')}}", function(data) {
            $("#exp_container").html(data.languages);
        });
    }

    $(document).ready(function() {
        // load languages view
        $("#languages").html("{!!$loader!!}");
        $.get("{{route('profile.languages')}}", function(data) {
            $("#languages").html(data.languages);
        });

        // add new language and languages reload view
        $("#addLangForm").submit(function (e) {
            e.preventDefault();
            $("#languages").html("{!!$loader!!}");
            $.post("{{route('profile.language.store')}}", {
                '_token' : '{{csrf_token()}}',
                'language_id' : $("#language_id").val(),
                'language_proficiency_id' : $("#language_proficiency_id").val()
            }, function (data) {
                if (data.success) {
                    $("#languages").html(data.languages);
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
        });

        /**
         * Edit languages
         * Load language body
        */
        $("#editLangs").click(function() {
            // load languages view
            $("#editLangBody").html("{!!$loader!!}");
            $.get("{{route('profile.languages.edit')}}", function(data) {
                $("#editLangBody").html(data.languages);
            });
        })

        /**
            * delete user language
        */
        $(document).on('click', ".dtnDelLang", function() {
            if (confirm('Really mean to delete this language?')) {
                let id = $(this).data('id');
                $.post("{{url('profile/language')}}/" + id, {
                    '_token' : '{{csrf_token()}}',
                    '_method' : 'delete',
                }, function(data) {
                    if (data.success) {
                        $("#langid-"+id).hide();
                        $("#languages").html(data.languages);
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
        });

        /**
         * Load user's educations view
        */
        $("#educations").html("{!!$loader!!}");
        $.get("{{route('user_education.index')}}", function(data) {
            $("#educations").html(data.view);
        });
        
        /**
         * Edit education
         * Load education body
        */
        $(document).on('click', ".dtnEditEdu", function() {
            let id = $(this).data('id');
            $("#editEduBody").html("{!!$loader!!}");
            let url = "{{route('user_education.edit', ['user_education' => ':UserEdu'])}}";
            url = url.replace(':UserEdu', id);
            $.get(url, function(data) {
                console.log(data);
                if (data.success) {
                    $("#editEduBody").html(data.view);
                } else {
                    notif({
                        msg: "<b>Oops!</b> There is some problem, Please try again later.",
                        type: "error",
                    });
                }
            });
        })

        /**
            * delete user language
        */
        $(document).on('click', ".dtnDelEdu", function() {
            if (confirm('Really mean to delete this education?')) {
                let id = $(this).data('id');
                
                let url = "{{route('user_education.destroy', ['user_education' => ':UserEdu'])}}";
                url = url.replace(':UserEdu', id);

                $.post(url, {
                    '_token' : '{{csrf_token()}}',
                    '_method' : 'delete',
                }, function(data) {
                    if (data.success) {
                        $("#edu-"+id).hide();
                        $("#educations").html(data.view);
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
        });
    });
</script>