<?php

	if(isset($_POST['save_acc_settings'])){
		//echo '<pre>'; print_r($_POST); exit;
		$api_key = $_POST['api_key'];
		$tracking_id = $_POST['tracking_id'];
		$language = $_POST['language'];
		$currency = $_POST['currency'];
		update_option('ali_api_key', $api_key, true);
		update_option('ali_tracking_id', $tracking_id, true);
		update_option('ali_language', $language, true);
		update_option('ali_currency', $currency, true);  
	
		$product_type = 'no';
		$product_status = 'no';
		$import_attr = 'no';
		$import_desc = 'no';
		$imp_img_desc = 'no';
		$external_img_url = 'no';
		$rand_stock_val = 'no';
		$aliexp_sync = 'no';
		$avlb_product_status = 'no';
		$sync_type = 'no';
		$use_alip_ship = 'no';
		
		$product_type = $_POST['product_type'];
		$product_status = $_POST['product_status'];
		$import_attr = $_POST['import_attr'];
		$import_desc = $_POST['import_desc'];
		$imp_img_desc = $_POST['imp_img_desc'];
		$external_img_url = $_POST['external_img_url'];
		$rand_stock_val = $_POST['rand_stock_val'];
		$aliexp_sync = $_POST['aliexp_sync'];
		$avlb_product_status = $_POST['avlb_product_status'];
		$sync_type = $_POST['sync_type'];
		
		$load_review = $_POST['alib_load_review'];
		$review_status = $_POST['alib_review_status'];
		$review_translated = $_POST['alib_review_translated'];
		$review_avatar_import = $_POST['alib_review_avatar_import'];
		$review_max_per_product = $_POST['alib_review_max_per_product'];
		$review_raiting_from = $_POST['alib_review_raiting_from'];
		$review_raiting_to = $_POST['alib_review_raiting_to'];
		$review_noavatar_photo = $_POST['alib_review_noavatar_photo'];
		$review_load_attributes = $_POST['alib_review_load_attributes'];
		$review_show_image_list = $_POST['alib_review_show_image_list'];
		
		update_option('alib_product_type', $product_type, true);
		update_option('alib_product_status', $product_status, true);
		update_option('alib_import_attr', $import_attr, true);
		update_option('alib_import_desc', $import_desc, true);
		update_option('alib_imp_img_desc', $imp_img_desc, true);
		update_option('alib_external_img_url', $external_img_url, true);
		update_option('alib_rand_stock_val', $rand_stock_val, true);
		update_option('alib_aliexp_sync', $aliexp_sync, true);
		update_option('alib_avlb_product_status', $avlb_product_status, true);
		update_option('alib_sync_type', $sync_type, true);
		
		update_option('alib_load_review', $load_review, true);
		update_option('alib_review_status', $review_status, true);
		update_option('alib_review_translated', $review_translated, true);
		update_option('alib_review_avatar_import', $review_avatar_import, true);
		update_option('alib_review_max_per_product', $review_max_per_product, true);
		update_option('alib_review_raiting_from', $review_raiting_from, true);
		update_option('alib_review_raiting_to', $review_raiting_to, true);
		update_option('alib_review_noavatar_photo', $review_noavatar_photo, true);
		update_option('alib_review_load_attributes', $review_load_attributes, true);
		update_option('alib_review_show_image_list', $review_show_image_list, true);
		
		$use_alip_ship = $_POST['use_alip_ship'];
		$def_ship_cntry = $_POST['def_ship_cntry'];
		update_option('use_alip_ship', $use_alip_ship, true);
		update_option('def_ship_cntry', $def_ship_cntry, true);
		
	}
	
	$api_key = get_option('ali_api_key');
	$ali_tracking_id = get_option('ali_tracking_id');
	$ali_language = get_option('ali_language');
	$ali_currency = get_option('ali_currency'); 
	
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
	
	$use_alip_ship = get_option('use_alip_ship');
	$def_ship_cntry = get_option('def_ship_cntry'); 
	
?>
<div class="wrap">
<h1 class="wp-heading-inline">Settings</h1>

</div>

<div style="width:95%;margin-top:25px;">



