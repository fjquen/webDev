<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/jquery-ui-1.12.0/jquery-ui.css'); ?>" />
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<div id="container">
	<h1>Welcome to CodeIgniter!</h1>
	<div id="body">
	<?php echo validation_errors(); ?>
<?php echo form_open('welcome/addUser'); ?>
		<label for="firstname">Nom de famille</label>
            <input type="text" name="firstname">
			<label for="lastname">Prénom</label>
            <input type="text" name="lastname">
            <label for="dob">Date de naissance</label>
			<?php $attributes = 'id="dob" placeholder="Date de naissance"';
			echo form_input('dob', set_value('dob'), $attributes); ?>
			<label for="adress">Adresse de rue</label>
            <input type="text" name="adress">
			<label for="postalcode">Code postale ex:91100</label>
            <input type="text" name="postalcode">
			<label for="phonenumber">Portable</label>
            <input type="text" name="phonenumber">
            <select name = "id_service">
			<?php  foreach ($services as $service) : ?>
			<option value = '<?= $service->id ?>'><?= $service->servicename?></option>
			<?php endforeach; ?>
		</select>
            <button type="submit">envoyer</button>
        </form>

	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.js"
  integrity="sha256-it5nQKHTz+34HijZJQkpNBIHsjpV8b6QzMJs9tmOBSo="
  crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/jquery-ui-1.12.0/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
$(function() {
    $("#dob").datepicker(
		{
        dateFormat: 'yy-mm-dd'
    	}
	);
});
</script>
</body>
</html>