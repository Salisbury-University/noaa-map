import Map from 'ol/Map.js';
import OSM, {ATTRIBUTION} from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';
import View from 'ol/View.js';
import XYZ from 'ol/source/XYZ.js';
import {FullScreen, defaults as defaultControls} from 'ol/control.js';



var dataTileLayer = new TileLayer({
  source: new XYZ({
    attributions: [
      'All maps © <a href="https://distribution.charts.noaa.gov/ncds/index.html">NOAA</a>',
      ATTRIBUTION,
    ],
    opaque: false,
    url: 'https://www.bathmap.net/api/relative/{z}/{x}/{y}',
  }),
});




var map = new Map({
  target: 'map',
  controls: defaultControls().extend([new FullScreen()]),
  layers: [new TileLayer({
    source : new OSM
  }),
  dataTileLayer],
  view: new View({
    maxZoom: 18,
    minZoom: 1,
    center: [-8362003.0,  4556269.0],
    zoom: 6,
  }),

});

var zoomLevel = map.getView().getZoom();

var zoomLevelElement = document.getElementById('zoomLevel');
zoomLevelElement.innerHTML = 'Zoom level: ' + zoomLevel;

map.getView().on('change:resolution', function() {
  var zoomLevel = map.getView().getZoom();
  var zoomLevelElement = document.getElementById('zoomLevel');
  zoomLevelElement.innerHTML = 'Zoom level: ' + Math.round(zoomLevel*10)/10;;
});