<div class="container1">
 <form method="post" action="">
  <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">General Settings&nbsp;<span class="glyphicon glyphicon-chevron-down" style="position:relative;left:7px;"></span></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-footer">
			
				<p>
					
					<table class="widefat gnrl_settings" style="max-width:700px;">
						 
						<thead>
							<tr>
								<th>Default product type</th>
								<td>
									<select name="product_type" id="" class="form-control small-input">
										<option value="simple" <?php if($alib_product_type=='simple'){ echo 'selected="selected"'; } ?>>Simple/Variable Product</option>
										<option value="external" <?php if($alib_product_type=='external'){ echo 'selected="selected"'; } ?>>External/Affiliate Product</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>Default product status</th>
								<td>
									<select name="product_status" id="" class="form-control small-input">
										<option value="publish" <?php if($alib_product_status=='publish'){ echo 'selected="selected"'; } ?>>Publish</option>
										<option value="draft" <?php if($alib_product_status=='draft'){ echo 'selected="selected"'; } ?>>Draft</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>Import attributes</th>
								<td>
									<input type="checkbox" class="form-control" id="" name="import_attr" value="yes" <?php if($alib_import_attr=='yes'){ echo 'checked="checked"'; } ?> >
								</td>
							</tr>
							<tr>
								<th>Import description</th>
								<td>
									<input type="checkbox" class="form-control" id="" name="import_desc" value="yes" <?php if($alib_import_desc=='yes'){ echo 'checked="checked"'; } ?>>
								</td>
							</tr>
							<tr>
								<th>Don't import images from the description</th>
								<td>
									<input type="checkbox" class="form-control" id="" name="imp_img_desc" value="yes" <?php if($alib_imp_img_desc=='yes'){ echo 'checked="checked"'; } ?>>
								</td>
							</tr>
							<tr>
								<th>Use external image urls</th>
								<td>
									<input type="checkbox" class="form-control" id="" name="external_img_url" value="yes" <?php if($alib_external_img_url=='yes'){ echo 'checked="checked"'; } ?>>
								</td>
							</tr>
							<tr>
								<th>Use random stock value</th>
								<td>
									<input type="checkbox" class="form-control" id="" name="rand_stock_val" value="yes" <?php if($alib_rand_stock_val=='yes'){ echo 'checked="checked"'; } ?>>
								</td>
							</tr>
							<tr>
								<td colspan="2">Schedule Settings</th>
								
							</tr>
							<tr>
								<th>Aliexpress Sync </th>
								<td>
									<input type="checkbox" class="form-control" id="" name="aliexp_sync" value="yes" <?php if($alib_aliexp_sync=='yes'){ echo 'checked="checked"'; } ?>>
								</td>
							</tr>
							<tr>
								<th>Not available product status</th>
								<td>
									<select class="form-control small-input" name="avlb_product_status" id="">
										<option value="trash">Trash</option>
										<option value="outofstock" <?php if($alib_avlb_product_status=='outofstock'){ echo 'selected="selected"'; } ?>>Out of stock</option>
										<option value="instock" <?php if($alib_avlb_product_status=='instock'){ echo 'selected="selected"'; } ?>>In stock</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>Synchronization type</th>
								<td>
									<select class="form-control small-input" name="sync_type" id="">
										<option value="price_and_stock"  <?php if($alib_sync_type=='price_and_stock'){ echo 'selected="selected"'; } ?>>Sync price and stock</option>
										<option value="price"  <?php if($alib_sync_type=='price'){ echo 'selected="selected"'; } ?>>Sync only price</option>
										<option value="stock"  <?php if($alib_sync_type=='stock'){ echo 'selected="selected"'; } ?>>Sync only stock</option>
										<option value="no"  <?php if($alib_sync_type=='no'){ echo 'selected="selected"'; } ?>>Don't sync prices and stock</option>
									</select>
								</td>
							</tr>
							 
						</thead>
					</table>
					 
				</p>
	</div>
      </div>
    </div>
  </div>
  
  <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">Account Settings<span class="glyphicon glyphicon-chevron-down" style="position: relative;top: 3px;left: 9px;"></span></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-footer">
			 
		<table class="widefat gnrl_settings" style="max-width:400px;">
			 
			<thead>
				<tr>
					<th>APP Key</th>
					<td><input type="text" name="api_key" value="<?php echo $api_key; ?>"></td>
				</tr>
				<tr>
					<th>Tracking Id</th>
					<td><input type="text" name="tracking_id" value="<?php echo $ali_tracking_id; ?>" ></td>
				</tr>
				<tr>
					<th>Use Custom account</th>
					<td><input type="text" name="" value=""></td>
				</tr>
				<tr>
					<th>Account Type</th>
					<td><input type="text" name="" value="" ></td>
				</tr>
				<tr>

					<th>Language</th>
					<td>
						<select name="language" id="" class="">
							<option value="">--Select Language--</option>
                            <option value="en" <?php  if($ali_language=='en'){ echo 'selected="selected"'; } ?>>English</option>
                            <option value="ar" <?php  if($ali_language=='ar'){ echo 'selected="selected"'; } ?>>Arabic</option>
                            <option value="de" <?php  if($ali_language=='de'){ echo 'selected="selected"'; } ?>>German</option>
                            <option value="es" <?php  if($ali_language=='es'){ echo 'selected="selected"'; } ?>>Spanish</option>
                            <option value="fr" <?php  if($ali_language=='fr'){ echo 'selected="selected"'; } ?>>French</option>
                            <option value="it" <?php  if($ali_language=='it'){ echo 'selected="selected"'; } ?>>Italian</option>
                            <option value="pl" <?php  if($ali_language=='pl'){ echo 'selected="selected"'; } ?>>Polish</option>
                            <option value="ja" <?php  if($ali_language=='ja'){ echo 'selected="selected"'; } ?>>Japanese</option>
                            <option value="ko" <?php  if($ali_language=='ko'){ echo 'selected="selected"'; } ?>>Korean</option>
                            <option value="nl" <?php  if($ali_language=='nl'){ echo 'selected="selected"'; } ?>>Notherlandish (Dutch)</option>
                            <option value="pt" <?php  if($ali_language=='pt'){ echo 'selected="selected"'; } ?>>Portuguese (Brasil)</option>
                            <option value="ru" <?php  if($ali_language=='ru'){ echo 'selected="selected"'; } ?>>Russian</option>
                            <option value="th" <?php  if($ali_language=='th'){ echo 'selected="selected"'; } ?>>Thai</option>    
                            <option value="id" <?php  if($ali_language=='id'){ echo 'selected="selected"'; } ?>>Indonesian</option>              
                            <option value="tr" <?php  if($ali_language=='tr'){ echo 'selected="selected"'; } ?>>Turkish</option>
                            <option value="vi" <?php  if($ali_language=='vi'){ echo 'selected="selected"'; } ?>>Vietnamese</option>
                        </select>
					</td>
				</tr>
				<tr>
					<th>Currency</th>
					<td>
						<select name="currency" id="" class="">
                            <option value="">--Select Currency--</option>
                            <option value="usd" <?php  if($ali_currency=='usd'){ echo 'selected="selected"'; } ?>>USD</option>
                            <option value="rub" <?php  if($ali_currency=='rub'){ echo 'selected="selected"'; } ?>>RUB</option>
                            <option value="gbp" <?php  if($ali_currency=='gbp'){ echo 'selected="selected"'; } ?>>GBP</option>
                            <option value="brl" <?php  if($ali_currency=='brl'){ echo 'selected="selected"'; } ?>>BRL</option> 
                            <option value="cad" <?php  if($ali_currency=='cad'){ echo 'selected="selected"'; } ?>>CAD</option>
                            <option value="aud" <?php  if($ali_currency=='aud'){ echo 'selected="selected"'; } ?>>AUD</option>
                            <option value="eur" <?php  if($ali_currency=='eur'){ echo 'selected="selected"'; } ?>>EUR</option>
                            <option value="inr" <?php  if($ali_currency=='inr'){ echo 'selected="selected"'; } ?>>INR</option>
                            <option value="uah" <?php  if($ali_currency=='uah'){ echo 'selected="selected"'; } ?>>UAH</option>
                            <option value="jpy" <?php  if($ali_currency=='jpy'){ echo 'selected="selected"'; } ?>>JPY</option>
                            <option value="mxn" <?php  if($ali_currency=='mxn'){ echo 'selected="selected"'; } ?>>MXN</option>
                            <option value="idr" <?php  if($ali_currency=='idr'){ echo 'selected="selected"'; } ?>>IDR</option>
                            <option value="try" <?php  if($ali_currency=='try'){ echo 'selected="selected"'; } ?>>TRY</option>
                            <option value="sek" <?php  if($ali_currency=='sek'){ echo 'selected="selected"'; } ?>>SEK</option>
                        </select>
					</td>
				</tr>
				
			</thead>
		</table>
		 
	</div>
      </div>
    </div>
  </div>
  
  <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">Pricing Settings<span class="glyphicon glyphicon-chevron-down" style="position: relative;top: 3px;left: 19px;"></span></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-footer">
		<div class="panel-body">
			 <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Product Cost</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable product cost feature"></div>
                </div>
                <div class="col-md-6" style="width:220px;">
                    <div class="form-group input-block no-margin" style="width:70px;display:inline-block;">
                        <input type="text" class="form-control value" value="1.5" style="width:70px;">
                    </div>
					<div class="form-group input-block no-margin" style="display:inline-block;">
                            
							<select name="multiplier1" style="height:34px;">
								<option value="Multiplier">Multiplier</option>
								<option value="Fixed Markup">Fixed Markup</option>
								<option value="Custom Price">Custom Price</option>
							</select>
							
                    </div>
                </div>
				<div class="col-md-1" style="width: fit-content;">
                    <h3 style="width: 163px;margin-top: 10px;font-size: 16px;">Product price</h3>
                </div>
                
			</div>
			<div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Product Cost</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable product cost feature"></div>
                </div>
                <div class="col-md-6" style="width:220px;">
                    <div class="form-group input-block no-margin" style="width:70px;display:inline-block;">
                        <input type="text" class="form-control value" value="1.5" style="width:70px;">
                    </div>
					<div class="form-group input-block no-margin" style="display:inline-block;">
                            <select name="multiplier2" style="height:34px;">
							<option value="Multiplier">Multiplier</option>
							<option value="Fixed Markup">Fixed Markup</option>
							<option value="Custom Price">Custom Price</option>
							</select>
                    </div>
                </div>
				 <div class="col-md-1" style="width: fit-content;">
                    <h3 style="width:165px;margin-top: 10px;font-size: 16px;">Compared at price</h3>
                </div>
            </div>
			<div class="row">
                <div class="col-md-4">
                    <label>
                        <strong style="font-size:17px;">Advanced Pricing rules</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable Assign Cents"></div>
                </div>
			</div>
			<br>
			<div class="row">
                <table class="table table-bordered">
					<thead>
					  <tr>
						<th >Cost Range</th>
						<th>Markup</th>
						<th>Compare at price</th>
					  </tr>
					</thead>
					<tbody>
						<tr>
							<td><div class="input-group">        
                                            <input type="text" class="form-control min_price" value="0"><span class="input-group-addon"> BRL </span>
                                        </div>
							</td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Assign cents</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable Assign Cents"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="text" class="form-control" id="alib_assign_cents" name="alib_assign_cents" >
                    </div>
                </div>

            </div>
			<div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Assign compare at cents</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable Assign compare at cents"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="text" class="form-control" id="alib_assign_cmp_cents" name="alib_assign_cmp_cents">
                    </div>
                </div>

            </div>
			
			
      </div>
    </div>
  </div>
  </div>
  </div>
  
  <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse4">Reviews Settings<span class="glyphicon glyphicon-chevron-down" style="position: relative;top: 3px;left: 9px;"></span></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
         
        <div class="panel-footer">
		<div class="panel-body">

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Aliexpress Review Load</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable Review Load feature"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="alib_load_review" name="alib_load_review" value="yes" <?php if($alib_load_review=="yes"){ ?> checked="" <?php }?>>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Aliexpress Review Sync</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Enable Review Auto-Update feature"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="alib_review_status" name="alib_review_status" value="yes" <?php if($alib_review_status=="yes"){ ?> checked="" <?php }?>>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Translated Reviews</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Try to import translated reviews`s text from Aliexpress"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="alib_review_translated" name="alib_review_translated" value="yes" <?php if($alib_review_translated=="yes"){ ?> checked="" <?php }?>>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Import Avatars</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Try to import review`s avatar from Aliexpress"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control" id="alib_review_avatar_import" name="alib_review_avatar_import" value="yes" <?php if($alib_review_avatar_import=="yes"){ ?> checked="" <?php }?>>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Reviews per product</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="The max. number of reviews (per product) that can be imported during Aliexpress Review Sync"></div>
                </div>
                <div class="col-md-8">
                    <div class="form-group input-block no-margin">
                        <input type="text" class="form-control small-input" id="alib_review_max_per_product" name="alib_review_max_per_product" value="<?php echo $alib_review_max_per_product; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Reviews Raiting</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Filter imported reviews by the rating"></div>
                </div>
                <div class="col-md-3">
                    <div class="form-group input-block no-margin">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">from:</span>
                            <input type="text" class="form-control small-input" aria-describedby="basic-addon1" id="alib_review_raiting_from" name="alib_review_raiting_from" value="<?php echo $alib_review_raiting_from; ?>">
                        </div>

                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group input-block no-margin">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2">to:</span>
                            <input type="text" class="form-control small-input" aria-describedby="basic-addon2" id="alib_review_raiting_to" name="alib_review_raiting_to" value="<?php echo $alib_review_raiting_to; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Default Avatar</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Defalut review`s Avatar photo used for displaying near review`s text"></div>
                </div>
                <div class="col-md-3">
                                                            <img style="height: 80px; width: 80px; display: block;" src="http://ma-group5.com/demo/ali2woo-demo-store/wp-content/plugins/ali2woo/assets/img/noavatar.png">
                                    </div>
                <div class="col-md-5">
                    <label class="btn btn-default btn-file">
                        Browse <input class="form-control" type="file" hidden="" id="alib_review_noavatar_photo" name="alib_review_noavatar_photo">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Load Review Attributes</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Import Review Attributes from Aliexpress"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" class="form-control small-input" id="alib_review_load_attributes" name="alib_review_load_attributes" value="yes" <?php if($alib_review_load_attributes=="yes"){ ?> checked="" <?php }?>>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Show Review photos</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="Show Review Photo list"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="checkbox" id="alib_review_show_image_list" name="alib_review_show_image_list" value="yes" <?php if($alib_review_show_image_list=="yes"){ ?> checked="" <?php }?>>
                    </div>
                </div>

            </div>
        </div>
		</div>
      </div>
    </div>
  </div>
  
  <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse5">Shipping Settings<span class="glyphicon glyphicon-chevron-down" style="position: relative;top: 3px;left: 9px;"></span></a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-footer">
			 
		<table class="widefat gnrl_settings" style="max-width:800px;">
			 
			<thead>
				<tr>
					<th>Use Aliexpress Shipping</th>
					<td><input type="checkbox" name="use_alip_ship" value="yes" <?php if($use_alip_ship=='yes'){ echo 'checked="checked"'; } ?>/></td>
				</tr>
				<tr>
					<th>Default Shipping Country</th>
					<td><select name="def_ship_cntry" >
						<option value="">
                                            N/A                                        </option>
                                                                              <option value="US" <?php if($def_ship_cntry=='US'){ echo 'selected="selected"'; } ?>>
                                            United States                                        </option>
                                                                              <option value="RU" <?php if($def_ship_cntry=='RU'){ echo 'selected="selected"'; } ?>>
                                            Russian Federation                                        </option>
                                                                              <option value="BR" <?php if($def_ship_cntry=='BR'){ echo 'selected="selected"'; } ?>>
                                            Brazil                                        </option>
                                                                              <option value="AU" <?php if($def_ship_cntry=='AU'){ echo 'selected="selected"'; } ?>>
                                            Australia                                        </option>
                                                                              <option value="UK" <?php if($def_ship_cntry=='UK'){ echo 'selected="selected"'; } ?>>
                                            United Kingdom                                        </option>
                                                                              <option value="ES">
                                            Spain                                        </option>
                                                                              <option value="FR">
                                            France                                        </option>
                                                                              <option value="CA">
                                            Canada                                        </option>
                                                                              <option value="PL">
                                            Poland                                        </option>
                                                                              <option value="TR">
                                            Turkey                                        </option>
                                                                              <option value="SE">
                                            Sweden                                        </option>
                                                                              <option value="IL">
                                            Israel                                        </option>
                                                                              <option value="IT">
                                            Italy                                        </option>
                                                                              <option value="NZ">
                                            New Zealand                                        </option>
                                                                              <option value="DE">
                                            Germany                                        </option>
                                                                              <option value="split">
                                            Country &amp; Territories (A-Z)                                        </option>
                                                                              <option value="AF">
                                            Afghanistan                                        </option>
                                                                              <option value="ALA">
                                            Aland Islands                                        </option>
                                                                              <option value="AL">
                                            Albania                                        </option>
                                                                              <option value="GBA">
                                            Alderney                                        </option>
                                                                              <option value="DZ">
                                            Algeria                                        </option>
                                                                              <option value="AS">
                                            American Samoa                                        </option>
                                                                              <option value="AD">
                                            Andorra                                        </option>
                                                                              <option value="AO">
                                            Angola                                        </option>
                                                                              <option value="AI">
                                            Anguilla                                        </option>
                                                                              <option value="AG">
                                            Antigua and Barbuda                                        </option>
                                                                              <option value="AR">
                                            Argentina                                        </option>
                                                                              <option value="AM">
                                            Armenia                                        </option>
                                                                              <option value="AW">
                                            Aruba                                        </option>
                                                                              <option value="ASC">
                                            Ascension Island                                        </option>
                                                                              <option value="AU">
                                            Australia                                        </option>
                                                                              <option value="AT">
                                            Austria                                        </option>
                                                                              <option value="AZ">
                                            Azerbaijan                                        </option>
                                                                              <option value="BS">
                                            Bahamas                                        </option>
                                                                              <option value="BH">
                                            Bahrain                                        </option>
                                                                              <option value="BD">
                                            Bangladesh                                        </option>
                                                                              <option value="BB">
                                            Barbados                                        </option>
                                                                              <option value="BY">
                                            Belarus                                        </option>
                                                                              <option value="BE">
                                            Belgium                                        </option>
                                                                              <option value="BZ">
                                            Belize                                        </option>
                                                                              <option value="BJ">
                                            Benin                                        </option>
                                                                              <option value="BM">
                                            Bermuda                                        </option>
                                                                              <option value="BT">
                                            Bhutan                                        </option>
                                                                              <option value="BO">
                                            Bolivia                                        </option>
                                                                              <option value="BA">
                                            Bosnia and Herzegovina                                        </option>
                                                                              <option value="BW">
                                            Botswana                                        </option>
                                                                              <option value="BR">
                                            Brazil                                        </option>
                                                                              <option value="BN">
                                            Brunei Darussalam                                        </option>
                                                                              <option value="BG">
                                            Bulgaria                                        </option>
                                                                              <option value="BF">
                                            Burkina Faso                                        </option>
                                                                              <option value="BI">
                                            Burundi                                        </option>
                                                                              <option value="KH">
                                            Cambodia                                        </option>
                                                                              <option value="CM">
                                            Cameroon                                        </option>
                                                                              <option value="CA">
                                            Canada                                        </option>
                                                                              <option value="CV">
                                            Cape Verde                                        </option>
                                                                              <option value="KY">
                                            Cayman Islands                                        </option>
                                                                              <option value="CF">
                                            Central African Republic                                        </option>
                                                                              <option value="TD">
                                            Chad                                        </option>
                                                                              <option value="CL">
                                            Chile                                        </option>
                                                                              <option value="CX">
                                            Christmas Island                                        </option>
                                                                              <option value="CC">
                                            Cocos (Keeling) Islands                                        </option>
                                                                              <option value="CO">
                                            Colombia                                        </option>
                                                                              <option value="KM">
                                            Comoros                                        </option>
                                                                              <option value="ZR">
                                            Congo, The Democratic Republic Of The                                        </option>
                                                                              <option value="CG">
                                            Congo, The Republic of Congo                                        </option>
                                                                              <option value="CK">
                                            Cook Islands                                        </option>
                                                                              <option value="CR">
                                            Costa Rica                                        </option>
                                                                              <option value="CI">
                                            Cote D'Ivoire                                        </option>
                                                                              <option value="HR">
                                            Croatia (local name: Hrvatska)                                        </option>
                                                                              <option value="CU">
                                            Cuba                                        </option>
                                                                              <option value="CY">
                                            Cyprus                                        </option>
                                                                              <option value="CZ">
                                            Czech Republic                                        </option>
                                                                              <option value="DK">
                                            Denmark                                        </option>
                                                                              <option value="DJ">
                                            Djibouti                                        </option>
                                                                              <option value="DM">
                                            Dominica                                        </option>
                                                                              <option value="DO">
                                            Dominican Republic                                        </option>
                                                                              <option value="TP">
                                            East Timor                                        </option>
                                                                              <option value="EC">
                                            Ecuador                                        </option>
                                                                              <option value="EG">
                                            Egypt                                        </option>
                                                                              <option value="SV">
                                            El Salvador                                        </option>
                                                                              <option value="GQ">
                                            Equatorial Guinea                                        </option>
                                                                              <option value="ER">
                                            Eritrea                                        </option>
                                                                              <option value="EE">
                                            Estonia                                        </option>
                                                                              <option value="ET">
                                            Ethiopia                                        </option>
                                                                              <option value="FK">
                                            Falkland Islands (Malvinas)                                        </option>
                                                                              <option value="FO">
                                            Faroe Islands                                        </option>
                                                                              <option value="FJ">
                                            Fiji                                        </option>
                                                                              <option value="FI">
                                            Finland                                        </option>
                                                                              <option value="FR">
                                            France                                        </option>
                                                                              <option value="GF">
                                            French Guiana                                        </option>
                                                                              <option value="PF">
                                            French Polynesia                                        </option>
                                                                              <option value="GA">
                                            Gabon                                        </option>
                                                                              <option value="GM">
                                            Gambia                                        </option>
                                                                              <option value="GE">
                                            Georgia                                        </option>
                                                                              <option value="DE">
                                            Germany                                        </option>
                                                                              <option value="GH">
                                            Ghana                                        </option>
                                                                              <option value="GI">
                                            Gibraltar                                        </option>
                                                                              <option value="GR">
                                            Greece                                        </option>
                                                                              <option value="GL">
                                            Greenland                                        </option>
                                                                              <option value="GD">
                                            Grenada                                        </option>
                                                                              <option value="GP">
                                            Guadeloupe                                        </option>
                                                                              <option value="GU">
                                            Guam                                        </option>
                                                                              <option value="GT">
                                            Guatemala                                        </option>
                                                                              <option value="GGY">
                                            Guernsey                                        </option>
                                                                              <option value="GN">
                                            Guinea                                        </option>
                                                                              <option value="GW">
                                            Guinea-Bissau                                        </option>
                                                                              <option value="GY">
                                            Guyana                                        </option>
                                                                              <option value="HT">
                                            Haiti                                        </option>
                                                                              <option value="HN">
                                            Honduras                                        </option>
                                                                              <option value="HK">
                                            Hong Kong                                        </option>
                                                                              <option value="HU">
                                            Hungary                                        </option>
                                                                              <option value="IS">
                                            Iceland                                        </option>
                                                                              <option value="IN">
                                            India                                        </option>
                                                                              <option value="ID">
                                            Indonesia                                        </option>
                                                                              <option value="IR">
                                            Iran (Islamic Republic of)                                        </option>
                                                                              <option value="IQ">
                                            Iraq                                        </option>
                                                                              <option value="IE">
                                            Ireland                                        </option>
                                                                              <option value="IL">
                                            Israel                                        </option>
                                                                              <option value="IT">
                                            Italy                                        </option>
                                                                              <option value="JM">
                                            Jamaica                                        </option>
                                                                              <option value="JP">
                                            Japan                                        </option>
                                                                              <option value="JEY">
                                            Jersey                                        </option>
                                                                              <option value="JO">
                                            Jordan                                        </option>
                                                                              <option value="KZ">
                                            Kazakhstan                                        </option>
                                                                              <option value="KE">
                                            Kenya                                        </option>
                                                                              <option value="KI">
                                            Kiribati                                        </option>
                                                                              <option value="KW">
                                            Kuwait                                        </option>
                                                                              <option value="KG">
                                            Kyrgyzstan                                        </option>
                                                                              <option value="LA">
                                            Lao People's Democratic Republic                                        </option>
                                                                              <option value="LV">
                                            Latvia                                        </option>
                                                                              <option value="LB">
                                            Lebanon                                        </option>
                                                                              <option value="LS">
                                            Lesotho                                        </option>
                                                                              <option value="LR">
                                            Liberia                                        </option>
                                                                              <option value="LY">
                                            Libya                                        </option>
                                                                              <option value="LI">
                                            Liechtenstein                                        </option>
                                                                              <option value="LT">
                                            Lithuania                                        </option>
                                                                              <option value="LU">
                                            Luxembourg                                        </option>
                                                                              <option value="MO">
                                            Macau                                        </option>
                                                                              <option value="MK">
                                            Macedonia                                        </option>
                                                                              <option value="MG">
                                            Madagascar                                        </option>
                                                                              <option value="MW">
                                            Malawi                                        </option>
                                                                              <option value="MY">
                                            Malaysia                                        </option>
                                                                              <option value="MV">
                                            Maldives                                        </option>
                                                                              <option value="ML">
                                            Mali                                        </option>
                                                                              <option value="MT">
                                            Malta                                        </option>
                                                                              <option value="MH">
                                            Marshall Islands                                        </option>
                                                                              <option value="MQ">
                                            Martinique                                        </option>
                                                                              <option value="MR">
                                            Mauritania                                        </option>
                                                                              <option value="MU">
                                            Mauritius                                        </option>
                                                                              <option value="YT">
                                            Mayotte                                        </option>
                                                                              <option value="MX">
                                            Mexico                                        </option>
                                                                              <option value="FM">
                                            Micronesia                                        </option>
                                                                              <option value="MD">
                                            Moldova                                        </option>
                                                                              <option value="MC">
                                            Monaco                                        </option>
                                                                              <option value="MN">
                                            Mongolia                                        </option>
                                                                              <option value="MNE">
                                            Montenegro                                        </option>
                                                                              <option value="MS">
                                            Montserrat                                        </option>
                                                                              <option value="MA">
                                            Morocco                                        </option>
                                                                              <option value="MZ">
                                            Mozambique                                        </option>
                                                                              <option value="MM">
                                            Myanmar                                        </option>
                                                                              <option value="NA">
                                            Namibia                                        </option>
                                                                              <option value="NR">
                                            Nauru                                        </option>
                                                                              <option value="NP">
                                            Nepal                                        </option>
                                                                              <option value="NL">
                                            Netherlands                                        </option>
                                                                              <option value="AN">
                                            Netherlands Antilles                                        </option>
                                                                              <option value="NC">
                                            New Caledonia                                        </option>
                                                                              <option value="NZ">
                                            New Zealand                                        </option>
                                                                              <option value="NI">
                                            Nicaragua                                        </option>
                                                                              <option value="NE">
                                            Niger                                        </option>
                                                                              <option value="NG">
                                            Nigeria                                        </option>
                                                                              <option value="NU">
                                            Niue                                        </option>
                                                                              <option value="NF">
                                            Norfolk Island                                        </option>
                                                                              <option value="KP">
                                            North Korea                                        </option>
                                                                              <option value="MP">
                                            Northern Mariana Islands                                        </option>
                                                                              <option value="NO">
                                            Norway                                        </option>
                                                                              <option value="OM">
                                            Oman                                        </option>
                                                                              <option value="Other">
                                            Other Country                                        </option>
                                                                              <option value="PK">
                                            Pakistan                                        </option>
                                                                              <option value="PW">
                                            Palau                                        </option>
                                                                              <option value="PS">
                                            Palestine                                        </option>
                                                                              <option value="PA">
                                            Panama                                        </option>
                                                                              <option value="PG">
                                            Papua New Guinea                                        </option>
                                                                              <option value="PY">
                                            Paraguay                                        </option>
                                                                              <option value="PE">
                                            Peru                                        </option>
                                                                              <option value="PH">
                                            Philippines                                        </option>
                                                                              <option value="PL">
                                            Poland                                        </option>
                                                                              <option value="PT">
                                            Portugal                                        </option>
                                                                              <option value="PR">
                                            Puerto Rico                                        </option>
                                                                              <option value="QA">
                                            Qatar                                        </option>
                                                                              <option value="RE">
                                            Reunion                                        </option>
                                                                              <option value="RO">
                                            Romania                                        </option>
                                                                              <option value="RU">
                                            Russian Federation                                        </option>
                                                                              <option value="RW">
                                            Rwanda                                        </option>
                                                                              <option value="BLM">
                                            Saint Barthelemy                                        </option>
                                                                              <option value="KN">
                                            Saint Kitts and Nevis                                        </option>
                                                                              <option value="LC">
                                            Saint Lucia                                        </option>
                                                                              <option value="MAF">
                                            Saint Martin                                        </option>
                                                                              <option value="VC">
                                            Saint Vincent and the Grenadines                                        </option>
                                                                              <option value="WS">
                                            Samoa                                        </option>
                                                                              <option value="SM">
                                            San Marino                                        </option>
                                                                              <option value="ST">
                                            Sao Tome and Principe                                        </option>
                                                                              <option value="SA">
                                            Saudi Arabia                                        </option>
                                                                              <option value="SCT">
                                            Scotland                                        </option>
                                                                              <option value="SN">
                                            Senegal                                        </option>
                                                                              <option value="SRB">
                                            Serbia                                        </option>
                                                                              <option value="SC">
                                            Seychelles                                        </option>
                                                                              <option value="SL">
                                            Sierra Leone                                        </option>
                                                                              <option value="SG">
                                            Singapore                                        </option>
                                                                              <option value="SK">
                                            Slovakia (Slovak Republic)                                        </option>
                                                                              <option value="SI">
                                            Slovenia                                        </option>
                                                                              <option value="SB">
                                            Solomon Islands                                        </option>
                                                                              <option value="SO">
                                            Somalia                                        </option>
                                                                              <option value="ZA">
                                            South Africa                                        </option>
                                                                              <option value="SGS">
                                            South Georgia and the South Sandwich Islands                                        </option>
                                                                              <option value="KR">
                                            South Korea                                        </option>
                                                                              <option value="SS">
                                            South Sudan                                        </option>
                                                                              <option value="ES">
                                            Spain                                        </option>
                                                                              <option value="LK">
                                            Sri Lanka                                        </option>
                                                                              <option value="PM">
                                            St. Pierre and Miquelon                                        </option>
                                                                              <option value="SD">
                                            Sudan                                        </option>
                                                                              <option value="SR">
                                            Suriname                                        </option>
                                                                              <option value="SZ">
                                            Swaziland                                        </option>
                                                                              <option value="SE">
                                            Sweden                                        </option>
                                                                              <option value="CH">
                                            Switzerland                                        </option>
                                                                              <option value="SY">
                                            Syrian Arab Republic                                        </option>
                                                                              <option value="TW">
                                            Taiwan                                        </option>
                                                                              <option value="TJ">
                                            Tajikistan                                        </option>
                                                                              <option value="TZ">
                                            Tanzania                                        </option>
                                                                              <option value="TH">
                                            Thailand                                        </option>
                                                                              <option value="TLS">
                                            Timor-Leste                                        </option>
                                                                              <option value="TG">
                                            Togo                                        </option>
                                                                              <option value="TO">
                                            Tonga                                        </option>
                                                                              <option value="TT">
                                            Trinidad and Tobago                                        </option>
                                                                              <option value="TN">
                                            Tunisia                                        </option>
                                                                              <option value="TR">
                                            Turkey                                        </option>
                                                                              <option value="TM">
                                            Turkmenistan                                        </option>
                                                                              <option value="TC">
                                            Turks and Caicos Islands                                        </option>
                                                                              <option value="TV">
                                            Tuvalu                                        </option>
                                                                              <option value="UG">
                                            Uganda                                        </option>
                                                                              <option value="UA">
                                            Ukraine                                        </option>
                                                                              <option value="AE">
                                            United Arab Emirates                                        </option>
                                                                              <option value="UK">
                                            United Kingdom                                        </option>
                                                                              <option value="US">
                                            United States                                        </option>
                                                                              <option value="UY">
                                            Uruguay                                        </option>
                                                                              <option value="UZ">
                                            Uzbekistan                                        </option>
                                                                              <option value="VU">
                                            Vanuatu                                        </option>
                                                                              <option value="VA">
                                            Vatican City State (Holy See)                                        </option>
                                                                              <option value="VE">
                                            Venezuela                                        </option>
                                                                              <option value="VN">
                                            Vietnam                                        </option>
                                                                              <option value="VG">
                                            Virgin Islands (British)                                        </option>
                                                                              <option value="VI">
                                            Virgin Islands (U.S.)                                        </option>
                                                                              <option value="WF">
                                            Wallis And Futuna Islands                                        </option>
                                                                              <option value="YE">
                                            Yemen                                        </option>
                                                                              <option value="YU">
                                            Yugoslavia                                        </option>
                                                                              <option value="ZM">
                                            Zambia                                        </option>
                                                                              <option value="EAZ">
                                            Zanzibar                                        </option>
                                                                              <option value="ZW">
                                            Zimbabwe                                        </option>
					</select></td>
				</tr>
				 
				</thead>
		</table>
		 
	</div>
      </div>
    </div>
  </div>
  
  <div class="panel-group">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse6">System Info<span class="glyphicon glyphicon-chevron-down" style="position: relative;top: 3px;left: 48px;"></span></a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-footer">
			<table class="widefat gnrl_settings" style="max-width:400px;">
			 
			<thead>
				<tr>
					<th>Server address</th>
					<td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
				</tr>
				<tr>
					<th>Php version</th>
					<td style="color:green">OK</td>
				</tr>  
				<tr>
					<th>Server ping</th>
					<td style="color:green">OK</td>
				</tr>
				</thead>
		</table>
	</div>
      </div>
    </div>
  </div>
  <div>
					<input type="submit" name="save_acc_settings" value="Update Settings" class="btn btn-success"/>
				 </div>
  </form>
</div>
    
				
				
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$( "#tabs" ).tabs();
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
  </style>
  