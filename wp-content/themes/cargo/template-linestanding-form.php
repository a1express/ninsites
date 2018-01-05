<?php /* Template name: Linestanding Form */ ?>

<?php get_header(); ?>

<section class="boldSection topSpaced bottomSpaced gutter inherit">
    <div class="port">
        <div class="boldCell">
            <div class="boldCellInner">

                <?php
                    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                    $phone = isset($_POST['Daytime-Phone']) ? trim($_POST['Daytime-Phone']) : '';

                    $post = !empty($_POST);
                    $error = $post && ( filter_var($email, FILTER_VALIDATE_EMAIL) === false || $phone == '' );
                    $success = false;

                    if ( $post && !$error )
                    {
                        $p = $_POST;
                        $eml = "";
                        
                        if ( isset($p['Hearing-Time']) )
                        {
                            $p['Hearing-Time'] = implode("_", $p['Hearing-Time']);
                        }

                        foreach ( $p as $k => $v )
                        {
                            $eml = $eml . ucwords(str_replace(array("-", "_"), " ", $k)) . ": " . $v . "\n";
                        }

                        $to = "info@washingtonexpress.com";
                        $subject = "Linestanding Form message";

                        $headers = "From: noreply@washingtonexpress.com";
                        $success = mail($to, $subject, $eml, $headers);
                    }
                ?>

                <h3><?php the_title(); ?></h3>
                <p>You can submit the form to initiate your linestanding order request or you can call and speak to one of our line standing experts at 301-210-3500.</p>

                <?php if ( $error ): ?>
                    <p style="color: red;">Please provide valid information.</p>
                <?php endif; ?>

                <?php if ($success): ?>
                    <p style="color: green;">Thanks for your message.</p>
                <?php endif; ?>

                <form action="" class="go-form" method="post">

                    <div id="fscf_required3">
                        <span>*</span> <span>indicates required field</span>
                    </div>

                    <div class="formfield" id="fscf_div_field3_0">
                        <div>
                            <label for="fscf_name3">Your Name:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_name3" name="full_name" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_16">
                        <div id="fscf_label3_16">
                            <label for="fscf_field3_16">Company<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_16" name="Company" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_17">
                        <div id="fscf_label3_17">
                            <label for="fscf_field3_17">Daytime Phone:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_17" name="Daytime-Phone" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_1">
                        <div>
                            <label for="fscf_email3">Your Email:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_email3" name="email" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_12">
                        <div id="fscf_label3_12">
                            <label for="fscf_field3_12">Number of Attendees (How many people are we holding places for?):<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_12" name="Number-of-Spots-Requested" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_5">
                        <div id="fscf_label3_5">
                            <label for="fscf_field3_5">Attendee Name;  and name, acronym, etc. that you want us to display on our sign (if different):<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_5" name="Attendee-Name" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_20">
                        <div id="fscf_label3_20">
                            <label for="fscf_field3_20">Attendee’s Cell Phone Number:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_20" name="Cell-Phone-Number" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_8">
                        <div id="fscf_label3_8">
                            <label for="fscf_field3_8">Committee Name:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_8" name="Committee" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_9">
                        <div id="fscf_label3_9">
                            <label for="fscf_field3_9">Hearing Name/Topic:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_9" name="Hearing-Title" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_10">
                        <div id="fscf_label3_10">
                            <label for="fscf_field3_10">Hearing Day:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_10" name="Hearing-DayDateTime" size="15" />
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_15">
                        <div id="fscf_label3_15">
                            <label for="fscf_field3_15">Hearing Time:</label>
                        </div>
                        <div style="display: inline-block; vertical-align: middle; width: 100px;">
                            <select id="fscf_field3_15" name="Hearing-Time[h]" class="no-fancy">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div style="display: inline-block; vertical-align: middle;">:</div>
                        <div style="display: inline-block; vertical-align: middle; width: 100px;">
                            <select id="fscf_field3_15m" name="Hearing-Time[m]" class="no-fancy">
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                        <div style="display: inline-block; vertical-align: middle; width: 100px;">
                            <select id="fscf_field3_15ap" name="Hearing-Time[ap]" class="no-fancy">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_21">
                        <div id="fscf_label3_21">
                            <label for="fscf_field3_21">Location:<span>*</span></label>
                        </div>
                        <div>
                            <select id="fscf_field3_21" name="Location" class="no-fancy">
                                <option>Senate - Hart</option>
                                <option>Senate - Dirksen</option>
                                <option>Senate - Russel</option>
                                <option>House - Rayburn</option>
                                <option>House - Longworth</option>
                                <option>House - Cannon</option>
                                <option>US Capitol</option>
                                <option>Supreme Court</option>
                                <option>Other - Please note below</option>
                            </select>
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_18">
                        <div id="fscf_label3_18">
                            <label for="fscf_field3_18">Other</label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_18" name="Other" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_7">
                        <div id="fscf_label3_7">
                            <label for="fscf_field3_7">Room Number or Name:<span>*</span></label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_7" name="Room-Number" value="">
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_19">
                        <div id="fscf_label3_19">
                            <label for="fscf_field3_19">When should we arrive:<span>*</span></label>
                        </div>
                        <div>
                            <select id="fscf_field3_19" name="When-should-we-Arrive" class="no-fancy">
                                <option>Please put us at the front of the line</option>
                                <option>9 hours in advance</option>
                                <option>8 hours in advance</option>
                                <option>7 hours in advance</option>
                                <option>6 hours in advance</option>
                                <option>5 hours in advance</option>
                                <option>4 hours in advance</option>
                                <option>3 hours in advance</option>
                            </select>
                        </div>
                    </div>

                    <div class="formfield" id="fscf_div_field3_22">
                        <div id="fscf_label3_22">
                            <label for="fscf_field3_22">Client Matter or Reference Number:</label>
                        </div>
                        <div>
                            <input type="text" id="fscf_field3_22" name="Client-Matter-or-Reference-Number" value="">
                        </div>
                    </div>

                    <div id="fscf_submit_div3">
                        <input type="submit" id="fscf_submit3" value="Request Service" style="cursor: pointer;" />
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>