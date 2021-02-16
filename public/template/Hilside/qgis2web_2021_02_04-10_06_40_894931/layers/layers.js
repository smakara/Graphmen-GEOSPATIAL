ol.proj.proj4.register(proj4);
ol.proj.get("EPSG:32735").setExtent([665241.809117, 7764267.680868, 670759.968082, 7767664.387791]);
var wms_layers = [];


        var lyr_WikimediaHikeBikeMap_0 = new ol.layer.Tile({
            'title': 'Wikimedia Hike Bike Map',
            'type': 'base',
            'opacity': 1.000000,
            
            
            source: new ol.source.XYZ({
    attributions: ' ',
                url: 'http://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png'
            })
        });
var format_Hillside1_1 = new ol.format.GeoJSON();
var features_Hillside1_1 = format_Hillside1_1.readFeatures(json_Hillside1_1, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32735'});
var jsonSource_Hillside1_1 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_Hillside1_1.addFeatures(features_Hillside1_1);
var lyr_Hillside1_1 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_Hillside1_1, 
                style: style_Hillside1_1,
                interactive: true,
                title: '<img src="styles/legend/Hillside1_1.png" /> Hillside1'
            });
var format_HilsideBlngs_2 = new ol.format.GeoJSON();
var features_HilsideBlngs_2 = format_HilsideBlngs_2.readFeatures(json_HilsideBlngs_2, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32735'});
var jsonSource_HilsideBlngs_2 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_HilsideBlngs_2.addFeatures(features_HilsideBlngs_2);
var lyr_HilsideBlngs_2 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_HilsideBlngs_2, 
                style: style_HilsideBlngs_2,
                interactive: true,
                title: '<img src="styles/legend/HilsideBlngs_2.png" /> HilsideBlngs'
            });
var format_hillside_3 = new ol.format.GeoJSON();
var features_hillside_3 = format_hillside_3.readFeatures(json_hillside_3, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32735'});
var jsonSource_hillside_3 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_hillside_3.addFeatures(features_hillside_3);
var lyr_hillside_3 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_hillside_3, 
                style: style_hillside_3,
                interactive: true,
                title: '<img src="styles/legend/hillside_3.png" /> hillside'
            });
var format_tagged_4 = new ol.format.GeoJSON();
var features_tagged_4 = format_tagged_4.readFeatures(json_tagged_4, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:32735'});
var jsonSource_tagged_4 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_tagged_4.addFeatures(features_tagged_4);
var lyr_tagged_4 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_tagged_4, 
                style: style_tagged_4,
                interactive: true,
                title: '<img src="styles/legend/tagged_4.png" /> tagged'
            });

