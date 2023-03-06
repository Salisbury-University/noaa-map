import Map from 'ol/Map.js';
import OSM, {ATTRIBUTION} from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';
import View from 'ol/View.js';

const openCycleMapLayer = new TileLayer({
  source: new OSM({
    attributions: [
      'All maps © <a href="https://www.opencyclemap.org/">OpenCycleMap</a>',
      ATTRIBUTION,
    ],
    url:
      'https://{a-c}.tile.thunderforest.com/cycle/{z}/{x}/{y}.png' +
      '?apikey=Your API key from https://www.thunderforest.com/docs/apikeys/ here',
  }),
});

const openSeaMapLayer = new TileLayer({
  source: new OSM({
    attributions: [
      'All maps © <a href="https://www.openseamap.org/">OpenSeaMap</a>',
      ATTRIBUTION,
    ],
    opaque: false,
    url: 'https://tiles.openseamap.org/seamark/{z}/{x}/{y}.png',
  }),
});

const map = new Map({
  layers: [new TileLayer({
    source: new OSM(),
  }), openSeaMapLayer],
  target: 'map',
  view: new View({
    maxZoom: 18,
    center: [-244780.24508882355, 5986452.183179816],
    zoom: 15,
  }),
});
