let navbar = document.querySelector('#navbar')
function changeNvabarColor(){  
    try {
        
        if(window.scrollY >= 50){
            navbar.classList.add('new-bg')
            navbar.classList.remove('default-bg')
        }else {
            navbar.classList.add('default-bg');
            navbar.classList.remove('new-bg')
        }
    } catch (error) {
        
    }  
   
    return 
}
window.addEventListener('scroll', changeNvabarColor)

const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
  // Get the selected file
  const [file] = e.target.files;
  // Get the file name and size
  const { name: fileName, size } = file;
//   console.log(fileName)
  // Convert size in bytes to kilo bytes
  const fileSize = (size / 1000).toFixed(2);
  // Set the text content
  const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  document.querySelector('.file-name').textContent = fileNameAndSize;
});

$('#file').change(function(){
    var files = $(this)[0].files;
    // console.log(files)
    let hiddeninput = $('#hidden-input')
    tempVal =[]
    hiddeninput.val('')
    for(i=0;i<files.length;i++){
        console.log(files[i])
        tempVal.push(files[i])
    }
    console.log(tempVal)
    hiddeninput.val(tempVal)
    document.querySelector('.file-name').textContent = `${files.length} selected`;
});