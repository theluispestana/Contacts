//Index page variables
let signInText = document.querySelectorAll('.header-links');
let form = document.querySelectorAll('.sign');
//Contacts page variables
let sideBar = document.querySelector('.side-bar');
let content = document.querySelector('.contacts-container');
let addButton = document.querySelector('.add-button');
let contactForm = document.querySelector('.enlarged-form-container')
let cancelButton = document.querySelectorAll('.contacts-form span');

if (window.location.pathname == "/Contacts/" || window.location.pathname == "/contacts/") {
  //will preserve state of site after refresh
  if (form[1].classList.contains('hide') && sessionStorage.getItem('form0Cl') != null) {
    form[0].classList = sessionStorage.getItem('form0Cl');
    form[1].classList = sessionStorage.getItem('form1Cl');
    signInText[0].children[0].classList = sessionStorage.getItem('signin0Cl');
    signInText[0].children[1].classList = sessionStorage.getItem('signin1Cl');
  }
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

//function will preserve state of site after refresh
function saveClass() {
  sessionStorage.setItem('form0Cl', form[0].classList);
  sessionStorage.setItem('form1Cl', form[1].classList);
  sessionStorage.setItem('signin0Cl', signInText[0].children[0].classList);
  sessionStorage.setItem('signin1Cl', signInText[0].children[1].classList);
}

function toggleSideBar() {
  if (content.style.width == "85%") {
    // sideBar.style.display = "none";
    content.style.width = "100%";
  }
  else {
    content.style.width = "85%";
    // sideBar.style.display = "";
  }
}

function  toggleAddForm() {
  if (contactForm.classList.contains("hide") == true) {
    contactForm.classList.remove('hide');
  }
  else {
    contactForm.classList.add('hide');
  }
}

if (window.location.pathname == "/Contacts/" || window.location.pathname == "/contacts/" || window.location.pathname == "/Contacts/index.php") {
  //event listener for sign in/up text
  for (var i = 0; i < signInText[0].children.length; i++) {
    signInText[0].children[i].addEventListener('click', function() {
      toggleForm();
      saveClass();
    });
  }
}

if (window.location.pathname == "/Contacts/contacts.php") {
  content.addEventListener('click', toggleSideBar);
  addButton.addEventListener('click', toggleAddForm);
  cancelButton[1].addEventListener('click', toggleAddForm);
}
