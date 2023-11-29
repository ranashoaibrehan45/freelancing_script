@php
// loader image
$loader = "<div class='text-center'><img src='".url('assets/images/svgs/loader.svg')."' /></div>";
@endphp
<script type="text/javascript">
    /**
     * Load user experiences list
    */
    function loadExperiences() {
        $("#exp_container").html("{!!$loader!!}");
        $.get("{{route('user_experience.index')}}", function(data) {
            $("#exp_container").html(data.languages);
        });
    }

    /**
     * Load user educations list
    */
    function loadEducations() {
        $("#educations").html("{!!$loader!!}");
        $.get("{{route('user_education.index')}}", function(data) {
            $("#educations").html(data.view);
        });
    }

    /**
     * Calculate hourly rate
    */
    $("#profilerate").change(function() {
        let rate = $(this).val();
        calculateRate(rate);
    });
    
   function calculateRate(rate) {
    if (rate > 4) {
        let fee = (rate / 100) * 10
        $('#servicefee').val(fee);
        $('#youget').val(rate - fee);
    } else {
        notif({
            msg: "<b>Oops! your rate must be greater than or equals to $5</b> ",
            type: "error",
        });
    }
   }

    $(document).ready(function() {
        $('#profileImageUploadForm').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: '{{url("profile/image")}}',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    $("#profile_image").html(data.view);
                    $('#profileImageUploadForm')[0].reset();
                },
                error: function(data){
                    let error = JSON.parse(data.responseText);
                    notif({
                        msg: "<b>Error:</b> " + error.message,
                        type: "error"
                    });
                }
            });
        }));

        /**
         * Profile title update
        */
        $("#profileTitleForm").submit(function(e) {
            e.preventDefault();
            $.post("{{route('freelancer.profile.title')}}", {
                _token: "{{csrf_token()}}",
                title: $("#profiletitle").val()
            })
            .done(function(data) {
                if (data.success) {
                    notif({
                        msg: "<b>Success:</b> " + data.status,
                        type: "success"
                    });
                    $("#profileTitle").html(data.title);
                    $("#modalProfileTitle").modal("hide");
                }
            })
            .fail(function(error) {
                error = JSON.parse(error.responseText);
                notif({
                    msg: "<b>Oops!</b> " + error.message,
                    type: "error",
                });
            });;
        });

        /**
         * Profile overview updated
        */
        $("#profileBioForm").submit(function(e) {
            e.preventDefault();
            $.post("{{route('freelancer.profile.overview')}}", {
                _token: "{{csrf_token()}}",
                bio: $("#profileBioText").val()
            })
            .done(function(data) {
                if (data.success) {
                    notif({
                        msg: "<b>Success:</b> " + data.status,
                        type: "success"
                    });
                    $("#profileBio").html(data.bio);
                    $("#modalProfileBio").modal("hide");
                }
            })
            .fail(function(error) {
                error = JSON.parse(error.responseText);
                notif({
                    msg: "<b>Oops!</b> " + error.message,
                    type: "error",
                });
            });
        });

        /**
         * Profile rate updated
        */
        $("#profileRateForm").submit(function(e) {
            e.preventDefault();

            $.post("{{route('freelancer.profile.rate')}}", {
                _token: "{{csrf_token()}}",
                rate: $("#profilerate").val()
            })
            .done(function(data) {
                if (data.success) {
                    notif({
                        msg: "<b>Success:</b> " + data.status,
                        type: "success"
                    });
                    $("#profileRate").html(data.rate);
                    $("#modalProfileRate").modal("hide");
                }
            })
            .fail(function(error) {
                error = JSON.parse(error.responseText);
                notif({
                    msg: "<b>Oops!</b> " + error.message,
                    type: "error",
                });
            });
        });

        /**
         * set profile skills
        */
        $("#profileskills").change(function(e) {
            e.preventDefault();
            let skills = $(this).val();
            $.post("{{route('profile.skills.store')}}", {
                _token: "{{csrf_token()}}",
                skills: skills
            })
            .done(function(data) {
                if (data.success) {
                    notif({
                        msg: "<b>Success:</b> " + data.status,
                        type: "success"
                    });
                    $("#profileSkills").html(data.skills);
                }
            })
            .fail(function(error) {
                error = JSON.parse(error.responseText);
                notif({
                    msg: "<b>Oops!</b> " + error.message,
                    type: "error",
                });
            });
        });

        $('#profile_photo').change(function() {
            $("#profileImageUploadForm").submit();
        })
        
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
         * Add education
        */
        $(document).on('click', "#addEduBtn", function() {
            $.post("{{route('user_education.store')}}", {
                '_token' : '{{csrf_token()}}',
                'school' : $("#add_edu_school").val(),
                'year_from' : $("#add_edu_year_from").val(),
                'year_to' : $("#add_edu_year_to").val(),
                'degree_id' : $("#add_edu_degree_id").val(),
                'study_area' : $("#add_edu_study_area").val(),
                'description' : $("#add_edu_description").val(),
            }, function(resp) {
                if (resp.success) {
                    $("#modalAddEdu").modal('hide');
                    $("#educations").html(resp.view);
                    notif({
                        msg: "<b>Oops!</b> Resource created successfully.",
                        type: "success",
                    });
                }
            });
        });

        /**
         * Update education
        */
        $(document).on('click', "#updateEduBtn", function() {
            $(this).attr('disabled', true);
            let id = $(this).data('id');
            let url = "{{route('user_education.update', ['user_education' => ':UserEdu'])}}";
            url = url.replace(':UserEdu', id);

            $.post(url, {
                '_token' : '{{csrf_token()}}',
                '_method' : 'PUT',
                'school' : $("#edit_edu_school").val(),
                'year_from' : $("#edit_edu_year_from").val(),
                'year_to' : $("#edit_edu_year_to").val(),
                'degree_id' : $("#edit_edu_degree_id").val(),
                'study_area' : $("#edit_edu_study_area").val(),
                'description' : $("#edit_edu_description").val(),
            }, function(resp) {
                if (resp.success) {
                    $("#updateEduBtn").attr('disabled', false);
                    $("#modalAddEdu").modal('hide');
                    $("#educations").html(resp.view);
                    notif({
                        msg: "<b>Oops!</b> Resource updated successfully.",
                        type: "success",
                    });
                }
            });
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
        
        /**
         * Edit experience
         * Load experience body
        */
        $(document).on('click', ".dtnEditExp", function() {
            let id = $(this).data('id');
            $("#editExpBody").html("{!!$loader!!}");
            let url = "{{route('user_experience.edit', ['user_experience' => ':UserExp'])}}";
            url = url.replace(':UserExp', id);
            $.get(url, function(data) {
                if (data.success) {
                    $("#editExpBody").html(data.view);
                } else {
                    notif({
                        msg: "<b>Oops!</b> There is some problem, Please try again later.",
                        type: "error",
                    });
                }
            });
        })

        /**
            * delete user experience
        */
        $(document).on('click', ".dtnDelExp", function() {
            if (confirm('Really mean to delete this experience?')) {
                let id = $(this).data('id');
                let url = "{{route('user_experience.destroy', ['user_experience' => ':UserExp'])}}";
                url = url.replace(':UserExp', id);

                $.post(url, {
                    '_token' : '{{csrf_token()}}',
                    '_method' : 'delete',
                }, function(data) {
                    if (data.success) {
                        $("#exp-"+id).hide();
                        $("#exp_container").html(data.view);
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