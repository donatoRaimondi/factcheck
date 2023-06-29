$(document).ready(function() {
  var newsVisiblev = false;

  $("#mostraNotizieV").on("click", function() {
    if (newsVisiblev) {
      // Nascondi le notizie rimuovendo il contenuto dell'elemento #newsSection
      $("#newsSectionV").empty();
      newsVisiblev = false;
    } else {
      // Chiamata AJAX per ottenere le notizie non verificate
      $.ajax({
        url: "../sistema/feedverificate.php",
        type: "GET",
        success: function(response) {
          // Aggiungi le notizie al container delle notizie non verificate
          $("#newsSectionV").html(response);
          newsVisiblev = true;
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    }
  });
});
