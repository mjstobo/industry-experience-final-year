
<html xmlns="http://www.w3.org/1999/xhtml">

<?php echo $this->Html->css('enquiry.css');?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>


<body>

<br>
<h3><?php echo ('Contact Us'); ?> </h3>
	<div id="page-wrap">

		<div id="contact-area">
			<form method="post" action="" id="enquiryForm">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" />

				<label for="email">Email:</label>
				<input type="text" name="email" id="email" />

				<label for="Email">Subject:</label>
                <input type="text" name="subject" id="subject" />

				<label for="message">Message:</label><br />
				<textarea name="message" rows="20" cols="20" id="message"></textarea>

				<input type="submit" name="submit" value="Submit" class="submit-button" />
			</form>
		</div>



	</div>

</body>

</html>