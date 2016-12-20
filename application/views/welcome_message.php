<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

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

	#body
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
	<h1>Student Database Demo</h1>
	<?php if (isset($message)) { ?>
		<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
	<?php } ?>
	<div id="body">
		<center><h2>Insert your Student Details here</h2></center>
	</div>
	<center>
		<form action="http://localhost/codeignitor/welcome" method="post">
			<?php if (isset($message)) { ?>
				<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
			<?php } ?>
		<b>Student ID: </b>
		<input type="text" id="sid" name="sid" title=""/>
			</br></br>
		<b>Student Name: </b>
		<input type="text" id="sname" name="sname" title=""/>
			</br></br>
			<b>Student Class: </b>
			<input type="text" id="sclass" name="sclass" title=""/>
			</br></br>
			<input type="submit" name="submit" value="Insert Details" id="submit">
			<!--<a href="welcome/">Insert Details</a>-->
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" name="reset" value="Reset">
			&nbsp;&nbsp;&nbsp;&nbsp;
				   <br/><br/><br/>

			<table border="1">
				<tbody>
				<tr>
					<td>Student ID</td>
					<td>Student Name</td>
					<td>Student Class</td>
					<td></td>
				</tr>
				<?php

				foreach ($h->result() as $row)
				{
					?><tr>
					<td><?php echo $row->sid;?></td>
					<td><?php echo $row->sname;?></td>
					<td><?php echo $row->class;?></td>
					<td><a href='http://localhost/codeignitor/welcome/delete/<?php echo $row->sid;?>'>Delete</a></td>
					</tr>
				<?php }
				?>
				</tbody>
			</table>

		</form>
	</center>
</div>

</body>
</html>