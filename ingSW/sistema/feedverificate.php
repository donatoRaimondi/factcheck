<?php
require '../config/config.php';

/* Funzione per ottenere le informazioni delle meta tag Open Graph da un URL
function getOpenGraphMetadata($url) {
    $html = file_get_html($url);

    if ($html !== false) {
        $ogTitle = $html->find('meta[property=og:title]', 0);
        $ogDescription = $html->find('meta[property=og:description]', 0);
        $ogImage = $html->find('meta[property=og:image]', 0);

        if ($ogTitle && $ogDescription && $ogImage) {
            $previewTitle = $ogTitle->content;
            $previewDescription = $ogDescription->content;
            $previewImage = $ogImage->content;

            return array(
                'title' => $previewTitle,
                'description' => $previewDescription,
                'image' => $previewImage
            );
        }
    }

    return null;
}*/

// Array per tenere traccia degli URL già visitati
$visitedURLs = array();

// Query per ottenere le notizie dal database
$sql = "SELECT n.*, u.username
        FROM notizia AS n
        JOIN utente AS u ON n.id_utente = u.id
        WHERE n.esito IS NOT NULL";
$result = $conn->query($sql);

// Verifica se ci sono risultati dalla query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $content = $row['contenuto'];
        $esito = $row['esito'];
        $date = $row['data_pubblicazione'];
        $commento =  $row['commento'];
        // Verifica se l'URL è già stato visitato
        if (!in_array($content, $visitedURLs)) {
            // Aggiungi l'URL all'array degli URL visitati
            $visitedURLs[] = $content;

            // Mostra le informazioni della notizia
            $htmlMetadata = getOpenGraphMetadata($content);

            if ($htmlMetadata !== null) {
                $previewTitle = $htmlMetadata['title'];
                $previewDescription = $htmlMetadata['description'];
                $previewImage = $htmlMetadata['image'];

                // Aggiungi la notizia alla sezione delle notizie
                echo '<div class="news">';
                echo '<h2>' . $username . '</h2>';
                echo '<p>Date: ' . $date . '</p>';
                echo '<p>Esito: ' . ($esito !== null ? $esito : 'non ancora confermato') . '</p>';
                echo '<p>Commento Review: ' . ($commento !== null ? $commento: '') . '</p>';
                echo '<div class="post">';
                echo '<div class="post-image">';
                echo '<img src="' . $previewImage . '" alt="Preview Image">';
                echo '</div>';
                echo '<div class="post-content">';
                echo '<h3 class="post-title">' . $previewTitle  . '</h3>';
                echo '<p class="post-description">' . $previewDescription . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
} else {
    echo 'Nessuna notizia trovata.';
}
?>
