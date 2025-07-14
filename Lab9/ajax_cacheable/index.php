<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AJAX Simple Call Using JavaScript</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

  <!-- Genre selection dropdown -->
  <select id="genre_list">
    <option value="Fantasy" selected>Fantasy</option>
    <option value="Mystery">Mystery</option>
    <option value="Horror">Horror</option>
  </select>

  <!-- Output div -->
  <div id="demo"></div>

  <script>
    $(document).ready(function () {
      // Cache object to store genre data
      var cache = {};

      // Function to check if cache is still valid
      function isCacheValid(genre) {
        if (!cache[genre]) return false;
        if (!cache[genre].hasOwnProperty('expiration')) return false;
        return cache[genre].expiration > Date.now();
      }

      // Event listener for dropdown change
      $("#genre_list").change(function () {
        var genre = $(this).val();

        // Check cache first
        if (isCacheValid(genre)) {
          $("#demo").html(cache[genre].data);
        } else {
          // If not cached or expired, make AJAX request
          $.ajax({
            type: "GET",
            url: "data.php",
            data: { genre: genre },
            success: function (data) {
              $("#demo").html(data);
              // Cache response with expiration (1 hour)
              cache[genre] = {
                data: data,
                expiration: Date.now() + (60 * 60 * 1000) // 1 hour in milliseconds
              };
            },
            error: function () {
              $("#demo").html("Error fetching data.");
            }
          });
        }
      });

      // Trigger initial load for default selection
      $("#genre_list").trigger("change");
    });
  </script>

<!-- {
Cache object example
  "Fantasy": {
    data: "<p>Fantasy books content here...</p>",
    expiration: 1720963918234
  },
  "Mystery": {
    data: "<p>Mystery books content here...</p>",
    expiration: 1720963941321
  }
} -->

</body>
</html>


