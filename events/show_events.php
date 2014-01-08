<?php

add_action( 'init', 'show_calendar' );
function show_calendar() {
	add_shortcode( 'eventts', 'calendar');
}

function calendar() {

	$monthNames = Array("January", "February", "March", "April",
						"May", "June", "July", "August", "September", 
						"October", "November", "December");

	if ( !isset( $_REQUEST["month"] ) ) $_REQUEST["month"] = date("n" );
	if ( !isset( $_REQUEST["year"] ) ) $_REQUEST["year"] = date("Y" );

	$cMonth = $_REQUEST["month"];
	$cYear = $_REQUEST["year"];

	$prev_year = $cYear;
	$next_year = $cYear;
	$prev_month = $cMonth-1;
	$next_month = $cMonth+1;

	if ( $prev_month == 0 ) {
		$prev_month = 12;
		$prev_year = $cYear - 1;
	}
	
	if ( $next_month == 13 ) {
		$next_month = 1;
		$next_year = $cYear + 1;
			
	}
	?>
	<table width="200">
		<tr align="center">
			<td bgcolor="white" >
			<table width="100%" border="0" cellspacing="" cellpadding="0">
				<tr>
					<td width="50%" align="left"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>"style="color: black">Previous</a></td>
					<td width="50%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>"style="color: black">Next</a></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td align="center">
			<table width="100%" border="0" cellpadding="2" cellspacing="2">
				<tr align="center">
					<td colspan="7" bgcolor="green" style="color: white"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
				</tr>
				
				<?php 
						$day = array ("Monday", "Tuesday", "Wednesday",
										"Thursday", "Friday",
										"Saturday", "Sunday");											
				?>
				
				<tr>				
				<?php 
				foreach($day as $value){?>
					<td align="center" bgcolor="black" style="color: white"><strong><?php echo $value ?></strong></td>
				<?php 
				}
				?>
				</tr>
	
				<?php
				$timestamp = mktime( 0, 0, 0, $cMonth, 1, $cYear );
				$maxday = date( "t", $timestamp );
				$thismonth = getdate ( $timestamp );
				$startday = $thismonth['wday'] - 1;
				if ( $startday == -1 )
				$startday = 6;
				
				for ( $i=0; $i<( $maxday + $startday ); $i++ ) {
					if( ( $i % 7 ) == 0 ) echo "<tr>";
					if( $i < $startday ) echo "<td></td>";
					else echo "<td align='center' valign='middle' height='80px'>". ( $i - $startday + 1 ) . "</td>";
					if( ( $i % 7 ) == 6 ) echo "</tr>";
				}
				?>
	
			</table>
			</td>
		</tr>
	</table>
			<?php

				
	$args = array(
	'numberposts' => -1,
	'post_type' => 'eventbase',
	);

	$the_query = new WP_Query( $args );

	 if( $the_query->get_posts() ) { ?>
	<ul>
		<?php 
		while ( $the_query->have_posts() ) { 
			$the_query->the_post(); 
		?>
		
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		
		<?php 		
		
		$post_IDs = array(the_ID());

			foreach($post_IDs as $date_value){
				$get_date = get_post_custom_values(date, $date_value);
				echo var_dump($get_date);
			}
		?>
	</ul>
	<?php 
		}
	
	wp_reset_query();		
			
	}

	
}
		