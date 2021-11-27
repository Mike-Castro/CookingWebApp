<?php include 'header.php'; ?>
<link rel="stylesheet" href="./Resources/css/contact_style.css">


<div class="fcf-body">

    <div id="fcf-form">
        <h3 style="text-align: center;" class="fcf-h3">Contact us</h3>

        <form id="fcf-form-id" class="fcf-form-class" method="post" action="sendMail.php">

            <div class="fcf-form-group">
                <label for="Name" class="fcf-label">Name</label>
                <div class="fcf-input-group">
                    <input type="text" id="Name" name="Name" class="fcf-form-control" required>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Email" class="fcf-label">Email address</label>
                <div class="fcf-input-group">
                    <input type="email" id="Email" name="Email" class="fcf-form-control" required>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Message</label>
                <div class="fcf-input-group">
                    <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
                </div>
            </div>

            <div class="fcf-form-group">
                <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Send</button>
            </div>

        </form>
    </div>

</div>

<?php include 'footer.php'; ?>