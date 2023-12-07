<h1> Register </h1>
<?php
include './message.php';
?>
<table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
    <th colspan="2" align="center">Signup Form</th>
    <form method="post" action="signupProcess.php" onsubmit="return validate(this)">
        <tr>
            <td>Fullname</td>
            <td><input type="text" maxlength="64" name="fullname"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" maxlength="16" name="username"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" maxlength="64" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" maxlength="12" name="password"></td>
        </tr>
        <tr>
            <td>Password (Confirm)</td>
            <td><input type="text" maxlength="12" name="repassword"></td>
        </tr>
        <tr>
            <td>Role: </td>
            <td><select name='roleId'>
                    <option value="1">Admin</option>
                    <option value="0">User</option>

                </select></td>
        </tr>

        <tr>
            <td colspan="2" align="right"><input type="submit" value="Signup"></td>

        </tr>
    </form>
</table>

<script src="validation.js"></script>