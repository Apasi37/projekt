<?php
include_once('partials/header.php');
?>
<div class="login-signup" id="signUp">
    <form name="signUp" action="" method="POST" class="headerForm" onsubmit="validatePassword()">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <label for="passwordcheck">Repeat Password</label>
        <input type="password" id="passwordcheck" name="passwordcheck" required>
        <label for="checkbox">I have read the terms of service</label>
        <input type="checkbox" id="checkbox" required>
        <input type="submit" name="user_register" value="Register">
    </form>
</div>