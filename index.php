<?php
	include_once("./db/db.php");
	include("./db/basicfunctions.php");
	session_start();
	$settings = getSiteSettings();

?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>ExaMocks - Best RSMSSB Computer instructor(Anudeshak) Prepration Website</title>
		<?php include_once("loneheader.php"); ?>
		<link rel="stylesheet" href="./assets/css/custom-home.css">
	</head>
	<body>
	
	<?php include_once("lonenavbar.php"); ?>

	<main class="no-padding">
	<div class="section white no-pad-top">
		<div class="section <?php echo $settings['primary_color']; ?> darken-1 no-pad-bot z-depth-1 start-splash-section">
		  <div class="container start-splash-container">
			  <div class="row">
				<div class="col s12 l6">
					<div class="white-text start-splash-header-content">
						<span class="start-splash-header-text white-text">Welcome to ExaMocks</span>
						<h3 class="white-text start-header-paragraph-text">
							One place, all exams <br/> Best in class online test series platform. With Exam like interface tackle the rush of final exam before the exam.
						</h3>
						<a class="waves-effect waves-light btn modal-trigger" style="margin-bottom:10px;margin-right: 10px;margin-top:0px;" href="#modalBuy" onclick="buySingle()"><i class="material-icons left">login</i>Login</a>
						<a class="waves-effect waves-light btn orange darken-3 modal-trigger" style="margin-bottom:10px;margin-right: 10px;margin-top:0px;" href="#modalBuyKL" onclick="buySingleKL()"><i class="material-icons left">personadd</i>Register</a>
					</div>
				</div>
				<div class="col s6 l3">
					<div class="splash-image-container">
						<img src="./assets/images/features-one.jpg" class="splash-image">
					</div>
				</div>
				<div class="col s6 l3">
					<div class="splash-image-container">
						<img src="./assets/images/features-two.jpg" class="splash-image">
					</div>
				</div>
			  </div>
		  </div>
		</div>
	</div>

	<div class="section white" id="features">
		<div class="container">
			<div class="row">		
				<div class="col s12 m6">
					<h5 class="text-primarycolor">Browser Features</h5>
					<p class="start-paragraph-text"><span class="text-primarycolor">Kiosk Browser</span> has an extensive feature set. You can try these features for 5 days simply by installing, a licence is required for both personal and commercial use.</p>
					<a class="waves-effect waves-light btn" href="https://help.android-kiosk.com/en/article/kb-installing-1swizyi/" target="_blank" style="margin-bottom:50px"><i class="mdi mdi-briefcase-download left"></i>Install Now</a>
					<a href="https://play.google.com/store/apps/details?id=com.procoit.kioskbrowser&amp;utm_source=global_co&amp;utm_medium=prtnr&amp;utm_content=Mar2515&amp;utm_campaign=PartBadge&amp;pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img alt="Get it on Google Play" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/google-play-badge.png" width="148" style="margin-left: -10px"></a>						
					<ul class="start-feature-list">
						<span class="new badge" data-badge-caption="" style="float:none;margin-left:0px;">Browser</span>
						<li>Lock your device(s) to a single URL</li>
						<li>Control clearing of <a href="https://kioskbrowser.crisp.help/en/article/clear-cache-webstorage-cookies-and-form-data-1sfpc0m/" target="_blank">cache, cookies, history &amp; web storage</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/screensaver-5dr7qu/" target="_blank">Screensaver</a> | <a href="https://kioskbrowser.crisp.help/en/article/bookmarks-bar-1c1982k/" target="_blank">Bookmarks Bar</a> | <a href="https://kioskbrowser.crisp.help/en/article/whitelist-ik8pgt/" target="_blank">Allow List</a> | <a href="https://kioskbrowser.crisp.help/en/article/blacklist-11uaxnu/" target="_blank">Deny List</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/nfc-il2sf0/" target="_blank">NFC Reader</a> | <a href="https://kioskbrowser.crisp.help/en/article/barcode-scanning-eslkdg/" target="blank">Barcode Scanner</a> | <a href="https://help.android-kiosk.com/en/article/zebra-tc-series-integration-16ox5x7/" target="blank">Hardware Barcode Scanner Integration</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/printing-with-google-cloud-print-17bdne6/" target="_blank">Google Cloud Print</a> | <a href="https://kioskbrowser.crisp.help/en/article/printing-via-bluetooth-189t9gc/" target="_blank">Bluetooth (ESC/POS) Printing</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/app-drawer-1uwohg9/" target="_blank">App Drawer</a> | <a href="https://help.android-kiosk.com/en/category/javascript-interface-qgc7qc/" target="_blank">JavaScript interface</a> | <a href="https://help.android-kiosk.com/en/article/kiosk-browser-automatic-configuration-json-10jz1hs/" target="_blank">Bulk configure via JSON</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/custom-error-and-access-denied-pages-1yau22d/" target=" _blank">Custom Error &amp; Access Denied Pages</a> | <a href="https://kioskbrowser.crisp.help/en/article/pdf-support-7f73zc/" target="_blank">PDF Reader</a></li>
						<li>70+ settings to control every aspect of Kiosk Browser</li>						
					</ul>
					<p class="start-paragraph-text text-primarycolor"><a href="#custom">We also offer a branding facility/customisation service.</a></p>					
				</div><div class="col s6 offset-s3 m6 center" style="">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/ic_launcher256w.png">
				</div>
				
			</div>
			<div class="row">		
				<div class="col s12 m6 center hide-on-small-and-down">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/ic_launcher_kl256w.png">
				</div>
				<div class="col s12 m6">
					<h5 class="orange-text text-darken-3">Launcher Features</h5>
					<p class="start-paragraph-text"><span class="orange-text text-darken-3">Kiosk Launcher</span> has an extensive feature set. You can try these features for 5 days simply by installing, a licence is required for both personal and commercial use.</p>
					<ul class="start-feature-list">
						<span class="new badge orange darken-3" data-badge-caption="" style="float:none;margin-left:0px;">Launcher</span>
						<li>Allow access to authorised applications only (all others are blocked)</li>
						<li><a href="https://help.android-kiosk.com/en/article/kl-default-app-single-app-mode-1912g2o/" target="_blank" class="orange-text text-darken-3">Launch single app automatically on launcher start/resume</a></li>
						<li><a href="https://help.android-kiosk.com/en/article/kl-application-updates-1w7homn/" target="_blank" class="orange-text text-darken-3">Automatic scheduled app updates</a></li>
						<li><a href="https://help.android-kiosk.com/en/article/kiosk-launcher-automatic-configuration-json-1scdysd/" target="_blank" class="orange-text text-darken-3">Bulk configure via JSON</a></li>
						<li><a href="https://help.android-kiosk.com/en/article/kiosk-launcher-automatic-configuration-json-1scdysd/#3-installingupdating-applications" target="_blank" class="orange-text text-darken-3">Install and update applications (APK) via provisioning OR via JSON</a></li>
						<li><a href="https://help.android-kiosk.com/en/article/kl-built-in-browser-cual5j/" target="_blank" class="orange-text text-darken-3">Built in web browser</a></li>
					</ul>	
					<a class="waves-effect waves-light btn orange darken-3" href="https://klr.android-kiosk.com/Home/Install" target="_&quot;blank&quot;"><i class="mdi mdi-briefcase-download left"></i>Install Now</a>				
				</div>
				<div class="col s6 offset-s3 m6 center hide-on-med-and-up">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/brand_illustration.png">
				</div>
			</div>
			<div class="row">		
				<div class="col s12 m6">
					<h5 class="text-primarycolor">Common <span class="orange-text text-darken-3">Features</span></h5>
					<ul class="start-feature-list">
						<span class="new badge" data-badge-caption="" style="float:none;margin-left:0px;">Browser</span>&nbsp;<span class="new badge orange darken-3" data-badge-caption="" style="float:none;margin-left:0px;">Launcher</span>
												<li>Password <a href="https://kioskbrowser.crisp.help/en/article/how-do-i-exit-azhu30/" target="_blank">protected settings</a> &amp; <a href="https://kioskbrowser.crisp.help/en/article/wifi-settings-password-1u310nr/" target="_blank">WiFi settings</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/full-screen-mode-and-hiding-the-toolbar-1omq6ux/" target="_blank">Control visibility of toolbar</a></li>
						<li>Display your brand name and logo in the toolbar</li>
						<li>Choice of <a href="https://kioskbrowser.crisp.help/en/article/themes-fk9mdi/" target="_blank">10 themes</a></li>
						<li><a href="https://kioskbrowser.crisp.help/en/article/scheduled-sleepwake-19illzv/" target="_blank">Scheduled sleep/wake/app restart</a></li>
						<li>Automatic crash recovery</li>
					</ul>
					
				</div>
				<div class="col s6 offset-s3 m6 center">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/licensed_illustration_noicon2.png">
				</div>
				
			</div>
		</div>
	</div>
	<div class="section" id="provisioning">
		<div class="container">
			<div class="row">		
				<div class="col s12 m6 ">
					<h5 class="start grey-text text-darken-3">Provisioning Devices</h5>
					<p>When provisioning a device using our provisioning process your device is locked down in the most secure way possible. <span class="text-primarycolor">Kiosk Browser</span>/<span class="orange-text text-darken-3">Kiosk Launcher</span> becomes the "device owner" meaning that it is granted more permissions vs a standard installation. 
					</p>
					<ul style="margin-bottom: 16px;padding-left: 16px;">
						<li style="margin: 5px 0;padding: 0;list-style: initial;font-size:14px;">Streamlined setup process (embed licence keys or remote management registration key)</li>
						<li style="margin: 5px 0;padding: 0;list-style: initial;font-size:14px;">Set the default launcher programmatically without user intervention</li>
						<li style="margin: 5px 0;padding: 0;list-style: initial;font-size:14px;">Hide home button and recents button</li>
						<li style="margin: 5px 0;padding: 0;list-style: initial;font-size:14px;">Update <span class="text-primarycolor">Kiosk Browser</span>/<span class="orange-text text-darken-3">Kiosk Launcher</span> without visiting your devices (via remote management)</li>
					</ul>
					<div class="center">
						<a class="waves-effect waves-light btn" href="https://www.android-kiosk.com/provisioning/" style="margin-bottom:10px;">More Info (Browser)</a> <a class="waves-effect waves-light btn orange darken-3" href="https://www.android-kiosk.com/provisioningkl/" style="margin-bottom:10px;">More Info (Launcher)</a>
					</div>
					
				</div>
				<div class="col s6 offset-s3 m6 center">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/qrcode-scan-grey.png">
				</div>
			</div>  
		</div>
	</div>
	<div class="section white" id="remotemanagement">
		<div class="container">
			<div class="row">		
				<div class="col s12 m6 ">
					<h5 class="start grey-text text-darken-3">Manage your installations remotely!</h5>
					<p>Our web based remote management console (subscription) provides central management functions for all your <span class="text-primarycolor">Kiosk Browser</span>/<span class="orange-text text-darken-3">Kiosk Launcher</span> devices.</p>
					<blockquote>
					A subscription costs just £1 GBP / $1.60 USD <strong>per device</strong> <em>per month (volume pricing is available).</em><br>
					We offer a free 14 day trial with no obligation to subscribe once the trial ends.
					</blockquote>
					<div class="center">
						<a class="waves-effect waves-light btn grey darken-3" href="/remote-management/" style="margin-bottom:10px;">More Info &amp; Free Trial...</a>
					</div>
				</div>
				<div class="col s6 offset-s3 m6 center">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/desk_illustration2.png">
				</div>
			</div>  
		</div>
	</div>
	<div class="section grey darken-3" id="custom">
		<div class="container">
			<div class="row">
				<div class="col s6 offset-s3 m6 center">
					<img class="responsive-img" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/ic_launcher_customise.png">
				</div><div class="col s12 m6">
					<h5 class="start white-text">Get Branded Version</h5>
					<p class="start-paragraph-text" style="color:rgba(255, 255, 255, .8);">We offer a customisation service whereby we can create a custom version of <span class="text-primarycolor">Kiosk Browser</span> (<span class="orange-text text-darken-3">Kiosk Launcher</span> not currently available to brand) with your logo, application name, default URL and many other default settings.</p>
					<ul style="margin-bottom: 16px;padding-left: 16px;color:rgba(255, 255, 255, .8);">
						<li style="margin: 14px 0;padding: 0;list-style: initial;font-size:14px;">Customised APK file</li>
						<li style="margin: 14px 0;padding: 0;list-style: initial;font-size:14px;">Request a new APK whenever a new version of Kiosk Browser is released</li>
						<li style="margin: 14px 0;padding: 0;list-style: initial;font-size:14px;">Fully compatible with our remote management service</li>
						<li style="margin: 14px 0;padding: 0;list-style: initial;font-size:14px;">Embed licence keys or remote registration keys</li>
						<li style="margin: 14px 0;padding: 0;list-style: initial;font-size:14px;">Embed a local start page for advanced onboarding procedures</li>
					</ul>
					<p>
						<a href="https://kioskbrowser.crisp.help/en/article/can-i-get-a-branded-version-for-my-company-txl7z6/" target="_blank" class="white-text">FIND OUT MORE</a>
						<a href="https://androidkiosk.onfastspring.com/" target="_blank" class="white-text" style="padding-left: 20px;">BUY BRANDED VERSION</a>
					</p>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="section" id="screenshots">
		<div class="container">
			<h5 class="start grey-text text-darken-3">Screenshots</h5>
			<div class="row">
			  <div class="col s12 m6">
				<div><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/screenshots/1.png" class="responsive-img z-depth-2"></div>
			  </div>
			  <div class="col s12 m6">
				<div><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/screenshots/kl3.png" class="responsive-img z-depth-2" style="max-height:472px;display: block;margin-left: auto;margin-right: auto;"></div>
			  </div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="center">
						<a class="waves-effect waves-light btn modal-trigger" style="margin-right:10px;margin-bottom: 5px;" href="#modalBuy" onclick="buySingle()"><i class="mdi mdi-credit-card left"></i>Buy Now (Browser)</a>
						<a class="waves-effect waves-light btn orange darken-3 modal-trigger" style="margin-right:10px;margin-bottom: 5px;" href="#modalBuyKL" onclick="buySingleKL()"><i class="mdi mdi-credit-card left"></i>Buy Now (Launcher)</a>
						<a class="waves-effect waves-light btn grey darken-3" href="/remote-management/" style="margin-bottom: 5px;"><i class="mdi mdi-television-guide left" style="margin-right:10px;margin-bottom: 5px;"></i>Remote Manage Trial</a>
					</div>
				</div>
			</div>
		</div>
    </div>
 
    <div class="section white">
		<div class="container">
		  <h5 class="start text-primarycolor">Some of our clients</h5>
		  <div class="row">
		  	<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.honda-eu.com" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/honda.png" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.vodafone.qa" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/vodafone.jpg" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.mazda.com.au" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/mazda.png" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.mg.co.uk" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/mg.png" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.adidas.com" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/adidas.png" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.colostate.edu" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/coloradostate.png" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 offset-m2 m4 offset-l4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.mountvernon.org" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/mountvernon.png" class="responsive-img"></a>
				</div>
			</div>
			<div class="col s6 m4 l2">
				<div class="valign-wrapper" style="padding: 10px;">
					<a href="http://www.uva.fi" target="_blank" class="waves-effect waves-block waves-light valign center" style="width:100%;"><img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/customers/university-of-vaasa.png" class="responsive-img"></a>
				</div>
			</div>
		  </div>
		</div>
		<div class="container">
		  <div class="row">
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man1.png" class="circle">
				</div>
				<div class="col s9 m8 l9">
					<blockquote>
						<p class="grey-text text-darken-3">
							<span style="font-weight:500;">When we first</span> started working with this app, it had a pretty steep learning curve. These guys have been working diligently on building their documentation, listening to their customers and adding fixes/additional features; and it has paid off! This app is worth every cent if you are looking to use it commercially like we have. 

						</p>
						<p style="font-weight:300;">Gunther Vinson, TowMate LLC</p>
						<div class="divider"></div>
					</blockquote>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man3.png" class="circle">
				</div>
				<div class="col s9 m8 l9">
					<blockquote>
						<p class="grey-text text-darken-3">
							<span style="font-weight:500;">Great product - incredible support</span>. We use this product in about 40 locations at our company and it works perfectly all-day, every-day.
						</p>
						<p style="font-weight:300;">David Higginson</p>
						<div class="divider"></div>
					</blockquote>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="col s3 m4 l3">
					<img width="65" height="65" src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/material_man2.png" class="circle">
				</div>
				<div class="col s9 m8 l9">
					<blockquote>
						<p class="grey-text text-darken-3">
							<span style="font-weight:500;">Perfect</span>, use it for our tennis court reservation kiosk with a Google Apps Script web app. Works perfectly.
						</p>
						<p style="font-weight:300;">Serge Gravelle</p>
						<div class="divider"></div>
					</blockquote>
				</div>
			</div>
		  </div>
		</div>
	</div>
  <!-- Modal Structure -->
  <div id="modalBuy" class="modal bottom-sheet" style="max-height:65%;">
  	<a href="#!" class="modal-action modal-close"><i class="mdi mdi-close right grey-text" style="font-size:38px;padding:15px;"></i></a>
    <div class="modal-content">
      <h4>Buy</h4>
		<ul class="collection">
			  <li class="collection-item avatar">
				<img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/ic_launcher.png" class="circle" style="border-radius:0%;">
				<span class="title">Kiosk Browser</span>
				<p style="font-size:14px;">Single Device Licence <br>
					Buy Once, free upgrades.<br>
				   </p><div>
				   <span>Qty: </span>
						<input type="text" onkeypress="return isNumberKey(event)" class="form-control" data-fsc-item-quantity-value="" data-fsc-item-quantity="" data-fsc-item-path-value="kiosk-browser-pro" data-fsc-autoapply="" data-fsc-action="Update" data-fsc-item-path="kiosk-browser-pro" style="width:50px;font-weight: 800;display: inline;">
						<!---<input type="text" onkeypress='return isNumberKey(event)' class="form-control" class="inline" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="kiosk-browser-pro" data-fsc-autoapply data-fsc-action="Update" data-fsc-item-path="kiosk-browser-pro" data-fsc-item-selection-smartdisplay style="width:50px;font-weight: 800;display:inline;">-->
				   </div>
				   <span style="font-size:10px;" class="grey-text">Discount applied at 250+ (65%) &amp; 500+ (80%) licences</span><br>
				   <span style="font-size:10px;" class="grey-text">Licensing FAQs can be found <a href="https://kioskbrowser.crisp.help/en/category/licensing-158vh07/" target="_blank">here</a>.</span>
				<p></p>
				 <!--<p style="font-size:14px;"><strong>Save 10% on your order!</strong> Leave a review on <a href="https://play.google.com/store/apps/details?id=com.procoit.kioskbrowser">Google Play</a> then <a href="mailto:support@android-kiosk.com">contact us</a> for a discount code.</p>-->
				<span class="secondary-content" data-fsc-item-path="kiosk-browser-pro" data-fsc-item-price="">₹&nbsp;897.54</span>
				<a href="#" class="secondary-content" style="margin-top: 20px; display: block;" data-fsc-item-path-value="kiosk-browser-pro" data-fsc-action="Add" data-fsc-item-path="kiosk-browser-pro" data-fsc-item-selection-smartdisplay-inverse=""><strong>Add</strong></a>
				<a href="#" class="secondary-content" style="margin-top: 20px; display: none;" data-fsc-item-path-value="kiosk-browser-pro" data-fsc-action="Remove" data-fsc-item-path="kiosk-browser-pro" data-fsc-item-selection-smartdisplay=""><strong>Remove</strong></a>
				<a href="#" class="secondary-content" style="margin-top: 40px; display: none;" data-fsc-item-path-value="kiosk-browser-pro" data-fsc-action="Update" data-fsc-item-path="kiosk-browser-pro" data-fsc-item-selection-smartdisplay=""><strong>Update</strong></a>
			  </li>
			  <li class="collection-item avatar" style="min-height:125px;">
			 
				<!--<div class="secondary-content" style="margin-top:0px;"><span class="bold">Taxes: </span><span data-fsc-order-taxValue></span></div>-->
				<div class="secondary-content" style="margin-top:0px;"><strong>Total (inc taxes): <span data-fsc-order-total="">₹&nbsp;0.00</span></strong></div>
				<a href="#!" class="secondary-content btn" style="margin-top: 30px; display: none;" data-fsc-item-path-value="kiosk-browser-pro" data-fsc-item-path="kiosk-browser-pro" data-fsc-action="Checkout" data-fsc-item-selection-smartdisplay="">Checkout</a>
				<span style="font-size:10px;margin-top: 70px;" class="secondary-content grey-text">Having problems ordering? Try our <a href="https://androidkiosk.onfastspring.com" target="_blank">store</a> instead.</span>
				<!--<span style="font-size:10px;margin-top: 90px;" class="secondary-content grey-text">*Once review has been submitted please <a href="mailto:support@android-kiosk.com">contact us</a> for a discount code.</span>-->
				<!--<a href="#!" class="secondary-content">Checkout</a>-->
			  </li>
			</ul>
    </div>
  </div>
  
 <div id="modalBuyKL" class="modal bottom-sheet" style="max-height:65%;">
  	<a href="#!" class="modal-action modal-close"><i class="mdi mdi-close right grey-text" style="font-size:38px;padding:15px;"></i></a>
    <div class="modal-content">
      <h4>Buy</h4>
		<ul class="collection">
			  <li class="collection-item avatar">
				<img src="https://www.android-kiosk.com/wp-content/themes/androidkioskcom/images/ic_launcher_kl256w.png" class="circle" style="border-radius:0%;">
				<span class="title">Kiosk Launcher</span>
				<p style="font-size:14px;">Single Device Licence <br>
					Buy Once, free upgrades.<br>
				   </p><div>
				   <span>Qty: </span>
						<input type="text" onkeypress="return isNumberKey(event)" class="form-control" data-fsc-item-quantity-value="" data-fsc-item-quantity="" data-fsc-item-path-value="kiosk-launcher" data-fsc-autoapply="" data-fsc-action="Update" data-fsc-item-path="kiosk-launcher" style="width:50px;font-weight: 800;display: inline;">
				   </div>
				   <span style="font-size:10px;" class="grey-text">Discount applied at 250+ (65%) &amp; 500+ (80%) licences</span><br>
				   <span style="font-size:10px;" class="grey-text">Licensing FAQs can be found <a href="https://kioskbrowser.crisp.help/en/category/licensing-158vh07/" target="_blank" class="orange-text text-darken-3">here</a>.</span>
				<p></p>
				<span class="secondary-content orange-text text-darken-3" data-fsc-item-path="kiosk-launcher" data-fsc-item-price=""></span>
				<a href="#" class="secondary-content orange-text text-darken-3" style="margin-top:20px;" data-fsc-item-path-value="kiosk-launcher" data-fsc-action="Add" data-fsc-item-path="kiosk-launcher" data-fsc-item-selection-smartdisplay-inverse=""><strong>Add</strong></a>
				<a href="#" class="secondary-content orange-text text-darken-3" style="margin-top:20px;" data-fsc-item-path-value="kiosk-launcher" data-fsc-action="Remove" data-fsc-item-path="kiosk-launcher" data-fsc-item-selection-smartdisplay=""><strong>Remove</strong></a>
				<a href="#" class="secondary-content orange-text text-darken-3" style="margin-top:40px;" data-fsc-item-path-value="kiosk-launcher" data-fsc-action="Update" data-fsc-item-path="kiosk-launcher" data-fsc-item-selection-smartdisplay=""><strong>Update</strong></a>
			  </li>
			  <li class="collection-item avatar" style="min-height:125px;">
				<div class="secondary-content orange-text text-darken-3" style="margin-top:0px;"><strong>Total (inc taxes): <span data-fsc-order-total="">₹&nbsp;0.00</span></strong></div>
				<a href="#!" class="secondary-content btn orange darken-3" style="margin-top:30px;" data-fsc-item-path-value="kiosk-launcher" data-fsc-item-path="kiosk-launcher" data-fsc-action="Checkout" data-fsc-item-selection-smartdisplay="">Checkout</a>
				<span style="font-size:10px;margin-top: 70px;" class="secondary-content grey-text">Having problems ordering? Try our <a href="https://androidkiosk.onfastspring.com/kiosklauncher" target="_blank" class="orange-text text-darken-3">store</a> instead.</span>
			  </li>
			</ul>
    </div>
  </div>
  
  <div id="modalInstallKL" class="modal" style="width:90%;max-height:85%;height:85%;">
    <div class="modal-content" style="height:100%">
	  <iframe src="https://klr.android-kiosk.com/Home/Install" title="Kiosk Launcher Installation" style="width:100%;border:none;height:100%"></iframe>
    </div>
  </div>
  
  	<script>
	
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
		
		function onPopupClose(object) {
			if (object != null) {
				//toast message and close modal
				$('#modalBuy').closeModal();
				$('#modalBuyKL').closeModal();
				Materialize.toast('Order complete!', 4000);
			}
		}

		function buySingle() {
			var s = {
				'reset': true, // reset the cart and session (will remove everything added to the cart or passed to the session prior to this)
				'products' : [
								{
									'path':'kiosk-browser-pro',
									'quantity': 1 // add product "kiosk-browser-pro" to the cart with quantity "1".
								}
				]
			}
			fastspring.builder.push(s); // call Library "Push" method to apply the Session Object. 
		}
		
		function buySingleKL() {
			var s = {
				'reset': true, // reset the cart and session (will remove everything added to the cart or passed to the session prior to this)
				'products' : [
								{
									'path':'kiosk-launcher',
									'quantity': 1 // add product "kiosk-launcher" to the cart with quantity "1".
								}
				]
			}
			fastspring.builder.push(s); // call Library "Push" method to apply the Session Object. 
		}
	</script>
</main>
   
   
    <?php include_once("lonefooter.php"); ?>
	
	</body>
<html>