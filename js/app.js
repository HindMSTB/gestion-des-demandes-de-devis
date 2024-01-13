let sliderHome = document.querySelector('.sliderHome .list');
let items = document.querySelectorAll('.sliderHome .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.sliderHome .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 7000);
function reloadSlider(){
    sliderHome.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.sliderHome .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 7000);

    
}


dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};







function toggleSubMenu() {
    const subMenu = document.getElementById("subMenu");
    subMenu.style.opacity = (subMenu.style.opacity === "0") ? "1" : "0";
    subMenu.style.visibility = (subMenu.style.visibility === "hidden") ? "visible" : "hidden";
}




const itemH = document.querySelectorAll('.accordion button');

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    itemH[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

itemH.forEach((item) => item.addEventListener('click', toggleAccordion));










//mode sombre 

const modeToggle = document.getElementById('modeToggle');
const body = document.body;

modeToggle.addEventListener('click', () => {
  body.classList.toggle('dark-mode');
});
