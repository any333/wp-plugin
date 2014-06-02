<html>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/single-eventbase.css" type="text/css" > 

<body><table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tbody><tr>
		<td align="center" bgcolor="#f5f2f5">
        	<table style="margin:0 10px;" width="640" cellpadding="0" cellspacing="0" border="0">
            	<tbody><tr><td width="640" height="20"></td></tr>
            	<tr>
                	<td width="640">
                        <table id="top-bar" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#2098C4">
    <tbody><tr>   
		<td width="350" valign="middle" align="left">
			<table width="350" cellpadding="0" cellspacing="0" border="0">
				<tbody><tr><td width="350" height="8"></td></tr></tbody>
			</table>
			<table width="350" cellpadding="0" cellspacing="0" border="0">
				<tbody><tr><td width="350" height="8"></td></tr></tbody>
			</table>
        </td> 
    </tr></tbody>     			
		<tr>
		<td width="640" align="center" bgcolor="#2098C4">    
			<table width="640" cellpadding="0" cellspacing="0" border="0">
			<tr>
					<div align="center" id="headline">
						<p>
							<strong>Events organiser</strong>
						</p>
					</div> 
			</tr>
			</table>
		</td>
		</tr>            
		<tr><td width="640" height="30" bgcolor="#ffffff"></td></tr>
		<tr><td width="640" bgcolor="#ffffff">
			<table align="left" width="640" cellpadding="0" cellspacing="0" border="0">
		<tbody><tr>
			<td width="30"></td>
			<td width="580">
						<table width="580" cellpadding="0" cellspacing="0" border="0">
							<tbody><tr>
								<p><align="left" class="article-title"> <?php echo get_the_title(get_the_ID()); ?> </p>
									<div align="left" class="article-content">
										<?php $content = get_post_field('post_content', get_the_ID()); 
																			echo '<b> Description: </b>'.$content; ?> <br>
										<p><?php $date = get_post_meta(get_the_ID(), 'date', true);
																			echo '<b> "Show in calendar" date : </b>'.$date; ?> <br> </p>
										<p><?php $location = get_post_meta(get_the_ID(), 'location', true);
																			echo '<b> Location - </b>'.$location; ?> <br></p>
										<p><?php $start = get_post_meta(get_the_ID(), 'start_time', true);
																			echo '<b> The event will start on </b>'.$start; ?> <br></p>
										<p><?php $end = get_post_meta(get_the_ID(), 'end_time', true);
																			echo '<b> end will end on </b>'.$end; ?> <br></p>
										<p><?php $repeat = get_post_meta(get_the_ID(), 'repeat', true);
																			echo '<b> Will the event repeat? </b> - '.$repeat; ?> <br></p>
										<?php $frequency = get_post_meta(get_the_ID(), 'frequency', true); 
																			echo '<b> When will the event repeat? </b> - '.$frequency; ?> <br>							
									</div>
							</tr>
							<tr><td width="580" height="10"></td></tr>
						</tbody></table> 
			</td>
		</tr>
	</tbody></table>
</td></tr>		
	<tr>
    <table id="footer" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#000000">
        <tr>
            <td width="30"></td>
            <td width="360" valign="top">
            <p align="left" class="footer-content-left"></p>
            <p align="left" class="footer-content-left"> ELSYS, 2014 </p>
            </td>
        </tr>
        <tr><td width="30"></td><td width="360" height="15"></td><td width="60"></td><td width="160"></td><td width="30"></td></tr>
    </tbody></table>
                </tr>
            </tbody></table>
        </td>
	</tr>
</tbody></table></body></html>