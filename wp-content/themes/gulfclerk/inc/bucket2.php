<ul>
<?php $publicarg = array(
	'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'hierarchical' => 0,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'parent' => 21, // Courts Top-Level Page
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($publicarg); 
$i = 1;
foreach($pages as $page){
	
	if($i > 10) { $class = 'hidden'; }
	else { $class = ''; }
	
	$id = $page->ID;
	$subpageargs = array(
		'sort_order' => 'ASC',
		'sort_column' => 'post_title',
		'hierarchical' => 0,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'parent' => $id, // Subpage of Courts
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$subpages = get_pages($subpageargs); 
	$j = 1;
	
	if (strpos(get_page_link( $id ),'gulfclerk') !== false) {
		$target = '';
		//echo '<!--internal-->';
	} else {
		$target = 'target="_blank"';
		//echo '<!--external-->';
	}
	
	echo '<li id="courts-page-'.$id.'" class="listpages level1 '.$class.'"><a '.$target.' href="'.get_page_link( $id ).'" class="list-page-link" >'.$page->post_title.'</a>';
	$j++;
	
	if(count($subpages) > 0){
		//echo '<ul>';
		foreach($subpages as $subpage){
			$id = $subpage->ID;	
			if (strpos(get_page_link( $id ),'gulfclerk') !== false) {
				$target = '';
				//echo '<!--internal-->';
			} else {
				$target = 'target="_blank"';
				//echo '<!--external-->';
			}			
			echo '<li id="subpage-page-'.$id.'" class="listpages level2 hidden"><a '.$target.' href="'.get_page_link( $id ).'" class="list-page-link" >- '.$subpage->post_title.'</a></li>';
		}
		//echo '</ul>';
	} //end subpage loop
	//echo '</li>';
	$i++;
} //end page loop
?>
</ul>
