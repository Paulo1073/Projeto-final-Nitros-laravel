const carousel = document.getElementById('gameCarousel');
const next = document.getElementById('next');
const prev = document.getElementById('prev');

next.addEventListener('click', () => {
    carousel.scrollBy({ left: 300, behavior: 'smooth' });
});

prev.addEventListener('click', () => {
    carousel.scrollBy({ left: -300, behavior: 'smooth' });
});




 
  document.querySelectorAll('[id^="openpop"]').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const num = btn.id.replace('openpop', '');
      document.getElementById('myModal' + num).classList.remove('hidden');
    });
  });

 
  document.querySelectorAll('[id^="closeModal"]').forEach(btn => {
    btn.addEventListener('click', () => {
      const num = btn.id.replace('closeModal', '');
      document.getElementById('myModal' + num).classList.add('hidden');
    });
  });

  document.querySelectorAll('[id^="myModal"]').forEach(modal => {
    modal.addEventListener('click', e => {
      if (e.target === modal) modal.classList.add('hidden');
    });
  });
