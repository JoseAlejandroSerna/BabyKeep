
$(document).ready(function() {
	OpenPay.setId('malfh4hxezobdf1dwgoo');
	OpenPay.setApiKey('pk_7237629f0c0744638989cd72b3965ee5');
	OpenPay.setSandboxMode(true);
	//var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
});

$('#pay-button').on('click', function(event) {
	event.preventDefault();
	$("#pay-button").prop( "disabled", true);
	OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);              
});

var success_callbak = function(response) {
	var token_id = response.data.id;
	$('#token_id').val(token_id);
	$('#payment-form').submit();
};

var error_callbak = function(response) {
var desc = response.data.description != undefined ?
	response.data.description : response.message;
	alert("ERROR [" + response.status + "] " + desc);
	$("#pay-button").prop("disabled", false);
};