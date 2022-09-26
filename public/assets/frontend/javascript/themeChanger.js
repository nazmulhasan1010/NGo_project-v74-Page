if ($('.content-100').hasClass('bg-dark-cu')) {
    $('#dark').attr('checked', true);
}else if($('.content-100').hasClass('bg-white-cu')){
    $('#light').attr('checked', true);
}
$('#light').click(function () {
    $('.content-100').addClass('bg-white-cu');
    $('.content-100').removeClass('bg-dark-cu');

});
$('#dark').click(function () {
    $('.content-100').addClass('bg-dark-cu');
    $('.content-100').removeClass('bg-white-cu');
});
