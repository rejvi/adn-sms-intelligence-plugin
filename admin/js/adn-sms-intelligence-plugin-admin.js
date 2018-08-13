$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
});

//registration_script
$('#registration_yes').on('click', function () {
	$("#registration_msg").removeAttr("readonly", true);
    $("#registration_msg").attr('required', true);
});
$('#registration_no').on('click', function () {
 	$("#registration_msg").attr("readonly", true);
    $("#registration_msg").removeAttr('required', true);

});
//password_reset_script
$('#password_reset_yes').on('click', function () {
    $("#password_reset_msg").attr('required', true);
    $("#password_reset_msg_show").fadeIn(1000);
});
$('#password_reset_no').on('click', function () {

    $("#password_reset_msg").removeAttr('required', true);
    $("#password_reset_msg_show").fadeOut(1000);
});
//birthday_script
$('#birthday_yes').on('click', function () {
    $("#birthday_msg").removeAttr("readonly", true);
    $("#birthday_msg").attr('required', true);
});
$('#birthday_no').on('click', function () {
    $("#birthday_msg").attr("readonly", true);
    $("#birthday_msg").removeAttr('required', true);
});
//new_order_script
$('#new_order_yes').on('click', function () {
    $("#new_order_msg").removeAttr("readonly", true);
    $("#new_order_msg").attr('required', true);
});
$('#new_order_no').on('click', function () {
    $("#new_order_msg").attr("readonly", true);
    $("#new_order_msg").removeAttr('required', true);
});
//on_hold_script
$('#on_hold_yes').on('click', function () {
    $("#on_hold_msg").removeAttr("readonly", true);
    $("#on_hold_msg").attr('required', true);
});
$('#on_hold_no').on('click', function () {
    $("#on_hold_msg").attr("readonly", true);
    $("#on_hold_msg").removeAttr('required', true);
});
//pending_script
$('#pending_yes').on('click', function () {
    $("#pending_msg").removeAttr("readonly", true);
    $("#pending_msg").attr('required', true);
});
$('#pending_no').on('click', function () {
    $("#pending_msg").attr("readonly", true);
    $("#pending_msg").removeAttr('required', true);
});
//processing_script
$('#processing_yes').on('click', function () {
    $("#processing_msg").removeAttr("readonly", true);
    $("#processing_msg").attr('required', true);
});
$('#processing_no').on('click', function () {
    $("#processing_msg").attr("readonly", true);
    $("#processing_msg").removeAttr('required', true);
});
//failed_script
$('#failed_yes').on('click', function () {
    $("#failed_msg").removeAttr("readonly", true);
    $("#failed_msg").attr('required', true);
});
$('#failed_no').on('click', function () {
    $("#failed_msg").attr("readonly", true);
    $("#failed_msg").removeAttr('required', true);
});
//completed_script
$('#completed_yes').on('click', function () {
    $("#completed_msg").removeAttr("readonly", true);
    $("#completed_msg").attr('required', true);
});
$('#completed_no').on('click', function () {
    $("#completed_msg").attr("readonly", true);
    $("#completed_msg").removeAttr('required', true);
});
//cancelled_script
$('#cancelled_yes').on('click', function () {
    $("#cancelled_msg").removeAttr("readonly", true);
    $("#cancelled_msg").attr('required', true);
});
$('#cancelled_no').on('click', function () {
    $("#cancelled_msg").attr("readonly", true);
    $("#cancelled_msg").removeAttr('required', true);
});
//refunded_script
$('#refunded_yes').on('click', function () {
    $("#refunded_msg").removeAttr("readonly", true);
    $("#refunded_msg").attr('required', true);
});
$('#refunded_no').on('click', function () {
    $("#refunded_msg").attr("readonly", true);
    $("#refunded_msg").removeAttr('required', true);
});