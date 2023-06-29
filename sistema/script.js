const wrapper = document.querySelector('.wrapper_read')
const date = document.querySelector('.date_read')
const authorName = document.querySelector('.name_read')
const articl = document.querySelector('.article_read')
const title = document.querySelector('.title_read')
const animate = document.querySelector('.animation_read')
const cont = document.querySelector('.search-form_read')
const searchBar = document.querySelector('.search-bar_read')
const centerWrapper = document.querySelector('.center-wrapper_read')
const hider = document.querySelector('.discription_read')
const loader = document.querySelector('.loader_read')
const err = document.querySelector('.error_read')



const defaultURL = 'https://medium.com/@silviabastos6/exploring-the-limits-of-love-f16b8c881d0e'


document.querySelector('.search-form_read')
    .addEventListener('submit', submit)

function submit(e) {
  e && e.preventDefault()
  loader.classList.remove('hide_read')
  hider.classList.add('hide_read')
  let letter = searchBar.value
  cont.classList.add('animation_read')
  if (letter !== '') {
    centerWrapper.classList.add('hide_read')
     err.classList.add('hide_read')
    fetching(letter) 
  }else{
      loader.classList.add('hide_read')
  } 
}

  
document.querySelector('.click_read').addEventListener('click' , () => {
  searchBar.value = defaultURL
  submit()
})

function fetching(para_url){
    const url = para_url
    const urlToFetch  =  `https://mercury.postlight.com/parser?url=${url}`
    
    const headers = {
    'x-api-key': 'sM9RNjNAYaVlQgGXlpyTKaWsC0RCyLtQv0wMxLDw'

    }
    
    fetch(urlToFetch, {
      headers
    }).then(res => res.json())
      .then(data => updateUI(data))
      .catch(error => {
      const err = document.querySelector('.error_read')
      const loader = document.querySelector('.loader_read')
      loader.classList.add('hide_read')
      err.classList.remove('hide_read')}
)

    const updateUI = data => {
      loader.classList.add('hide_read')
      if (data.error){
        err.classList.remove('hide_read')
        centerWrapper.classList.add('hide_read')
        return 0
      }

      const author = data.author
      authorName.innerHTML =`${ 'by ' + author}`;
      if (author == null){
          authorName.innerHTML = '';

      }
      const htm = data.content
      articl.innerHTML =`${htm}`;
      const head = data.title
      
      title.innerHTML =`${head}`;
      centerWrapper.classList.remove('hide_read')
    }

}