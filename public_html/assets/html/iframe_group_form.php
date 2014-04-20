<html>
  <head>
	<link rel="stylesheet" href="http://localhost/~media/swarmtvNet/public_html/css/normalize.css">
	<link rel="stylesheet" href="http://localhost/~media/swarmtvNet/public_html/css/iframe.css">
	<link rel="stylesheet" href="http://localhost/~media/swarmtvNet/public_html/libraries/fineuploader.jquery-3.0/fineuploader.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://localhost/~media/swarmtvNet/public_html/libraries/jquery-ui-1.9.2.custom/css/eggplant/jquery-ui-1.9.2.custom.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://localhost/~media/swarmtvNet/public_html/css/colorPicker.css" type="text/css" />
	<script src="http://localhost/~media/swarmtvNet/public_html/js/vendor/jquery-1.8.3.min.js"></script>
	<script src="http://localhost/~media/swarmtvNet/public_html/libraries/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="http://localhost/~media/swarmtvNet/public_html/js/vendor/jquery.ui.touch-punch.min.js"></script>
	<script src="http://localhost/~media/swarmtvNet/public_html/js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="http://localhost/~media/swarmtvNet/public_html/js/jquery.colorPicker.min.js"></script>
	<script type="text/javascript" src="http://localhost/~media/swarmtvNet/public_html/libraries/fancybox2/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<script type="text/javascript" src="http://localhost/~media/swarmtvNet/public_html/js/jquery.form.min.js"></script>
	<style>
	  form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }
	  .progress { position:relative; width:465px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; margin-left: auto ; margin-right: auto;}
	  .bar { background-color: #c0c0e0; width:0%; height:20px; border-radius: 3px; }
	  .percent { position:absolute; display:inline-block; top:3px; left:48%; }
	</style>
  </head>
  <body>
	
	<form id="add_group_form" class="input_form">
		<h2>New Group</h2>	
		<label for="new_group_title">Group Title:</label>
		<input id="new_group_title" type="text" name="new_group_title" />
		<br /><br />
		<input type="radio" name="participation" value="public" > Public &nbsp;&nbsp;&nbsp;
		<input type="radio" name="participation" value="private" checked="checked" > Private 
		<br /><br />
		<input type="submit" id="submit_new_group" value="Submit" class="submit_element"  />
		<!-- hidden values -->
		<input type="hidden" name="current_page" value="<?php echo $_GET["title"]; ?>"/>
		<input type="hidden" name="current_page_id" value="<?php echo $_GET["id"]; ?>"/>
		<input type="hidden" name="current_group" value="<?php echo $_GET["group"]; ?>"/>
		<input type="hidden" name="userId" value="<?php echo $_GET["uid"];  ; ?>"/>
		
		<div id="loadingPrompt">Loading...</div>
	</form>
	  
	<script>
	(function() {
	  
		// submits Ajax for updating new group into the database
		$('#submit_new_group').click(function(e){
			// Stop the page from navigating away from this page
			e.preventDefault();		
			
		    // get the values from the form
			var newGroupVal = $('input[name="new_group_title"]').val();
            var participationVal = $('input[name="participation"]:checked').val();
			var currentPageVal = $('input[name="current_page"]').val();
			var currentPageIdVal = $('input[name="current_page_id"]').val();
			var currentGroupVal = $('input[name="current_group"]').val();
			var userIdVal = $('input[name="userId"]').val();
			var base_url = "http://localhost/~media/swarmtvNet/public_html/";
			
			//alert(newGroupVal + " | " + participationVal + " | " + currentPageVal + " | " + currentGroupVal + " | " + currentPageIdVal);
			
			// Post the values to the pages controller
                        $.post(base_url + "index.php/groups/add_group", { newGroup: newGroupVal, participation: participationVal, currentPage: currentPageVal, currentGroup: currentGroupVal, currentPageId: currentPageIdVal, userId: userIdVal },
		        function(data) {
					window.top.location.reload();
			});
            
		});
	
	})();       
	</script>
  
  </body>
<html>