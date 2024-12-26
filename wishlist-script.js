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