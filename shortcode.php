// ___________Map Shortcode by Matthew Davis, Northwest Media. Map can be seen live here: https://emerge.inlandcellular.com/home-internet/___________________
final class bbChildThemeDeluxeShortcodes {
	static public function init() {
		add_shortcode( 'nwm_map', array( 'bbChildThemeDeluxeShortcodes', 'nwm_map') );
	}

	/**
	 * Leaflet Map Shortcode
	 */
	function nwm_map($atts) {
		$atts = shortcode_atts( array(
			'center' => '46.403972, -117.007808',
			'zoom' => '9'
		), $atts );

		ob_start();
		?>
		<div id="emergemap"></div>
		
		<style>
            #emergemap {
                height: 820px;
                z-index: 98;
            }
			@media only screen and (max-width: 600px) {
				#emergemap {
					height: 450px;
				}
			}
        </style>
        <script type="text/javascript" src="https://emerge.inlandcellular.com/wp-content/themes/inland-cellular/main.js"></script>
		<script>
			var $ = jQuery;
		    $( document ).ready(function() {
                var mymap = L.map('emergemap').setView([<?php echo $atts['center']; ?>], <?php echo $atts['zoom']; ?>);
                
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    				maxZoom: 18,
    				tileSize: 512,
				    zoomOffset: -1,
    				id: 'mapbox/dark-v10',
    				accessToken: 'pk.eyJ1IjoibWF0dGhld2FseW5kIiwiYSI6ImNqdnNvcWQ3cDM4MWY0M3FvdGc1YnF2OXAifQ.1GIr-xDXI-8SPEuZMVB_ug'
    			}).addTo(mymap);
				
				$('.emerge-button a').click(function($e) {
					$e.preventDefault();
				});
				
//				Null value for properties emerge_home page
                var emerge_home = L.polygon([]);

//				Function to style GeoJSON objects. Make sure to call GeoJSON objects using the ', {style: mapStyle}' addition in the call.
				function mapStyle(feature) {
					return {
						color: '#68BD45',
						dashArray: '',
						fillOpacity: 0.4
					};
				}
				
// 				Master function to add GeoJSON objects
				function geoMapFunc(townName, jsName, locationUrl)
				{
// 					Assign the GeoJSON to a variable and add it to the map, while styling it on its way in.
					var townNameX = L.geoJson(jsName, {style: mapStyle}).addTo(mymap);
// 					Add a classname to the object, you'll need it to correctly add text to the Tooltip
					townNameX.className = townName;
// 					Add Tooltip with the location name on hover 
					townNameX.on('mouseover', function(){townNameX.bindTooltip(townNameX.className + "<br> <sub>Click for more information</sub>"); townNameX.openTooltip(); });
// 					Open the location's URL when object is clicked
					townNameX.on('click', function() {console.log('clicked'); window.location = locationUrl;});
				};
				
// 	List of locations, based on the GeoJSON file called on this page main.js 
// 	To add a location: Grab the KML, convert it to GeoJSON using http://ogre.adc4gis.com/. Then add it as a JS variable in the main.js file. Add it to this block, following the pattern you see: Label, JS variable name, target page URL. Once done, save your work and test.
				geoMapFunc('Grangeville', grangeville, 'https://emerge.inlandcellular.com/grangeville-internet/');
				geoMapFunc('Cottonwood', cottonwood, 'https://emerge.inlandcellular.com/grangeville-internet/');
				geoMapFunc('Greencreek', greencreek, 'https://emerge.inlandcellular.com/grangeville-internet/');
				geoMapFunc('Nez Perce', nezPerce, 'https://emerge.inlandcellular.com/grangeville-internet/');
				geoMapFunc('Harpster', harpster, 'https://emerge.inlandcellular.com/grangeville-internet/');
				geoMapFunc('Clearwater', clearwater, 'https://emerge.inlandcellular.com/grangeville-internet/');
				geoMapFunc('Rosalia', rosalia, 'https://emerge.inlandcellular.com/rosalia-internet/');
				geoMapFunc('Palouse', palouse, 'https://emerge.inlandcellular.com/palouse-internet/');
				geoMapFunc('Canyon View Apartments', canyonView, 'https://emerge.inlandcellular.com/lewiston-canyon-view-internet/');
				geoMapFunc('Lilly Street Apartments', lillyStreet, 'https://emerge.inlandcellular.com/lilly-street-apartments-internet/');
				geoMapFunc('Barley Flats - Moscow Condos', barleyFlats, 'https://emerge.inlandcellular.com/barley-flats-condos-internet/');
				geoMapFunc('Seven Bays', sevenBays, 'https://emerge.inlandcellular.com/wilbur-internet/');
				geoMapFunc('Dayton', dayton, 'https://emerge.inlandcellular.com/dayton-internet/');
				geoMapFunc('Elk River', elkRiver, 'https://emerge.inlandcellular.com/elk-river-internet/');
				geoMapFunc('Pierce', pierce, 'https://emerge.inlandcellular.com/pierce-internet/');
				geoMapFunc('White Bird', whiteBird, 'https://emerge.inlandcellular.com/white-bird-internet/');
				geoMapFunc('Wilbur', wilbur, 'https://emerge.inlandcellular.com/wilbur-internet/');
				geoMapFunc('Creston', creston, 'https://emerge.inlandcellular.com/wilbur-internet/');
				geoMapFunc('Badger Lake', badgerLake, 'https://emerge.inlandcellular.com/badger-lake-internet/');
				geoMapFunc('Republic', republic, 'https://emerge.inlandcellular.com/republic-internet/');
				geoMapFunc('Curlew Lake', curlewLake, 'https://emerge.inlandcellular.com/republic-internet/');
				geoMapFunc('Curlew', curlew, 'https://emerge.inlandcellular.com/republic-internet/');
				geoMapFunc('Slate Creek', slateCreek, 'https://emerge.inlandcellular.com/white-bird-internet/');
				geoMapFunc('Bovill', bovill, 'https://emerge.inlandcellular.com/bovill-internet/');
				geoMapFunc('Pomeroy', pomeroy, 'https://emerge.inlandcellular.com/pomeroy-internet/');
				geoMapFunc('Keller Ferry', kellerFerry, 'https://emerge.inlandcellular.com/wilbur-internet/');
				
