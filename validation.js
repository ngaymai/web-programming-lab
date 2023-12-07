// function formValidation() {
//     var ufirstName = document.registration.firstName;
//     var ulastName = document.registration.lastName;
//     var uFname = document.registration.username;
//     var upassword = document.registration.password;
//     var urepassword = document.registration.repassword;
//     var uemail = document.registration.email;


//     if (userid_validation(ufirstName, 1, 12) && userid_validation(ulastName, 1, 12)) {
//         if (allLetter(ufirstName) && allLetter(ulastName)) {
//             if (ValidateEmail(uemail)) {
//                 if (alphanumeric(uFname, 2) && alphanumeric(upassword, 1)) {
//                     if (ValidatePass(upassword, urepassword)) {
//                         return true;
//                     }
//                 }
//             }

//         }
//     }
//     return false;

// }
// function userid_validation(uid, mx, my) {

//     var uid_len = uid.value.length;
//     if (uid_len == 0 || uid_len >= my || uid_len < mx) {
//         text = "Value should not be empty / length be between " + mx + " to " + my;
//         document.getElementById("inputName").innerHTML = text;
//         uid.focus();
//         return false;
//     }
//     return true;
// }
// function passid_validation(passid, mx, my) {

//     var passid_len = passid.value.length;
//     if (passid_len == 0 || passid_len >= my || passid_len < mx) {
//         alert("Password should not be empty / length be between " + mx + " to " + my);
//         passid.focus();
//         return false;
//     }
//     return true;
// }
// function allLetter(uname) {

//     var letters = /^[A-Za-z]+$/;
//     if (uname.value.match(letters)) {
//         return true;
//     }
//     else {
//         text = 'value must have alphabet characters only';
//         document.getElementById("inputName").innerHTML = text;
//         uname.focus();
//         return false;
//     }
// }
// function alphanumeric(uadd, id) {

//     var letters = /^[0-9a-zA-Z]+$/;
//     if (uadd.value.match(letters)) {
//         return true;
//     }
//     else {
//         if (id == 1) {
//             text = 'Value must have alphanumeric characters only';
//             document.getElementById('inputPassword').innerHTML = text;
//         }
//         else {
//             text = 'Value must have alphanumeric characters only';
//             document.getElementById('inputUsername').innerHTML = text;
//         }

//         uadd.focus();
//         return false;
//     }
// }



// function ValidateEmail(uemail) {

//     var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//     if (uemail.value.match(mailformat)) {
//         return true;
//     }
//     else {
//         text = "You have entered an invalid email address!";
//         document.getElementById("inputEmail").innerHTML = text;
//         uemail.focus();
//         return false;
//     }
// }

// function ValidatePass(pass, repass) {

//     if (pass.value === repass.value) {
//         return true;
//     } else {
//         text = "Wrong repassword";
//         document.getElementById("inputRepass").innerHTML = text;
//         repass.focus();
//         return false;
//     }

// }

function validate(form) {
    fail = validateFullname(form.fullname.value)
    fail = validateUsername(form.username.value)
    fail += validateEmail(form.email.value)
    fail += validatePassword(form.password.value)
    fail += validateRepassword(form.repassword.value, form.password.value)

    if (fail == "") return true
    else {
        alert(fail);
        return false
    }
}

function validateFullname(field) {
    if (field == "") return "No Fullname was entered.\n"
    else if (/[^a-zA-Z]/.test(field))
        return "Only a-z, A-Z allowed in fullname.\n"

    return ""
}

function validateUsername(field) {
    if (field == "") return "No Username was entered.\n"
    else if (field.length < 5)
        return "Usernames must be at least 5 characters.\n"
    else if (/[^a-zA-Z0-9_-]/.test(field))
        return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n"
    return ""
}

function validatePassword(field) {
    if (field == "") return "No Password was entered.\n"
    else if (field.length < 6)
        return "Passwords must be at least 6 characters.\n"
    else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) || !/[0-9]/.test(field))
        return "Passwords require one each of a-z, A-Z and 0-9.\n"
    return ""
}

function validateEmail(field) {
    if (field == "") return "No Email was entered.\n"
    else if (!((field.indexOf(".") > 0) &&
        (field.indexOf("@") > 0)) ||
        /[^a-zA-Z0-9.@_-]/.test(field))
        return "The Email address is invalid.\n"
    return ""
}

function validateRepassword(field, passwd) {
    if (field == "") return "No confirmed password entered.\n"
    else if (field !== passwd)
        return "Confirmed password not match.\n"

    return ""
}



