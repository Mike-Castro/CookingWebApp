<?php
require_once('api/objects/recipies_api.php');
include 'header.php';
?>

<!--- ---------Testing Sessions----------- -->
<style>
    .recipiesContainer {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(6, 1fr);
        grid-column-gap: 10px;
        grid-row-gap: 10px;
        margin-top: 2rem;
        padding: 1rem;
    }

    .recipiesContainer a {
        position: relative;
        text-decoration: none;
    }

    .individualRecipie {
        color: black;
    }

    .individualRecipie p {
        text-decoration: none;
        margin-top: 0.5rem;
    }

    .individualRecipie img {
        width: 100%;
    }
</style>
<div class="recipiesContainer">

    <?php
    $recipies = getIndexResults(true);
    foreach ($recipies as $recipie) {
    ?>
        <a href="recipie.php?id=<?php echo $recipie->id ?>">
            <div class="individualRecipie">
                <img src="<?php echo $recipie->image ?>" alt="">
                <p><?php echo $recipie->title ?></p>
            </div>
        </a>
    <?php
    }

    ?>
</div>
<?php include 'footer.php'; ?>