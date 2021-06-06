function toggleSidebar(ele){
   let  $toggler = document.querySelector(ele);
   try {
       $toggler.addEventListener('click', function(){
           let sidebar = document.querySelector('#sidebar');
           let main = document.querySelector('#main')
           sidebar.style.opacity='1'
           sidebar.style.height='100vh'
           sidebar.style.width='100vh'
           if(sidebar.classList.contains('side-bar')){
               sidebar.classList.add('flex-zero')
               sidebar.classList.remove('side-bar')
               sidebar.style.flex ='0'
               main.style.flex=12;
           }else {
             sidebar.classList.add('side-bar')
             sidebar.classList.remove('flex-zero')
             main.style.flex=0;
             sidebar.style.flex =12
           }
       })
   } catch (error) {

   }
}

toggleSidebar('.toggler');

let parentDropdown = document.querySelector('#first');
let sidebarParentMenu = document.querySelector('.first');
function displayDropdown(){
    try {
            parentDropdown.addEventListener('click',function(e){
              if(sidebarParentMenu.style.display=='flex'){
                  sidebarParentMenu.style.display ='none';
              }else{
                sidebarParentMenu.style.display ='flex';
              }
            })
    } catch (error) {

    }
}

displayDropdown()


let parentDropdown2 = document.querySelector('#second');
let sidebarParentMenu2 = document.querySelector('.second');
function displayDropdown2(){
    try {
            parentDropdown2.addEventListener('click',function(e){
              if(sidebarParentMenu2.style.display=='flex'){
                  sidebarParentMenu2.style.display ='none';
              }else{
                sidebarParentMenu2.style.display ='flex';
              }
            })
    } catch (error) {

    }
}

displayDropdown2()


