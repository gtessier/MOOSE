<?php
    $team_details = get_post_meta($post->ID, '_ps_team_details',true);
?>
<style type="text/css">
	.wespace{padding-bottom: 10px;display: block;}
	#team-details label{ font-weight: bold;}
</style>
<label><?php _e('Position','prodigystudio'); ?></label>
<input name="_ps_team_details[position]" value="<?php if(isset($team_details['position'])) { echo $team_details['position']; } ?>" style="padding:3px 10px;width:100%;" type="text">
<div class="wespace"></div>
<?php
    $team_social = get_post_meta($post->ID, '_ps_team_social',true);  
    $counter=0;
?>
<label><?php _e('Social links','prodigystudio'); ?></label>
<table style="display: inline-table; width: 100%;">
  <tr>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><table id="ratingtable" class="widefat"  border="0" width="100%" cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th><label>Social Icon </label></th>
            <th><label>Social URL</label></th>
            <th><label>Action</label></th>
          </tr>
        </thead>
        <tbody>
          <?php 
		   
				if( !empty($team_social['icon'][0])){  //echo "top loop";            
				for($j=0;$j<count($team_social['icon']);$j++){
			
            ?>
          <tr class="rating_<?php echo $counter;?>">            
            <td style="width:100px;"><?php 
			if(isset($team_social['icon'][$j])) { $selectedIcon = $team_social['icon'][$j]; } else {$selectedIcon = '';}
			echo printIconSelect('_ps_team_social[icon][]','social-media',false,$selectedIcon); ?></td>
              <td class="frow"><input name="_ps_team_social[url][]" value="<?php echo $team_social['url'][$j]; ?>" style="padding:3px 10px;width:100%;" type="text"></td>
            <td><img style="cursor:pointer;" src='<?php echo get_template_directory_uri();?>/lib/social-metabox/images/delete.png' class='deleterow' rel='rating_<?php echo $counter;$counter++;?>' title='Delete this row' /></td>           
          </tr>
          <?php
            }
        } else {
      
	        ?>
          <tr class="rating_<?php echo $counter;?>">            
            <td style="width:100px;"><?php 
			if(isset($team_social['icon'])) { $selectedIcon = $team_social['icon']; } else {$selectedIcon = '';}
			echo printIconSelect('_ps_team_social[icon][]','social-media',false,$selectedIcon); ?></td>
              <td class="frow"><input name="_ps_team_social[url][]" value="" style="padding:3px 10px;width:100%;" type="text"></td>
            <td><img style="cursor:pointer;" src='<?php echo get_template_directory_uri();?>/lib/social-metabox/images/delete.png' class='deleterow' rel='rating_<?php echo $counter;$counter++;?>' title='Delete this row' /></td>
          </tr>
          <?php
           
        }?>
        </tbody>
      </table></td>
    <td valign="top"></td>
  </tr>
  <tr>
    <td><br/>
      <a href="#" class="add-concept button-secondary" id="addrow">Add Social</a></td>
    <td></td>
  </tr>
</table>
<?php
    	
	$team_social = get_post_meta($post->ID, '_ps_team_social',true);  
	if(isset($team_social['icon'])) { $count_icons = count($team_social['icon']); }
	
	
	if($team_social) {
		$sum_criteria = '';	
		for ($i=0; $i<$count_icons; $i++)	{
			$sum_criteria = $team_social['icon'][$i] + $sum_criteria;
		}
	}
	
?>
<script>
    <!--
    var counter=<?php echo ($counter);?>;
    //alert(counter);
    function trim(str) {
        return str.replace(/^\s+|\s+$/g,"");
    }
      jQuery('#addrow').click(function(){
          
          var feat="";
          var tmp_fid=0;
          $ftr_info = "<span id='sf"+tmp_fid+"'>"+feat+"</span><input type=hidden name='feature_name["+tmp_fid+"]' value='"+feat+"'/>"; 
          
           jQuery('#ratingtable tbody tr:last').clone(true).insertAfter('#ratingtable tbody tr:last');
           jQuery('#ratingtable tbody tr:last').attr("class","rating_"+counter);
           jQuery("#ratingtable tbody tr:last").find("img").attr("rel","rating_"+counter);   
           jQuery("#ratingtable tbody tr:last td:first").find("input").val("");   
           counter++;           
           return false;    
      });
      
      jQuery('.deleterow').live('click', function() {   
        if(confirm("Are you sure you want to delete?")){
          jQuery("."+jQuery(this).attr('rel')).slideUp(function(){jQuery(this).remove();});
        }
     });
 
    //-->
    </script>
