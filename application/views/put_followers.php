<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Followers</title>
</head>
<body>

	<form name="followFrm" id="followFrm" method="POST" action=getFollowers>
		
		<table align="center" width="50%" cellpadding="0" cellspacing="0" border="0">
						
						<tr>
							<td align="left" valign="top"> Enter Tiwitter Handle</td>
							<td width="10"></td>
							<td align="left" valign="middle"><input type="text"	name="handleText" id="handleText" >
							<td width="10"><input type="submit"	name="formSub" id="formSub" size="40" value="GO"></td>
							</td>
						</tr>
		</table>
	</form>
	<div style="width: 600px;">	
	<br>
	<h2>Your Followers!</h2>
		<?php
		if(!empty($data)){
			$i = 0; 
				foreach($data as $val){
					$name = $val['name'];
					$foll_num = $val['foll_num'];
					$screen_name =  $val['screen_name'];
					$profile_image_urls =  $val['profile_image_urls'];
				
			if($foll_num < 10)
			{
				$size 	= 'width="60px" height="60px"';
			}
			if($foll_num > 20)
			{
				$size 	= 'width="80px" height="80px"';
			}
			if($foll_num > 30)
			{
				$size 	= 'width="100px" height="100px"';
			}
			if($foll_num >40)
			{
				$size 	= 'width="120px" height="120px"';
			}
			if($foll_num >50)
			{
				$size 	= 'width="150px" height="150px"';
			}
			if($foll_num >60)
			{
				$size 	= 'width="170px" height="170px"';
			}
			if($foll_num > 70)
			{
				$size 	= 'width="200px" height="200px"';
			}
			if($foll_num >= 70)
			{
				$size 	= 'width="400px" height="400px"';
			}
			
					
				print "<div style='width: 100px;float: left;'><a title='" . $name ." has ". $foll_num ." Follwers " . "' href='http://www.twitter.com/" . $screen_name . "'>" . "<img src='" . $profile_image_urls . "' '".$size." ' /></a></div>";
				
				$i++;
		}
	 }
			
	  ?>
	</div>
</body>

</html>
