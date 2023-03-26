<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>JSON Data and Columns Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

  function createBox(item) {
    var box = $("<div>").css('border', '1px solid black');
    var id = $("<input>").attr({
      type: 'hidden',
      id: 'purch_id',
      name: 'purch_id',
      value: item.PURCH_ID
    });

    var name = $("<h2>").text(item.NAME);
    var msg = $("<p>").text(item.MESSAGE);
    var input = $("<input>").attr({
      type: 'text',
      id: 'RESPONSE',
      name: 'RESPONSE',
      _id: item.PURCH_ID
    .attr("type", "text");

    
    var submitBtn = $("<button>").text("Submit").click(function() {
      var postData = { RESPONSE: input.val(), PURCH_ID: input.attr('_id') };
      $.ajax({
        url: "http://192.168.20.24:9001/PurchResponse/",
        type: "POST",
        data: JSON.stringify(postData),
        dataType: "json",
        success: function(data) {
          //Hide this box
          console.log(this);
          console.log("Data posted successfully");
        }
      });
    });
    box.append(id, name, msg, input, submitBtn);
    return box;
  }
  </script>

  <style>
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 300px;
      /* Style the boxes to display the data */
      border: 1px solid black;
      overflow-y: scroll;
    }
    .clear {
      clear: both;
    }
  </style>
</head>
<body>

  <div class="column" id="left-column"></div>
  <div class="column" id="right-column"></div>
  <div class="clear"></div>

  <button id="get-data-btn">Get Data</button>

  <script>
    $(document).ready(function() {

      // Define the URL to request JSON data from
      var url = "http://192.168.20.24:9001/ReplyRequired/";

      // Handle the button click event
      $("#get-data-btn").click(function() {

 // Define the columns
  var leftColumn = $("#left-column");
  var rightColumn = $("#right-column");


    // Use jQuery's AJAX function to request the JSON data from the URL
    $.ajax({
      url: url,
      type: "GET",
      dataType: "json",
      success: function(data) {

        // Iterate over each item in the data array and add it to a column
        for (var i = 0; i < data.length; i++) {
          var item = data[i];

          // Choose a random column to add the item to
          var column = Math.random() < 0.5 ? leftColumn : rightColumn;

          // Create a new box for the item and add it to the column
          var box = createBox(item);
          column.append(box);
        }
      }
    });

      });

    });
  </script>

</body>
</html>
