function validate() {
    return validateCard() && validateExDay();
}
function validateCard() {
    let card_num = document.getElementById("card_num").value;
    if(card_num.length !== 16) {
        displayErr("card_num_err","Please enter card number(16 numbers)");
        return false;
    }
    clearErr("card_num_err");
    return true;
}
function validateExDay() {
    let ex_day = document.getElementById("ex_day").value;
    let year = parseInt(new Date().getFullYear());
    year = year - Math.floor(year/1000)*1000;
    if(ex_day.length != 4 || (ex_day[0] == 0 && ex_day[1] > 9) || (ex_day[0] == 1 && ex_day[1] > 2) && (((ex_day[2]+ex_day[3]) - year > 10) 
    || (ex_day[2]+ex_day[3]) - year < 0)) {
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
