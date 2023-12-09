$(document).ready(function() {
  $('#search_input').on('input', function() {
    var search_string = $(this).val();

    if (search_string.length > 0) {
      $.ajax({
        type: 'POST',
        url: '?',
        data: {search_string: search_string},
        success: function(response) {
          $('#search_results').html(response);
        }
      });
    } else {
      $('#search_results').html('');
    }
  });
});
