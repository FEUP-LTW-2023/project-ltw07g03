
function checkPasswordMatch() {
	var password1 = document.getElementById("password").value;
	var password2 = document.getElementById("password_check").value;
  
	if (password1 != password2) {
	  alert("As palavras-passe não correspondem. Por favor, tente novamente.");
	  document.getElementById("password").value = "";
	  document.getElementById("password_check").value = "";
	  document.getElementById("password").focus();
	}
}