// get app url defined in meta tag
let url = document.getElementsByName('url')[0].getAttribute('content')

function getCountryStates(countryId, stateId = 0)
{
    if (countryId > 0) {
        $.get(url + 'states/' + countryId, function(data) {
            let states = '';
            $.each(data, function(i, obj) {
                states += '<option value="'+obj.id+'" '+(parseInt(obj.id) == stateId ? 'selected':'')+'>'+obj.name+'</option>'
            });

            $("#state_id").html(states);
        });
    } else {
        $("#state_id").html('<option>-- Select --</option>');
    }
}

function getStateCities(stateId, cityId = 0)
{
    if (stateId > 0) {
        $.get(url + 'cities/' + stateId, function(data) {
            let cities = '';
            $.each(data, function(i, obj) {
                cities += '<option value="'+obj.id+'" '+(parseInt(obj.id) == parseInt(cityId) ? 'selected':'')+'>'+obj.name+'</option>'
            });

            $("#city_id").html(cities);
        });
    } else {
        $("#city_id").html('<option>-- Select --</option>');
    }
}


// validation add experience form
$("#exp_title,#exp_company").change(function() {
    if ($.trim($(this).val()) == '') {
        $(this).addClass('is-invalid');
        $(this).focus();
    } else {
        $(this).removeClass('is-invalid');
    }
});

$("#exp_continue").change(function() {
    $("#exp_enddate_container").toggle();
});

$("#addExpForm").submit(function(e) {
    // validate title
    if ($.trim($("#exp_title").val()) == '') {
        $("#exp_title").addClass('is-invalid')
        $("#exp_title").focus();
        return false;
    }
    // validate company
    if ($.trim($("#exp_company").val()) == '') {
        $("#exp_company").addClass('is-invalid')
        $("#exp_company").focus();
        return false;
    }

    if ($("#start_month").find(":selected").val() == $("#end_month").find(":selected").val() && $("#start_year").find(":selected").val() == $("#end_year").find(":selected").val()) {
        notif({
            msg: "<b>Oops:</b> Invalid start or end date",
            type: "error"
        });
        return false;
    }
    return true;
});