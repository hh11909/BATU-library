// scroll up button

window.addEventListener('scroll', function() {
  if (window.scrollY > 500) {
    document.querySelector('.scroll-top').style.display = 'block';
  } else {
    document.querySelector('.scroll-top').style.display = 'none';
  }
});

document.querySelector('.scroll-top').addEventListener('click', function() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

// make the books dynamic to database (as JSON)

const stater = (initialState) => {
  if (typeof initialState === 'function') {
    initialState = initialState()
  }
  return [() => initialState, (newState) => {
    if (typeof newState === 'function') {
      initialState = newState(initialState)
    } else {
      initialState = newState
    }
  }]
}
const [loves, setLoves] = stater(new Array(BOOKS.length).fill(false));




let bookEls = BOOKS.map((e, i) =>
  El('div', { class: 'col-lg-2 col-md-4 col-sm-6 col-6 mb-4', key: e.id },
    El('div', { class: 'card h-100 border-0' }, [
      El('img', { src: e.images[0], class: 'card-img-top img-fluid mx-auto d-block border border-light', alt: 'Bool Cover', style: 'max-width: 150px; margin: 20px auto;' }),
      El('div', { class: 'd-flex pe-2' },
        [
          El('button', {
            class: 'btn btn-link ms-auto', onClick: () => setLoves(a => {
              return [
                ...a.slice(0, i),
                !a[i],
                ...a.slice(i + 1)
              ]
            })
          },
            El('i', { class: `${loves()[i] ? 'fa-solid' : 'fa-regular'} fa-heart` })
          ),
          El('button', { class: 'btn btn-link ms-2' },
            El('i', { class: 'fa-solid fa-bookmark' })
          )
        ]
      ),
      El('div', { class: 'car-body p-2' }, [
        El('h5', { class: 'card-title' }, e.name),
        El('p', { class: 'card-text', key: e.authorId }, AUTHORS.find(a => a.id === e.authorId).name)
      ])
    ])
  ))


window.onload = () => {
  const booksContainer = document.querySelector('#books-container')
  for (let e of bookEls) {
    booksContainer.appendChild(e)
  }
}

