function initMap() {
    var map = new OpenLayers.Map("map");

    var osmLayer = new OpenLayers.Layer.OSM();
    map.addLayer(osmLayer);

    var lonLat = new OpenLayers.LonLat(40.391650016942876, 56.14227622709617).transform(
      new OpenLayers.Projection("EPSG:4326"),
      map.getProjectionObject()
    );
    map.setCenter(lonLat, 18);

    var markers = new OpenLayers.Layer.Markers("Markers");
    map.addLayer(markers);
    var marker = new OpenLayers.Marker(lonLat);
    markers.addMarker(marker);

    // map.events.register("click", map, function (e) {
    //     var position = map.getLonLatFromViewPortPx(e.xy).transform(
    //       map.getProjectionObject(),
    //       new OpenLayers.Projection("EPSG:4326")
    //     );
    //     console.log("Широта: " + position.lat + ", Долгота: " + position.lon);
    //   });
  }

  window.onload = initMap;
