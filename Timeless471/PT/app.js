const toggle = document.getElementsByClassName('toggle')[0];
const navlinks = document.getElementsByClassName('nav-links')[0];
const navName = document.getElementsByClassName('navName')[0];
const nav = document.getElementsByClassName('nav')[0];



toggle.addEventListener('click',() => {
    navlinks.classList.toggle('active');
    navName.classList.toggle('active');
    nav.classList.toggle('active');
})

function linkClicked(){
    navlinks.classList.remove('active');
}

const home = document.getElementsByClassName('homelink')[0];
const about = document.getElementsByClassName('ProgramsLink')[0];
const projects = document.getElementsByClassName('booklink')[0];
const contact = document.getElementsByClassName('Aboutlink')[0];