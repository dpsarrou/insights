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
    attribution: '&copy; <a href="http://osm.org/copyright">Stef - Alexandra - Leonard - And Complainer</a> contributors'
}).addTo(map);

realtime.on('update', function() {
    map.fitBounds(realtime.getBounds(), {maxZoom: 3});
});

