const menu = document.querySelector('.menu-mobile')
const btnMenu = document.querySelector('.icono-menu')
const close = document.querySelector('.close')

btnMenu.addEventListener('click',()=>{
  menu.style.right = 0;
})

close.addEventListener('click',()=>{
  menu.style.right = "-60%";
})
const adminmenu = document.querySelector('#aside')
const adminbtnMenu = document.querySelector('.icono-menu')
const adminclose = document.querySelector('.close')

adminbtnMenu.addEventListener('click',()=>{
  adminmenu.style.left = 0;
})

close.addEventListener('click',()=>{
  adminmenu.style.left = "-280px";
})