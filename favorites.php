<?php
include 'header.php';
require_once('api/users/get_favorites.php');
require_once('api/objects/recipies_api.php');

if (!isset($_SESSION['username'])) {
    echo "<script> alert('Session not initialized...');window.location= 'index.php' </script>";
} else {
    $rows = getFavorites();
    if (count($rows) > 0) {
    } else {
    }
}

?>
<div class="container">
    <?php
    if (!isset($_SESSION['username'])) {
        echo "<script> alert('Session not initialized...');window.location= 'index.php' </script>";
    } else {
        $rows = getFavorites();
        if (count($rows) > 0) {
            $query = "";
            foreach ($rows as $row) {
                $query .= $row . ",";
            }
            $query = substr($query, 0, -1);
    ?>
            <div class="recipiesContainer">
                <?php
                $recipies = getSearchResultsQuery($query, false);
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
    <?php
        } else {
            echo "<h1>No favorites</h1>";
        }
    }
    ?>
</div>
<style>
    .recipiesContainer {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
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

    @media only screen and (max-width: 600px) {
        .recipiesContainer {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<?php include 'footer.php'; ?>