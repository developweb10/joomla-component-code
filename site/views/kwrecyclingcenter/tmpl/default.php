<?php 
// No direct access


defined('_JEXEC') or die; JHtml::_('stylesheet', JUri::root() . 'media/com_kwrecyclingcenter/css/style.css'); JHtml::_('stylesheet', JUri::root() . 'media/com_kwrecyclingcenter/mapplic/mapplic.css');JHtml::_('stylesheet', JUri::root() . 'media/com_kwrecyclingcenter/css/map.css');


?> <style>
    
      #map {
        height: 100%;
	
		margin-bottom:10px;
      }
#menu {
  width: 300px;
  margin: 15px auto;
  text-align:center;
}
#menu a.loc_link {
  background: #0f89cf;
  color: #fff;
  margin-right: 10px;
  display: inline-block;
  margin-bottom:10px;
  padding: 5px;
  border-radius: 3px;
  text-decoration: none;
}
#menu span#tool_tip {
  display: inline-block;
  margin-top: 10px;
}
      
    </style>

<div class="map-container"><div class="recycling_powered"><label>Powered By</label><img src="<?php echo JUri::root() . 'media/com_kwrecyclingcenter/images/recycling-center.png'?>"> </div>
						<div class="window-mockup">
							<div class="window-bar"></div>
						</div>
						<!-- Map -->
						<div id="mapplic" style="height: 500px;">
						<div id="gmap" class="mapplic-container" style="height: 100%;" ></div>
						<div class="mapplic-sidebar">
						<form class="mapplic-search-form"><input type="text" spellcheck="false" placeholder="Suche..." class="mapplic-search-input"><button type="button" class="mapplic-search-clear"></button></form>
						<div class="mapplic-list-container">
					<ol class="mapplic-list">
<?php foreach($this->getStates as $state){
	$id =  $state->federal_state;
    $id = str_replace(' ', '-', $id);
?>
	<li class="mapplic-list-category mapplic-parentlist-shown" data-category="<?php echo $id;?>"><a href="#" title="<?php echo $state->federal_state;?>" style="background-color: rgb(109, 23, 72);"><span class="mapplic-list-count parentcount"></span><?php echo $state->federal_state;?></a>
	<ol style="border-color: rgb(109, 23, 72); display: none;" class="sub_ol">
	<?php foreach($this->gettowns as $town){
	if($state->federal_state==$town->federal_state)
	{
	?>
	
	<li class="mapplic-list-category mapplic-sublist-shown" data-subcategory="Düsseldorf">
	<a href="#" title="<?php echo $town->town;?>" style="background-color: rgb(145, 53, 105);">
	<span class="mapplic-list-count subcount"></span>
	<?php echo $town->town;?></a>
	<ol style="border-color: red; display: none;" class="center_ol">
	<?php  foreach($this->getCenters as $center){
	if(($state->federal_state==$town->federal_state)&&($town->town==$center->town))
	 {
	?>
	<li class="mapplic-list-location mapplic-list-shown loc_link"  data-long="<?php echo $center->longitute;?>" data-lat="<?php echo $center->latitude;?>" data-title="<?php echo $center->name ?>" data-html="<?php echo "<h4><a href='".JURI::root()."index.php/?option=com_kwrecyclingcenter&view=center&id=".$center->id."' >".$center->name.'</a></h4>'.$center->road.'<br>'.$center->postal_code.' '.$center->place."<br/>";?>">
	<a href="#"><h4><?php echo $center->name;?></h4><span></span></a></li>
	<?php } } 
	?>
	</ol>
	</li>
	<?php 
	}
	}?></ol></li>
<?php }
?>
</ol>
<p class="mapplic-not-found">
Nichts gefunden. Bitte versuchen Sie es mit einer anderen Suche.</p>
						</div>
					</div></div></div>

		
