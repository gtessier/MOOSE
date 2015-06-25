<?php
class prodigystudio_sidebar_generator {

	function prodigystudio_sidebar_generator(){
		add_action('init',array('prodigystudio_sidebar_generator','init'));		
	}
	
	public static function init(){
		//go through each sidebar and register it
	    $sidebars = prodigystudio_sidebar_generator::get_sidebars();

	    if(is_array($sidebars)){
			foreach($sidebars as $sidebar){
				$sidebar_class = prodigystudio_sidebar_generator::name_to_class($sidebar);
				$sidebar_class = strtolower($sidebar_class);
				$sidebar_id = prodigystudio_sidebar_generator::name_to_id_sidebar($sidebar);
				register_sidebar(array(
					'name'=>$sidebar,
					'id'=>$sidebar_id,
					'description'=> 'Custom sidebar',	   	
					'before_widget' => '<aside id="%1$s" class="widget mo-animate %2$s" data-animate="fadeInRight">',
					'after_widget'  => '</aside>',
		   			'before_title' => '<h5 class="inline-heading-line"><span>',
					'after_title' => '</span></h5>',
		    	));
			}
		}
	}

	/**
	 * gets the generated sidebars
	*/
	public static function get_sidebars(){
			
		global $ps_opts;
		if(!empty($ps_opts['ps_sidebars'])){ $sidebars = $ps_opts['ps_sidebars']; } else { $sidebars = '';}		
		return $sidebars;
	}

	public static function name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
	 public static function name_to_id_sidebar($name){		
		$id_sidebar = preg_replace('/\%/',' percentage',$name);
		$id_sidebar = preg_replace('/\@/',' at ',$id_sidebar);
		$id_sidebar = preg_replace('/\&/',' and ',$id_sidebar);
		$id_sidebar = preg_replace('/\s[\s]+/','-',$id_sidebar);    // Strip off multiple spaces
		$id_sidebar = preg_replace('/[\s\W]+/','-',$id_sidebar);    // Strip off spaces and non-alpha-numeric
		$id_sidebar = preg_replace('/^[\-]+/','',$id_sidebar); // Strip off the starting hyphens
		$id_sidebar = preg_replace('/[\-]+$/','',$id_sidebar); // // Strip off the ending hyphens
		$id_sidebar = strtolower($id_sidebar); 
		return $id_sidebar;
	}
	
}
$ps = new prodigystudio_sidebar_generator;

?>