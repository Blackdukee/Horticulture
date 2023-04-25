<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
        <!-- <form id="input_form">
            <div>
                <input type="text" name="name" id="name">
                <input type="text" name="email" id="email">
                <input type="text" name="phone" id="phone">
                <input type="file" name="file" id="file">
                <input type="submit" value="sub">
                </div>
        </form>
         -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<!-- <script type="text/javascript">
    	var data = new FormData();
    	 $('#submit').on('click',function(){
    	   $.ajax({
    	    type: 'post',
    	    url: 'test.php',
    	    data:new FormData( this ),
    	    success: function (response) {
    	      alert(response);
    	    },
    	    error:function(){
    	      alert("error")
    	   },processData: false,
    	   contentType: false
    	   
    	 })
        })
    	
    	</script> -->
Simple Upload Form


<!--Upload Form-->
<form id="form1">
  <table>
    <tr>
      <td colspan="2">File Upload</td>
    </tr>
    <tr>
      <th>Select File </th>
      <td><input id="file" name="file" type="file" /></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="submit" name="submit"/> 
      </td>
    </tr>
  </table>
  
  <input type="text" name="name" >
  <input type="text" name="email" >
  <input type="text" name="phone" >
  
</form>

<script>


   //form Submit
   $("#form1").submit(function(evt){   

      evt.preventDefault();
      var formData = new FormData($(this)[0]);
        $("#file").val(null);  
      $.ajax({
          url: 'test.php',
          type: 'POST',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          enctype: 'multipart/form-data',
          processData: false,
          success: function (response) {
             alert(response);
          }
       });

       return false;

    });
    


</script>

</body>
</html>