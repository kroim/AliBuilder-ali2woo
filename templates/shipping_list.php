<?php 
	$count_posts = wp_count_posts( 'product' );
	$publish = $count_posts->publish;
?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<div class="wrap">
		<h1 class="wp-heading-inline">Shipping List</h1>
	</div>
	<br>
	<div>
		<table id="data">
			<thead>
			  <tr>
			  <td><b>Shipping Name</b></td>
			  <td><b>Initial Name</b></td>
			  <td><b>Service Name</b></td>
			  <td><b>Status</b></th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=0;
				for($i=0;$i<=50;$i++)
			{  ?>
			  <tr>
				  <td>Turkey Post</td>
				  <td>Turkey Post</td>
				  <td>PTT</td>
				  <td>Published</td>
			  </tr>
			<?php } ?>
			</tbody>
		</table>
	 </div>
  <script>
  $(function(){
    $("#data").dataTable();
  })
  </script>