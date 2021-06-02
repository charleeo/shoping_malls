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

let parentDropdown = document.querySelectorAll('.side-parent-dropdown');
// let sidebarParentMenu = document.querySelector('.sidebar-dropdown-paranet');
function displayDropdown(e){
    let menus = document.querySelector(e)
    try {
        
        parentDropdown.forEach(el=>{
            el.addEventListener('click',function(e){
              if(menus.style.display=='flex'){
                  menus.style.display ='none';
              }else{
                menus.style.display ='flex';
              }
            })
        })
    } catch (error) {
        
    }
}

displayDropdown('.sidebar-dropdown-paranet')



