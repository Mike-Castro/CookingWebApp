<?php
function getIndexResults($cache) {
    if ($cache) {
        $json_data = '{"results":[{"id":795751,"title":"Chicken Fajita Stuffed Bell Pepper","image":"https://spoonacular.com/recipeImages/795751-312x231.jpg","imageType":"jpg"},{"id":640062,"title":"Corn Avocado Salsa","image":"https://spoonacular.com/recipeImages/640062-312x231.jpg","imageType":"jpg"},{"id":715421,"title":"Cheesy Chicken Enchilada Quinoa Casserole","image":"https://spoonacular.com/recipeImages/715421-312x231.jpg","imageType":"jpg"},{"id":715543,"title":"Homemade Guacamole","image":"https://spoonacular.com/recipeImages/715543-312x231.jpg","imageType":"jpg"},{"id":651977,"title":"Mini Stuffed Mexican Bell Peppers","image":"https://spoonacular.com/recipeImages/651977-312x231.jpg","imageType":"jpg"},{"id":715533,"title":"Filet Mignon Soft Tacos","image":"https://spoonacular.com/recipeImages/715533-312x231.jpg","imageType":"jpg"},{"id":975070,"title":"Instant Pot Chicken Taco Soup","image":"https://spoonacular.com/recipeImages/975070-312x231.jpg","imageType":"jpg"},{"id":715391,"title":"Slow Cooker Chicken Taco Soup","image":"https://spoonacular.com/recipeImages/715391-312x231.jpg","imageType":"jpg"},{"id":640117,"title":"Corn-Crusted Fish Tacos With Jalapeno-Lime Sauce and Spicy Black Beans","image":"https://spoonacular.com/recipeImages/640117-312x231.jpg","imageType":"jpg"},{"id":645856,"title":"Grilled Salmon With Cherry, Pineapple, Mango Salsa","image":"https://spoonacular.com/recipeImages/645856-312x231.jpg","imageType":"jpg"}],"offset":0,"number":10,"totalResults":180}';
    } else {
        $api_url = 'https://api.spoonacular.com/recipes/complexSearch?apiKey=' . $_ENV["APIKEY"] . '&cuisine=mexican';
        $json_data = file_get_contents($api_url);
    }
    $response_data = json_decode($json_data);
    $recipies = $response_data->results;
    return $recipies;
}