// 				Function to fly viewport to given coords when page button is clicked
				function zoomMapFunc(imageCenter, zoomLevel)
				{					
				  mymap.flyTo(imageCenter, zoomLevel);
				};
				
// 				Block of button functions. Don't know a shorter way to do this. - MD
				$("#dayton-button").on("click", function() {
					zoomMapFunc([46.319230, -117.978755], 13);
				});
				$("#rosalia-button").on("click", function() {
					zoomMapFunc([47.236498, -117.369214], 13);
				});
				$("#garfield-button").on("click", function() {
					zoomMapFunc([47.008283, -117.142740], 14);
				});
				$("#palouse-button").on("click", function() {
					zoomMapFunc([46.911311, -117.074359], 14);
				});
				$("#tekoa-button").on("click", function() {
					zoomMapFunc([47.225528, -117.074264], 14);
				});
				$("#canyon-view-button").on("click", function() {
					zoomMapFunc([46.392008, -117.007774], 14);
				});
				$("#lilly-street-button").on("click", function() {
					zoomMapFunc([46.734261, -117.006157], 15);
				});
				$("#barley-flats-button").on("click", function() {
					zoomMapFunc([46.734261, -117.006157], 15);
				});
				$("#oaksdale-button").on("click", function() {
					zoomMapFunc([47.130160, -117.245746], 14);
				});
				$("#pomeroy-button").on("click", function() {
					zoomMapFunc([46.475680, -117.578350], 13);
				});
				$("#seven-bays-button").on("click", function() {
					zoomMapFunc([47.814467, -118.526017], 14);
				});
				$("#elk-river-button").on("click", function() {
					zoomMapFunc([46.783135, -116.180291], 14);
				});
				$("#grangeville-button").on("click", function() {
					zoomMapFunc([45.961990, -116.260033], 10);
				});
				$("#pierce-button").on("click", function() {
					zoomMapFunc([46.492843, -115.799134], 14);
				});
				$("#white-bird-button").on("click", function() {
					zoomMapFunc([45.762989, -116.299924], 12);
				});
				$("#wilbur-button").on("click", function() {
					zoomMapFunc([47.814467, -118.526017], 11);
				});
				$("#badger-lake-button").on("click", function() {
					zoomMapFunc([47.346581, -117.634192], 14);
				});
				$("#republic-button").on("click", function() {
					zoomMapFunc([48.647203, -118.734790], 14);
				});
				$("#curlew-lake-button").on("click", function() {
					zoomMapFunc([48.790208, -118.631136], 11);
				});
				$("#slate-creek-button").on("click", function() {
					zoomMapFunc([45.639004, -116.281510], 12);
				});
				$("#bovill-button").on("click", function() {
					zoomMapFunc([46.858477, -116.395430], 12);
				});
		    });
        </script>

        
		<?php

		return ob_get_clean();

	}
}
bbChildThemeDeluxeShortcodes::init();
