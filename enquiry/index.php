<?php
session_start();
require_once("config/config.php");
require_once("functions.php");
$token = $_SESSION['token'];
$shop = $_SESSION['shop'];
$istall_script = 0;

$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", array(), 'GET');
$script_tag_list = json_decode($script_tag_added['response'], TRUE);

foreach ($script_tag_list['script_tags'] as $key => $value) {
	if( $value['src'] == "http://dev.wedighq.com/shopify/quick_enquiry/enquiry_script.js"){
		$istall_script = 1;
	}
	//$script_tag_added1 = shopify_call($token, $shop, "/admin/script_tags/".$value['id'].".json", array(), 'DELETE');
}
if( $istall_script == 0 ){
	$query_for_adding_script = array(
		"script_tag"=>array(
			"event"=>"onload",
			"src"=>"http://dev.wedighq.com/shopify/quick_enquiry/enquiry_script.js"
			)
		);
	$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", $query_for_adding_script, 'POST');
}
echo "<pre>";
print_r($script_tag_list);
echo "</pre>";
//echo '<b><a href="http://'.$shop.'">Go To Shop</a> &nbsp; &nbsp; &nbsp; <a href="https://'.$shop.'/admin/apps">Go To Admin</a></b>';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quick Enquiry</title>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron m20">
		<div class="mb20">
	        <h2><img src="images/logo.png" width="40"> Quick Enquiry</h2>
	        <small>Welcome to quick enquiry, set your settings here.</small>
	    </div>
        <div class="panel panel-default">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#email" data-toggle="tab"><i class="fa fa-envelope-o fa-lg"></i> Email Settings</a></li>
                <li><a href="#form" data-toggle="tab"><i class="fa fa-pencil-square-o fa-lg"></i> Form Settings</a></li>
                <li><a href="#theme" data-toggle="tab"><i class="fa fa-paint-brush fa-lg"></i> Theme Settings</a></li>
              </ul>
              <div id="myTabContent" class="tab-content m20">
                <div class="tab-pane fade active in" id="email">
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                </div>
                <div class="tab-pane fade" id="form">                  
                	<form class="form-horizontal">						
					    <div class="form-group">
					      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
					      <div class="col-lg-10">
					        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
					        <div class="checkbox">
					          <label>
					            <input type="checkbox"> Checkbox
					          </label>
					        </div>
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
					      <div class="col-lg-10">
					        <textarea class="form-control" rows="3" id="textArea"></textarea>
					        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="col-lg-2 control-label">Radios</label>
					      <div class="col-lg-10">
					        <div class="radio">
					          <label>
					            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
					            Option one is this
					          </label>
					        </div>
					        <div class="radio">
					          <label>
					            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					            Option two can be something else
					          </label>
					        </div>
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="select" class="col-lg-2 control-label">Selects</label>
					      <div class="col-lg-10">
					        <select class="form-control" id="select">
					          <option>1</option>
					          <option>2</option>
					          <option>3</option>
					          <option>4</option>
					          <option>5</option>
					        </select>
					        <br>
					        <select multiple="" class="form-control">
					          <option>1</option>
					          <option>2</option>
					          <option>3</option>
					          <option>4</option>
					          <option>5</option>
					        </select>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button class="btn btn-default">Cancel</button>
					        <button type="submit" class="btn btn-primary">Submit</button>
					      </div>
					    </div>
					</form>
                </div>
                <div class="tab-pane fade" id="theme">
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>
</body>
</html>