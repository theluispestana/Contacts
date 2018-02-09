let signInText = document.querySelectorAll('.header-links');
let form = document.querySelectorAll('.sign');

if (form[1].classList != sessionStorage.getItem('form1Cl')) {
  form[0].classList = sessionStorage.getItem('form0Cl');
  form[1].classList = sessionStorage.getItem('form1Cl');
  signInText[0].children[0].classList = sessionStorage.getItem('signin0Cl');
  signInText[0].children[1].classList = sessionStorage.getItem('signin1Cl');
}

function toggleForm() {
  if (form[1].classList.contains('hide')) {
    form[0].classList.add('hide');
    form[1].classList.remove('hide');
    signInText[0].children[0].classList.add('hide');
    signInText[0].children[1].classList.remove('hide');
  }
  else {
    form[0].classList.remove('hide');
    form[1].classList.add('hide');
    signInText[0].children[0].classList.remove('hide');
    signInText[0].children[1].classList.add('hide');
  }
}

function saveClass() {
  sessionStorage.setItem('form0Cl', form[0].classList);
  sessionStorage.setItem('form1Cl', form[1].classList);
  sessionStorage.setItem('signin0Cl', signInText[0].children[0].classList);
  sessionStorage.setItem('signin1Cl', signInText[0].children[1].classList);
}

for (var i = 0; i < signInText[0].children.length; i++) {
  signInText[0].children[i].addEventListener('click', function() {
    toggleForm();
    saveClass();
  });
}
