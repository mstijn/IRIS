function checkPass(){
	var pass1 = document.getElementById('password');
	var pass2 = document.getElementById('password2');
	var message = document.getElementById('ConfirmMessage');

	var Color_Good = "#26ff00";
	var Color_Rekt = "#ff1405";

	if(pass1.value == pass2.value){
		pass2.style.backgroundColor = Color_Good;
        message.style.color = Color_Good;
        message.innerHTML = " &#x2714;";
	}else{
        pass2.style.backgroundColor = Color_Rekt;
        message.style.color = Color_Rekt;
        message.innerHTML = " &#x2718;";
    }
}