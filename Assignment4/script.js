function showPassword()
{
    var passwordId = document.getElementById("passwordInput");
    (passwordId.type == "password")?(passwordId.type = "text"):(passwordId.type = "password");
}
function showConfirmPassword()
{
    var passwordId = document.getElementById("confirmPasswordInput");
    (passwordId.type == "password")?(passwordId.type = "text"):(passwordId.type = "password");
}
function validate()
{
    var flag1,flag2,flag3,flag4;
    var firstName = document.getElementById("firstNameInput");
    var firstNameExtraLabel = document.getElementById("firstNameExtraLabel");
    
    var email = document.getElementById("emailInput");
    var emailExtraLabel = document.getElementById("emailExtraLabel");
    
    var password = document.getElementById("passwordInput");
    var passwordExtraLabel = document.getElementById("passwordExtraLabel");
    
    var confirmPassword = document.getElementById("confirmPasswordInput");
    var confirmPasswordExtraLabel = document.getElementById("confirmPasswordExtraLabel");

    if (firstName.value=="")
    {
        flag1 = false;
        firstNameExtraLabel.style.display = "";
    }
    else
    {
        flag1 = true;
        firstNameExtraLabel.style.display = "none";
    }

    if (password.value == "" || password.value.length < 8)
    {
        flag2 = false;
        passwordExtraLabel.style.display = ""
    }
    else
    {
        flag2 = true;
        passwordExtraLabel.style.display = "none"
    }
    if (confirmPassword.value == ""){
        flag3 = false;
        confirmPasswordExtraLabel.style.display = "";
        confirmPasswordExtraLabel.innerHTML = "Confirm Password is Required"
    }
    else if (password.value == ""){
        flag3 = false;
        confirmPasswordExtraLabel.style.display = "";
        confirmPasswordExtraLabel.innerHTML = "Password is Required"
    }
    else if ( confirmPassword.value != password.value)
    {
        flag3 = false;
        confirmPasswordExtraLabel.style.display = "";
        confirmPasswordExtraLabel.innerHTML = "Password doesnot match"
    }
    else
    {
        flag3 = true;
        confirmPasswordExtraLabel.style.display = "none";
    }

    if (email.value == "")
    {
        flag4 = false;
        emailExtraLabel.style.display = "";
        emailExtraLabel.innerHTML = "Email is Required";
    }
    else if (email.value.search("@gmail.com") == -1 )
    {
        // alert(email.value.search("@gmail.com"))
        flag4 = false;
        emailExtraLabel.style.display = "";
        emailExtraLabel.innerHTML = "Please enter a valid Gmail ID";
    }
    else
    {
        flag4 = true;
        emailExtraLabel.style.display = "none";

    }
    var endLabel = document.getElementById("endLabel");
    if (flag1&&flag2&&flag3&&flag4)
    {
        
        endLabel.style.display = "";
        // alert("Successfuly Registered")
    }
    else
    {
        endLabel.style.display = "none";
    }

}

