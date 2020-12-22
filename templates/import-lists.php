<?php
global $wpdb;
?>

<link rel="stylesheet" href="<?php echo plugin_url; ?>css/admin_style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel='stylesheet' id='a2w-select2-style-css'  href='<?php echo plugin_url; ?>css/select2.min.css?ver=1.3.7' type='text/css' media='all' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type='text/javascript' src='<?php echo plugin_url; ?>js/admin_script.js?ver=1.3.7'></script>
<script type='text/javascript' src='<?php echo plugin_url; ?>js/svg.min.js?ver=1.3.7'></script>
<script type='text/javascript' src='<?php echo plugin_url; ?>js/select2.min.js?ver=1.3.7'></script>

<div class="wrap">
<div class="a2w-content">

			<div id="a2w-import-filter">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Import list</h3>
                    </div>
                    <div class="col-md-6">
                        <form method="GET" action="#">
                            <input type="hidden" name="page" value="a2w_import">
                            <table class="float-right">
                                <tbody>
								<tr>
                                    <td class="padding-small-right">
                                        <select class="form-control" name="o" style="padding-right: 25px;">
                                            <option value="id-asc">Sort by External Id</option><option value="title-asc">Sort by Product title</option><option value="date_add-asc" selected="selected">Sort by Date add (old first)</option><option value="date_add-desc">Sort by Date add (new first)</option>                                        </select>
                                    </td>
                                    <td class="padding-small-right"><input type="search" name="s" class="form-control" value=""></td>
                                    <td><input type="submit" class="btn btn-default" value="Search products"></td>
                                </tr>
								</tbody>
							</table>
                        </form>
                    </div>
                </div>
            </div>
			
			<div id="a2w-import-actions">
                <div class="row">
                    <div class="col-lg-4 col-md-12 space-top">
                        <div class="container-flex" style="height: 32px;">
                            <div class="margin-right">
                                <input type="checkbox" class="check-all form-control"><span class="space-small-left"><strong>Select All Products</strong></span>
                            </div>
                            <div class="action-with-check" style="display: none;">
                                <select class="form-control">
                                    <option value="0">Bulk Actions (0 selected)</option>
                                    <option value="remove">Remove from Import List</option>
                                    <option value="push">Push Products to Shop</option>
                                    <option value="link-category">Link to category</option>
                                </select>
                                <div class="loader"><div class="a2w-loader"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 space-top align-right">
					<button type="button" class="lnk_prdct_catgry btn btn-success no-outline" style="background-color:#71a74d;">Link All products to category</button>
					<!--<a href="#" class="lnk_prdct_catgry btn margin-small-left delete_all" style="color:#383535;background-color:floralwhite;">Link All products to category</a>-->
					   <!--<a href="#" class="btn btn-default link_category_all">Link All products to category</a>-->
                        <a href="#" class="rm_all_product btn btn-danger margin-small-left delete_all">
						
                            <span class="btn-icon-wrap add"><i class="fa fa-trash-o" style="padding-right: 7px;"></i></span>Remove All Products</a>
                        <button type="button" class="mv_all_shop btn btn-primary no-outline btn-icon-left margin-small-left push_all">
                            <div class="btn-loader-wrap"><div class="a2w-loader"></div></div>
                            <span class="btn-icon-wrap add"><i class="fa fa-share" style="padding-right: 7px;"></i></span>&nbsp;Push All Products to Shop</button>
                    </div>

                </div>
            </div>
			
<!--Product container -->
<?php 
$args = array(
  'post_type'   => 'product',
  'post_status' => array('alib_imported'),
  'posts_per_page' => -1
);
 
$products = get_posts( $args );
 //echo '<pre>'; print_r($products); exit;
$i=1; foreach($products as $product){
if($product->post_status == 'alib_imported'){	
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->ID ), 'single-post-thumbnail' );

