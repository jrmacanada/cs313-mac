<?php include 'header.php'; ?>
<?php include 'sidebar_admin.php'; ?>
<div id="content">
    <h1>Admin Login</h1>
    <form action="#" method="post" id="login_form">
        <input type="hidden" name="action" value="login" />
        <label for="email">E-Mail:</label>
        <input type="text" name="email" id="email"/>
        <br />
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"/>
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Login" />
    </form>
</div>
<?php include 'footer.php'; ?>