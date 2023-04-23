$(document).ready(function () {
    $('.edit-btn').on('click', function () {
      // Show input fields and hide span fields
      $('.card-text > span').hide();
      $('.card-text > input').show();
      $('.new-password-section').show();
      
      // Hide edit button and show save button
      $('.edit-btn').hide();
      $('.save-btn').show();
    });
  
    $('.save-btn').on('click', function () {
      // Update span fields with input field values
      $('#first_name').text($('#first_name_input').val());
      $('#last_name').text($('#last_name_input').val());
      $('#number').text($('#number_input').val());
      $('#email').text($('#email_input').val());
      
      // Check if new password is provided
      var newPassword = $('#new_password').val();
      if (newPassword) {
        $('form').append('<input type="hidden" name="password" value="' + newPassword + '">');
      }
      
      // Hide input fields and show span fields
      $('.card-text > input').hide();
      $('.card-text > span').show();
      $('.new-password-section').hide();
      
      // Hide save button and show edit button
      $('.save-btn').hide();
      $('.edit-btn').show();
      
      // Submit the form
      $('form').submit();
    });
  });
