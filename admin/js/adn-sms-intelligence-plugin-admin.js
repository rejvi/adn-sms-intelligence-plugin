$adn('#radioBtn a').on('click', function(){
    var sel = $adn(this).data('title');
    var tog = $adn(this).data('toggle');
    $adn('#'+tog).prop('value', sel);

    $adn('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $adn('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
});

//registration_script
$adn('#registration_yes').on('click', function () {
	$adn("#registration_msg").removeAttr("readonly", true);
    $adn("#registration_msg").attr('required', true);
});
$adn('#registration_no').on('click', function () {
 	$adn("#registration_msg").attr("readonly", true);
    $adn("#registration_msg").removeAttr('required', true);

});
//password_reset_script
$adn('#password_reset_yes').on('click', function () {
    $adn("#password_reset_msg").removeAttr("readonly", true);
    $adn("#password_reset_msg").attr('required', true);

});
$adn('#password_reset_no').on('click', function () {

    $adn("#password_reset_msg").attr("readonly", true);
    $adn("#password_reset_msg").removeAttr('required', true);

});
//birthday_script
$adn('#birthday_yes').on('click', function () {
    $adn("#birthday_msg").removeAttr("readonly", true);
    $adn("#birthday_msg").attr('required', true);
});
$adn('#birthday_no').on('click', function () {
    $adn("#birthday_msg").attr("readonly", true);
    $adn("#birthday_msg").removeAttr('required', true);
});
//new_order_script
$adn('#new_order_yes').on('click', function () {
    $adn("#new_order_msg").removeAttr("readonly", true);
    $adn("#new_order_msg").attr('required', true);
});
$adn('#new_order_no').on('click', function () {
    $adn("#new_order_msg").attr("readonly", true);
    $adn("#new_order_msg").removeAttr('required', true);
});
//on_hold_script
$adn('#on_hold_yes').on('click', function () {
    $adn("#on_hold_msg").removeAttr("readonly", true);
    $adn("#on_hold_msg").attr('required', true);
});
$adn('#on_hold_no').on('click', function () {
    $adn("#on_hold_msg").attr("readonly", true);
    $adn("#on_hold_msg").removeAttr('required', true);
});
//pending_script
$adn('#pending_yes').on('click', function () {
    $adn("#pending_msg").removeAttr("readonly", true);
    $adn("#pending_msg").attr('required', true);
});
$adn('#pending_no').on('click', function () {
    $adn("#pending_msg").attr("readonly", true);
    $adn("#pending_msg").removeAttr('required', true);
});
//processing_script
$adn('#processing_yes').on('click', function () {
    $adn("#processing_msg").removeAttr("readonly", true);
    $adn("#processing_msg").attr('required', true);
});
$adn('#processing_no').on('click', function () {
    $adn("#processing_msg").attr("readonly", true);
    $adn("#processing_msg").removeAttr('required', true);
});
//failed_script
$adn('#failed_yes').on('click', function () {
    $adn("#failed_msg").removeAttr("readonly", true);
    $adn("#failed_msg").attr('required', true);
});
$adn('#failed_no').on('click', function () {
    $adn("#failed_msg").attr("readonly", true);
    $adn("#failed_msg").removeAttr('required', true);
});
//completed_script
$adn('#completed_yes').on('click', function () {
    $adn("#completed_msg").removeAttr("readonly", true);
    $adn("#completed_msg").attr('required', true);
});
$adn('#completed_no').on('click', function () {
    $adn("#completed_msg").attr("readonly", true);
    $adn("#completed_msg").removeAttr('required', true);
});
//cancelled_script
$adn('#cancelled_yes').on('click', function () {
    $adn("#cancelled_msg").removeAttr("readonly", true);
    $adn("#cancelled_msg").attr('required', true);
});
$adn('#cancelled_no').on('click', function () {
    $adn("#cancelled_msg").attr("readonly", true);
    $adn("#cancelled_msg").removeAttr('required', true);
});
//refunded_script
$adn('#refunded_yes').on('click', function () {
    $adn("#refunded_msg").removeAttr("readonly", true);
    $adn("#refunded_msg").attr('required', true);
});
$adn('#refunded_no').on('click', function () {
    $adn("#refunded_msg").attr("readonly", true);
    $adn("#refunded_msg").removeAttr('required', true);
});
$adn('#type').on('change', function() {
    var value = $adn(this).val();
    // alert(value);
    if(value==='single'){
        $adn("#show_number").show();
        $adn("#number").removeAttr("disabled", true);
        $adn("#number").attr('required', true);
        $adn("#show_campaign_title").hide();
        $adn("#campaignTitle").attr("disabled", true);
        $adn("#campaignTitle").removeAttr('required', true);

    }else if (value==='all'){
        $adn("#show_campaign_title").show();
        $adn("#campaignTitle").removeAttr("disabled", true);
        $adn("#campaignTitle").attr('required', true);
        $adn("#show_number").hide();
        $adn("#number").attr("disabled", true);
        $adn("#number").removeAttr('required', true);
    }else{
        $adn("#show_number").hide();
        $adn("#number").attr("disabled", true);
        $adn("#number").removeAttr('required', true);
        $adn("#show_campaign_title").hide();
        $adn("#campaignTitle").attr("disabled", true);
        $adn("#campaignTitle").removeAttr('required', true);
    }
});

$adn(".toggle-password").click(function() {
    var input = $adn($adn(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
        $adn(".field-icon").text("Hide");
    } else {
        input.attr("type", "password");
        $adn(".field-icon").text("Show");
    }
});