$(document).ready(function(){

  load_data();

  function load_data(query)
  {
      $.ajax({
          url:"../app/model/EmailModel.php",
          method:"POST",
          data:{query:query},
          success:function(data)
          {
              $('#result').html(data);
          }
      });
  }

  $('#email').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
          load_data(search);
      }
      else
      {
          load_data();
      }
  });
});