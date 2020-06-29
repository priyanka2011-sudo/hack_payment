<?php include "header.php"; ?>
        <header>One-Time-Password Cofirmation</header> <br>
        <label>Enter password: </label> <br> <br>
        <form>
		<input id="codeBox1" type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" class="OTP">
		<input id="codeBox2" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" class="OTP">
		<input id="codeBox3" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" class="OTP">
		<input id="codeBox4" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" class="OTP">
	</form>
<?php include "footer.php"; ?>