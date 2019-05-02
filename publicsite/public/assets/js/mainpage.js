
$('#basic').flagStrap();
$('#basic1').flagStrap();
var input = document.querySelector("#phonenumber");
  window.intlTelInput(input, {
    utilsScript: '/assets/js/utils.js',
    separateDialCode : true,
    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
      return "e.g. " + selectedCountryPlaceholder;
    },
});

var password = document.getElementById("password")
, confirmpassword = document.getElementById("confirmpassword");

function validatePassword(){
if(password.value != confirmpassword.value) {
  confirmpassword.setCustomValidity("Passwords Don't Match");
} else {
  confirmpassword.setCustomValidity('');
}
}
password.onchange = validatePassword;
confirmpassword.onkeyup = validatePassword;

$('div.alert').delay(3000).slideUp(300);
