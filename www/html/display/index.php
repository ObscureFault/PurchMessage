<?php
/*
  Stacked Divs Absolute Fixed size

  Timer Loop


    Call Url for a message with response   /PurchDisplayNext/
    display fancy div with fields filled
    transition to reply with fields filled
    send get to    /PurchDisplayUpdate/ID   ->
    fade to transparent??? transistion to next???

*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>JSON Data and Columns Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

    var url = "http://192.168.20.24:9001/PurchDisplayNext/";
    var url_displayed = "http://192.168.20.24:9001/PurchDisplayNext/";

    var currentItem;
    var fadeTime = 1000;
    var displayDelay = 5000;

    function sendDisplayed(id)
    {
      var url1 = url_displayed + id;
      $.get(url1, function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
      });
    }

    function fadeStart(element)
    {
      element.fadeIn(fadeTime).delay(displayDelay).fadeOut(fadeTime, function(){
          element.remove();
          var box = createMSG(data,'response');
          fadeEnd(box);
        });
    }

    function fadeEnd(element)
    {
      element.fadeIn(fadeTime).delay(displayDelay).fadeOut(fadeTime, function(){
          element.remove();
          sendDisplayed(element.attr('_id'));
        });
    }


    function startCollect()
    {
      $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(data) {
              currentItem = data;
              var box = createMSG(data,'msg');
              $('body').append(box);
              fadeStart(box);
            });
          }
      });
    }



    function createMSG(item,mode)
    {
      var bodytext = '';
      var headingtext = '';

      var img_url = '/assets/ltt.jpg';

      if ( mode == 'msg')
      {
        bodytext = item.MESSAGE;
        headingtext = 'Thanks, ' + item.NAME;
        img_url  = item.PURCHASE_IMAGE_URL;
      }
      else
      {
        headingtext = 'Reply @ ' + item.NAME;
        bodytext = item.RESPONSE;
      }

      var div = $('<div>').css({
        'width': '400px',
        'height': '100px',
        'background-color': '#f9f9f9',
        'border': '1px solid #ddd',
        'border-radius': '5px',
        'padding': '10px'
      });

      div.attr({'_id': item.PURCH_ID});


      var img = $('<img>').attr({
        'src': img_url,
        'width': '50px',
        'height': '50px'
      }).css({
        'float': 'left',
        'margin-right': '10px'
      });

      var from = $('<h3>').text(headingtext).css({
        'font-size': '20px',
        'font-weight': 'bold',
        'margin': '0 0 5px 0'
      });

      var message = $('<p>').text(bodytext).css({
        'font-size': '16px',
        'margin': '0'
      });

      div.append(img);
      div.append(from);
      div.append(message);

      return div;
  });

  $(document).ready(function() {




  });


</script>
</head>
<body>

<div id="set1" style="display:none">

</div>

</body>
</html>