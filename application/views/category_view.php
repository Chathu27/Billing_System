<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
  <!-- Latest compiled and minified CSS -->

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="m-form">
		<form id="myform" class="col-md-12 box-form main-form novalidate"  >

		    <!-- <div class="alert alert-success alert-dismissible d-none">
			    <button type="button" class="close"  data-dismiss="alert">&times;</button>
			    <strong>Success!</strong> Item added successfully.
		  	</div>    -->


			<div class="row">
				<div class="form-group col-md-6">

					<label for="category"> Catogory Name : </label>
					<input type="text" name="category" class="form-control" id="category">
					
				</div>

			</div>

			<button type="submit" class="btn btn-primary" id="login_btn">Add Category</button> 
			
		</form>
		
	</div>
	
</div>
	
	
</body>
</html>
<?php $this->load->view('scripts');  ?>
<script>

	$(document).ready(function() {
		
		$('#myform').validate({
			rules:{
				category: {
					required:true,
				},
			},

			submitHandler: function(form){

				var data = {
					category_name :$('#category').val(),
				}

				$.ajax({
					url: '<?php echo base_url();?>index.php/category_controller/add_catergory',
					type: 'POST',
					data: data,
				})
				.done(function(data) {
					var output = JSON.parse(data);

					if (output.status == 200) 
					{
					alert('Success');

	            	$('#myform')[0].reset();
					}

				})
				.fail(function() {
					console.log("error");
				})
			}
		})

	});

</script>