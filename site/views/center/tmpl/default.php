<?php
// No direct access to this file
defined('_JEXEC') or die; JHtml::_('stylesheet', JUri::root() . 'media/com_kwrecyclingcenter/css/style.css'); JHtml::_('stylesheet', JUri::root() . 'media/com_kwrecyclingcenter/mapplic/mapplic.css');JHtml::_('stylesheet', JUri::root() . 'media/com_kwrecyclingcenter/css/map.css');

?>
<style>
    
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
<?php foreach($this->data as $data){
	
	$latitude=$data->latitude;
	$longitute=$data->longitute;
	$centername=$data->name;
	$road=$data->road;
	$town=$data->town;
	$postal_code=$data->postal_code;
	$address=$road.'<br>'.$postal_code.' '.$data->place;
 ?>
 <h1><?php echo $centername;?></h1>
 <div class="map-container">
						<div class="window-mockup">
							<div class="window-bar"></div>
						</div>
						<!-- Map -->
						<div id="mapplic" style="height: 500px;">
						<div id="gmap" class="" style="height: 100%;" ></div>
						</div></div>
<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=	AIzaSyAXqLvQI6iiutY36PpGEqev9U1aAP0pnfg">		</script>
<script src="<?php echo JUri::root() . 'media/com_kwrecyclingcenter/js/jquery.min.js'?>"></script>
<script src="<?php echo JUri::root() . 'media/com_kwrecyclingcenter/js/maplace.min.js'?>"></script>
    <script>
$(function(){
var map;
var LocA = [{
        lat: '<?php echo $latitude?>',
        lon: '<?php echo $longitute?>',
        title: '<?php echo $centername?>',
        html: '<div id="content"><h4><?php echo $centername?></h4><p><?php echo $address?></p></div> ',
        zoom: 12,
        animation: google.maps.Animation.DROP
    }];
 
 map = new Maplace({
    locations: LocA,
    map_div: '#gmap',
    generate_controls: false,
    start: 0,
styles: {
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
    }
  }).Load();
  
});
    </script>


<ul class="nav nav-tabs center_tabs">
    <li class="active"><a data-toggle="tab" href="#Einzelheiten">Einzelheiten</a></li>
    <li><a data-toggle="tab" href="#Sommeröffnungszeit">Sommeröffnungszeit (Stunden pro Woche)</a></li>
    <li><a data-toggle="tab" href="#Winteröffnungszeit">Winteröffnungszeit (Stunden pro Woche)
</a></li>
  </ul>

  <div class="tab-content center_content">
    <div id="Einzelheiten" class="tab-pane fade in active">
      		<div class="row-fluid">
			<div class="span12">
				<table class="table table-striped">
				<tbody>
		<tr><th>Name</th><td><?php echo $data->name;?></td></tr>
		<tr><th>Zustand</th><td><?php echo $data->federal_state;?></td></tr>
		<tr><th>Bezirke</th><td><?php echo $data->town;?></td></tr>
		<tr><th>Firmen</th><td><?php echo $data->companies;?></td></tr>
		<tr><th>Straße</th><td><?php echo $data->road;?></td></tr>
		<tr><th>Ort</th><td><?php echo $data->postal_code.' '.$data->place;?></td></tr>
		<tr><th>Internet</th><td><?php echo $data->internet;?></td></tr>
		<tr><th>Email</th><td><?php echo $data->email;?></td></tr>
		<tr><th>Bemerkungen</th><td><?php echo $data->remarks;?></td></tr>
	

				</tbody>
				</table>
			
			</div>
		</div>
    </div>
    <div id="Sommeröffnungszeit" class="tab-pane fade">
     		<div class="row-fluid">
			<div class="span12">
				<table class="table table-striped">
				<thead>
				<tr>
				<th>Öffnungszeit</th>
				<th>Von</th>
				<th>Zu</th>
				<th>Dauer</th>
				</tr></thead>
				<tbody>
				<?php
				foreach($this->sumeropeningtime as $sumeropeningtime){
					if($sumeropeningtime->SOTweekday=='1')
					{
					$sumeropeningtime->SOTweekday='Montag';
					}
					if($sumeropeningtime->SOTweekday=='2')
					{
					$sumeropeningtime->SOTweekday='Donnerstag';
					}
					if($sumeropeningtime->SOTweekday=='3')
					{
					$sumeropeningtime->SOTweekday='Mittwoch';
					}
					if($sumeropeningtime->SOTweekday=='4')
					{
					$sumeropeningtime->SOTweekday='Donnerstag';
					}
					if($sumeropeningtime->SOTweekday=='5')
					{
					$sumeropeningtime->SOTweekday='Freitag';
					}
					if($sumeropeningtime->SOTweekday=='6')
					{
					$sumeropeningtime->SOTweekday='Samstag';
					}
					echo '<tr>';
					echo '<td>'.$sumeropeningtime->SOTweekday.'</td>';
					echo '<td>'.$sumeropeningtime->SOTfromtime.'</td>';
					echo '<td>'.$sumeropeningtime->SOTtotime.'</td>';
					echo '<td>'.$sumeropeningtime->SOTduration.'</td>';
					echo '</tr>';
					
				}
				
				?>
				</tbody>
				</table>
			
			</div>
		</div>
    </div>
    <div id="Winteröffnungszeit" class="tab-pane fade">
      		<div class="row-fluid">
			<div class="span12">
				<table class="table table-striped">
				<thead>
				<tr>
				<th>Öffnungszeit</th>
				<th>Von</th>
				<th>Zu</th>
				<th>Dauer</th>
				</tr></thead>
				<tbody>
				<?php
				foreach($this->winteropeningtime as $winteropeningtime){
					if($winteropeningtime->WOTweekday=='1')
					{
					$winteropeningtime->WOTweekday='Montag';
					}
					if($winteropeningtime->WOTweekday=='2')
					{
					$winteropeningtime->WOTweekday='Donnerstag';
					}
					if($winteropeningtime->WOTweekday=='3')
					{
					$winteropeningtime->WOTweekday='Mittwoch';
					}
					if($winteropeningtime->WOTweekday=='4')
					{
					$winteropeningtime->WOTweekday='Donnerstag';
					}
					if($winteropeningtime->WOTweekday=='5')
					{
					$winteropeningtime->WOTweekday='Freitag';
					}
					if($winteropeningtime->WOTweekday=='6')
					{
					$winteropeningtime->WOTweekday='Samstag';
					}
					echo '<tr>';
					echo '<td>'.$winteropeningtime->WOTweekday.'</td>';
					echo '<td>'.$winteropeningtime->WOTfromtime.'</td>';
					echo '<td>'.$winteropeningtime->WOTtotime.'</td>';
					echo '<td>'.$winteropeningtime->WOTduration.'</td>';
					echo '</tr>';
					
				}
				
				?>
				</tbody>
				</table>
			
			</div>
		</div>
    </div>
  </div>

		<?php }?>