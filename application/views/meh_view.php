<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quierounperro</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/validator/validationEngine.jquery.css" type="text/css"/>

<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/languages/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/jquery.validationEngine.js"></script>
<script>

jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
		});

</script>
</head>
<body><br />
<br />
<br />
<br />

<form id="formID" method="post" action="submit.action">
    <input value="2010-12-01" class="validate[required,custom[date]]" type="text" name="date" id="date" />
</form>

</body>
</html>
