<?php

class TrackingPage {
    public static function RedirectFormToIframe($content) {

        $body = '<section class="boldSection gutter" id="tracking-results" style="display: none;">
                    <div class="port">
                        <div class="boldCell">
                            <div class="boldCellInner">
                                <div class="boldRow ">
                                    <div class="rowItem col-md-12 col-ms-12  btTextCenter btTopVertical btNoPadding">
                                        <div class="rowItemContent">
                                            <div class="btText">
                                                <table width="500" align="center" class="tracking-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <iframe style="width: 100%;" width="687" height="660" name="inside-browser"></iframe>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';

        if ( strpos( $content, '<form' ) !== false && strpos( $content, '.e-courier.com/' ) !== false && strpos( $content, 'Wizard_tracking.asp' ) !== false )
        {
            $content = str_replace('<form ', '<form target="inside-browser" onclick="jQuery(\'tracking-results\').show();" ', $content);
            $content = $content . $body;
        }

        return $content;
    }
}

add_filter( 'the_content', [ 'TrackingPage', 'RedirectFormToIframe' ], 100000 );
