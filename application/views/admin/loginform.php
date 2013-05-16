<div class="admincontent">    
    <p class="formlabel">Введите пароль</p>
    <?php if (count($messages) > 0) { 
        foreach ($messages as $message) { ?>
            <p style="color: red" class="formlabel"><?php echo $message;?></p>
        <?php }
        } ?>
    <form method="post">
        <p><input type="password" name="adminpass"/></p>
        <p><input type="submit" value="войти" /></p>
    </form>
</div>