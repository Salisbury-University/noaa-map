// This example adds hide() and show() methods to a custom overlay's prototype.
// These methods toggle the visibility of the container <div>.
// overlay to or from the map.
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
function initMap() {
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11,
        center: { lat: 62.323907, lng: -150.109291 },
        mapTypeId: "satellite"
    });
    var bounds = new google.maps.LatLngBounds(new google.maps.LatLng(62.281819, -150.287132), new google.maps.LatLng(62.400471, -150.005608));
    // The photograph is courtesy of the U.S. Geological Survey.
    var image = "https://developers.google.com/maps/documentation/javascript/";
    image += "examples/full/images/talkeetna.png";
    /**
     * The custom USGSOverlay object contains the USGS image,
     * the bounds of the image, and a reference to the map.
     */
    var USGSOverlay = /** @class */ (function (_super) {
        __extends(USGSOverlay, _super);
        function USGSOverlay(bounds, image) {
            var _this = _super.call(this) || this;
            _this.bounds = bounds;
            _this.image = image;
            return _this;
        }
        /**
         * onAdd is called when the map's panes are ready and the overlay has been
         * added to the map.
         */
        USGSOverlay.prototype.onAdd = function () {
            this.div = document.createElement("div");
            this.div.style.borderStyle = "none";
            this.div.style.borderWidth = "0px";
            this.div.style.position = "absolute";
            // Create the img element and attach it to the div.
            var img = document.createElement("img");
            img.src = this.image;
            img.style.width = "100%";
            img.style.height = "100%";
            img.style.position = "absolute";
            this.div.appendChild(img);
            // Add the element to the "overlayLayer" pane.
            var panes = this.getPanes();
            panes.overlayLayer.appendChild(this.div);
        };
        USGSOverlay.prototype.draw = function () {
            // We use the south-west and north-east
            // coordinates of the overlay to peg it to the correct position and size.
            // To do this, we need to retrieve the projection from the overlay.
            var overlayProjection = this.getProjection();
            // Retrieve the south-west and north-east coordinates of this overlay
            // in LatLngs and convert them to pixel coordinates.
            // We'll use these coordinates to resize the div.
            var sw = overlayProjection.fromLatLngToDivPixel(this.bounds.getSouthWest());
            var ne = overlayProjection.fromLatLngToDivPixel(this.bounds.getNorthEast());
            // Resize the image's div to fit the indicated dimensions.
            if (this.div) {
                this.div.style.left = sw.x + "px";
                this.div.style.top = ne.y + "px";
                this.div.style.width = ne.x - sw.x + "px";
                this.div.style.height = sw.y - ne.y + "px";
            }
        };
        /**
         * The onRemove() method will be called automatically from the API if
         * we ever set the overlay's map property to 'null'.
         */
        USGSOverlay.prototype.onRemove = function () {
            if (this.div) {
                this.div.parentNode.removeChild(this.div);
                delete this.div;
            }
        };
        /**
         *  Set the visibility to 'hidden' or 'visible'.
         */
        USGSOverlay.prototype.hide = function () {
            if (this.div) {
                this.div.style.visibility = "hidden";
            }
        };
        USGSOverlay.prototype.show = function () {
            if (this.div) {
                this.div.style.visibility = "visible";
            }
        };
        USGSOverlay.prototype.toggle = function () {
            if (this.div) {
                if (this.div.style.visibility === "hidden") {
                    this.show();
                }
                else {
                    this.hide();
                }
            }
        };
        USGSOverlay.prototype.toggleDOM = function (map) {
            if (this.getMap()) {
                this.setMap(null);
            }
            else {
                this.setMap(map);
            }
        };
        return USGSOverlay;
    }(google.maps.OverlayView));
    var overlay = new USGSOverlay(bounds, image);
    overlay.setMap(map);
    var toggleButton = document.createElement("button");
    toggleButton.textContent = "Toggle";
    toggleButton.classList.add("custom-map-control-button");
    var toggleDOMButton = document.createElement("button");
    toggleDOMButton.textContent = "Toggle DOM Attachment";
    toggleDOMButton.classList.add("custom-map-control-button");
    toggleButton.addEventListener("click", function () {
        overlay.toggle();
    });
    toggleDOMButton.addEventListener("click", function () {
        overlay.toggleDOM(map);
    });
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(toggleDOMButton);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(toggleButton);
}
window.initmap