// Outside the product loop:
$product_id = $product->ID;
$product_img = new WC_Product_Variable( $product_id );
$variations = $product_img->get_available_variations();
array_unique($variations);
//echo '<pre>'; print_r($variations); exit;
?>
<div class="prod_main_wrp">
 <div class="tabs">
 
  <ul>
    <li><a href="#tabs-1<?php echo $i; ?>">Product</a></li>
    <li><a href="#tabs-2<?php echo $i; ?>">Description</a></li>
    <li><a href="#tabs-3<?php echo $i; ?>">Variants <button class="btn btn-danger btn-circle" style="border-radius: 53px;padding: 0px  8px !important;"><?php echo count($variations); ?></button></a></li>
	<li><a href="#tabs-4<?php echo $i; ?>">Images</a></li>	
	<li style="background:none;border:0px !important;">
	<div class="col-lg-6 col-sm-5 text-right" style="margin-left:150px;padding-top:10px;">
			<span class="margin-small-right">External Id: <b><?php echo get_post_meta($product->ID, 'external_id', true); ?></b></span>
	</div>
	</li>
	<li style="border:none;">
		
			<div class="actions" style="padding-left:30px;">
									
				<a href="javascript:void(0);" class="rmv_product_sn btn btn-danger no-outline btn-icon-left margin-right " product-id="<?php echo $product->ID; ?>" style="color:#fff;padding-left:36px;">
										
				<span class="btn-icon-wrap add"><i class="fa fa-trash-o" style="padding-right: 7px;"></i></span>
				Remove Product</a>

				<button type="button" product-id="<?php echo $product->ID; ?>" class="btn btn-primary no-outline btn-icon-left margin-right post_import push_to_shop_sn" style="padding:.5em 1em;padding-left: 36px;">
				<div class="btn-loader-wrap"><div class="a2w-loader"></div></div>
				<span class="btn-icon-wrap add"><i class="fa fa-share" style="padding-right: 7px;"></i></span>
				Push to Shop                                            
				</button>
			</div>
		
	</li>
  </ul>
  
  <div id="tabs-1<?php echo $i; ?>" style="background: #f3f3f3;">
    <p>
		<form>
			<div class="row">
				<div class="col-md-3">
				
					<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $product->ID; ?>" style="max-width:100%"/>
				</div>
				<div class="col-md-9 col-xs-8">
					<div class="container-flex">
						
						<h3>
							<a class="blue-color" href="<?php echo get_post_meta($product->ID, 'ali_url', true); ?>" target="_blank" style="color: #2a5f0b !important;"><?php echo $product->post_title; ?></a>
							<span class="red-color"></span>
						</h3>
					</div>
					<div class="row product-edit">
						<div class="col-md-12 input-block">
							<label>Change name:</label><input type="text" class="form-control title" id="change_name_<?php echo $product->ID; ?>" maxlength="255" value="<?php echo $product->post_title; ?>">
						</div>
						<div>
						<div class="col-md-12 input-block js-build-wrapper">
                                <label>Categories:</label>
                                    <select id="change_name_<?php echo $product->ID; ?>" class="form-control " data-placeholder="Choose Categories"  tabindex="-1" aria-hidden="true">
                                       <option></option>
                                       <option value="16">Dress</option>
										<option value="17">-New</option>
                                        <option value="467">Mobile Phone</option>
                                    </select>
										
                        </div>
							<!--<div class="col-md-12 input-block js-choosen-parent">
								<label>Categories:</label>
								<select class="selectpicker show-tick form-control" data-placeholder="Choose Categories" tabindex="-1" aria-hidden="true" multiple>
									<option></option>
									<option value="16">Dress</option>
									<option value="17">-New</option>
									<option value="467">Mobile Phone</option>
								</select>
								<!--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 822px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Choose Categories" style="width: 820px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
							</div>-->
							<div class="col-md-12 input-block js-choosen-parent">
								<label>Status:</label>
								<select class="form-control"  id="change_status_<?php echo $product->ID; ?>" data-placeholder="Choose Status" tabindex="-1" aria-hidden="true">     <option value=""></option>
									<option value="publish">Publish</option>
									<option value="draft">Draft</option>
								</select>
							</div>
							<div class="col-md-12 input-block js-choosen-parent">
								<label>Type:</label>
								<select id="change_type_<?php echo $product->ID; ?>"class="form-control" data-placeholder="Choose Type" tabindex="-1" aria-hidden="true">
									<option value="simple" selected="selected">Simple/Variable Product</option>
									<option value="external">External/Affiliate Product</option>
								</select>
							</div>
							<!--<div class="col-md-4 input-block js-choosen-parent">
								<label>Tags:</label>
								<select name="tags" class="form-control " data-placeholder="Enter Tags" multiple="" tabindex="-1" aria-hidden="true">
									<option value="A520">A520</option>
									<option value="ali2woo">ali2woo</option>
									<option value="asd">asd</option>
									<option value="Asus Padfone S">Asus Padfone S</option>
									<option value="azdas">azdas</option>
									<option value="azsd">azsd</option>
									<option value="banana">banana</option>
									<option value="bike">bike</option>
									<option value="Bobobird">Bobobird</option>
									<option value="Bottle">Bottle</option>
									<option value="harrypotter">harrypotter</option>
									<option value="head">head</option>
									<option value="health">health</option>
									<option value="hoodie">hoodie</option>
									<option value="Huawei X2">Huawei X2</option>
									<option value="kuchyně">kuchyně</option>
									<option value="lamp">lamp</option>
									<option value="led light">led light</option>
									<option value="m570">m570</option>
									<option value="men">men</option>
									<option value="men hoodies">men hoodies</option>
									<option value="Neckless">Neckless</option>
									<option value="Phone Charger">Phone Charger</option>
									<option value="sdds">sdds</option>
									<option value="semelle chauffante">semelle chauffante</option>
									<option value="sex">sex</option>
									<option value="tag1">tag1</option>
									<option value="tag2">tag2</option>
									<option value="test">test</option>
									<option value="Thermos">Thermos</option>
									<option value="Watch">Watch</option>
									<option value="waterproof">waterproof</option>
									<option value="บลูทูธ">บลูทูธ</option>
									<option value="ฟิล์ม">ฟิล์ม</option>
									<option value="ฟิล์มกระจก">ฟิล์มกระจก</option>
									<option value="ลำโพง ไร้สาย">ลำโพง ไร้สาย</option>
									<option value="หูฟัง">หูฟัง</option>
									<option value="ไร้สาย">ไร้สาย</option>
								</select>
								
							</div>-->
							
						</div>
					</div>
				</div>
			</div>
			
		</form>
	</p>
  </div>
  <div id="tabs-2<?php echo $i; ?>">
    <p class="description"><?php  
	wp_editor($product->post_content, "product_desc_".$product->ID ); ?></p>
  </div>
  <div id="tabs-3<?php echo $i; ?>">
   <div id="variants-images-container-32837066176" class="variants-wrap">

                                            

                                        <table class="variants-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="nowrap">Image</th>
                                                    <th>Color</th>
													<th>Size</th>
													<th>Cost</th>
                                                    <th class="text-center">Price</th>
                                                    <th>Compared At Price</th>
                                                    <th>SKU</th>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>


                                                <?php 
													foreach ( $variations as $variation ){
														//echo '<pre>'; print_r($variation);
													?>
                                                    <tr class="var_data">
                                                        <td>
                                                            <input type="checkbox" value="1" class="check-var form-control" checked="checked">
                                                        </td>
                                                        <td>
                                                            <img class="border-img lazy-in-container" style="max-width: 100px; max-height: 100px; margin: 5px; display: inline;" src="<?php echo $variation['image']['src']; ?>" data-original="https://ae01.alicdn.com/kf/HTB1jc6BXIz85uJjSZFoq6xjcpXa3.jpg">                                                        </td>
															<td><input type="text" class="form-control attr" data-id="" value="<?php echo $variation['attributes']['attribute_color']; ?>"></td>
                                                        <td>
                                                            <input type="text" class="form-control quantity" value="<?php echo $variation['attributes']['attribute_size']; ?>">
                                                        </td>
														
														<td style="white-space: nowrap;"><?php echo $variation['display_price']; ?></td>
                                                        <td>
                                                            <input type="text" class="form-control price" value="<?php echo $variation['display_price']; ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control regular_price" value="<?php echo $variation['display_price']; ?>">
                                                        </td>
                                                        <td>
															<input type="text" class="form-control sku" value="<?php echo $variation['sku']; ?>">
														</td>
                                                    </tr>
													<?php
													}
													?>
													
                                            </tbody>
                                        </table>
										
                                    </div>
  </div>
  <div id="tabs-4<?php echo $i; ?>">
    <ul class="thumbnails">
	<?php 
	$i=1; foreach ( $variations as $variation )
	{?>
		<li> 
			<div class="main">
				<label for="checkbox"><img for="checkbox<?php echo $i; ?>" src="<?php echo $variation['image']['src']; ?>" class="img-check" />
				</label>
				<input id="checkbox<?php echo $i; ?>" type="checkbox" class="check_img" checked="checked" />
			</div>
		</li>
	<?php  
	$i++;
	}
	?>
	</ul>
  </div>
