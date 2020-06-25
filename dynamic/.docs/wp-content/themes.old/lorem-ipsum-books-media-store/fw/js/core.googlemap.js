function lorem_ipsum_books_media_store_googlemap_init(dom_obj, coords) {
	"use strict";
	if (typeof LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'] == 'undefined') lorem_ipsum_books_media_store_googlemap_init_styles();
	LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'].geocoder = '';
	try {
		var id = dom_obj.id;
		LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id] = {
			dom: dom_obj,
			markers: coords.markers,
			geocoder_request: false,
			opt: {
				zoom: coords.zoom,
				center: null,
				scrollwheel: false,
				scaleControl: false,
				disableDefaultUI: false,
				panControl: true,
				zoomControl: true, //zoom
				mapTypeControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				styles: LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_styles'][coords.style ? coords.style : 'default'],
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		};
		
		lorem_ipsum_books_media_store_googlemap_create(id);

	} catch (e) {
		
		dcl(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['strings']['googlemap_not_avail']);

	}
}

function lorem_ipsum_books_media_store_googlemap_create(id) {
	"use strict";

	// Create map
	LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].map = new google.maps.Map(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].dom, LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].opt);

	// Add markers
	for (var i in LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers)
		LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].inited = false;
	lorem_ipsum_books_media_store_googlemap_add_markers(id);
	
	// Add resize listener
	jQuery(window).resize(function() {
		if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].map)
			LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].map.setCenter(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].opt.center);
	});
}

function lorem_ipsum_books_media_store_googlemap_add_markers(id) {
	"use strict";
	for (var i in LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers) {
		
		if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].inited) continue;
		
		if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].latlng == '') {
			
			if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].geocoder_request!==false) continue;
			
			if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'].geocoder == '') LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'].geocoder = new google.maps.Geocoder();
			LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].geocoder_request = i;
			LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'].geocoder.geocode({address: LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].address}, function(results, status) {
				"use strict";
				if (status == google.maps.GeocoderStatus.OK) {
					var idx = LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].geocoder_request;
					if (results[0].geometry.location.lat && results[0].geometry.location.lng) {
						LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = '' + results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng();
					} else {
						LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = results[0].geometry.location.toString().replace(/\(\)/g, '');
					}
					LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].geocoder_request = false;
					setTimeout(function() { 
						lorem_ipsum_books_media_store_googlemap_add_markers(id); 
						}, 200);
				} else
					dcl(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['strings']['geocode_error'] + ' ' + status);
			});
		
		} else {
			
			// Prepare marker object
			var latlngStr = LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].latlng.split(',');
			var markerInit = {
				map: LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].map,
				position: new google.maps.LatLng(latlngStr[0], latlngStr[1]),
				clickable: LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].description!=''
			};
			if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].point) markerInit.icon = LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].point;
			if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].title) markerInit.title = LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].title;
			LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].marker = new google.maps.Marker(markerInit);
			
			// Set Map center
			if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].opt.center == null) {
				LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].opt.center = markerInit.position;
				LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].map.setCenter(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].opt.center);				
			}
			
			// Add description window
			if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].description!='') {
				LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].infowindow = new google.maps.InfoWindow({
					content: LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].description
				});
				google.maps.event.addListener(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].marker, "click", function(e) {
					var latlng = e.latLng.toString().replace("(", '').replace(")", "").replace(" ", "");
					for (var i in LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers) {
						if (latlng == LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].latlng) {
							LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].infowindow.open(
								LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].map,
								LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].marker
							);
							break;
						}
					}
				});
			}
			
			LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'][id].markers[i].inited = true;
		}
	}
}

function lorem_ipsum_books_media_store_googlemap_refresh() {
	"use strict";
	for (var id in LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj']) {
		lorem_ipsum_books_media_store_googlemap_create(id);
	}
}

function lorem_ipsum_books_media_store_googlemap_init_styles() {
	// Init Google map
	LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_init_obj'] = {};
	LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_styles'] = {
		'default': []
	};
	if (window.lorem_ipsum_books_media_store_theme_googlemap_styles!==undefined)
		LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_styles'] = lorem_ipsum_books_media_store_theme_googlemap_styles(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['googlemap_styles']);
}