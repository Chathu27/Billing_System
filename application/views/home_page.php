<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
  <!-- Latest compiled and minified CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>
	<div class = "container">
    <div class="m-form">

      <a href="<?php echo base_url(); ?>index.php/category_controller/category_view" class="btn btn-primary add_button" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Create new Category</a>
      
    <form id="myform" class="col-md-12 box_form form novalidate "> 


      <div class="row">

          <div class="form-group col-md-6">
              <label for="item_name">Item Name</label>
              <input type="text" name="item_name"  class="form-control" id="item_name">
          </div>

            <div class="form-group col-md-6">
              <label for="catergory">Catergory</label>
              <select  name="catergory"  class="form-control" id="catergory"></select>
            </div>

      </div>

      <div class="row">

            <div class="form-group col-md-6">
              <label for="price">Price</label>
              <input class="form-control" name="price" id="price">
            </div>

            <div class="form-group col-md-6">
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity"  class="form-control" id="quantity">
            </div>

      </div> 
                  <button type="submit" class="btn btn-primary" id="login_btn">Add</button> 
                  <a href="<?php echo base_url(); ?>index.php/home_controller/" class="btn btn-secondary">Cancel</a> 
       </form>
      </div>
    </div>

  </body>
</html>
<?php $this->load->view('scripts');  ?>

<script>

  $(document).ready(function () {  

    /* Validate Form */

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg !== value;
    }, "Please select an option.");

    $('#myform').validate({

            rules: {
              item_name: {
                  required: true, 
              },
              catergory: {
                  valueNotEquals: "default" 
              },
              quantity: {
                  required: true, 
              },
              price: {
                  required: true,
              },
            },

          submitHandler: function(form) { 
      
            var data = {
            item_name: $('#item_name').val(),
            catergory: $('#catergory').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val(),
            }
 
            $.ajax({
              url: '<?php echo base_url(); ?>index.php/home_controller/add_products_data',
              type: 'POST', 
              data: data,
            })
            .done(function(data) {
  
            var output = JSON.parse(data);
              
              if (output.status == 200) { 

                alert('Success');

                $('#myform')[0].reset();

              }

            })

            .fail(function() {
              console.log("error");
            }); 
      
      }

    })

    $.ajax({
      url: '<?php echo base_url();?>index.php/home_controller/select_all_category',
      type: 'POST',
    })
    .done(function(data) {

      var output = JSON.parse(data);
      console.log(output);

      if (output.status == 200) {
        $('#catergory').append('<option value="default">Select Catergory</option>')

        for (var i = 0; i< output.data.length; i++) {

          $('#catergory').append('<option value='+output.data[i].category_id+'>'+output.data[i].category_name+'</option>')
        }
      }
      
    })
    .fail(function() {
      console.log("error");
    })


      

  });




</script>
