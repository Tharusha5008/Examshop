const header = document.querySelector('header');
function fixedNavbar() {
	header.classList.toggle('scroll', window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListner('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListner('click', function(){
	let nav = document.querySelector('.navbar');
	nav.classList.toggle('active');
})
userBtn.addEventListner('click', function(){
	let userBox = document.querySelector('.user-box');
	userBox.classList.toggle('active');
})