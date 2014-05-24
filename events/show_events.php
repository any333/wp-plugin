<?php

add_action( 'init', 'show_calendar' );
function show_calendar() {
	add_shortcode( 'eventts', 'calendar' );
}

function calendar() {

	$args = array(
		'numberposts' => -1,
		'post_type' => 'eventbase',
	);

	$all_posts = get_posts($args);
	$generated_posts = array();
	
	
	
	foreach ($all_posts as $single_post) {
		
		$get_dates=get_post_custom_values('date', $single_post->ID);		
		foreach($get_dates as $date_value ) {
			
			$permalink_title = '<a href="' . get_permalink( $single_post->ID ) . '" title="' . get_the_title( $single_post->ID ) .'">
					' . get_the_title( $single_post->ID ) .'</a>';
			
				
			if ( ! isset( $generated_posts[$date_value] ) ) {
				$generated_posts[$date_value] = array( $permalink_title );
			} else {
				$generated_posts[$date_value] = array_merge( $generated_posts[$date_value], array( $permalink_title ) );
			}
			
		}
		
	}

	date_default_timezone_set("Europe/Sofia");
	$monthNames = Array("January", "February", "March", "April",
						"May", "June", "July", "August", "September", 
						"October", "November", "December");

	if ( !isset( $_REQUEST["month"] ) ) $_REQUEST["month"] = date("n" );
	if ( !isset( $_REQUEST["year"] ) ) $_REQUEST["year"] = date("Y" );

	$current_month = (int) $_REQUEST["month"];
	$current_year = (int) $_REQUEST["year"];
	if ($current_year == 0)
		$current_year = date('Y');
	
	$previous_year = $current_year;
	$next_year = $current_year;
	$previous_month = $current_month - 1;
	$next_month = $current_month + 1;

	if ( $previous_month == 0 ) {
		$previous_month = 12;
		$previous_year = $current_year - 1;
	}

	if ( $next_month == 13 ) {
		$next_month = 1;
		$next_year = $current_year + 1;

	}
	?>
	<table width="200">
		<tr align="center">
			<td bgcolor="white" >
			<table width="100%" border="0" cellspacing="" cellpadding="0">
				<tr>
					<td width="50%" align="left"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $previous_month . "&year=" . $previous_year; ?>"style="color: black">Previous</a></td>
					<td width="1%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>"style="color: black">Next</a></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td align="center">
			<table width="100%" border="0" cellpadding="2" cellspacing="2">
				<tr align="center">
					<td colspan="7" bgcolor="green" style="color: white"><strong><?php echo 'The time now:'.' '. date('d/m/Y h:i a'). '</br>'.$monthNames[$current_month-1].' '.$current_year; ?></strong></td>
				</tr>
				
				<?php 
						$day = array ("Monday", "Tuesday", "Wednesday",
										"Thursday", "Friday",
										"Saturday", "Sunday");											
				?>
				
				<tr>				
				<?php 
				foreach($day as $value) {?>
					<td align="center" bgcolor="black" style="color: white"><strong><?php echo $value ?></strong></td>
				<?php 
				}
				?>
				</tr>
	
				<?php 
				$timestamp = mktime( 0, 0, 0, $current_month, 1, $current_year );
				$maxday = date( "t", $timestamp);
				$thismonth = getdate ($timestamp);
				$startday = $thismonth['wday'] - 1;
				if ( $startday == -1 )
				$startday = 6;

				for ($i=0; $i<($maxday + $startday); $i++) {
					if(($i % 7) == 0 ) 
						echo "<tr>";
	    
					if($i < $startday) 
						echo "<td></td>";
					else 
						echo "<td align='center' valign='middle' height='80px'>". ($i - $startday + 1) . get_events_per_date($i - $startday + 1, $current_month, $current_year, $generated_posts) . '</br>'. "</td>";
	    			
					if(($i % 7) == 6 )
	    				echo "</tr>";
				
				}
				
				
?>
	
			</table>
			</td>
		</tr>
	</table>
			<?php

}


function get_events_per_date( $d, $m, $y, $generated_posts ) {
		if (strlen($d) == 1)
			$d = '0'.$d;
		if (strlen($m) == 1)
			$m = '0'.$m;
			
		$date = "$y-$m-$d";
		$response = '';
		
		if( isset ( $generated_posts[$date] ) ){
			foreach ($generated_posts[$date] as $event){
				$response .= $event . '</br>';
			}
			
		}
		
		return $response;
}