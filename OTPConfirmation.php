<?php include "header.php"; ?>
        <header>One-Time-Password Cofirmation</header> <br>
        <label>Enter password: </label> <br> <br>
        <form>
		<input id="codeBox1" type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)"  class="OTP">
		<input id="codeBox2" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)"  class="OTP">
		<input id="codeBox3" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)"  class="OTP">
		<input id="codeBox4" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)"  class="OTP">
	</form>
<?php include "footer.php"; ?>