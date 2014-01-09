$(function()
{
  $(document).on('click', '#loginUser, #logoutUser', function(event)
  {
    event.preventDefault();
    var sendForm = prepareForm.call(this, '#content');
    sendForm();
  })

  $(document).on('click', '#searchEvents', function(event)
  {
    event.preventDefault();
    searchTerms = $('#searchTerms').val().split(" ");

    $.get( 'http://www.json-generator.com/j/cgzwnAYJWq?indent=4', function( data ) {
      var existingEvents = [];
      var eventsList = [];

      for( var i=0; i<searchTerms.length; i++ )
      {
        if( data.hasOwnProperty( [searchTerms[i]]))
        {
          existingEvents.push( searchTerms[i]);
        }
      }

      $.each(existingEvents, function(index, searchValue)
      {
        console.log(index + ' = ' + searchValue);
        console.log(data[searchValue]);
        eventsList.push("<h1 class='eventHeader'>" + searchValue + "</h1>" );
        $.each(data[searchValue], function(index, value)
        {
          eventsList.push("<li id='event" + index + "'>" + value.name + "</li>" );
        })
      })

      $('#noEvents').hide();

      $( "#searchResults" ).html(eventsList);
    })
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