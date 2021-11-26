<?php include 'header.php'; ?>
<div id="error" class=" hide">
    <p>Error while creating user.</p>
</div>
<div id="success" class=" hide">
    <p>Success, redirecting to login...</p>
</div>
<div class="registerContainer">
    <center>
        <form method="post" id="registerForm" class="registerFormContainer">
            <h3>Register</h3>
            <input type="text" name="username" placeholder="username" required />
            <input type="text" name="email" placeholder="email" required />
            <input type="password" name="password" placeholder="password" required />
            <input type="text" name="displayname" placeholder="Display Name" required />
            <input type="submit" value="Ingresar" />
        </form>
    </center>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'Models/create.php',
                data: $(this).serialize(),
                success: function(response) {
                    var jsonData = JSON.parse(response);

                    // user is logged in successfully in the back-end
                    if (jsonData.success == "1") {
                        $('#success').removeClass('hide');
                        $('#error').addClass('hide');
                        setTimeout(function() {
                            window.location.replace("login.php");
                        }, 2000);
                    } else {
                        $('#error').removeClass('hide');
                        $('#success').addClass('hide');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
<style>
    .registerContainer {
        background-color: #f9f9f9;
        height: 100vh;
        overflow: auto;
    }

    .registerContainer .registerFormContainer {
        width: 30rem;
        margin-top: 5rem;
    }

    .registerContainer input[type="text"],
    .registerContainer input[type="password"] {
        width: 100%;
        padding: 8px 20px;
        box-sizing: border-box;
        background-color: transparent;
        margin-bottom: 1rem;
        border: 0;
        border-bottom-color: currentcolor;
        border-bottom-style: none;
        border-bottom-width: 0px;
        border-bottom: 1px solid gray;
        filter: none;
    }

    .registerContainer input[type="text"]:autofill,
    .registerContainer input[type="password"]:autofill {
        background-color: transparent;
    }

    .registerContainer label {
        font-size: 14px;
        font-weight: bold;
        font-family: arial;
    }

    .registerContainer input[type="submit"] {
        background-color: #353a46;
        color: white;
        padding: 8px 10px;
        margin: 8px 0px;
        border: solid;
        cursor: pointer;
        width: 40%;
    }

    .registerFormContainer {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 0.5rem;
        -webkit-box-shadow: 2px 2px 12px -4px rgba(166, 166, 166, 1);
        -moz-box-shadow: 2px 2px 12px -4px rgba(166, 166, 166, 1);
        box-shadow: 2px 2px 12px -4px rgba(166, 166, 166, 1);
    }

    .hide {
        display: none;
    }

    #error {
        padding: 1rem 0rem;
        background-color: #ff1b1b;
    }

    #error p {
        margin: 0;
        text-align: center;
        font-weight: bold;
        color: white;
    }

    #success {
        padding: 1rem 0rem;
        background-color: #00b524;
    }

    #success p {
        margin: 0;
        text-align: center;
        font-weight: bold;
        color: white;
    }

    @media only screen and (max-width: 700px) {
        .registerContainer .registerFormContainer {
            width: 100%;
        }
    }
</style>

<?php include 'footer.php'; ?>