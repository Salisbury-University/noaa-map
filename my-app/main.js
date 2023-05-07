import Map from 'ol/Map.js';
import OSM, {ATTRIBUTION} from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';
import View from 'ol/View.js';
import XYZ from 'ol/source/XYZ.js';
import TileGrid from 'ol/tilegrid/TileGrid';
import {FullScreen, defaults as defaultControls} from 'ol/control.js';


// Define your tile grid
let gridID=document.getElementById("grid_selector")


  

var tileGrid = new TileGrid({
  extent: [-20037508.34, -20037508.34, 20037508.34, 20037508.34],
  resolutions: [
    156543.033928041,
    78271.5169640205,
    39135.7584820102,
    19567.8792410051,
    9783.93962050256,
    4891.96981025128,
    2445.98490512564,
    1222.99245256282,
    611.49622628141,
    305.748113140705,
    152.8740565703525,
    76.43702828517625,
    38.21851414258813,
    19.109257071294063,
    9.554628535647032,
    4.777314267823516,
    2.388657133911758,
    1.194328566955879,
    0.5971642834779395,
    0.29858214173896974,
    0.14929107086948487,
  ],
  tileSize: [256, 256],
});

//Map background from OpenStreetMap
const backgroundLayer = new TileLayer({
  source: new OSM({
    tileGrid : tileGrid
  }),
});

gridID.addEventListener("change",(event)=>{
map=document.getElementById("map");
map.innerHTML="";
console.log(event.target.value);

//Create Layer displaying API data
var dataTileLayer = new TileLayer({
  source: new XYZ({
    attributions: [
      'All map data © <a href="https://distribution.charts.noaa.gov/ncds/index.html">NOAA</a>',
      ATTRIBUTION,
    ],
    opaque: false,
    url: 'https://www.bathmap.net/api/relative/'+event.target.value+'/{z}/{x}/{y}',
    tileGrid : tileGrid,
  }),
});

//Initialize map and set attributes
var map = new Map({
  target: 'map',
  controls: defaultControls().extend([new FullScreen()]),
  layers: [//backgroundLayer,
  dataTileLayer],
  view: new View({
    maxZoom: 18,
    minZoom: 1,
    center: [-8018982.89, -4035116.36],
    zoom: 6,
  }),

});
//Displays Zoom level for debugging
var zoomLevel = map.getView().getZoom();

var zoomLevelElement = document.getElementById('zoomLevel');
zoomLevelElement.innerHTML = 'Zoom level: ' + zoomLevel;

map.getView().on('change:resolution', function() {
  var zoomLevel = map.getView().getZoom();
  var zoomLevelElement = document.getElementById('zoomLevel');
  zoomLevelElement.innerHTML = 'Zoom level: ' + Math.round(zoomLevel*10)/10;;
});

//Display Z/X/Y of mouse location
map.on("pointermove", function (evt) {
  var tileCoord = tileGrid.getTileCoordForCoordAndZ(evt.coordinate, map.getView().getZoom());
  var tileLocation = "Tile location: " + tileCoord[0] + "/" + tileCoord[2] + "/" + tileCoord[1];
  document.getElementById("tile-location").innerHTML = tileLocation;
});
})



