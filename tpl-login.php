<?php
/*
Template Name: Login
*/

if (!empty($_POST)) {
    $user = wp_signon($_POST);
    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        header("Location: http://localhost/wordpress", true, 301);
        exit();
    }
}
?>
<?php
get_header();
?>

<div class="form">
    <div class="login form-group">
        <?php
        if ($error) {
            echo $error;
        }
        ?>
        <h1>Connection</h1>
        <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
            <label for="username"> Votre nom d'utilisateur : </label>
            <input class="form-control" type="text" name="user_login" id="user_login">

            <label for="password"> Votre mot de passe : </label>
            <input class="form-control" type="password" name="user_password" id="user_password"><br />
            <div class="form-row custom-row">
                <div class="col">
                    
                    <input type="checkbox" name="remember" id="remember" value="Se souvenir">
                    <label for="remember"> &nbsp;&nbsp;Se souvenir de moi </label>
                </div>
                <div class="col">
                    <input class="form-control" type="submit" value="Se connecter">
                </div>
            </div>
            <a href="register">S'inscrire</a>
            
        </form>
    </div>
</div>


<?php
get_footer();
?>