import Map from 'ol/Map.js';
import OSM, {ATTRIBUTION} from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';
import View from 'ol/View.js';
import {FullScreen, defaults as defaultControls} from 'ol/control.js';



const openSeaMapLayer = new TileLayer({
  source: new OSM({
    attributions: [
      'All maps © <a href="https://distribution.charts.noaa.gov/ncds/index.html">NOAA</a>',
      ATTRIBUTION,
    ],
    opaque: false,
    url: 'https://tiles.openseamap.org/seamark/{z}/{x}/{y}.png',
  }),
});



const map = new Map({
  controls: defaultControls().extend([new FullScreen()]),
  layers: [new TileLayer({
    source: new OSM(),
  }),openSeaMapLayer],
  target: 'map',
  view: new View({
    maxZoom: 18,
    center: [-8362003.0, 4956269.0],
    zoom: 5,
  }),
});


