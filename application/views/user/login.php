<div class="loginform">
    <h2>Представтесь пожалуйста</h2>
    <br />
    <form action="/user/doLogin" method="post">
        <p>Логин</p>
        <p><input type="text" name="user_login"/></p>
        <p>Пароль</p>
        <p><input type="password" name="user_pass" /></p>
        <p class="error"><?= $message ?></p>
        <p><input type="submit" value="Вход" /></p>
    </form>
</div>