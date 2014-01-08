$(function()
{
  $(document).on('click', '#loginUser, #logoutUser', function(event)
  {
    event.preventDefault();
    var sendForm = prepareForm.call(this, '#content');
    sendForm();
  })


  // handle form submissions
  function prepareForm(section)
  {
    var formElement = $(this).parent();
    var formData = formElement.serializeArray();
    var formURL = formElement.attr('action');
    var formMethod = formElement.attr('method');
    var purpose = {
      'name' : 'purpose',
      'value' : formElement.attr('id')
    }
    formData.push(purpose);
    console.log(formElement);
    console.log(formData);
    console.log(formURL);
    console.log(formMethod);

    return function sendData()
    {
      $.ajax({
        type : formMethod,
        url : formURL,
        data : formData,
        dataType : 'html'
      })
      .done(function(data)
      {
        if(content)
        {
          $(section).html(data);
          console.log('done: Data = ' + data);
        }
      })
      .fail(function()
      {
        console.log('fail');
      })
      .always(function()
      {
        console.log('always');
      })
    }
  }

})