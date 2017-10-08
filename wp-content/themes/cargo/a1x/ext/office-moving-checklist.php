<?php

class OfficeMovingChecklist {
    public static function Init() {
        ob_start();
        get_template_part( "a1x/templates/office-moving-checklist" );
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}

add_shortcode( 'office_moving_checklist', ['OfficeMovingChecklist', 'Init'] );
