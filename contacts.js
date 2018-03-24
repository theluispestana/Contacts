//Index page variables
let signInText = document.querySelectorAll('.header-links');
let form = document.querySelectorAll('.sign');
//Contacts page variables
let sidebarButton = document.querySelector('.side-bar-button');
let sideBar = document.querySelector('.side-bar');
let content = document.querySelector('.contacts-container');
let addButton = document.querySelector('.add-button');
let contactForm = document.querySelector('.enlarged-form-container')
let cancelButton = document.querySelectorAll('.contacts-form span');

//code will only run on homepage
if (window.location.pathname == "/" || window.location.pathname == "/~onlineco/" || window.location.pathname == "/~onlineco/index.php") {
  //will preserve state of site after refresh
  if (form[1].classList.contains('hide') && sessionStorage.getItem('form0Cl') !== null) {
    form[0].classList = sessionStorage.getItem('form0Cl');
    form[1].classList = sessionStorage.getItem('form1Cl');
    signInText[0].children[0].classList = sessionStorage.getItem('signin0Cl');
    signInText[0].children[1].classList = sessionStorage.getItem('signin1Cl');
  }
}

//code will only run on contacts.php
if (window.location.pathname == "/~onlineco/contacts.php") {
  //will close side bar by default if window is too narrow
  if (window.innerWidth <= 700) {
    content.style.width = "100%";
  }
}

function toggleForm() {
  if (form[1].classList.contains('hide')) {
    form[0].classList.add('hide');
    form[1].classList.remove('hide');
    signInText[0].children[0].classList.add('hide');
    signInText[0].children[1].classList.remove('hide');
  } else {
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

//function will toggle animation to hide or show side bar options
function toggleSideBar() {
  if (window.innerWidth <= 700) {
    if (content.style.width == "60%") {
      // sideBar.style.display = "none";
      content.style.width = "100%";
    } else {
      content.style.width = "60%";
      // sideBar.style.width = "40%";
      // sideBar.style.fontsize =
    }
  } else {
    if (content.style.width == "85%") {
      // sideBar.style.display = "none";
      content.style.width = "100%";
    } else {
      content.style.width = "85%";
      // sideBar.style.width = "15%";
    }
  }
}

function toggleAddForm() {
  if (contactForm.classList.contains("hide") == true) {
    contactForm.classList.remove('hide');
  } else {
    contactForm.classList.add('hide');
  }
}

if (window.location.pathname == "/" || window.location.pathname == "/~onlineco/" || window.location.pathname == "/~onlineco/index.php") {
  //event listener for sign in/up text
  for (var i = 0; i < signInText[0].children.length; i++) {
    signInText[0].children[i].addEventListener('click', function() {
      toggleForm();
      saveClass();
    });
  }
}

if (window.location.pathname == "/~onlineco/contacts.php") {
  sidebarButton.addEventListener('click', toggleSideBar);
  addButton.addEventListener('click', toggleAddForm);
  cancelButton[1].addEventListener('click', toggleAddForm);
  window.addEventListener("resize", function() {
    if (window.innerWidth <= 700) {
      content.style.width = "100%";
    } else {
      content.style.width = "85%";
    }
  });
}
