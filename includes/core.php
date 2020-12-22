<?php
ini_set('memory_limit','1024M');
//ini_set('display_errors', 1);
ini_set('max_execution_time', 300);
function alib_import_to_list(){
	
	$alib_product_type = get_option('alib_product_type');
	$alib_product_status = get_option('alib_product_status');
	$alib_import_attr = get_option('alib_import_attr');
	$alib_import_desc = get_option('alib_import_desc');
	$alib_imp_img_desc = get_option('alib_imp_img_desc');
	$alib_external_img_url = get_option('alib_external_img_url');
	$alib_rand_stock_val = get_option('alib_rand_stock_val');
	$alib_aliexp_sync = get_option('alib_aliexp_sync');
	$alib_avlb_product_status = get_option('alib_avlb_product_status');
	$alib_sync_type = get_option('alib_sync_type');

	$alib_load_review = get_option('alib_load_review');
	$alib_review_status = get_option('alib_review_status');
	$alib_review_translated = get_option('alib_review_translated');
	$alib_review_avatar_import = get_option('alib_review_avatar_import');
	$alib_review_max_per_product = get_option('alib_review_max_per_product');
	$alib_review_raiting_from = get_option('alib_review_raiting_from');
	$alib_review_raiting_to = get_option('alib_review_raiting_to');
	$alib_review_noavatar_photo = get_option('alib_review_noavatar_photo');
	$alib_review_load_attributes = get_option('alib_review_load_attributes');
	$alib_review_show_image_list = get_option('alib_review_show_image_list');
	
 global $wpdb;
 
include('simple_html_dom.php');
 
$url = $_POST['product_url'];
$product_img = $_POST['product_img']; 
$product_id = $_POST['product_id']; 

$html = file_get_html($url);

/*$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTMLFile($url);
$data = $dom->getElementById("j-product-description")->textContent;


 print_r( $data );

exit;*/


$links = array();
foreach($html->find('h1[class="product-name"]') as $a) {
 $links[] = $a->plaintext;
}
 
 
 $title = $links[0] ;
 ///////////
 
 $var1 = array();
foreach($html->find('a[id*="sku-1"]') as $a) {
 $var1[] = $a->title;
}
 
 
 ////////////
 
  
 $var2 = array();
foreach($html->find('a[id*="sku-2"]') as $a) {
 $var2[] = $a->innertext;
}
 
 
 ////////////
 

 
 ////////////
 
 
 $shipd = array();
foreach($html->find('li[class="packaging-item"]') as $a) {
 $shipd[] = $a->innertext;
}
 


$links = array();
foreach($html->find('span[id="j-sku-price"]') as $a) {
 $links[] = $a->innertext;
}
 
 /*$prod_description = $html->find('span[id="j-sku-price"]');
 foreach($prod_description as $desc){
	 echo '<pre>'; print_r($desc);
 }	 exit;*/
$price = $links[0];

$length = count($var1);

for ($i = 0; $i < $length-1; $i++) {
 $xvar1 =  $xvar1 . $var1[$i] . "|" ;
}
$xvar1 =  $xvar1 . $var1[$i] ;

/////////

$url = explode("?",$url); 
$url = $url['0']; 


//echo  " { url :" . $url . "}<br>";
//echo  " { title :" . $title . "}<br>";
//echo  " { price :" . $price. "}<br>";
 foreach($html->find('span[class="percent-num"]') as $a) {
//echo  " { Rating :" .  $a->plaintext . "}<br>";
}

 foreach($html->find('span[class="order-num"]') as $a) {
//echo  " { Orders:" .  $a->plaintext . "}<br>";
}




//echo  " { variation 1 :" . $xvar1 . "}<br>";



$length = count($var2);
for ($i = 0; $i < $length-1; $i++) {
 $xvar2 =  $xvar2. $var2[$i] . "|" ;
}

$xvar2 =  $xvar2 . $var2[$i] ;
$xvar2 = str_replace('<span>', '', $xvar2);
$xvar2 = str_replace('</span>', '', $xvar2);
//echo  " { variation 2 :" . $xvar2 . "}<br>";



$length = count($shipd);
for ($i = 0; $i < $length; $i++) {
  $description .=  $shipd[$i] . "<br>" ;
}


foreach($html->find('li[class="property-item"]') as $a) {
//echo  " {" .  $a->plaintext . "}<br>";
}
 
 
 //echo "<br><br>{ variation Pictures  : <br>" ;
 
$length = count($var1);
for ($i = 0; $i < $length; $i++) {

$temp = 'img[title="' . $var1[$i] .'"]' ;

 foreach($html->find($temp) as $a) {
//echo  " { $var1[$i] : " .  $a->bigpic . "}<br>";
$var_img .= $a->bigpic.'*';
} 
}


//echo " } " ;
$var_img_ar = explode('*', $var_img);
array_pop($var_img_ar);

	$result1 = fetch_html_url( $url );

 	$html1 = str_get_html( $result1 ); 
 
	foreach($html1->find('script') as $a) {

		$script_text = $a->innertext;

		if( strpos( $script_text, 'window.runParams.detailDesc' ) ){
			$script_text;

			$start = 'window.runParams.detailDesc=';
			$end = ';';

			$desc_url =  getBetween( $script_text,$start,$end ) ;  

			$desc_url = str_replace( '"','',$desc_url );

			$prod_description = fetch_html_url( $desc_url );

		}

	}
	if(get_option('alib_import_desc') == "yes")
	{
		$custom_desc=$prod_description;
	}
	else
	{
		$custom_desc="";
	}
	
	$post = array(
        'post_author'  => 1,
        'post_content' => $custom_desc,
        'post_status'  => 'alib_imported',
        'post_title'   => $title,
        'post_parent'  => '',
        'post_type'    => 'product'
    );

    $post_id = wp_insert_post($post);
	
	wp_set_object_terms ($post_id,'variable','product_type');
	
	update_post_meta( $post_id,'_sku', $product_id);
    update_post_meta( $post_id,'_visibility','visible');
	update_post_meta($post_id, '_price', $price);
	update_post_meta($post_id, 'external_id', $product_id);
    update_post_meta($post_id, '_regular_price', $price);
	update_post_meta($post_id, '_stock_status', 'instock');
	update_post_meta($post_id, '_stock', 100);
	update_post_meta($post_id, 'ali_url', $url);
	
	$upload_dir = wp_upload_dir();
    $image_data = file_get_contents($product_img);
    $filename = basename($product_img);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
		'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
	
	if(get_option('alib_import_attr') == "yes")
	{
	//set product variations.
	$variations = array(
	  'color' => 
	  array (
		'name' => 'Color',
		'value' => $xvar1,
		'position' => 0,
		'is_visible' => 1,
		'is_variation' => 1,
		'is_taxonomy' => 0,
	  ),
	  'size' => 
	  array (
		'name' => 'Size',
		'value' => $xvar2,
		'position' => 1,
		'is_visible' => 1,
		'is_variation' => 1,
		'is_taxonomy' => 0,
	  ),
	);
	
	update_post_meta($post_id, '_product_attributes', $variations);
	
	//set variations
	$j=1;
	$size_variations = explode('|', $xvar2);
	foreach($size_variations as $size_variation){  
		$color_variations = explode('|', $xvar1);
		$i=0;
		foreach($color_variations as $color_variation){
			
			$variation_post = array(
				'post_author'  => 1,
				'post_status'  => 'publish',
				'post_title'   => $title,
				'post_parent'  => $post_id,
				'post_type'    => 'product_variation'
			);
			$variation_post_id = wp_insert_post($variation_post);
			update_post_meta($variation_post_id, 'attribute_size', $size_variation);
			update_post_meta($variation_post_id, 'attribute_color', $color_variation);
			update_post_meta($variation_post_id, '_regular_price', $price);
			update_post_meta($variation_post_id, '_stock_status', 'instock');
			update_post_meta($variation_post_id, '_sku', $product_id.'-'.$j);
			
			//echo $var_img_ar[$i].'-----';
			
			//setting variations images
			$upload_dir = wp_upload_dir();
			//$product_img = $var_img_ar[2];
			$image_data = file_get_contents($var_img_ar[$i]);
			$filename = $i.''.basename($var_img_ar[$i]);
			if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
			else                                    $file = $upload_dir['basedir'] . '/' . $filename;
			file_put_contents($file, $image_data);

			$wp_filetype = wp_check_filetype($filename, null );
			$attachment = array(
				'guid'           => $upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => sanitize_file_name($filename),
				'post_content' => '',
				'post_parent' => $variation_post_id,
				'post_status' => 'publish'
			);
			$attach_id = wp_insert_attachment( $attachment, $file, $variation_post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
			$res1= wp_update_attachment_metadata( $attach_id, $attach_data );
			$res2= set_post_thumbnail( $variation_post_id, $attach_id );
			 
			//update_post_meta($attach_id, '_wp_attached_file', '2018/01/2018-New-men-Ripped-stripe-Straight-Biker-font-b-Jeans-b-font-Holes-font-b-Denim.jpg');
			
			// 
	
		$i++; 
		$j++; 
		}
	
	}
	}
	
	//reviews
	foreach($html->find('iframe') as $a){
		$thesrc = $a->attr['thesrc'];
	}

		$prod_review = fetch_html_url( 'https:'.$thesrc );
		$prod_reviews = str_get_html($prod_review);
		$total_reviews = count($prod_reviews->find('div[class="feedback-item"]'));
		
		//set product reviews
	if(get_option('alib_load_review') == "yes")
	{
         
			$ct=0;
			$avg_review_rating = 0;
			foreach($prod_reviews->find('div[class="feedback-item"]') as $a)
			{
			
				$reviews = $a->innertext;
				$prod_review_content = str_get_html($reviews);
			 
				 foreach($prod_review_content->find('dt[class="buyer-feedback"]') as $b){
					 $review_content = $b->plaintext;
				 }
				 
				 foreach($prod_review_content->find('span[class="star-view"]') as $c){
					 $review_rating = $c->innertext;
				 }
				 if($review_rating=='<span style="width:100%"></span>'){
					 $rating_rvw = 5;
				 }
				 else if($review_rating=='<span style="width:80%"></span>'){
					 $rating_rvw = 4;
				 }
				 else if($review_rating=='<span style="width:60%"></span>'){
					 $rating_rvw = 3;
				 }
				 else if($review_rating=='<span style="width:40%"></span>'){
					 $rating_rvw = 2;
				 }
				 else if($review_rating=='<span style="width:20%"></span>'){
					 $rating_rvw = 1;
				 }
				 else{
					 $rating_rvw = 0;
				 }
				  $avg_review_rating .= $rating_rvw;
				 foreach($prod_review_content->find('span[class="user-name"]') as $d){
					 $review_author = $d->plaintext;
				 }
				
				
				$time = current_time('mysql');

				$data = array(
					'comment_post_ID' => $post_id,
					'comment_author' => $review_author,
					'comment_content' => $review_content,
					'comment_date' => $time
				);
				if($rating_rvw>=$alib_review_raiting_from && $rating_rvw<=$alib_review_raiting_to)
				{
					if(get_option('alib_review_max_per_product')>$ct)
					{
						$comment_id = wp_insert_comment($data);

						update_comment_meta( $comment_id, 'rating', $rating_rvw ); 
						update_comment_meta( $comment_id, 'verified', 0 ); 
					
					}
				}
				
				$ct++;
			
		}
		$avg_rating = $avg_review_rating/$ct;
		add_post_meta($post_id, '_wc_review_count', $ct);
		add_post_meta($post_id, '_wc_average_rating', $avg_rating);
	}

	
//echo 'hello';

echo 'done';

die;
}

add_action('wp_ajax_alib_import_to_list', 'alib_import_to_list');
add_action('wp_ajax_nopriv_alib_import_to_list', 'alib_import_to_list');



//alib_push_to_shop_sn
add_action('wp_ajax_alib_push_to_shop_sn', 'alib_push_to_shop_sn');
add_action('wp_ajax_nopriv_alib_push_to_shop_sn', 'alib_push_to_shop_sn');
function alib_push_to_shop_sn(){
	
	$product_id = $_POST['product_id'];
	$product_change_name = $_POST['change_name'];
	$product_change_status = $_POST['change_status'];
 
       if($product_change_status == "")
         {
             $product_change_status = get_option('alib_product_status');
         }
       
        $product_desc = $_POST['pro_desc'];
	
	 $my_post = array(
        'ID' => $product_id,
        'post_title' => $product_change_name,
        'post_status'  => $product_change_status,
  
        );

	// Update the post into the database
        $a = wp_update_post( $my_post );
     if($a){
		 echo 'done';
	 }
die;
}


//alib_import_delete_sn
add_action('wp_ajax_alib_import_delete_sn', 'alib_import_delete_sn');
add_action('wp_ajax_nopriv_alib_import_delete_sn', 'alib_import_delete_sn');
function alib_import_delete_sn(){
	
	$product_id = $_POST['product_id'];
	 
    $a = wp_delete_post( $product_id );
     if($a){
		 echo 'done';
	 }
die;
}

function getBetween($content,$start,$end){
	    $r = explode($start, $content);
	    if (isset($r[1])){
	        $r = explode($end, $r[1]);
	        return $r[0];
	    }
	    return '';
	}

	function fetch_html_url($url){

		$ch = curl_init();
     
	    curl_setopt($ch, CURLOPT_URL, $url);	 
	    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	 
	    // Include header in result? (0 = yes, 1 = no)
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	 
	    // Should cURL return or print out the data? (true = return, false = print)
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	    // Timeout in seconds
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 
	    // Download the given URL, and return output
	    $result = curl_exec($ch);
	 
	    // Close the cURL resource, and free system resources
	    curl_close($ch);

	    return $result;

	}

	
?>