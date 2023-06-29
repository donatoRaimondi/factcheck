document.addEventListener('DOMContentLoaded', function() {
   const dropZone = document.getElementById('dropZone');
   const fileInput = document.getElementById('imageInput');

   dropZone.addEventListener('dragover', function(event) {
     event.preventDefault();
     dropZone.classList.add('dragover');
   });

   dropZone.addEventListener('dragleave', function(event) {
     event.preventDefault();
     dropZone.classList.remove('dragover');
   });

   dropZone.addEventListener('drop', function(event) {
     event.preventDefault();
     dropZone.classList.remove('dragover');
     const file = event.dataTransfer.files[0];
     fileInput.files = event.dataTransfer.files;
   });
 });