<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=	AIzaSyAXqLvQI6iiutY36PpGEqev9U1aAP0pnfg">		</script>
<script src="<?php echo JUri::root() . 'media/com_kwrecyclingcenter/js/jquery.min.js'?>"></script>
<script src="<?php echo JUri::root() . 'media/com_kwrecyclingcenter/js/maplace.min.js'?>"></script>
    <script>

 function search(keyword) {

				if (keyword)
				{	
			$('.mapplic-search-clear').fadeIn(100);
				}

				else 
				{
				$('.mapplic-search-clear').fadeOut(100);	
				}
					$('.mapplic-list li').each(function(e) {
					if($(this).find("ol").length == 0)
					{
					}
					else
					{
					if ($(this).text().search(new RegExp(keyword, "i")) < 0) {
						
						$(this).removeClass('mapplic-list-shown');

						$(this).slideUp(200);

					} else {

						$(this).addClass('mapplic-list-shown');
						$(this).show();
					}
					}

				});

					$('.mapplic-list > li ').each(function() {

					var count = $('.mapplic-list-location', this).length;

					$('.parentcount', this).text(count);

				});

				$('.mapplic-list > li ol li').each(function() {

					var count = $('.mapplic-list-shown', this).length;

					$('.mapplic-list-count', this).text(count);

				});
				// Show not-found text

				if ($('.mapplic-list > li.mapplic-list-shown').length > 0) 
				{
					$('.mapplic-not-found').fadeOut(200);
				}
				else 
				{
					$('.mapplic-not-found').fadeIn(200);
				}
			}

$(function(){
$('.mapplic-parentlist-shown').each(function(){
	var count=$(this).find('.mapplic-list-location').length;
$(this).find('.parentcount').text(count);	
});
$('.mapplic-sublist-shown').each(function(){
	var count=$(this).find('.mapplic-list-location').length;
$(this).find('.subcount').text(count);	
});

var map;
var styles;
styles={
        'Greyscale': [{
        "featureType": "all",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "weight": "2.00"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#9c9c9c"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#eeeeee"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#7b7b7b"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#c8d7d4"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#070707"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    }]
    };
var LocA = [{
        lat: 51.165691,
        lon: 10.451526,
        zoom: 6,		show_markers: false,		visible: false,
        animation: google.maps.Animation.DROP
    }];
 
 map = new Maplace({
    locations: LocA,
    map_div: '#gmap',
    generate_controls: false,
    start: 0,
	show_markers: true,
	
styles: styles
  }).Load();
  

$(".loc_link").click(function(e){
	e.preventDefault();
	e.stopPropagation();
  var newLoc = [{
        lat: $(this).data('lat'),
        lon: $(this).data('long'),
        title: $(this).data('title'),
        html: $(this).data('html'),
        zoom: 12,
        //animation:google.maps.Animation.DROP
    }];
  map.SetLocations(newLoc).Load();
  
  map.ViewOnMap($(this).index()+1);
}); 
	$(".mapplic-list li").on('click', function(e) {

							e.preventDefault();
							e.stopPropagation();

							$(this).toggleClass('mapplic-opened');

							$(this).find('.sub_ol').slideToggle(200);

						});
							$(".mapplic-parentlist-shown ol .mapplic-sublist-shown").on('click', function(ev) {
							ev.stopPropagation();
							ev.preventDefault();
							$(this).toggleClass('mapplic-opened');
							$(this).find('.center_ol li').each(function(index){
							  var newLoc = [{
									lat: $(this).data('lat'),
									lon: $(this).data('long'),									html: $(this).data('html'),
									zoom: 9,
									animation:google.maps.Animation.DROP
								}];
								if(index=='0')
								{
							 map.SetLocations(newLoc).Load();
							 map.ViewOnMap($(this).index()+1);							map.CloseInfoWindow();
								}
								else
								{
							  map.AddLocations(newLoc).Load();
							  map.ViewOnMap($(this).index()+1);							  map.CloseInfoWindow();
								}
							});
					

							$(this).find('.center_ol').slideToggle(200);

						});
						$('.mapplic-search-input').keyup(function() {
						console.log('keyup');
						var keyword = $(this).val();

						search(keyword);

					});
					$('.mapplic-search-clear').click(function() {

						$('.mapplic-search-input').val('');

						$('.mapplic-search-input').keyup();

					})
});
    </script>
  
        