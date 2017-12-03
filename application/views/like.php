<!doctype html public "-//W3C//DTD HTML 4.0 //EN">

<html>

<head>
<title>Demos :  99Points.info : Fresh Facebook Style TextArea with Wall Posting Script using jQuery PHP and Ajax</title>

<script type="text/javascript" src="<?php echo base_url();?>asset/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/jquery.livequery.js"></script>

<script type="text/javascript">

	// <![CDATA[	

	$(document).ready(function(){	
	
		
		/// like 
		
		$('.LikeThis').livequery("click",function(e){
			
			var getID   =  $(this).attr('id').replace('post_id','');
			
			$("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$.post("<?php echo base_url('web/likee1');?>/"+getID, {
	
			}, function(response){
				
				$('#like-stats-'+getID).html(response);
				
				$('#like-panel-'+getID).html('<a href="javascript: void(0)" id="post_id'+getID+'" class="Unlike">Unlike</a>');
				
				$("#like-loader-"+getID).html('');
			});
		});	
		
		/// unlike 
		
		$('.Unlike').livequery("click",function(e){
			
			var getID   =  $(this).attr('id').replace('post_id','');
			
			$("#like-loader-"+getID).html('<img src="loader.gif" alt="" />');
			
			$.post("<?php echo base_url('web/unlike1');?>/"+getID, {
	
			}, function(response){
				
				$('#like-stats-'+getID).html(response);
				
				$('#like-panel-'+getID).html('<a href="javascript: void(0)" id="post_id'+getID+'" class="LikeThis">Like</a>');
				
				$("#like-loader-"+getID).html('');
			});
		});	
		
		
		
	});	

	// ]]>

</script>

</head>

<body>

	<div align="center">
	
		<br clear="all" />
	
		<div id="posting" align="center">
	
		<?php
	
	
	$userip = $_SERVER['REMOTE_ADDR'];
	
	foreach($result->result_array() as $row)
	{
		
		
		foreach($total_likes->result_array() as $likes)
		$likess =  $likes['likes'];
		
		?>
		
	   <div class="friends_area">

	   <img src="zee.jpg" style="float:left;" width="60" alt="" />

		   <label style="float:left" class="name">

		   <b><a href="http://www.facebook.com/zishan.rasool" target="_blank"><?php echo $row['f_name'];?> jjj</a></b>

		   <br clear="all" />

		   
		   	&nbsp;&nbsp;&nbsp;&nbsp;
			
			<span id="like-panel-<?php  echo $row['p_id']?>">
				
			<?php
			foreach($like_ip->result_array() as $l)
			echo $l['count(*)'];
			echo "<br/>";
			if($l['count(*)']>0){?>
				<a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="Unlike">Unlike</a>
			<?php }else{?>
				<a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="LikeThis">Like</a>
			<?php }?>
				
			</span>
			
		   </label>
			
			
		    <br clear="all" />
			
			<div class="commentPanel" align="left">
				<img src="like.png" style="float:left;" alt="" />
				
				<span id="like-stats-<?php  echo $row['p_id'];?>"> <?php echo $likess;?> </span> people like this.
				
				<span id="like-loader-<?php  echo $row['p_id']?>">&nbsp;</span>
			</div>
	   </div>
	<?php
	}?>
	
		  
		</div>
	</div>

<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" />
			  
</body>

</html>

