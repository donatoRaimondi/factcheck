var newsForm = document.getElementById('newsForm');
  var textInput = document.getElementById('textInput');
  var errorText = document.getElementById('errorText');

  newsForm.addEventListener('submit', function(e) {
    if (!isValidURL(textInput.value)) {
      e.preventDefault(); // Prevent form submission
      errorText.textContent = 'Please enter a valid URL.'; // Display error message
    }
  });

  function isValidURL(url) {
    // Regular expression for URL validation
    var urlRegex = new RegExp('^(https?:\\/\\/)?' + // Protocol
      '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // Domain name
      '((\\d{1,3}\\.){3}\\d{1,3}))' + // IP address
      '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // Port and path
      '(\\?[;&a-z\\d%_.~+=-]*)?' + // Query string
      '(\\#[-a-z\\d_]*)?$', 'i'); // Fragment locator

    return urlRegex.test(url);
  }
