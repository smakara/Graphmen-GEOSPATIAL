<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/leaflet.css')}}">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/L.Control.Locate.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/qgis2web.css')}}">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/leaflet-search.css')}}">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/leaflet-control-geocoder.Geocoder.css')}}">
        <link rel="stylesheet" href="{{asset('template/Hilside/Hilside/css/leaflet-measure.css')}}">
        <style>
            html, body, #map {
                width: 100%;
                height: 100%;
                padding: 0;
                margin: 0;
            }
        </style>
        <title></title>
    </head>
    <body>
        <div id="map">
        </div>
        <script src="{{asset('template/Hilside/Hilside/js/qgis2web_expressions.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/L.Control.Locate.min.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/multi-style-layer.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet-svg-shape-markers.min.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet.rotatedMarker.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet.pattern.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet-hash.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/Autolinker.min.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/rbush.min.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/labelgun.min.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/labels.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet-control-geocoder.Geocoder.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet-measure.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/proj4.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/proj4leaflet.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/js/leaflet-search.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/data/Hillside1_1.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/data/HilsideBlngs_2.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/data/hillside_3.js')}}"></script>
        <script src="{{asset('template/Hilside/Hilside/data/tagged_4.js')}}"></script>
        <script>
var highlightLayer;
function highlightFeature(e) {
    highlightLayer = e.target;

    if (e.target.feature.geometry.type === 'LineString') {
        highlightLayer.setStyle({
            color: '#ffff00',
        });
    } else {
        highlightLayer.setStyle({
            fillColor: '#ffff00',
            fillOpacity: 1
        });
    }
}
var crs = new L.Proj.CRS('EPSG:32735', '+proj=utm +zone=35 +south +datum=WGS84 +units=m +no_defs', {
    resolutions: [2800, 1400, 700, 350, 175, 84, 42, 21, 11.2, 5.6, 2.8, 1.4, 0.7, 0.35, 0.14, 0.07],
});
var map = L.map('map', {
    crs: crs,
    continuousWorld: false,
    worldCopyJump: false,
    zoomControl: true, maxZoom: 28, minZoom: 1
}).fitBounds([[-20.212052453177638, 28.580444963963473], [-20.180887508965274, 28.633556930411878]]);
var hash = new L.Hash(map);
map.attributionControl.setPrefix('<a href="https://festive-mcclintock-cb5fff.netlify.app/" target="_blank">Manuel Ndebele</a> &middot; <a href="https://dafu2i5ly4zzt3oiwm1i7a-on.drv.tw/www.graphmengeospatial.com/" title="Graphmen Geospatial, Mapping development forward">Graphmen Geospatial</a> &middot; <a href="https://api,whatsapp.com/message/IHOW7ZFWPDM3M1">+263739472879</a>');
var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
var measureControl = new L.Control.Measure({
    position: 'topleft',
    primaryLengthUnit: 'meters',
    secondaryLengthUnit: 'kilometers',
    primaryAreaUnit: 'sqmeters',
    secondaryAreaUnit: 'hectares'
});
measureControl.addTo(map);
document.getElementsByClassName('leaflet-control-measure-toggle')[0]
        .innerHTML = '';
document.getElementsByClassName('leaflet-control-measure-toggle')[0]
        .className += ' fas fa-ruler';
