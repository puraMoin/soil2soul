$(function() {
    $('.comma').each(function() {
        var value = checkIsNaN(parseInt($(this).html() * 1));
        value = addCommas(value);
        $(this).html(value);
    });
    $('.comma2').each(function() {
        var value = parseInt($(this).html());
        if (value < 0) {
            $(this).html(0);
        } else {
            value = addCommas(value);
            $(this).html(value);
        }
    });
	$('input[alt=pan]').on('blur', function() {
        var string = $(this).val();
        string = string.toUpperCase();
        $(this).val(string);
    });
	$('input[alt=tan]').on('blur', function() {
        var string = $(this).val();
        string = string.toUpperCase();
        $(this).val(string);
    });
	$('input').on('focusout', function() {
        $(this).parent('div').removeClass('fg-line');
        if($(this).val() == '' || $(this).val() == 0){
            $(this).parent('div').removeClass('fg-toggled');
        }
    });
	$('input').on('focus', function() {
        $(this).parent('div').addClass('fg-line').addClass('fg-toggled');
    });
	$('.numeric').on('blur', function() {
		if ($(this).val() == "") {
			$(this).val(0);
		}
	});
	$('.numeric').each(function(index) {
		if ($(this).val() == '') {
			var readOnlyCheck = $(this).attr('readonly');
			if (readOnlyCheck != 'true') {
				$(this).val(0);
			}
		}
	});
    $('.numeric').on('click', function() {
		if ($(this).val() == 0) {
			var readOnlyCheck = $(this).attr('readonly');
			if (readOnlyCheck != true) {
				$(this).val('');
			}
		}
	});
    $('.numeric').addClass('text-right');

    $('.decimal').on('blur', function() {
         if ($(this).val() == "") {
            var total=0;
            var newvalue= parseFloat(total).toFixed(2);
            $(this).val(newvalue);
        } else {
            var total =$(this).val();
            var newvalue= parseFloat(total).toFixed(2);
            $(this).val(newvalue);
        }
    });
});

function showLoader(centerY){
    $.blockUI({
        message: '<span class="p-10 border-1 b-c-gainsboro b-r-1"><img src=webrootUrl+"img/loader.gif" align="" style="height:30px;"><span> &nbsp;Please wait...</span>',
        centerY: centerY != undefined ? centerY : true,
        baseZ: 99999,
        css: {
            border: 'none',
            padding: '2px',
            backgroundColor: 'none'
        },
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.15,
            cursor: 'wait'
        }
    });
}


function redirectToLogout(){
    window.location.href = '/index';
}

function hideLoader(){
    $.unblockUI({
        onUnblock: function () {
            $.removeAttr("style");
        }
    });
}

function showActiveHeader(id){
    $('.header_outer').removeClass('active');
    $('#'+id).addClass('active');
}

function goToPage(url){
    window.location = url;
}

function resetSrNo(id) {
    $.each($(id).children("tr"), function(ind, obj) {
        $(obj).children("td").eq(0).html(ind + 1);
    });
}

function resetSrNo2(id) {
    $.each($(id).children("tr"), function(ind, obj) {
        $(obj).children("td").eq(1).html(ind + 1);
    });
}

