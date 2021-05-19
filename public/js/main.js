let navbar = document.querySelector('#navbar')
function changeNvabarColor(){    
        if(window.scrollY >= 50){
            navbar.classList.add('new-bg')
            navbar.classList.remove('default-bg')
        }else {
            navbar.classList.add('default-bg');
            navbar.classList.remove('new-bg')
        }
   
    return 
}
window.addEventListener('scroll', changeNvabarColor)

