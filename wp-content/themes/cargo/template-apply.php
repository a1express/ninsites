<?php /* Template Name: Apply Form */ ?>

<?php
$error = '';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    if ( !isset($_POST['position']) || trim($_POST['position']) == '' )
        $error = 'Please select the desired position';
    else if ( !isset($_POST['firstname']) || trim($_POST['firstname']) == '' )
        $error = 'Please enter your name';
    else if ( !isset($_POST['businessemail']) || !filter_var($_POST['businessemail'], FILTER_VALIDATE_EMAIL) )
        $error = 'Please enter a valid email address';
    else if ( !isset($_POST['businessphonedirect']) || trim($_POST['businessphonedirect']) == '' )
        $error = 'Please enter your phone number';
    else if ( !isset($_POST['address']) || trim($_POST['address']) == '' )
        $error = 'Please enter your address';
    else if ( !isset($_POST['city']) || trim($_POST['city']) == '' )
        $error = 'Please enter your city';
    else if ( !isset($_POST['state']) || trim($_POST['state']) == '' )
        $error = 'Please enter your state';
    else if ( !isset($_POST['zip']) || trim($_POST['zip']) == '' )
        $error = 'Please enter your zip code';
    else if ( !isset($_POST['hear']) || trim($_POST['hear']) == '' )
        $error = 'Please let us know how did you hear from us';
    else if ( !isset($_POST['experience']) || trim($_POST['experience']) == '' )
        $error = 'Please let us know your previous experience';
    else
    {
        $to      = 'courier@washingtonexpress.com';
        $subject = 'New Job Apply';
        $headers = 'From: <courier@washingtonexpress.com> WashingtonExpress Express' . "\r\n";
        $headers .= 'Bcc: lisa@webicise.com' . "\r\n";

        $message .= 'Position: ' . trim($_POST['position']) . "\r\n";
        $message .= 'Name: ' . trim($_POST['firstname']) . "\r\n";
        $message .= 'Email: ' . trim($_POST['businessemail']) . "\r\n";
        $message .= 'Phone: ' . trim($_POST['businessphonedirect']) . "\r\n";
        $message .= 'Address: ' . trim($_POST['address']) . "\r\n";
        $message .= 'City: ' . trim($_POST['city']) . "\r\n";
        $message .= 'State: ' . trim($_POST['state']) . "\r\n";
        $message .= 'Zipcode: ' . trim($_POST['zip']) . "\r\n";
        $message .= 'How did you hear from us? ' . trim($_POST['hear']) . "\r\n";
        $message .= 'Experience: ' . trim($_POST['experience']);

        $r = mail($to, $subject, $message, $headers);
        header('Location: /about/workthanks.asp');
        exit();
    }
}
?>
<?php get_header(); ?>

<section class="boldSection topSpaced bottomSpaced gutter inherit">
    <div class="port">
        <div class="boldCell">
            <div class="boldCellInner">

                <h3>Online Courier Application</h3>
                <div>
                    <p>Please fill out the application below. </p>

                    <?php if ( $error != '' ): ?>
                        <div style="color: #ff0000; padding: 5px 10px; font-weight: bold; display: inline-block; background: #fff;"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form id="support_form" action="" method="POST" class="support go-form">
                        <div class="formfield">
                            <label>Position:</label>
                            <select name="position">
                                <option value="">--Choose position--</option>
                                <option value="Bike Messenger" <?php echo isset($_POST['position']) && $_POST['position'] == 'Bike Messenger' ? 'selected="selected"' : ''; ?>>Bike Messenger</option>
                                <option value="Car Messenger" <?php echo isset($_POST['position']) && $_POST['position'] == 'Car Messenger' ? 'selected="selected"' : ''; ?>>Car Messenger</option>
                                <option value="Van Messenger" <?php echo isset($_POST['position']) && $_POST['position'] == 'Van Messenger' ? 'selected="selected"' : ''; ?>>Van Messenger</option>
                                <option value="Truck Messenger" <?php echo isset($_POST['position']) && $_POST['position'] == 'Truck Messenger' ? 'selected="selected"' : ''; ?>>Truck Messenger</option>
                            </select>
                        </div>
                        <div class="formfield">
                            <label>Name:</label>
                            <input type="text" class="text" name="firstname" value="<?php echo isset($_POST['firstname']) ? trim($_POST['firstname']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>Email:</label>
                            <input type="text" class="text" name="businessemail" value="<?php echo isset($_POST['businessemail']) ? trim($_POST['businessemail']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>Phone:</label>
                            <input type="text" class="text" name="businessphonedirect" value="<?php echo isset($_POST['businessphonedirect']) ? trim($_POST['businessphonedirect']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>Address:</label>
                            <input type="text" class="text" name="address" value="<?php echo isset($_POST['address']) ? trim($_POST['address']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>City:</label>
                            <input type="text" class="text" name="city" value="<?php echo isset($_POST['city']) ? trim($_POST['city']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>State:</label>
                            <input type="text" class="text" name="state" value="<?php echo isset($_POST['state']) ? trim($_POST['state']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>Zip:</label>
                            <input type="text" class="text" name="zip" value="<?php echo isset($_POST['zip']) ? trim($_POST['zip']) : ''; ?>" />
                        </div>
                        <div class="formfield">
                            <label>How did you hear about Washington Express?</label>
                            <textarea rows="5" cols="100" name="hear"><?php echo isset($_POST['hear']) ? trim($_POST['hear']) : ''; ?></textarea>
                        </div>
                        <div class="formfield">
                            <label>Briefly state what previous delivery or courier experience you have had (if any).</label>
                            <textarea rows="5" cols="100" name="experience"><?php echo isset($_POST['experience']) ? trim($_POST['experience']) : ''; ?></textarea>
                        </div>

                        <div class="formfield">
<!--                            <a href="javascript:document.forms.support_form.submit()" class="button button9">APPLY &raquo;</a>-->
                            <button>Apply &raquo;</button>
                        </div>
                        <input type="hidden" id="external" name="external" value="1" />
                        <input type="hidden" name="TAG" value="Case">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
