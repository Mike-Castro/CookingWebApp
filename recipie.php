<?php
require_once('api/objects/recipies_api.php');
require_once('api/users/check_favorite.php');
include 'header.php';
$is_favorite = false;
$is_logged = false;
if (isset($_SESSION['username'])) {
    $is_favorite = checkFavorite($_GET["id"]);
    $is_logged = true;
}
?>

<!--- ---------Testing Sessions----------- -->
<style>
    .individualRecipie {
        padding: 2rem;
        display: flex;
        align-items: flex-start;
    }

    .info {
        margin-left: 2rem;
    }

    .poster {
        border-radius: 0.6rem;
        width: 30rem;
    }

    .title {
        font-size: 20px;
    }

    .instructionsContainer li {
        list-style-type: none;
        margin-bottom: 1rem;
    }

    .instructionsContainer ol {
        padding-left: 0;
    }

    .titleFavorite {
        display: flex;
        align-items: center;
    }

    #favoriteBtn {
        margin-left: 1rem;
        background: transparent;
        background-color: transparent;
        border: none;
        font-size: 16px;
        font-weight: bold;
        border: solid 1px gray;
        border-radius: 1rem;
        padding: 0.5rem 1.8rem;
        background-color: #f2f2f2;
        cursor: pointer;
    }

    #favoriteBtn:hover {
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.15);
    }
</style>
<div class="recipiesContainer">

    <?php
    $id = htmlspecialchars($_GET["id"]);
    $recipie = getRecipie($id, false);
    ?>
    <div class="individualRecipie">
        <div>
            <img class="poster" src="<?php echo $recipie->image ?>" alt="">
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
        <div class="info">
            <div class="titleFavorite">
                <h1 class="title"><?php echo $recipie->title ?></h1>
                <?php if ($is_logged) { ?>
                    <form method="post" id="favoriteForm">
                    <?php  } else { ?>
                        <form method="post" action="login.php">
                        <?php  } ?>
                        <input type="text" name="id" value="<?php echo $_GET["id"] ?>" hidden />
                        <input type="submit" value="<?php if ($is_favorite) { ?>Unfavorite <?php  } else { ?> Favorite <?php } ?>" id="favoriteBtn">
                        </form>
            </div>
            <div class="instructionsContainer">
                <h3>Instructions:</h3>
                <?php
                $instructions = $recipie->instructions;
                echo $instructions;
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#favoriteForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'api/users/set_favorite.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        var jsonData = JSON.parse(response);

                        // user is logged in successfully in the back-end
                        if (jsonData.success == "1") {
                            if (jsonData.favorite) {
                                $("#favoriteBtn").val("Unfavorite");
                            } else {
                                $("#favoriteBtn").val("Favorite");
                            }
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</div>
<?php include 'footer.php'; ?>