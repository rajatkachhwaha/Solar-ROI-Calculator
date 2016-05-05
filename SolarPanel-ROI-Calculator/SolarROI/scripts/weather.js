// javascript to display weather information
$(function(){

    // Specify the ZIP/location code and units (f or c)
    var loc = '95112'; // or e.g. SPXX0050
    var u = 'c';

    var query = "SELECT item.condition FROM weather.forecast WHERE location='" + loc + "' AND u='" + u + "'";
    var cacheBuster = Math.floor((new Date().getTime()) / 1200 / 1000);
    var url = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent(query) + '&format=json&_nocache=' + cacheBuster;

    window['wxCallback'] = function(data) {
	console.log(data);
        var info = data.query.results.channel.item.condition;
        $('#wxIcon').css({
            backgroundPosition: '-' + (61 * info.code) + 'px 0'
        }).attr({
            title: info.text
        });
        //$('#wxIcon2').append('<img src="http://l.yimg.com/a/i/us/we/52/' + info.code + '.gif" width="34" height="34" title="' + info.text + '" />');
        $('#wxIntro .temp').html(info.temp);
		//$('#sun').html(info.temp);
    };
	var value=10;
	//var value= document.getElementById(sun).value;
		if (value > 18) {
			//$('#sun').html(info.temp);
		}
		else{
			value = "Hello"
			//$('#sun').html(info.temp);
		}
		//document.getElementById("sun").innerHTML ='sun : '+value;
    $.ajax({
        url: url,
        dataType: 'jsonp',
        cache: true,
        jsonpCallback: 'wxCallback'
    });
    
});
