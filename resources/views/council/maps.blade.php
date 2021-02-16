<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="{{asset('template/hilcrest/css/leaflet.css')}}"><link rel="stylesheet" href="{{asset('template/hilcrest/css/L.Control.Locate.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/hilcrest/css/qgis2web.css')}}"><link rel="stylesheet" href="{{asset('template/hilcrest/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/hilcrest/css/leaflet-search.css')}}">
        <link rel="stylesheet" href="{{asset('template/hilcrest/css/leaflet-control-geocoder.Geocoder.css')}}">
        <link rel="stylesheet" href="{{asset('template/hilcrest/css/leaflet-measure.css')}}">
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
        <script src="{{asset('template/hilcrest/js/qgis2web_expressions.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/L.Control.Locate.min.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet.rotatedMarker.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet.pattern.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet-hash.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/Autolinker.min.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/rbush.min.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/labelgun.min.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/labels.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet-control-geocoder.Geocoder.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet-measure.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/proj4.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/proj4leaflet.js')}}"></script>
        <script src="{{asset('template/hilcrest/js/leaflet-search.js')}}"></script>
        <script src="{{asset('template/hilcrest/data/Hilcrest1_1.js')}}"></script>
        <script src="{{asset('template/hilcrest/data/HilcrestBlngs_2.js')}}"></script>
        <script src="{{asset('template/hilcrest/data/hilcrest_3.js')}}"></script>
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
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[-20.199145475135957,28.576784123969855],[-20.18020155292901,28.609070139434337]]);
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
        map.createPane('pane_GoogleSatelliteHybrid_0');
        map.getPane('pane_GoogleSatelliteHybrid_0').style.zIndex = 400;
        var layer_GoogleSatelliteHybrid_0 = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            pane: 'pane_GoogleSatelliteHybrid_0',
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_GoogleSatelliteHybrid_0;
        map.addLayer(layer_GoogleSatelliteHybrid_0);
        function pop_Hilcrest1_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
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
                        <td colspan="2">' + (feature.properties['SUBURB'] !== null ? autolinker.link(feature.properties['SUBURB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['HSE_PLAN'] !== null ? autolinker.link(feature.properties['HSE_PLAN'].toLocaleString()) : '') + '</td>\
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

        function style_Hilcrest1_1_0() {
            return {
                pane: 'pane_Hilcrest1_1',
                opacity: 1,
                color: 'rgba(206,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 2.0, 
                fillOpacity: 0,
                interactive: true,
            }
        }
        map.createPane('pane_Hilcrest1_1');
        map.getPane('pane_Hilcrest1_1').style.zIndex = 401;
        map.getPane('pane_Hilcrest1_1').style['mix-blend-mode'] = 'normal';
        var layer_Hilcrest1_1 = new L.geoJson(json_Hilcrest1_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_Hilcrest1_1',
            layerName: 'layer_Hilcrest1_1',
            pane: 'pane_Hilcrest1_1',
            onEachFeature: pop_Hilcrest1_1,
            style: style_Hilcrest1_1_0,
        });
        bounds_group.addLayer(layer_Hilcrest1_1);
        map.addLayer(layer_Hilcrest1_1);
        function pop_HilcrestBlngs_2(feature, layer) {
            layer.on({
                mouseout: function(e) {
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
                        <th scope="row">name</th>\
                        <td>' + (feature.properties['name'] !== null ? autolinker.link(feature.properties['name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['type'] !== null ? autolinker.link(feature.properties['type'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_HilcrestBlngs_2_0() {
            return {
                pane: 'pane_HilcrestBlngs_2',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(231,113,72,1.0)',
                interactive: true,
            }
        }
        map.createPane('pane_HilcrestBlngs_2');
        map.getPane('pane_HilcrestBlngs_2').style.zIndex = 402;
        map.getPane('pane_HilcrestBlngs_2').style['mix-blend-mode'] = 'normal';
        var layer_HilcrestBlngs_2 = new L.geoJson(json_HilcrestBlngs_2, {
            attribution: '',
            interactive: true,
            dataVar: 'json_HilcrestBlngs_2',
            layerName: 'layer_HilcrestBlngs_2',
            pane: 'pane_HilcrestBlngs_2',
            onEachFeature: pop_HilcrestBlngs_2,
            style: style_HilcrestBlngs_2_0,
        });
        bounds_group.addLayer(layer_HilcrestBlngs_2);
        map.addLayer(layer_HilcrestBlngs_2);
        function pop_hilcrest_3(feature, layer) {
            layer.on({
                mouseout: function(e) {
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
                        <th scope="row">USE</th>\
                        <td>' + (feature.properties['USE'] !== null ? autolinker.link(feature.properties['USE'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SUBURB</th>\
                        <td>' + (feature.properties['SUBURB'] !== null ? autolinker.link(feature.properties['SUBURB'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">HSE_PLAN</th>\
                        <td>' + (feature.properties['HSE_PLAN'] !== null ? autolinker.link(feature.properties['HSE_PLAN'].toLocaleString()) : '') + '</td>\
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
                        <th scope="row">Contact</th>\
                        <td>' + (feature.properties['Contact'] !== null ? autolinker.link(feature.properties['Contact'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">DevLevel</th>\
                        <td>' + (feature.properties['DevLevel'] !== null ? autolinker.link(feature.properties['DevLevel'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">SewService</th>\
                        <td>' + (feature.properties['SewService'] !== null ? autolinker.link(feature.properties['SewService'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">WatService</th>\
                        <td>' + (feature.properties['WatService'] !== null ? autolinker.link(feature.properties['WatService'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">IDNumber</th>\
                        <td>' + (feature.properties['IDNumber'] !== null ? autolinker.link(feature.properties['IDNumber'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_hilcrest_3_0() {
            return {
                pane: 'pane_hilcrest_3',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(195,105,46,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,158,23,1.0)',
                interactive: true,
            }
        }
        map.createPane('pane_hilcrest_3');
        map.getPane('pane_hilcrest_3').style.zIndex = 403;
        map.getPane('pane_hilcrest_3').style['mix-blend-mode'] = 'normal';
        var layer_hilcrest_3 = new L.geoJson(json_hilcrest_3, {
            attribution: '',
            interactive: true,
            dataVar: 'json_hilcrest_3',
            layerName: 'layer_hilcrest_3',
            pane: 'pane_hilcrest_3',
            onEachFeature: pop_hilcrest_3,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_hilcrest_3_0(feature));
            },
        });
        bounds_group.addLayer(layer_hilcrest_3);
        map.addLayer(layer_hilcrest_3);
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
        L.control.layers(baseMaps,{'<img src="legend/hilcrest_3.png" /> hilcrest': layer_hilcrest_3,'<img src="legend/HilcrestBlngs_2.png" /> HilcrestBlngs': layer_HilcrestBlngs_2,'<img src="legend/Hilcrest1_1.png" /> Hilcrest1': layer_Hilcrest1_1,"Google Satellite Hybrid": layer_GoogleSatelliteHybrid_0,}).addTo(map);
        setBounds();
        map.addControl(new L.Control.Search({
            layer: layer_hilcrest_3,
            initial: false,
            hideMarkerOnCollapse: true,
            propertyName: 'STAND_NO'}));
        document.getElementsByClassName('search-button')[0].className +=
         ' fa fa-binoculars';
        </script>
    </body>
</html>
