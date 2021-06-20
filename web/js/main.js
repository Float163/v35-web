$(function () {
    $('.iris_mButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});

$(document).on('ready pjax:success', function() {
    $('.iris_mButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});