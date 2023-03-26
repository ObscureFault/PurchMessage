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
    function createMSG(item)
    {
      var div = $('<div>').css({
        'width': '400px',
        'height': '100px',
        'background-color': '#f9f9f9',
        'border': '1px solid #ddd',
        'border-radius': '5px',
        'padding': '10px'
      });

      var img = $('<img>').attr({
        'src': '/assets/ltt.jpg',
        'width': '50px',
        'height': '50px'
      }).css({
        'float': 'left',
        'margin-right': '10px'
      });

      var from = $('<h3>').text('New from:').css({
        'font-size': '20px',
        'font-weight': 'bold',
        'margin': '0 0 5px 0'
      });

      var message = $('<p>').text(').css({
        'font-size': '16px',
        'margin': '0'
      });

      div.append(img);
      div.append(from);
      div.append(message);

      return div;
  });
</script>
</head>
<body>
</body>
</html>