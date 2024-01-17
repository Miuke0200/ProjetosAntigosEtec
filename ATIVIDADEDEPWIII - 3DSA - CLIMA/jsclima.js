$(document).ready(function () {
    $("#consultaclima").click(function () {
        var city = $("#city").val();
        var key = 'e3f6c78a3d7deede588051365d3fd121';

        $.ajax({
            url: 'http://api.openweathermap.org/data/2.5/weather',
            dataType: 'json',
            type: 'GET',
            data: { q: city, appid: key },

            success: function (data) {
                var content = '';
                $.each(data.weather, function (index, val) {
                    var temperature = Math.round(data.main.temp);
                    var celcious = temperature - 273;
                    var humidity = data.main.humidity;
                    var weathercondition = data.weather[0].main;
                    var description = data.weather[0].description;
                    var icon = data.weather[0].icon + '.png';
                    content += '<p><b> TEMPERATURA: ' + celcious + '&deg; C</b></p>';
                    content += '<p><b> UMIDADE: ' + humidity + '</b></p>';
                    content += '<p><b> TEMPO: ' + weathercondition + '</b></p>';
                    content += '<p><img src=http://openweathermap.org/img/wn/' + icon + '>' + '</p>';
                });
                $("#show").html(content);
            }

        });
    });
});