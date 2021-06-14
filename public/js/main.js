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
window.addEventListener('scroll', changeNvabarColor);

$(document).ready(function() {
    $("#submit-btn").click(function(e){
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var phone = $("#phone").val();
        var age = $("#age").val();
        var fullname = $('#fullname').val();
        var confirmPassword =$('#password-confirm').val();
        $('#message').text('Loading.....');

        $.ajax({
            url: "/save-users",
            type:'POST',
            data: {_token:_token,
                password_confirmation:confirmPassword, email, password,phone,age,fullname},
            success: function(data) {
                $('#message').text('');
                if($.isEmptyObject(data.error)){
                    $('#message').text(data.success);
                }else{
                    printErrorMsg(data.error);
                }
            },
            error: function(error){
               console.log(error)
            }
        });
    });


    function printErrorMsg (msg){
        $.each( msg, function( key, value ) {
            $('#'+key+'-error').text(value);
            setTimeout(function(){
                $('#'+key+'-error').text('');
            },5000)
        });
    }
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
    
    hiddeninput.val(tempVal)
    document.querySelector('.file-name').textContent = `${files.length}files selected`;
});
