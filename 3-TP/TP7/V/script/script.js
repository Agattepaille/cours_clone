const cardList = document.getElementsByClassName('card-list')[0];
const shuffle = document.getElementsByClassName('btn-shuffle')[0];

// Cards animation, include a link to the controller
shuffle.addEventListener('click', () => {
  cardList.classList.add('is-animated');
  setTimeout(() => {
    window.location='../C/readDBStudents.action.php';
  }, 3000
  )
});