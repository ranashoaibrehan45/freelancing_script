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