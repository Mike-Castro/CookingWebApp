<?php
require_once('api/objects/recipies_api.php');
include 'header.php';
?>

<!--- ---------Testing Sessions----------- -->
<style>
    .individualRecipie {
        padding: 2rem;
        display: flex;
    }

    .info {
        margin-left: 1rem;
    }

    .poster {
        width: 30rem;
    }
</style>
<div class="recipiesContainer">

    <?php
    $id = htmlspecialchars($_GET["id"]);
    $recipie = getRecipie($id, true);
    ?>
    <div class="individualRecipie">
        <img class="poster" src="<?php echo $recipie->image ?>" alt="">
        <div class="info">
            <h1><?php echo $recipie->title ?></h1>
        </div>
    </div>
    <?php

    ?>
</div>
<?php include 'footer.php'; ?>