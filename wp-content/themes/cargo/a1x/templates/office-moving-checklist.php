<div class="general-layout">
    <div class="general-column">
        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/a1x/img/freight_checklist_thumbnail.jpg" alt="Freight Checklist" />
        </figure>
    </div>
    <div class="general-column">
        <h3 style="margin: 30px 0px 20px; font-size: 24px; border: 0;">Complete the below to download our moving checklist</h3>

        <?php
        $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
        $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $company_name = isset($_POST['company_name']) ? trim($_POST['company_name']) : '';
        $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

        $post = !empty($_POST);
        $error = $post && filter_var($email, FILTER_VALIDATE_EMAIL) === false;
        $success = false;

        if ( $post && !$error )
        {
            $to = "info@washingtonexpress.com";
            $subject = "Office moving checklist message";
            $txt = "First Name: " . $first_name . "\n";
            $txt .= "Last Name: " . $last_name . "\n";
            $txt .= "Company Name: " . $company_name . "\n";
            $txt .= "Email: " . $email . "\n";
            $txt .= "Size and Date of Move: " . $comment . "\n";
            $headers = "From: noreply@washingtonexpress.com";

            $success = mail($to, $subject, $txt, $headers);
        }
        ?>

        <form action="" class="go-form" method="post" novalidate="novalidate">
            <?php if ($error): ?>
                <p>Please enter a valid email address.</p>
            <?php endif; ?>

            <?php if ($success): ?>
                <p>Thank you for your message!</p>

                <a href="<?php echo get_template_directory_uri() . '/pdf/moving-checklist.pdf'; ?>" style="display: inline-block; background: #333; color: #fff; border-radius: 5px; padding: 10px 40px;" target="_blank">Download Moving Checklist</a>
            <?php else: ?>

                <div class="formfield">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="<?php echo $first_name; ?>" />
                </div>
                <div class="formfield">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $last_name; ?>" />
                </div>
                <div class="formfield">
                    <label>Company Name*</label>
                    <input type="tel" name="company_name" value="<?php echo $company_name; ?>" />
                </div>
                <div class="formfield">
                    <label>Email*</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" />
                </div>
                <div class="formfield">
                    <label>Size and Date of Move</label>
                    <textarea name="comment"><?php echo $comment; ?></textarea>
                </div>
                <div class="submit">
                    <button>Submit</button>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