</div>
</div>
<div style="clear:both;"></div>
<?php $i++; }
} ?>
<!--End here-->

</div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
$(document).ready(function(){
	$( ".tabs" ).tabs();
	var admin_ajax = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
	$('.push_to_shop_sn').click(function(){
		var product_id = $(this).attr('product-id');
		var change_name = $('#change_name_'+product_id).val();
		var change_status = $('#change_status_'+product_id).val();
		var change_type = $('#change_type_'+product_id).val();
		var pro_desc = $('#product_desc_'+product_id).val();
		if(jQuery(this).hasClass('remove_btn')==false){
			jQuery(this).html('<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;Pushing ...');
			 
			var this_btn = jQuery(this);
			var datastring = 'product_id='+ product_id + '&change_name='+ change_name + '&change_status='+ change_status + '&change_type='+ change_type + '&pro_desc='+ pro_desc + '&action=alib_push_to_shop_sn';
			jQuery.ajax({
				'url': admin_ajax,
				'type': 'POST',
				'data': datastring,
				success:function(data){ 
					if(data=='done'){
						alert('Successfully Pushed to shop');
						//this_btn.attr('style', 'background: red !important;top: 17px;position: relative;display: block;text-shadow:none !important');
						//this_btn.html('<i class="fa fa-window-close"></i>Remove from Import List');
						//this_btn.addClass('remove_btn');
						this_btn.closest('.prod_main_wrp').remove();
					}
				}
			});
		 }
	 });
	 
	 $('.mv_all_shop').click(function(){
		$('.push_to_shop_sn').each(function(){
			
		var product_id = $(this).attr('product-id');
		
		if(jQuery(this).hasClass('remove_btn')==false){
			jQuery(this).html('<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;Pushing ...');
			 
			var this_btn = jQuery(this);
			var datastring = 'product_id='+product_id+'&action=alib_push_to_shop_sn';
			jQuery.ajax({
				'url': admin_ajax,
				'type': 'POST',
				'data': datastring,
				success:function(data){ 
					if(data=='done'){
						//this_btn.attr('style', 'background: red !important;top: 17px;position: relative;display: block;text-shadow:none !important');
						//this_btn.html('<i class="fa fa-window-close"></i>Remove from Import List');
						//this_btn.addClass('remove_btn');
						this_btn.closest('.prod_main_wrp').remove();
					}
				}
			});
		 }
		 });
	 });

	 $('.rm_all_product').click(function()
	 {
		
		 $('.rmv_product_sn').each(function(){
			 
			 var product_id = $(this).attr('product-id');
		if(jQuery(this).hasClass('remove_btn')==false){
			jQuery(this).html('<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;Pushing ...');
			 
			var this_btn = jQuery(this);
			var datastring = 'product_id='+product_id+'&action=alib_import_delete_sn';
			jQuery.ajax({
				'url': admin_ajax,
				'type': 'POST',
				'data': datastring,
				success:function(data){ 
					if(data=='done'){
						
						//this_btn.attr('style', 'background: red !important;top: 17px;position: relative;display: block;text-shadow:none !important');
						//this_btn.html('<i class="fa fa-window-close"></i>Remove from Import List');
						//this_btn.addClass('remove_btn');
						this_btn.closest('.prod_main_wrp').remove();
					}
				}
			});
		 }
		 });
	 });

	$('.rmv_product_sn').click(function(){
		var product_id = $(this).attr('product-id');
		if(jQuery(this).hasClass('remove_btn')==false){
			jQuery(this).html('<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;Pushing ...');
			 
			var this_btn = jQuery(this);
			var datastring = 'product_id='+product_id+'&action=alib_import_delete_sn';
			jQuery.ajax({
				'url': admin_ajax,
				'type': 'POST',
				'data': datastring,
				success:function(data){ 
					if(data=='done'){
						alert('Successfully deleted!');
						//this_btn.attr('style', 'background: red !important;top: 17px;position: relative;display: block;text-shadow:none !important');
						//this_btn.html('<i class="fa fa-window-close"></i>Remove from Import List');
						//this_btn.addClass('remove_btn');
						this_btn.closest('.prod_main_wrp').remove();
					}
				}
			});
		 }
	});
	$('.img-check').click(function(){
			var this_img = jQuery(this);
			var value=$(this_img).attr("for");
			//$("#"+value).prop('checked', true);
			if($("#"+value).prop('checked')) {
				
					$("#checkbox1").prop('checked', false);
					$("#"+value).prop('checked', false);
			}
			else {
				$("#"+value).prop('checked', true);
			}
		
	});
	
		
});
</script>

