<html>
	<head>
		<title>Form OOP</title>
		<style>
			input {
				margin-top: 10px;
				display: block;
			}
		</style>
	</head>
	<body>
	<?php
		require "belajar-form.php";

		$form = new Form("", "get");

		echo $form->form_header();
		echo $form->form_label("Nama");
		echo $form->form_input("text","nama","");
		echo $form->form_label("Password");
		echo $form->form_input("password","password","");
		echo $form->form_input("submit","login","Login");
		echo $form->form_footer();

		if(isset($_GET['login'])) {
			echo $_GET['nama'];
			echo "<br/>";
			echo $_GET['password'];
		}
	?>
</body>
</html>