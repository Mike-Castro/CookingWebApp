<?php include("header.php"); ?>
<div id="error" class=" hide">
    <p>The login credentials are not valid.</p>
</div>
<div id="success" class=" hide">
    <p>Succesful change, redirecting to profile page...</p>
</div>
<div class="resetContainer">
    <center>
        <div class="resetFormContainer">
            <form method="post" id="resetForm">
                <label>Change Password</label>
                <input type="password" name="txtpassword0" placeholder="Current Password" required />
                <input type="password" name="txtpassword1" placeholder="New Password" required />
                <input type="password" name="txtpassword2" placeholder="Confirm New Password" required />
                <input type="submit" value="Change Password" />
            </form>
        </div>
    </center>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#resetForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'api/users/reset.php',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    var jsonData = JSON.parse(response);

                    // user is logged in successfully in the back-end
                    if (jsonData.success == "1") {
                        $('#success').removeClass('hide');
                        $('#error').addClass('hide');
                        setTimeout(function() {
                            window.location.replace("profile.php");
                        }, 2000);
                    } else {
                        $('#error').removeClass('hide');
                        $('#error p').text(jsonData.message);
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
    .resetContainer {
        background-color: #f9f9f9;
        height: 100vh;
        overflow: auto;
    }

    .resetContainer .resetFormContainer {
        width: 30rem;
        margin-top: 5rem;
    }

    .resetContainer input[type="text"],
    .resetContainer input[type="password"] {
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

    .resetContainer input[type="text"]:autofill,
    .resetContainer input[type="password"]:autofill {
        background-color: transparent;
    }

    .resetContainer label {
        font-size: 14px;
        font-weight: bold;
        font-family: arial;
    }

    .resetContainer input[type="submit"] {
        background-color: #353a46;
        color: white;
        padding: 8px 10px;
        margin: 8px 0px;
        border: solid;
        cursor: pointer;
        width: 40%;
    }

    .resetFormContainer {
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
        .resetContainer .resetFormContainer {
            width: 100%;
        }
    }
</style>