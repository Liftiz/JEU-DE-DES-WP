<?php

/*

Theme Name: Mon Theme

*/

$user = wp_get_current_user();



?>
<?php get_header(); ?>



<h1>Welcome <?= $user->user_login; ?></h1>
<a href="logout">Se deconnecter</a><br />

<?php
$currentUser = wp_get_current_user();
if (isset($_POST['gameData'])) {
    $data = json_decode(html_entity_decode(stripslashes($_POST['gameData'])));
    $target = "";
    $summ = 0;
    foreach ($data as $key => $unit) {
        $max = (int) str_replace("d", "", $key);
        $value = [];
        $target .= $unit . $key . "[ ";
        for ($i = 0; $i < $unit; $i += 1) {
            $value[$i] = rand(0, $max);
            $target .= $i + 1 === $unit ? $value[$i] . " ]" : $value[$i] . ", ";
            $summ += $value[$i];
        }
        $target .= " + ";
    }

    $target = substr($target, 0, strlen($target) - 2);

    $target .= " = " . $summ;
    echo "<b> Resultat du lancement : </b>" . $target;
    echo $currentUser->ID;

    wp_insert_post(array(
        "post_type" => "lancement",
        "post_content" => $target,
        "post_author" => (string) $currentUser->ID,
        "post_title" => "randomly",
        "post_status" => "publish",

    ));
}

?>
<form action="index.php" method="post">
    <input type="text" name="gameData" id="gameData" style="display:none">
    <p id="logs"></p> <input type="submit" value="Lancer les dés" id="submit">
</form>

<div class="game-content">
    <div class="game">
        <h3>Ajouter des dés</h3>
        <div class="grid">
            <p>Liste des dés</p>
            <div class="grid-row">
                <div class="column" id="d2">
                    d2
                </div>
                <div class="column" id="d4">
                    d4
                </div>
            </div>
            <div class="grid-row">
                <div class="column" id="d6">
                    d6
                </div>
                <div class="column" id="d8">
                    d8
                </div>
            </div>
            <div class="grid-row">
                <div class="column" id="d10">
                    d10
                </div>
                <div class="column" id="d12">
                    d12
                </div>
            </div>
            <div class="grid-row">
                <div class="column" id="d20">
                    d20
                </div>
                <div class="column" id="d100">
                    d100
                </div>
            </div>
        </div>
    </div>

    <div class="classment">
        <h3>Liste des 500 dernier lancement de l'utilisateurs</h3>
        <ul>
            <?php

            $lancements = get_posts(array('post_type' => 'lancement', 'posts_per_page' => -1));




            for ($i = 0; $i < count($lancements); $i++) {
                $author = $lancements[$i]->post_author;
                $author = get_user_by("ID", $author)->user_login;

                if ($author !== $currentUser->user_login) {
                    continue;
                }


                echo "<li>" . $lancements[$i]->post_content . "</li>";
            }
            ?>
        </ul>
    </div>

</div>

<?php get_footer(); ?>