var bounds_group = new L.featureGroup([]);
function setBounds() {
    map.setMaxBounds(map.getBounds());
}
map.createPane('pane_WikimediaHikeBikeMap_0');
map.getPane('pane_WikimediaHikeBikeMap_0').style.zIndex = 400;
var layer_WikimediaHikeBikeMap_0 = L.tileLayer('http://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png', {
    pane: 'pane_WikimediaHikeBikeMap_0',
    opacity: 1.0,
    attribution: '',
    minZoom: 1,
    maxZoom: 28,
    minNativeZoom: 1,
    maxNativeZoom: 17
});
layer_WikimediaHikeBikeMap_0;
map.addLayer(layer_WikimediaHikeBikeMap_0);
function pop_Hillside1_1(feature, layer) {
    layer.on({
        mouseout: function (e) {
            for (i in e.target._eventParents) {
                e.target._eventParents[i].resetStyle(e.target);
            }
        },
        mouseover: highlightFeature,
    });
    var popupContent = '<table table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Id'] !== null ? autolinker.link(feature.properties['Id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">STAND_NO</th>\
                        <td>' + (feature.properties['STAND_NO'] !== null ? autolinker.link(feature.properties['STAND_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">NAME</th>\
                        <td>' + (feature.properties['NAME'] !== null ? autolinker.link(feature.properties['NAME'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['LINK_ID'] !== null ? autolinker.link(feature.properties['LINK_ID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">GP_NO</th>\
                        <td>' + (feature.properties['GP_NO'] !== null ? autolinker.link(feature.properties['GP_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DEV_LEVEL</th>\
                        <td>' + (feature.properties['DEV_LEVEL'] !== null ? autolinker.link(feature.properties['DEV_LEVEL'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">USE</th>\
                        <td>' + (feature.properties['USE'] !== null ? autolinker.link(feature.properties['USE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUBURB</th>\
                        <td>' + (feature.properties['SUBURB'] !== null ? autolinker.link(feature.properties['SUBURB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">HOUSE_PLAN</th>\
                        <td>' + (feature.properties['HOUSE_PLAN'] !== null ? autolinker.link(feature.properties['HOUSE_PLAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">OWN_NAME</th>\
                        <td>' + (feature.properties['OWN_NAME'] !== null ? autolinker.link(feature.properties['OWN_NAME'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SURNAME</th>\
                        <td>' + (feature.properties['SURNAME'] !== null ? autolinker.link(feature.properties['SURNAME'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['ID_NO'] !== null ? autolinker.link(feature.properties['ID_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['ADDRESS'] !== null ? autolinker.link(feature.properties['ADDRESS'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['WAT_SERV'] !== null ? autolinker.link(feature.properties['WAT_SERV'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['SEW_SERV'] !== null ? autolinker.link(feature.properties['SEW_SERV'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['METERED'] !== null ? autolinker.link(feature.properties['METERED'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['MET_NO'] !== null ? autolinker.link(feature.properties['MET_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['ACCURACY'] !== null ? autolinker.link(feature.properties['ACCURACY'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['PLAN_NO'] !== null ? autolinker.link(feature.properties['PLAN_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
    layer.bindPopup(popupContent, {maxHeight: 400});
}

function style_Hillside1_1_0() {
    return {
        pane: 'pane_Hillside1_1',
        opacity: 1,
        color: 'rgba(220,61,21,1.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 2.0,
        fillOpacity: 0,
        interactive: true,
    }
}
map.createPane('pane_Hillside1_1');
map.getPane('pane_Hillside1_1').style.zIndex = 401;
map.getPane('pane_Hillside1_1').style['mix-blend-mode'] = 'normal';
var layer_Hillside1_1 = new L.geoJson(json_Hillside1_1, {
    attribution: '',
    interactive: true,
    dataVar: 'json_Hillside1_1',
    layerName: 'layer_Hillside1_1',
    pane: 'pane_Hillside1_1',
    onEachFeature: pop_Hillside1_1,
    style: style_Hillside1_1_0,
});
bounds_group.addLayer(layer_Hillside1_1);
map.addLayer(layer_Hillside1_1);
function pop_HilsideBlngs_2(feature, layer) {
    layer.on({
        mouseout: function (e) {
            for (i in e.target._eventParents) {
                e.target._eventParents[i].resetStyle(e.target);
            }
        },
        mouseover: highlightFeature,
    });
    var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['osm_id'] !== null ? autolinker.link(feature.properties['osm_id'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
    layer.bindPopup(popupContent, {maxHeight: 400});
}

function style_HilsideBlngs_2_0() {
    return {
        pane: 'pane_HilsideBlngs_2',
        opacity: 1,
        color: 'rgba(192,35,35,1.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1.0,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(183,99,43,1.0)',
        interactive: true,
    }
}
map.createPane('pane_HilsideBlngs_2');
map.getPane('pane_HilsideBlngs_2').style.zIndex = 402;
map.getPane('pane_HilsideBlngs_2').style['mix-blend-mode'] = 'normal';
var layer_HilsideBlngs_2 = new L.geoJson(json_HilsideBlngs_2, {
    attribution: '',
    interactive: true,
    dataVar: 'json_HilsideBlngs_2',
    layerName: 'layer_HilsideBlngs_2',
    pane: 'pane_HilsideBlngs_2',
    onEachFeature: pop_HilsideBlngs_2,
    style: style_HilsideBlngs_2_0,
});
bounds_group.addLayer(layer_HilsideBlngs_2);
map.addLayer(layer_HilsideBlngs_2);
function pop_hillside_3(feature, layer) {
    layer.on({
        mouseout: function (e) {
            for (i in e.target._eventParents) {
                e.target._eventParents[i].resetStyle(e.target);
            }
        },
        mouseover: highlightFeature,
    });
    var popupContent = '<table style="width:100%;text-align:left;background-color:#FFDB58;">\
                    <tr>\
                        <th scope="row">STAND_NO</th>\
                        <td>' + (feature.properties['STAND_NO'] !== null ? autolinker.link(feature.properties['STAND_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">NAME</th>\
                        <td>' + (feature.properties['NAME'] !== null ? autolinker.link(feature.properties['NAME'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DEV_LEVEL</th>\
                        <td>' + (feature.properties['DEV_LEVEL'] !== null ? autolinker.link(feature.properties['DEV_LEVEL'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">USE</th>\
                        <td>' + (feature.properties['USE'] !== null ? autolinker.link(feature.properties['USE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUBURB</th>\
                        <td>' + (feature.properties['SUBURB'] !== null ? autolinker.link(feature.properties['SUBURB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">HOUSE_PLAN</th>\
                        <td>' + (feature.properties['HOUSE_PLAN'] !== null ? autolinker.link(feature.properties['HOUSE_PLAN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">OWN_NAME</th>\
                        <td>' + (feature.properties['OWN_NAME'] !== null ? autolinker.link(feature.properties['OWN_NAME'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SURNAME</th>\
                        <td>' + (feature.properties['SURNAME'] !== null ? autolinker.link(feature.properties['SURNAME'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">ID_NO</th>\
                        <td>' + (feature.properties['ID_NO'] !== null ? autolinker.link(feature.properties['ID_NO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">ADDRESS</th>\
                        <td>' + (feature.properties['ADDRESS'] !== null ? autolinker.link(feature.properties['ADDRESS'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">METERED</th>\
                        <td>' + (feature.properties['METERED'] !== null ? autolinker.link(feature.properties['METERED'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Improv</th>\
                        <td>' + (feature.properties['Improv'] !== null ? autolinker.link(feature.properties['Improv'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LandSize</th>\
                        <td>' + (feature.properties['LandSize'] !== null ? autolinker.link(feature.properties['LandSize'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">LandValue</th>\
                        <td>' + (feature.properties['LandValue'] !== null ? autolinker.link(feature.properties['LandValue'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">ImproValue</th>\
                        <td>' + (feature.properties['ImproValue'] !== null ? autolinker.link(feature.properties['ImproValue'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">WatService</th>\
                        <td>' + (feature.properties['WatService'] !== null ? autolinker.link(feature.properties['WatService'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SewService</th>\
                        <td>' + (feature.properties['SewService'] !== null ? autolinker.link(feature.properties['SewService'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Contact</th>\
                        <td>' + (feature.properties['Contact'] !== null ? autolinker.link(feature.properties['Contact'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
    layer.bindPopup(popupContent, {maxHeight: 400});
}

function style_hillside_3_0() {
    return {
        pane: 'pane_hillside_3',
        radius: 4.0,
        opacity: 1,
        color: 'rgba(177,121,17,1.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(153,100,14,1.0)',
        interactive: true,
    }
}
map.createPane('pane_hillside_3');
map.getPane('pane_hillside_3').style.zIndex = 403;
map.getPane('pane_hillside_3').style['mix-blend-mode'] = 'normal';
var layer_hillside_3 = new L.geoJson(json_hillside_3, {
    attribution: '',
    interactive: true,
    dataVar: 'json_hillside_3',
    layerName: 'layer_hillside_3',
    pane: 'pane_hillside_3',
    onEachFeature: pop_hillside_3,
    pointToLayer: function (feature, latlng) {
        var context = {
            feature: feature,
            variables: {}
        };
        return L.circleMarker(latlng, style_hillside_3_0(feature));
    },
});
bounds_group.addLayer(layer_hillside_3);
map.addLayer(layer_hillside_3);
function pop_tagged_4(feature, layer) {
    layer.on({
        mouseout: function (e) {
            for (i in e.target._eventParents) {
                e.target._eventParents[i].resetStyle(e.target);
            }
        },
        mouseover: highlightFeature,
    });
    var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : '') + '</td>\
                        <tr>\
                        <td colspan="2">' + (feature.properties['Comment'] !== null ? autolinker.link(feature.properties['Comment'].toLocaleString()) : '') + '</td>\
                    </tr>\
                                        <tr>\
                        <td colspan="2"><img src="' + feature.properties['RelPath'] + '"></td>\
                    </tr>\
                     </table>';
    layer.bindPopup(popupContent, {maxHeight: 400});
}

function style_tagged_4_0() {
    return {
        pane: 'pane_tagged_4',
        shape: 'square',
        radius: 2.622855438596496,
        opacity: 1,
        color: 'rgba(0,0,0,0.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(3,28,97,1.0)',
        interactive: true,
    }
}
function style_tagged_4_1() {
    return {
        pane: 'pane_tagged_4',
        shape: 'square',
        radius: 6.800000000000017,
        opacity: 1,
        color: 'rgba(97,97,97,1.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(3,28,97,1.0)',
        interactive: true,
    }
}
function style_tagged_4_2() {
    return {
        pane: 'pane_tagged_4',
        shape: 'triangle',
        radius: 2.4285722807017596,
        opacity: 1,
        color: 'rgba(0,0,0,0.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(3,28,97,1.0)',
        interactive: true,
    }
}
function style_tagged_4_3() {
    return {
        pane: 'pane_tagged_4',
        shape: 'triangle',
        radius: 3.4000000000000075,
        opacity: 1,
        color: 'rgba(0,0,0,0.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(3,28,97,1.0)',
        interactive: true,
    }
}
function style_tagged_4_4() {
    return {
        pane: 'pane_tagged_4',
        shape: 'square',
        radius: 0.9714277192982473,
        opacity: 1,
        color: 'rgba(0,0,0,0.0)',
        dashArray: '',
        lineCap: 'butt',
        lineJoin: 'miter',
        weight: 1,
        fill: true,
        fillOpacity: 1,
        fillColor: 'rgba(3,28,97,1.0)',
        interactive: true,
    }
}
map.createPane('pane_tagged_4');
map.getPane('pane_tagged_4').style.zIndex = 404;
map.getPane('pane_tagged_4').style['mix-blend-mode'] = 'normal';
var layer_tagged_4 = new L.geoJson.multiStyle(json_tagged_4, {
    attribution: '',
    interactive: true,
    dataVar: 'json_tagged_4',
    layerName: 'layer_tagged_4',
    pane: 'pane_tagged_4',
    onEachFeature: pop_tagged_4,
    pointToLayers: [function (feature, latlng) {
            var context = {
                feature: feature,
                variables: {}
            };
            return L.shapeMarker(latlng, style_tagged_4_0(feature));
        }, function (feature, latlng) {
            var context = {
                feature: feature,
                variables: {}
            };
            return L.shapeMarker(latlng, style_tagged_4_1(feature));
        }, function (feature, latlng) {
            var context = {
                feature: feature,
                variables: {}
            };
            return L.shapeMarker(latlng, style_tagged_4_2(feature));
        }, function (feature, latlng) {
            var context = {
                feature: feature,
                variables: {}
            };
            return L.shapeMarker(latlng, style_tagged_4_3(feature));
        }, function (feature, latlng) {
            var context = {
                feature: feature,
                variables: {}
            };
            return L.shapeMarker(latlng, style_tagged_4_4(feature));
        },
    ]});
bounds_group.addLayer(layer_tagged_4);
map.addLayer(layer_tagged_4);
var osmGeocoder = new L.Control.Geocoder({
    collapsed: true,
    position: 'topleft',
    text: 'Search',
    title: 'Testing'
}).addTo(map);
document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .className += ' fa fa-search';
document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .title += 'Search for a place';
var baseMaps = {};
L.control.layers(baseMaps, {'<img src="legend/tagged_4.png" /> tagged': layer_tagged_4, '<img src="legend/hillside_3.png" /> hillside': layer_hillside_3, '<img src="legend/HilsideBlngs_2.png" /> HilsideBlngs': layer_HilsideBlngs_2, '<img src="legend/Hillside1_1.png" /> Hillside1': layer_Hillside1_1, "Wikimedia Hike Bike Map": layer_WikimediaHikeBikeMap_0, }).addTo(map);
setBounds();
map.addControl(new L.Control.Search({
    layer: layer_hillside_3,
    initial: false,
    hideMarkerOnCollapse: true,
    propertyName: 'STAND_NO'}));
document.getElementsByClassName('search-button')[0].className +=
        ' fa fa-binoculars';
        </script>
    </body>
</html>
