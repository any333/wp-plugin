<?php 

add_action( 'init', 'show_calendar' );
function show_calendar() {
                add_shortcode( 'eventts','calendar');
        }
        
function calendar() {
		$monthNames = Array("January", "February", "March", "April", 
                			"May", "June", "July", "August", "September", 
                			"October", "November", "December");
                
		if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
		if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
				
			$cMonth = $_REQUEST["month"];
			$cYear = $_REQUEST["year"];
					 
			$prev_year ;
			$next_year ;
			$prev_month = $cMonth-1;
			$next_month = $cMonth+1;
 
			if ($prev_month == 0 ) {
			    $prev_month = 12;
			    $prev_year = $cYear - 1;
			}
			if ($next_month == 13 ) {
			    $next_month = 1;
			    $next_year = $cYear + 1;
			}

?>

	<table width="200">
		<tr align="center">
			<td bgcolor="white">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50%" align="left">  <a href=" <?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?> " style="color:black"> Previous </a></td>
						<td width="50%" align="right"> <a href=" <?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?> " style="color:black"> Next </a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td align="center">
				<table width="100%" border="0" cellpadding="2" cellspacing="2">
					<tr align="center">
						<td colspan="7" bgcolor="green" style="color:white"><strong> <?php echo $monthNames[$cMonth-1].' '.$cYear; ?> </strong></td>
					</tr>
					<tr>
						<td align="center" bgcolor="black" style="color:white"><strong>Monday</strong></td>
						<td align="center" bgcolor="black" style="color:white"><strong>Tuesday</strong></td>
						<td align="center" bgcolor="black" style="color:white"><strong>Wednesday</strong></td>
						<td align="center" bgcolor="black" style="color:white"><strong>Thursday</strong></td>
						<td align="center" bgcolor="black" style="color:white"><strong>Friday</strong></td>
						<td align="center" bgcolor="black" style="color:white"><strong>Saturday</strong></td>
						<td align="center" bgcolor="black" style="color:white"><strong>Sunday</strong></td>
					</tr>
<?php 

		$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
		$maxday = date("t",$timestamp);
		$thismonth = getdate ($timestamp);
		$startday = $thismonth['wday']-1;
		
		for ($i=0; $i<($maxday + $startday); $i++) {
			if(($i % 7) == 0 ) echo "<tr>";
			if($i < $startday) echo "<td></td>";
			else echo "<td height='80px'>". ($i - $startday + 1) . "</td>";
			if(($i % 7) == 6 ) echo "</tr>";
			
		}
?> 

				</table>
			</td>
		</tr>
	</table>
<?php 
         
}