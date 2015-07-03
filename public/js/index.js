var map = L.map('map'),
    realtime = L.realtime({
        url: 'http://local.endouble-insights.com/api/v1/map',
        crossOrigin: true,
        type: 'json'
    }, {
        interval: 3 * 1000,
        pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            'icon': L.icon({
                iconUrl: '/images/netwerven-logo.png',
                iconSize:     [38, 38], // size of the icon
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            })
        });
    }
    }).addTo(map);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">Stef - Alexandra - Leonard - And Complainer (and Frits sucks as always)</a> contributors'
}).addTo(map);


var boxes = document.getElementById("boxes");


realtime.on('update', function(feature) {
    map.fitBounds(realtime.getBounds(), {maxZoom: 3});


    var existing_boxes = boxes.innerHTML;
		

    var application = {
    	vacancyName: feature.features.undefined.application.vacancy.name,
    	vacancyUrl: feature.features.undefined.application.vacancy.url,
    	candidate: feature.features.undefined.application.candidate.name,
    	department: feature.features.undefined.application.department.name,
    	timestamp: feature.features.undefined.application.timestamp
    }
           



    var application_box = '<li class="box">' 
    			+'<div class="image"><img src="/images/netwerven-logo.png"/></div>'
				+'<div class="info">'
				+	'<p class="name"><b>'+ application.candidate +'</b></p>'
				+	'<p class="vacancy">'+ application.vacancyName+'</p>'
				+	'<p class="department">'+ application.department+'</p>'
				+	'<p class="timestamp">'+ application.timestamp+'</p>'
				+'</div>'
				+'</li>';

    boxes.innerHTML = application_box + existing_boxes;

});






