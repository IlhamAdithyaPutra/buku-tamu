<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo form_open('kunjungan/search') ?>
		<input type="text" name="keyword" placeholder="search">
		<input type="submit" name="search_submit" value="Cari">
	<?php echo form_close() ?>
 
	<table>
 
			<?php foreach($kunjungan as $keyword) { ?>
				<tr>
					<td><?php echo $keyword->nama ?></td>
				</tr>
			<?php } ?>
 
 
	</table>
</body>
</html>