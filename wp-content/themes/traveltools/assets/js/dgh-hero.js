document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('#bg-slideshow > div:not(:last-child)');
  if (slides.length === 0) return; // Exit early if no slideshow element found

  let current = 0;
  setInterval(() => {
    slides[current].classList.add('opacity-0');
    current = (current + 1) % slides.length;
    slides[current].classList.remove('opacity-0');
    slides[current].classList.add('opacity-100');
  }, 6000);
});
