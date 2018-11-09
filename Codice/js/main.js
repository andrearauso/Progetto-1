var nameChecked = false;
var lastNameChecked = false;
var dateChecked = false;
var viaChecked = false;
var numeroCivicoChecked = false;
var cittaChecked = false;
var napChecked = false;
var emailChecked = false;
var phoneChecked = false;
var hobbyChecked = true;
var professioneChecked = true;

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function checkName() {
    var input = document.getElementById("inputName");
    var reg = /^[a-zA-ZÀ-ÿ ]+$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        nameChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        nameChecked = false;
        checkRegistration();
    }
}

function checkLastName() {
    var input = document.getElementById("inputLastName");
    var reg = /^[a-zA-ZÀ-ÿ ]+$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        lastNameChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        nameCheck = false;
        checkRegistration();
    }
}

function checkDate() {
    var input = document.getElementById("inputDate");
    var datePick = new Date(input.value);
    var age = getAge(datePick);
    console.log(age);
    if (age >= 0 && age <= 100) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        dateChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        dateChecked = false;
        checkRegistration();
    }
}

function checkVia() {
    var input = document.getElementById("inputAddress");
    var reg = /^[a-zA-ZÀ-ÿ' ]+$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        viaChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        viaChecked = false;
        checkRegistration();
    }
}

function checkNumeroCivico() {
    var input = document.getElementById("inputCivic");
    var reg = /^[0-9]{0,3}([0-9]|([a-zA-Z]){0,1})$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        numeroCivicoChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        numeroCivicoChecked = false;
        checkRegistration();
    }
}

function checkCitta() {
    var input = document.getElementById("inputCity");
    var reg = /^[a-zA-ZÀ-ÿ' ]+$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        cittaChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        cittaChecked = false;
        checkRegistration();
    }
}

function checkNAP() {
    var input = document.getElementById("inputNap");
    var reg = /^\d{1,5}$/;
    if (reg.test(input.value.trim()) && input.value.length > 0 && input.value >= 1000 && input.value < 99999) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        napChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        napChecked = false;
        checkRegistration();
    }
}

function checkEmail() {
    var input = document.getElementById("inputEmail");
    var reg = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        emailChecked = true;
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        emailChecked = false;
        checkRegistration();
    }
}

function checkPhone(valid) {
    if (valid) {
        phoneChecked = true;
        checkRegistration();
    } else {
        phoneChecked = false;
        checkRegistration();
    }

}

function checkHobby(){
    var input = document.getElementById("inputHobby");
    var reg = /^[a-zA-ZÀ-ÿ ]+$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        hobbyChecked = true;
        checkRegistration();
    }else if(input.value.length == 0){
        hobbyChecked = true;
        input.classList.remove("is-invalid");
        input.classList.remove("is-valid");
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        hobbyChecked = false;
        checkRegistration();
    }
}

function checkProfessione(){
    var input = document.getElementById("inputProfessione");
    var reg = /^[a-zA-ZÀ-ÿ ]+$/;
    if (reg.test(input.value.trim()) && input.value.length > 0) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        professioneChecked = true;
        checkRegistration();
    }else if(input.value.length == 0){
        professioneChecked = true;
        input.classList.remove("is-invalid");
        input.classList.remove("is-valid");
        checkRegistration();
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        professioneChecked = false;
        checkRegistration();
    }
}

function checkAll(){
    checkName();
    checkLastName();
    checkDate();
    checkVia();
    checkNumeroCivico();
    checkCitta();
    checkNAP();
    checkEmail();
    checkPhone();
    checkHobby();
    checkProfessione();
}

function checkRegistration() {
    var bottone = document.getElementById("submitButton");

    if (nameChecked && lastNameChecked && dateChecked && viaChecked
        && numeroCivicoChecked && cittaChecked && napChecked
        && emailChecked && phoneChecked && hobbyChecked && professioneChecked) {
        bottone.disabled = false;
    } else {
        bottone.disabled = true;
    }
}



function removeIsValid() {
    var input = document.getElementById("inputName");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputLastName");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputDate");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputAddress");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputCivic");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputNap");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputEmail");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputCity");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputHobby");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("inputProfessione");
    input.classList.remove("is-valid");
    input.classList.remove("is-invalid");
    var input = document.getElementById("valid-msg");
    input.classList = "hide";
    var input = document.getElementById("error-msg");
    input.classList = "hide";
}