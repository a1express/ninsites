<?php global $qq_redirect_url, $qq_scripts_loaded, $has_results; ?>

<?php if (!$qq_scripts_loaded): ?>
    <?php $GLOBALS['qq_scripts_loaded'] = true; ?>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD_YJPIOkLsYI2cDhnVwdMI1l6uHuvdd1k"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/quick-quote.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <script type="text/javascript">
        var defaultOrigin = new google.maps.LatLng(
            <?php
            echo DomainManager::GetVariable(
                '40.7590402,-74.0394423',
                '38.0057006,-84.4519174',
                '41.3885469,-73.4999866',
                '26.1103601,-80.1733113',
                '40.7590402,-74.0394423',
                '39.261032,-76.676993',
                '40.7590402,-74.0394423',
                '40.7590402,-74.0394423',
                '40.7590402,-74.0394423',
                '40.7590402,-74.0394423'
            );
            ?>
        );
    </script>
<?php endif; ?>

<form method="post" name="quickquote" action="<?php echo isset($qq_redirect_url) && !is_null($qq_redirect_url) ? $qq_redirect_url : ''; ?>">
    <div class="formfield mention">
        <label>* Required fields</label>
    </div>
    <div class="formfield">
        <div class="rows2">
            <label>*Origin ZIP</label>
            <input class="text input-origin" name="origin" value="<?php echo isset($_POST['origin']) ? trim($_POST['origin']) : ( isset($_GET['origin']) ? trim($_GET['origin']) : '' ); ?>" type="text" />
        </div>
        <div class="rows2">
            <label>*Destination ZIP</label>
            <input class="text input-destination" name="destination" value="<?php echo isset($_POST['destination']) ? $_POST['destination'] : ''; ?>" type="text" />
        </div>
    </div>
    <div class="formfield">
        <div class="rows2">
            <label>*No. of  pieces</label>
            <input class="text" name="pieces" value="1" type="text" />
        </div>
        <div class="rows2">
            <label>*Weight (LBS)</label>
            <input class="text" name="weight" value="1" type="text" />
        </div>
    </div>
    <div class="formfield">
        <div class="rows3">
            <label>*Ready Date</label>
            <input type="text" class="datepicker" name="date" />
        </div>
        <div class="rows3">
            <div class="hasDatepicker2"></div>

            <label>*Ready Time</label>
            <input class="text short track2" name="track2" value="" type="text" />
        </div>
        <div class="rows3">
            <label>&nbsp;</label>
            <select class="body short jumpMenu" name="jumpMenu">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
        </div>
    </div>
    <div class="formfield">
        <div class="rows2">
            <label>E-mail Address</label>
            <input class="text" name="email" value="" type="text" />
        </div>
        <div class="rows2">
            <label>Vehicle/Service Type</label>
            <select name="jumpMenu2" class="jumpMenu2">
                <option value="1" <?php echo isset($vehicle) && $vehicle == '1' ? 'selected="selected"': ''; ?>>Any Vehicle</option>
                <option value="4" <?php echo isset($vehicle) && $vehicle == '4' ? 'selected="selected"': ''; ?>>Car</option>
                <option value="7" <?php echo isset($vehicle) && $vehicle == '7' ? 'selected="selected"': ''; ?>>Sm Cov P/U/Mini Van</option>
                <option value="15" <?php echo isset($vehicle) && $vehicle == '15' ? 'selected="selected"': ''; ?>>Cargo Van</option>
                <option value="30" <?php echo isset($vehicle) && $vehicle == '30' ? 'selected="selected"': ''; ?>>24ft Strt Truck</option>
                <option value="3" <?php echo isset($vehicle) && $vehicle == '3' ? 'selected="selected"': ''; ?>>Bike (Limited)</option>
            </select>
        </div>
    </div>

    <div class="submit-buttons">
        <button class="submit-button1">Get Quote</button>
        <button class="submit-button <?php echo $has_results != null && $has_results ? '' : 'initially-hidden'; ?>" onclick="location.href='/ship-now/'" type="button">Ship Now</button>
        <button class="submit-button <?php echo $has_results != null && $has_results ? '' : 'initially-hidden'; ?>" onclick="location.href='/new-account/'" type="button">Create an Account</button>
    </div>
</form>

