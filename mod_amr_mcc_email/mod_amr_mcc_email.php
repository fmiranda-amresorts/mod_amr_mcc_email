<?php
	//don't allow other scripts to grab and execute our file
	defined('_JEXEC') or die('Direct Access to this location is not allowed.');
	JHTML::_('behavior.formvalidation');
	//echo 'REQUEST='; foreach ($_SERVER as $i=>$ii) echo $i.'='.$ii.' ';
?>

<div id="sidebar_mail">
	<div id="header_mail">KEEP IN TOUCH</div>
	<div id="text_mail">Learn about deals &amp; specials by email.</div>
	<div id="link_mail"><a href="#gk_lightbox_room_test" rel="boxed"><?php echo $params->get('anchor_text'); ?></a></div>

	<div style="display: none;">
		<div id="gk_lightbox_room_test">
			<div class="form_mail">
				<!--form action="http://www.amresorts.us/pms_wsdl/CaptureLeadSimple.php" method="post"-->
				<form class='mail_sign_up form-validate' onsubmit='submitOverride(); return false;'>
					<input name="nextpage" type="hidden" value="<?php echo JURI::current();?>" />
					<input name="lead_source" type="hidden" value="<?php echo $params->get('lead_source'); ?>" />
					<label>FIRST NAME:</label>
					<input name="givenname" type="text" id="givenname" tabindex="1" title="first" value="" size="22" maxlength="100" required="required">
					<label>LAST NAME:</label>
					<input name="familyname" type="text" id="familyname" tabindex="2" title="givenname" value="" size="22" maxlength="100" required="required">
					<label>EMAIL:</label>
					<input name="email" type="text" id="input_mail" class="validate-email" tabindex="3"  title="email" value="" size="22" maxlength="320" required="required">
					<label>ZIPCODE:</label>
					<input name="zip" type="text" id="zipcode" tabindex="4"  class="validate-numeric" title="zipcode" value="" size="10" maxlength="320" required="required">
					<input id='optin' name='optin' type='checkbox' value='Y' required='required'>
					<p>I agree to receive e-mail communications regarding AMResorts’ branded resorts as well as from affiliates of AMResorts within the Apple Leisure Group companies regarding 
						their travel and hospitality products and services, including Unlimited Vacation Club, AppleVacations,CheapCaribbean.com, Travel Impressions and Amstar.  Once you have opted-in 
						to receive Email from us, you may choose to opt-out of Email communications at any time by updating your account.  For more information you can view our Privacy Policy.</p>
					<input type="image" name="but_img" class="content_button validate" src="images/button_sign_up.png">
				</form>
			</div>
			<div class="form_mess" style="display:none;">
				<center>Thank you!</center>You are now signed up to receive our latest news &amp; features, special promotions <br/>and subscribers-only limited offers and exclusive amenities. You can unsubscribe at any time.
			</div>
		</div>
	</div>        

	<script>
		jQuery("body").on( "click", "#sbox-overlay, #sbox-btn-close", function() {
			jQuery('.form_mail').show();
			jQuery('.form_mess').hide();
		});

		function submitOverride(){
			var $form = jQuery('.mail_sign_up'),
			$inputs = $form.find("input, select, button, textarea"),
			serializedData = $form.serialize();

			$inputs.attr("disabled", "disabled");

			jQuery.ajax({
				url: "http://www.amresorts.us/pms_wsdl/CaptureLeadSimple.php",
				type: "get",
				data: serializedData,
				dataType: 'text',

				success: function(response, textStatus, jqXHR){
					//alert('!!'+response);
				},
				error: function(jqXHR, textStatus, errorThrown){
					//alert('??'+textStatus+' - '+errorThrown);
				},
				complete: function(){
					$inputs.removeAttr("disabled");
					jQuery('.form_mail').hide();
					jQuery('.form_mess').show();
					//jQuery('#sidebar_mail').addClass('active');
				}
			});
		}
	</script>
</div>