function clearForm(ele) {
    $(ele).find(':input').each(function() {
        switch (this.type) {
            case 'password':
            case 'select-multiple':
            case 'text':
            case 'tel':
            case 'textarea':
            case 'hidden':
                $(this).val('');
                break;
            case 'select-one':
               $(this)[0].selectedIndex = 0;
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
        $(this).closest('.form-group').removeClass('has-error');
        $(this).closest('.form-group').find('.help-block').html('');
    });
    $('.numeric').each(function(index) {
        if ($(this).val() == '') {
            var readOnlyCheck = $(this).attr('readonly');
            if (readOnlyCheck != 'true') {
                $(this).val(0);
            }
        }
    });
    resetInputText();
}

function resetInputText() {
    $('.textright3').each(function(index) {
        if ($(this).val() == '') {
            var readOnlyCheck = $(this).attr('readonly');
            if (readOnlyCheck != 'true') {
                $(this).val('0.00');
            }
        }else{
             var floatval = parseFloat($(this).val()).toFixed(2);
              floatval = checkIsNaN(floatval);
              $(this).val(floatval)
        }
    });
	 $('.numeric').each(function(index) {
        if ($(this).val() == '') {
            var readOnlyCheck = $(this).attr('readonly');
            if (readOnlyCheck != 'true') {
                $(this).val(0);
            }
        }
    });
}

function subscribe(formId) {
    var emailId = $('#email_subscribe').val();
    var check = checkemail(emailId);
    if (emailId.length > 0 && check != 0) {
        showLoader();
        var postStr = $(formId).serialize();
        $.ajax({
            type: 'POST',
            url: '/user/subscribe',
            data: postStr,
            dataType: 'json',
            success: function(resp) {
                hideLoader();
                if (resp.error == 0) {
                    alert('Please enter a valid e-mail address to subscribe to our newsletters.');
                } else {
                    $('#subscribe_modal').modal('show');
                }
            }
        });
    } else {
        alert('Please enter a valid e-mail address to subscribe to our newsletters.');
    }
    return false;
}

function checkemail(email) {
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if (filter.test(email)) {
        return 1;
    }
    else {
        return 0;
    }
}


function goToByScroll(id){
	$('html,body').animate({scrollTop: $(id).offset().top - 100},'slow');
}

function notify(type, msg) {
    $.growl({
        title: '',
        message: msg,
        url: ''
    }, {
        element: 'body',
        type: type,
        allow_dismiss: true,
        offset: {
            x: 20,
            y: 85
        },
        spacing: 10,
        z_index: 1031,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' +
                '<span data-growl="icon"></span>' +
                '<span data-growl="title"></span>' +
                '<span data-growl="message"></span>' +
                '<a href="javascript:void(0)" data-growl="url"></a>' +
                '</div>'
    });
};

function showNotification(toastrSaved, toastrMsg){
//    notify(toastrSaved, toastrMsg);
}
// -------------------------------- Multiple Delete --------------------------------
function checkAll(thisobj){
        $('.delete_all').hide();

        if ($(thisobj).is(':checked')) {
            var i = 0;
            $(".checkbox").each(function(index, obj) {
                $(obj).prop('checked', true);
//                $(obj).parents('span').addClass('checked');
                i++;
            });
            if (i > 0) {
                $('.delete_all').css('display','inline-block');
            }
        } else {
            $(".checkbox").each(function(index, obj) {
                $(obj).prop('checked', false);
//                $(obj).parents('span').removeClass('checked');
            });
            $('.delete_all').hide();
        }

}

function checkboxClick(){
    $(".checkbox").on('click', function() {
        if ($(this).is(':checked')) {
            $(this).parents('tr').eq(0).addClass('rowselected');
        } else {
            $(this).parents('tr').eq(0).removeClass('rowselected');
            $('#check_all').prop('checked', false);
            $('#check_all').parents('span').removeClass('checked');
        }
        var flag = false;
        var allflag = true;
        $('.checkbox').each(function(index, obj) {
            if ($(this).is(':checked')) {
                flag = true;
            } else {
                allflag = false;
            }
        });
        if (allflag) {
            $('#check_all').prop('checked', true);
            $('#check_all').parents('span').addClass('checked');
        }
        if (flag) {
            $('.delete_all').css('display','inline-block');
        } else {
            $('.delete_all').hide();
        }
    });
}

$(function() {
    $('.delete_all').hide();
    $("#check_all").on('click', function() {
        if ($(this).is(':checked')) {
            var i = 0;
            $(".checkbox").each(function(index, obj) {
                $(obj).prop('checked', true);
//                $(obj).parents('span').addClass('checked');
                i++;
            });
            if (i > 0) {
                $('.delete_all').css('display','inline-block');
            }
        } else {
            $(".checkbox").each(function(index, obj) {
                $(obj).prop('checked', false);
//                $(obj).parents('span').removeClass('checked');
            });
            $('.delete_all').hide();
        }
    });
    $(".checkbox").on('click', function() {
        if ($(this).is(':checked')) {
            $(this).parents('tr').eq(0).addClass('rowselected');
        } else {
            $(this).parents('tr').eq(0).removeClass('rowselected');
            $('#check_all').prop('checked', false);
            $('#check_all').parents('span').removeClass('checked');
        }
        var flag = false;
        var allflag = true;
        $('.checkbox').each(function(index, obj) {
            if ($(this).is(':checked')) {
                flag = true;
            } else {
                allflag = false;
            }
        });
        if (allflag) {
            $('#check_all').prop('checked', true);
            $('#check_all').parents('span').addClass('checked');
        }
        if (flag) {
            $('.delete_all').css('display','inline-block');
        } else {
            $('.delete_all').hide();
        }
    });
});

function exportCSVFile(type) {
    window.location.href = '/gstr1/export_csv?type='+type;
}


function showLogoutSuggestion(){
    $("#logout_reason").val('');
    $("#logout_suggestion").val('');
    $('#div_logout_suggestion').modal('show');
    $("#logout_suggestion").focus();
}

function showLogoutReason(){
    var logout_reason = $('#logout_reason').val();
    if(logout_reason == 1){
        var tableHtml = '1. What steps will reproduce the problem? \n\n\n2. What is the expected result? What do you see instead? \n\n\n3. Anything else you think we should know?\n';
        $('#logout_suggestion').val(tableHtml);
    }else{
        $('#logout_suggestion').val('');
    }
}

function sendLogoutSuggestion(){
    var suggestion = $("#logout_suggestion").val();
    var logout_reason = $("#logout_reason option:selected").text().trim();
    suggestion = suggestion.trim();
    if(suggestion == ''){
        goToPage('/user/logout');
    }else{
        showLoader();
        $.ajax({
            type: "POST",
            url: "/dashboard/logout_suggestion",
            data: {
                suggestion: suggestion,
                logout_reason: logout_reason
            },
            dataType: 'json',
            success: function(resp){
                $('#div_logout_suggestion').modal('hide');
                if(resp > 0){
                    goToPage('/user/logout');
                }else{
                    hideLoader();
                    alert(dataErrorMsg);
                }
            }
        });
    }
}

function selectLeftMenu(menu, submenu){
    if(submenu == undefined || submenu == ''){
        $('#'+menu).addClass('active');
    }else{
        $('#'+menu).addClass('active open');
//        $('#'+menu + ' .arrow').addClass('open');
        $('#'+submenu).addClass('active open');
        $('#'+submenu).parent('ul').addClass('in');
    }
//    App.fixContentHeight();
}

function checkCookie(){
    var cookie_ass_id = $.cookie("aid");
    if(cookie_ass_id == undefined || cookie_ass_id == ''){
        returnFlag = false;
        location.reload();
    }
    var ass = decodeURI(cookie_ass_id);
    ass = ass.split("").reverse().join("");
//    var ass_id = window.atob(ass);
    var ass_id = decodeBase64(ass);
    var returnFlag = true;
    if(ass_id != page_ass_id){
        returnFlag = false;
        location.reload();
//        window.location.href = window.location.href + "?single";
    }
    return returnFlag;
}

//Start For base64 decode
var base64Str;
var base64Count;
var END_OF_INPUT = -1;

function setBase64Str(str){
    base64Str = str;
    base64Count = 0;
}
function readReverseBase64(){
    if (!base64Str) return END_OF_INPUT;
    while (true){
        if (base64Count >= base64Str.length) return END_OF_INPUT;
        var nextCharacter = base64Str.charAt(base64Count);
        base64Count++;
        if (reverseBase64Chars[nextCharacter]){
            return reverseBase64Chars[nextCharacter];
        }
        if (nextCharacter == 'A') return 0;
    }
    return END_OF_INPUT;
}

var base64Chars = new Array(
    'A','B','C','D','E','F','G','H',
    'I','J','K','L','M','N','O','P',
    'Q','R','S','T','U','V','W','X',
    'Y','Z','a','b','c','d','e','f',
    'g','h','i','j','k','l','m','n',
    'o','p','q','r','s','t','u','v',
    'w','x','y','z','0','1','2','3',
    '4','5','6','7','8','9','+','/'
);

var reverseBase64Chars = new Array();
for (var i=0; i < base64Chars.length; i++){
    reverseBase64Chars[base64Chars[i]] = i;
}

function decodeBase64(str){
    setBase64Str(str);
    var result = "";
    var inBuffer = new Array(4);
    var done = false;
    while (!done && (inBuffer[0] = readReverseBase64()) != END_OF_INPUT
        && (inBuffer[1] = readReverseBase64()) != END_OF_INPUT){
        inBuffer[2] = readReverseBase64();
        inBuffer[3] = readReverseBase64();
        result += ntos((((inBuffer[0] << 2) & 0xff)| inBuffer[1] >> 4));
        if (inBuffer[2] != END_OF_INPUT){
            result +=  ntos((((inBuffer[1] << 4) & 0xff)| inBuffer[2] >> 2));
            if (inBuffer[3] != END_OF_INPUT){
                result +=  ntos((((inBuffer[2] << 6)  & 0xff) | inBuffer[3]));
            } else {
                done = true;
            }
        } else {
            done = true;
        }
    }
    return result;
}

function ntos(n){
    n=n.toString(16);
    if (n.length == 1) n="0"+n;
    n="%"+n;
    return unescape(n);
}

function showNotificationToastr (toasterType, customMsg) {
	toastCount = 0;
	var shortCutFunction = toasterType;
	var msg = customMsg;
	var title = '';
	var $showDuration = "1000";
	var $hideDuration = "1000";
	var $timeOut = "5000";
	var $extendedTimeOut = "1000";
	var $showEasing = "swing";
	var $hideEasing = "linear";
	var $showMethod = "fadeIn";
	var $hideMethod = "fadeOut";
	var toastIndex = toastCount++;

	toastr.options = {
		closeButton: true,
		debug: false,
		positionClass: 'toast-top-center',
		onclick: null
	};

	$("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));
	var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
}
//End For base64 decode

function openLiteBox(id) {
    $(id).modal('show');
}

function closeLiteBox(id) {
    $(id).modal('hide');
}
function openModal(id) {
    $('#' + id).modal('show');
}

function closeModal(id) {
    $('#' + id).modal('hide');
}