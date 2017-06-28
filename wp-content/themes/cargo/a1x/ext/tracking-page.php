<?php

class TrackingPage {
    public static function RedirectFormToIframe($content) {

        $body = '<section class="boldSection gutter">
                    <div class="port">
                        <div class="boldCell">
                            <div class="boldCellInner">
                                <div class="boldRow ">
                                    <div class="rowItem col-md-12 col-ms-12  btTextCenter btTopVertical btNoPadding">
                                        <div class="rowItemContent">
                                            <div class="btText">
                                                <h3>Quick Track</h3>
                                                <table width="500" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <iframe style="width: 100%;" width="687" height="660"></iframe>
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
            $content = $body . $content;
        }

        return $content;
    }
}

add_filter( 'the_content', [ 'TrackingPage', 'RedirectFormToIframe' ], 100000 );
