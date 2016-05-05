function weatherbyZip1 (zip){
	$.ajax({
		url: 'http://api.openweathermap.org/data/2.5/weather?zip='+zip+',us&units=metric&appid=c0d810c32d4f3e1b01fac86ca642ea1f',
		success: function(data) {
		var weatherData = {
			city: data.name,
			weather: data.weather[0].main,
			weatherIcon: 'http://openweathermap.org/img/w/'+data.weather[0].icon+'.png',
			weatherDescription: data.weather[0].description,
			temperature: data.main.temp,
			temperatureMax: data.main['temp_max'],
			temperatureMin: data.main['temp_min']
		}
		displayWeatherWidget1(weatherData);
	}
	});
	
};

function displayWeatherWidget1(weatherData){
	$('#wxIntro .city').text(weatherData.city);
		$('#wxIntro .temp').text(weatherData.temperature);
		$('#wxIntro .sym').attr({
		src: weatherData.weatherIcon
		});
		$('#sun .cond').text(weatherData.weatherDescription);
}

$(function(){
	
    $(".weatherbyzip1").submit(function(event) {
        event.preventDefault();
		var zip = $('.cityzipcode').val();
        weatherbyZip1(zip);
    });
});
