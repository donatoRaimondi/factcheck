const postForm = document.getElementById('post-form');
const postsContainer = document.getElementById('posts-container');

postForm.addEventListener('submit', function (e) {
  e.preventDefault();

  const titleInput = document.getElementById('post-title');
  const contentInput = document.getElementById('post-content');

  const postTitle = titleInput.value;
  const postContent = contentInput.value;

  // Create a new post element
  const postElement = document.createElement('div');
  postElement.classList.add('post');
  postElement.innerHTML = `<h2>${postTitle}</h2><p>${postContent}</p>`;

  // Add the new post to the container
  postsContainer.prepend(postElement);

  // Clear the input fields
  titleInput.value = '';
  contentInput.value = '';
});
