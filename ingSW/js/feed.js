$(document).ready(function() {
  var newsVisible = false;

  $("#showNewsButton").on("click", function() {
    if (newsVisible) {
      // Nascondi le notizie rimuovendo il contenuto dell'elemento #newsSection
      $("#newsSection").empty();
      newsVisible = false;
    } else {
      // Chiamata AJAX per ottenere le notizie non verificate
      $.ajax({
        url: "../sistema/feed.php",
        type: "GET",
        success: function(response) {
          // Aggiungi le notizie al container delle notizie non verificate
          $("#newsSection").html(response);
          newsVisible = true;
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    }
  });
});
