<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	if( isset($_POST['submit_extension']) )
	{
		 $prefship = $_POST['a2w_fulfillment_prefship'];
		 $phone_code = $_POST['a2w_fulfillment_phone_code'];
		 $phone_no = $_POST['a2w_fulfillment_phone_number'];
		 $custom_note = $_POST['a2w_fulfillment_custom_note'];
		
		 update_option('alib_prefship', $prefship);
		 update_option('alib_phone_code', $phone_code);
		 update_option('alib_phone_no', $phone_no);
		 update_option('alib_custom_note', $custom_note);
		 
	}
	
	 
?>


<div style="width:95%;margin-top:25px;">

<div class="alert alert-warning">Save time adding and ordering products by using our Chrome Extension!&nbsp;<a href="#" class="btn btn-success" style="float:right">Get Chrome Extension</a></div>

<div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="display-inline">Chrome Extension settings</h3>
        </div>
		<br>
        <div class="panel-body">
		<form id="update_extension" name="update_extension" action="#" method="post">
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Default shipping method</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="If possible, we will auto-select this shipping method during the checkout on AliExpress."></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                                                <select name="a2w_fulfillment_prefship" id="a2w_fulfillment_prefship" class="form-control small-input">
                            <option value="CAINIAO_STANDARD">AliExpress Standard Shipping</option>
                            <option value="CPAM">China Post Registered Air Mail</option>
                            <option value="EMS">EMS</option>
                            <option value="EMS_ZX_ZX_US" selected="selected">ePacket</option>
                            <option value="DHL">DHL</option>
                            <option value="FEDEX">FedEx</option>
                            <option value="SGP">Singapore Post</option>
                            <option value="TNT">TNT</option>
                            <option value="UPS">UPS</option>
                            <option value="USPS">USPS</option> 
                            <option value="CAINIAO_PREMIUM">AliExpress Premium Shipping</option>            
                        </select>       
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Override phone number</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="This will be used instead of a customer phone number."></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <input type="text" placeholder="code" style="max-width: 60px;" class="form-control col-md-2 col-sm-2 col-xs-2" id="a2w_fulfillment_phone_code" maxlength="5" name="a2w_fulfillment_phone_code" value="<?php echo get_option('alib_phone_code', true); ?>">
                        <input type="text" placeholder="phone" class="form-control small-input" id="a2w_fulfillment_phone_number" maxlength="16" name="a2w_fulfillment_phone_number" value="<?php echo get_option('alib_phone_no', true); ?>" style="max-width: 242px;margin-left: 70px;">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label>
                        <strong>Custom note</strong>
                    </label>
                    <div class="info-box" data-toggle="tooltip" title="" data-original-title="A note to the supplier on the Aliexpress checkout page."></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-block no-margin">
                        <textarea placeholder="note for aliexpress order" maxlength="1000" rows="5" class="form-control" id="a2w_fulfillment_custom_note" name="a2w_fulfillment_custom_note" cols="50"><?php echo get_option('alib_custom_note', true); ?></textarea>
                    </div>
                </div>
            </div>
			<input type="submit" name="submit_extension" value="Submit"  class="btn btn-success btn-circle" style="float:right;width:170px;"/>
        </form>
		</div>
		
    </div>

</div>
	