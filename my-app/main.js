import Map from 'ol/Map.js';
import OSM, {ATTRIBUTION} from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';
import View from 'ol/View.js';
import XYZ from 'ol/source/XYZ.js';
import TileGrid from 'ol/tilegrid/TileGrid';
import {FullScreen, defaults as defaultControls} from 'ol/control.js';


let tileGrid = new TileGrid({
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

//onload functionality
let gridID=document.getElementById("grid_selector");
render_map(gridID.value);

//selection functionallity
gridID.addEventListener("change",(event)=>{render_map(event.target.value);});


//=============================================================================================================
function render_map(tile_id){

  clear_map();
  let dataTileLayer=create_data_tile_layer(tile_id);
  let map=initialize_map(dataTileLayer);  
  display_zoom_level(map);
  display_mouse_xyz(map);
}

//remove elements inside map
function clear_map(){
    let map=document.getElementById("map");
    map.innerHTML="";
}

//Create Layer displaying API data
function create_data_tile_layer(tile_id){
  let dataTileLayer = new TileLayer({
    source: new XYZ({
      attributions: [
        'All map data © <a href="https://distribution.charts.noaa.gov/ncds/index.html">NOAA</a>',
        ATTRIBUTION,
      ],
      opaque: false,
      tileUrlFunction:  function(tileCoord){
        let z = tileCoord[0];
        let x = tileCoord[1]; 
        let y = tileCoord[2];
        let yFlipped = Math.pow(2, z) - y - 1; // flip the Y axis
        let yAdjusted = yFlipped; // adjust the Y value 
        return 'https://bathmap.net/api/relative/internal/'+tile_id+ z + '/' + x + '/'+yAdjusted ;
      },
      tileGrid : tileGrid,
    }),
  });
  return dataTileLayer;
}

//initialize map with background, noaa data tile layer and starting coordinates
function initialize_map(dataTileLayer){
  let map = new Map({
    target: 'map',
    controls: defaultControls().extend([new FullScreen()]),
    layers: [backgroundLayer,
    dataTileLayer],
    view: new View({
      maxZoom: 18,
      minZoom: 1,
      center: [-8018982.89, 4035116.36],
      zoom: 6,
    }),
  });
  return map;
}

//Displays Zoom level for debugging
function display_zoom_level(map){
  let zoomLevel = map.getView().getZoom();

  let zoomLevelElement = document.getElementById('zoomLevel');
  zoomLevelElement.innerHTML = 'Zoom level: ' + zoomLevel;

  map.getView().on('change:resolution', function() {
    let zoomLevel = map.getView().getZoom();
    let zoomLevelElement = document.getElementById('zoomLevel');
    zoomLevelElement.innerHTML = 'Zoom level: ' + Math.round(zoomLevel*10)/10;;
  });
}

//Display Z/X/Y of mouse location
function display_mouse_xyz(map){
  map.on("pointermove", function (evt) {
    let tileCoord = tileGrid.getTileCoordForCoordAndZ(evt.coordinate, map.getView().getZoom());
    let tileLocation = "Tile location: " + tileCoord[0] + "/" + tileCoord[1] + "/" + tileCoord[2];
    document.getElementById("tile-location").innerHTML = tileLocation;
  });
}