<style>
  .gnrl_settings th{
	  font-weight: bold;
	  border-right: 1px solid #d4cece;
	  background: #efefef;
  }
  .gnrl_settings input, .gnrl_settings select{
	  width: 97%;
	  height: 26px;
  }
  #a2w-import-actions{
	  margin-bottom:40px;
  }
  .blue-color{
	  color: #3e619e !important;
	  font-size: 15px;
  }
  .a2w-content label {
		font-size: 12px;
		font-weight: 600;
		line-height: 16px;
		margin: 11px 0px 6px 0px;
	}
	.tabs{
		margin-bottom:50px;
	}
	.description{
		line-height: 38px;
		font-size: 16px;
		color: #383434;
	}
	.a2w-content input[type="text"].form-control, .a2w-content select.form-control{
		font-size: 12px;
		color: #837c7c;
		margin-right:10px;
	}
	.variants-table{
		font-size: 12px;
		color: #5c5959;
	}
	.thumbnails {
  overflow: hidden;
	}
	.thumbnails li {
	float: left;
    width: 300px;
    position: relative;
    padding: 1px;
    min-height: 249px;
    border: 2px solid #6a7fad;
    overflow: hidden;
    margin: 12px 10px;
	}
	.thumbnails li img {
  max-width: 100%;
  display: block;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  left: 50%;
	}
	
	.img-check{
		height: 200px;
		width: 250px;
	}
	.check_img {
  display: block;
  margin-top: -200px;
  position: relative;
}
  </style>
  