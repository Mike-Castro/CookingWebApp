<?php
require_once('api/objects/recipies_api.php');
include 'header.php';
?>

<!--- ---------Testing Sessions----------- -->
<style>
    .individualRecipie {
        padding: 2rem;
        display: flex;
        align-items: flex-start;
    }

    .info {
        margin-left: 1rem;
    }

    .poster {
        border-radius: 0.6rem;
        width: 30rem;
    }

    .title {
        font-size: 20px;
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
            <h1 class="title"><?php echo $recipie->title ?></h1>
            <div class="ingredientsContainer">
                <h3>Ingredients:</h3>
                <?php
                $extendedIngredients = $recipie->extendedIngredients;
                foreach ($extendedIngredients as $ingredient) {  ?>
                    <ul>
                        <li><?php echo $ingredient->originalName ?></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php

    ?>
</div>
<?php include 'footer.php'; ?>