lyr_WikimediaHikeBikeMap_0.setVisible(true);lyr_Hillside1_1.setVisible(true);lyr_HilsideBlngs_2.setVisible(true);lyr_hillside_3.setVisible(true);lyr_tagged_4.setVisible(true);
var layersList = [lyr_WikimediaHikeBikeMap_0,lyr_Hillside1_1,lyr_HilsideBlngs_2,lyr_hillside_3,lyr_tagged_4];
lyr_Hillside1_1.set('fieldAliases', {'Id': 'Id', 'STAND_NO': 'STAND_NO', 'NAME': 'NAME', 'LINK_ID': 'LINK_ID', 'GP_NO': 'GP_NO', 'DEV_LEVEL': 'DEV_LEVEL', 'USE': 'USE', 'SUBURB': 'SUBURB', 'HOUSE_PLAN': 'HOUSE_PLAN', 'OWN_NAME': 'OWN_NAME', 'SURNAME': 'SURNAME', 'ID_NO': 'ID_NO', 'ADDRESS': 'ADDRESS', 'WAT_SERV': 'WAT_SERV', 'SEW_SERV': 'SEW_SERV', 'METERED': 'METERED', 'MET_NO': 'MET_NO', 'ACCURACY': 'ACCURACY', 'PLAN_NO': 'PLAN_NO', });
lyr_HilsideBlngs_2.set('fieldAliases', {'osm_id': 'osm_id', 'name': 'name', 'type': 'type', });
lyr_hillside_3.set('fieldAliases', {'STAND_NO': 'STAND_NO', 'NAME': 'NAME', 'DEV_LEVEL': 'DEV_LEVEL', 'USE': 'USE', 'SUBURB': 'SUBURB', 'HOUSE_PLAN': 'HOUSE_PLAN', 'OWN_NAME': 'OWN_NAME', 'SURNAME': 'SURNAME', 'ID_NO': 'ID_NO', 'ADDRESS': 'ADDRESS', 'METERED': 'METERED', 'Improv': 'Improv', 'LandSize': 'LandSize', 'LandValue': 'LandValue', 'ImproValue': 'ImproValue', 'WatService': 'WatService', 'SewService': 'SewService', 'Contact': 'Contact', });
lyr_tagged_4.set('fieldAliases', {'ID': 'ID', 'Name': 'Name', 'Date': 'Date', 'Time': 'Time', 'Lon': 'Lon', 'Lat': 'Lat', 'Altitude': 'Altitude', 'North': 'North', 'Azimuth': 'Azimuth', 'Camera Mak': 'Camera Mak', 'Camera Mod': 'Camera Mod', 'Title': 'Title', 'Comment': 'Comment', 'Path': 'Path', 'RelPath': 'RelPath', 'Timestamp': 'Timestamp', });
lyr_Hillside1_1.set('fieldImages', {'Id': 'Range', 'STAND_NO': 'Range', 'NAME': 'TextEdit', 'LINK_ID': 'Range', 'GP_NO': 'TextEdit', 'DEV_LEVEL': 'TextEdit', 'USE': 'TextEdit', 'SUBURB': 'TextEdit', 'HOUSE_PLAN': 'TextEdit', 'OWN_NAME': 'TextEdit', 'SURNAME': 'TextEdit', 'ID_NO': 'TextEdit', 'ADDRESS': 'TextEdit', 'WAT_SERV': 'TextEdit', 'SEW_SERV': 'TextEdit', 'METERED': 'TextEdit', 'MET_NO': 'TextEdit', 'ACCURACY': 'TextEdit', 'PLAN_NO': 'TextEdit', });
lyr_HilsideBlngs_2.set('fieldImages', {'osm_id': 'TextEdit', 'name': 'TextEdit', 'type': 'TextEdit', });
lyr_hillside_3.set('fieldImages', {'STAND_NO': 'Range', 'NAME': 'TextEdit', 'DEV_LEVEL': 'TextEdit', 'USE': 'TextEdit', 'SUBURB': 'TextEdit', 'HOUSE_PLAN': 'TextEdit', 'OWN_NAME': 'TextEdit', 'SURNAME': 'TextEdit', 'ID_NO': 'TextEdit', 'ADDRESS': 'TextEdit', 'METERED': 'TextEdit', 'Improv': '', 'LandSize': '', 'LandValue': '', 'ImproValue': '', 'WatService': '', 'SewService': '', 'Contact': '', });
lyr_tagged_4.set('fieldImages', {'ID': 'Hidden', 'Name': 'TextEdit', 'Date': 'DateTime', 'Time': 'DateTime', 'Lon': 'TextEdit', 'Lat': 'TextEdit', 'Altitude': 'TextEdit', 'North': 'TextEdit', 'Azimuth': 'TextEdit', 'Camera Mak': 'TextEdit', 'Camera Mod': 'TextEdit', 'Title': 'TextEdit', 'Comment': 'TextEdit', 'Path': 'TextEdit', 'RelPath': 'TextEdit', 'Timestamp': 'TextEdit', });
lyr_Hillside1_1.set('fieldLabels', {'Id': 'no label', 'STAND_NO': 'inline label', 'NAME': 'inline label', 'LINK_ID': 'no label', 'GP_NO': 'inline label', 'DEV_LEVEL': 'inline label', 'USE': 'inline label', 'SUBURB': 'inline label', 'HOUSE_PLAN': 'inline label', 'OWN_NAME': 'inline label', 'SURNAME': 'inline label', 'ID_NO': 'no label', 'ADDRESS': 'no label', 'WAT_SERV': 'no label', 'SEW_SERV': 'no label', 'METERED': 'no label', 'MET_NO': 'no label', 'ACCURACY': 'no label', 'PLAN_NO': 'no label', });
lyr_HilsideBlngs_2.set('fieldLabels', {'osm_id': 'no label', 'name': 'no label', 'type': 'no label', });
lyr_hillside_3.set('fieldLabels', {'STAND_NO': 'inline label', 'NAME': 'inline label', 'DEV_LEVEL': 'inline label', 'USE': 'inline label', 'SUBURB': 'inline label', 'HOUSE_PLAN': 'inline label', 'OWN_NAME': 'inline label', 'SURNAME': 'inline label', 'ID_NO': 'inline label', 'ADDRESS': 'inline label', 'METERED': 'inline label', 'Improv': 'inline label', 'LandSize': 'inline label', 'LandValue': 'inline label', 'ImproValue': 'inline label', 'WatService': 'inline label', 'SewService': 'inline label', 'Contact': 'inline label', });
lyr_tagged_4.set('fieldLabels', {'Name': 'no label', 'Date': 'no label', 'Time': 'no label', 'Lon': 'no label', 'Lat': 'no label', 'Altitude': 'no label', 'North': 'no label', 'Azimuth': 'no label', 'Camera Mak': 'no label', 'Camera Mod': 'no label', 'Title': 'no label', 'Comment': 'no label', 'Path': 'no label', 'RelPath': 'no label', 'Timestamp': 'no label', });
lyr_tagged_4.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});