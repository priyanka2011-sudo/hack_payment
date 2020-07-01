function validate() {
    return validateCard() && validateExDay();
}
function validateCard() {
    let card_num = document.getElementById("card_num");
    if(card_num.value.length < 16) {
        displayErr("card_num_err","Please enter card number(16 numbers)");
        return false;
    }
    clearErr("card_num_err");
    return true;
}
function validateExDay() {
    let ex_day = document.getElementById("ex_day");
    if(ex_day.value.length < 4) {
        displayErr("ex_day_err","Please enter as the format \"mmyy\"");
        return false;
    }
    clearErr("ex_day_err");
    return true;
}
function displayErr(id,msg) {
    let error = document.getElementById(id);
    error.innerHTML = msg;
    error.style.color = "red";
}
function clearErr(id) {
    document.getElementById(id).innerHTML = "";
}
