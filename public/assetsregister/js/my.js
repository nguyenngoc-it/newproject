$(document).ready(function ()
{
    $('#eye').click(function () {
        let typevalue= $('#inputpassword').attr('type');
        typevalue= (typevalue==='password') ? 'text' : 'password';
        $('#inputpassword').attr('type', typevalue);
        let classeye = (typevalue==='password') ? 'fas fa-eye-slash' : 'fas fa-eye';
        $('#icon-eye').removeClass();
        $('#icon-eye').addClass(classeye);
    })

    $('#hiden-eye').click(function ()
        {
            let typevalue= $('#repeatpassword').attr('type');
            typevalue= (typevalue==='password') ? 'text' : 'password';
            $('#repeatpassword').attr('type', typevalue);
            let  classeye= (typevalue=== 'password') ? 'fas fa-eye-slash' : 'fas fa-eye';
            $('#hiden-icon-eye').removeClass();
            $('#hiden-icon-eye').addClass(classeye);
        }
    )
})

