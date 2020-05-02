<?php
/*
Template Name: Register
*/
if (!empty($_POST)) {
    $data = $_POST;
    $pass_length = strlen($data['user_pass']);
    if ($pass_length < 8) {
        $error = "Votre mot-de-passe doit faire plus de 8 caractères";
    } else if ($data['user_pass'] !== $data['user_pass2']) {
        $error = "Les mots de passes ne correspondent pas !";
    } else {
        if (!is_email($data["user_email"])) {
            $error = "Veuillez entrer un email valide !";
        } else {
            $state =  wp_insert_user(array(
                "user_login" => $data['user_login'],
                "user_pass" => $data['user_pass'],
                "user_email" => $data['user_email'],
                "user_registered" => date("Y-m-d H:i:s")
            ));
            if (is_wp_error($state)) {
                $error = $state->get_error_message();
            } else {
                header("Location: http://localhost/wordpress", true, 301);
                exit();
            }
        }
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
        <h1>Inscription</h1>
        <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">

            <label for="user_login"> Votre nom d'utilisateur : </label><br />
            <input class="form-control" type="text" name="user_login" value="<?php echo isset($_POST['user_login']) ? $_POST['user_login'] : "" ?>" id="user_login"><br />

            <label for="user_email"> Votre addresse mail : </label><br />
            <input class="form-control" type="text" name="user_email" value="<?php echo isset($_POST['user_email']) ? $_POST['user_email'] : "" ?>" id="user_email"><br />

            <label for="user_pass"> Votre mot de passe : </label><br />
            <input class="form-control" type="password" name="user_pass" id="user_pass"><br />

            <label for="user_pass2"> Confirmer votre mot de passe : </label><br />
            <input class="form-control" type="password" name="user_pass2" id="user_pass2"><br />

            <input class="form-control" type="submit" value="S'inscrire"> <a href="login">Se connecter</a>
        </form>
    </div>
</div>


<?php
get_footer();
?>