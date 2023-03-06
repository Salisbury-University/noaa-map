import Map from 'ol/Map.js';
import View from 'ol/View.js';
import {ImageArcGISRest, OSM} from 'ol/source.js';
import {Image as ImageLayer, Tile as TileLayer} from 'ol/layer.js';

const url =
  'https://sampleserver6.arcgisonline.com/ArcGIS/rest/services/' +
  'USA/MapServer';

const layers = [
  new TileLayer({
    source: new OSM(),
  }),
  new ImageLayer({
    source: new ImageArcGISRest({
      ratio: 1,
      params: {},
      url: url,
    }),
  }),
];
const map = new Map({
  layers: layers,
  target: 'map',
  view: new View({
    center: [-10997148, 4569099],
    zoom: 4,
  }),
});
