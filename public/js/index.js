var map = L.map('map'),
    realtime = L.realtime({
        url: 'http://local.endouble-insights.com/api/v1/map',
        crossOrigin: true,
        type: 'json'
    }, {
        interval: 3 * 1000
    }).addTo(map);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">Stef - Alexandra - Leonard - And Complainer</a> contributors'
}).addTo(map);

realtime.on('update', function() {
    map.fitBounds(realtime.getBounds(), {maxZoom: 3});
});

