function getCodeBoxElement(index) {
    return document.getElementById('codeBox' + index);
  }
function onKeyUpEvent(index, event) {
    const eventCode = event.which || event.keyCode;
    let otp = false; //OTP password
    if (getCodeBoxElement(index).value.length === 1) {
    if (index !== 4) {
        getCodeBoxElement(index+ 1).focus();
    } else {
        getCodeBoxElement(index).blur();
        // Submit code
        if(!otp) {
            for(let i = 1; i <= 4; i++) {
                getCodeBoxElement(i).value = ""
            }
        }
        console.log('submit code ');
    }
    }
    if (eventCode === 8 && index !== 1) {
    getCodeBoxElement(index - 1).focus();
    }
}    