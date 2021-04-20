require('./bootstrap');

$('#img').on('change', function(){
    const file = $(this)
    if(file[0].files && file[0].files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            $('#img_view').attr('src', e.target.result)
        }
        reader.readAsDataURL(file[0].files[0]);
        $('#box-img').removeClass('hidden')
        $('#box-img-empty').removeClass('flex')
        $('#box-img-empty').addClass('hidden')
    }
})

$('#delete-img').on('click', function(){
    $('#box-img').addClass('hidden')
    $('#box-img-empty').addClass('flex')
    $('#box-img-empty').removeClass('hidden')
    $('#img').val('')
})