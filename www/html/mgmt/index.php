<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>JSON Data and Columns Example</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      var url = "http://192.168.20.24:9001/";

      // Handle the button click event
      $("#get-data-btn").click(function() {

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
              var columnId = Math.random() < 0.5 ? "left-column" : "right-column";
              var column = $("#" + columnId);

              // Create a new box for the item and add it to the column
              var box = $("<div>");
              box.html("<h2>" + item.title + "</h2><p>" + item.body + "</p>");
              column.append(box);
            }
          }
        });
      });

    });
  </script>

</body>
</html>
