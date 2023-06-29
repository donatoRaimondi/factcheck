$(document).ready(function() {
  // Gestisci il click sul pulsante "Mostra Media"
  $('#showMediaButton').click(function() {
    // Esegui la richiesta AJAX per ottenere i dati dei media
    $.ajax({
      type: 'GET',
      url: '../sistema/get_media.php', // Sostituisci con il percorso corretto per il file PHP che restituisce i dati dei media
      dataType: 'html',
      success: function(response) {
        // Aggiungi i media al contenitore dei media
        $('#mediaContainer').html(response);
      },
      error: function() {
        // Gestisci l'errore della richiesta AJAX
        console.log('Si è verificato un errore durante il recupero dei media.');
      }
    });
  });
});
