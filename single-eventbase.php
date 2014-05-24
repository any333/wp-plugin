<style type="text/css">

body { 
	background-color: #f5f2f5; 
	margin: 0; 
	padding: 0; 
}

#top-bar { 
	border-radius:6px 6px 0px 0px; 
	border-radius: 6px 6px 0px 0px; 
	border-radius:6px 6px 0px 0px; 
	font-smoothing: antialiased; 
	background-color: #2098c4; 
	color: #888888; 
}

#top-bar a { 
	font-weight: bold; 
	color: #eeeeee; 
	text-decoration: none;
}

#footer { 
	border-radius:0px 0px 6px 6px; 
	border-radius: 0px 0px 6px 6px; 
	border-radius:0px 0px 6px 6px; 
	font-smoothing: antialiased; 
}

/* Fonts and Content */
body, td { 
	font-family: 
	HelveticaNeue, sans-serif;
}

#headline p { 
	color: #f5f5f5; 
	font-family: HelveticaNeue, sans-serif; 
	font-size: 36px; 
	text-align: center; 
	margin-top:0px; 
	margin-bottom:30px; 
}

.article-title { 
	font-size: 18px; 
	line-height:24px; 
	color: #b0b0b0; 
	font-weight:bold; 
	margin-top:0px; 
	margin-bottom:18px; 
	font-family: HelveticaNeue, sans-serif;
}

.article-content { 
	font-size: 13px; 
	line-height: 18px; 
	color: #444444; 
	margin-top: 0px; 
	margin-bottom: 18px; 
	font-family: HelveticaNeue, sans-serif; 
}

.footer-content-left { 
	font-size: 12px; 
	line-height: 15px; 
	color: #888888; 
	margin-top: 0px; 
	margin-bottom: 15px; 
}

</style>
</head><body><table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table">
	<tbody><tr>
		<td align="center" bgcolor="#f5f2f5">
        	<table class="w640" style="margin:0 10px;" width="640" cellpadding="0" cellspacing="0" border="0">
            	<tbody><tr><td class="w640" width="640" height="20"></td></tr>
            	<tr>
                	<td class="w640" width="640">
                        <table id="top-bar" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#2098C4">
    <tbody><tr>   
		<td class="w325" width="350" valign="middle" align="left">
			<table class="w325" width="350" cellpadding="0" cellspacing="0" border="0">
				<tbody><tr><td class="w325" width="350" height="8"></td></tr></tbody>
			</table>
			<table class="w325" width="350" cellpadding="0" cellspacing="0" border="0">
				<tbody><tr><td class="w325" width="350" height="8"></td></tr></tbody>
			</table>
        </td> 
    </tr></tbody>     
                    </td>
                </tr>
				
		<tr>
		<td id="header" class="w640" width="640" align="center" bgcolor="#2098C4">    
			<table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
			<tr>
					<div align="center" id="headline">
						<p>
							<strong><singleline label="Title">The events calendar</singleline></strong>
						</p>
					</div> 
			</tr>
			</table>
		</td>
		</tr>
                
		<tr><td class="w640" width="640" height="30" bgcolor="#ffffff"></td></tr>
		<tr id="simple-content-row"><td class="w640" width="640" bgcolor="#ffffff">
			<table align="left" class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
		<tbody><tr>
			<td class="w30" width="30"></td>
			<td class="w580" width="580">
						<table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
							<tbody><tr>
								<p align="left" class="article-title"><singleline label="Title"> <?php echo get_the_title(get_the_ID()); ?> </singleline></p>
									<div align="left" class="article-content">
										<multiline label="Description"><?php $content = get_post_field('post_content', get_the_ID()); 
																			echo 'Description: '.$content; ?> <br></multiline>
										<p <multiline label="Description"><?php $date = get_post_meta(get_the_ID(), 'date', true);
																			echo '"Show in calendar" date : '.$date; ?> <br></multiline> </p>
										<p <multiline label="Location"><?php $location = get_post_meta(get_the_ID(), 'location', true);
																			echo 'Location - '.$location; ?> <br></multiline> </p>
										<p <multiline label="Start time"><?php $start = get_post_meta(get_the_ID(), 'start_time', true);
																			echo 'The event will start on '.$start; ?> <br></multiline> </p>
										<p <multiline label="End time"><?php $end = get_post_meta(get_the_ID(), 'end_time', true);
																			echo 'end will end on '.$end; ?> <br></multiline> </p>
										<p <multiline label="Repeat"><?php $repeat = get_post_meta(get_the_ID(), 'repeat', true);
																			echo 'Will the event repeat?  - '.$repeat; ?> <br></multiline> </p>
										<multiline label="Frequency"><?php $frequency = get_post_meta(get_the_ID(), 'frequency', true); 
																			echo 'When will the event repeat?  - '.$frequency; ?> <br></multiline>																																						
									</div>
								</td>
							</tr>
							<tr><td class="w580" width="580" height="10"></td></tr>
						</tbody></table> 
			</td>
		</tr>
	</tbody></table>
</td></tr>
				
	<tr>
    <table id="footer" class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#000000">
        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="360" valign="top">
            <span class="hide"><p id="permission-reminder" align="left" class="footer-content-left"><span></span></p></span>
            <p align="left" class="footer-content-left"> ELSYS, 2014 </p>
            </td>
        </tr>
        <tr><td class="w30" width="30"></td><td class="w580 h0" width="360" height="15"></td><td class="w0" width="60"></td><td class="w0" width="160"></td><td class="w30" width="30"></td></tr>
    </tbody></table>
</td>
                </tr>
            </tbody></table>
        </td>
	</tr>
</tbody></table></body></html>
