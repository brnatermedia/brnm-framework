<?php
/**
  * Activations
  *
  * Backend activation of certain plugins that require this
  * kind of activation
  * @since brnm-framework 1.3
  * @lastmodified brnm-framework 2.5.1
 **/


/* Advanced Custom Fields
 * @since brnm 1.3
-------------------------------------------------------- */
function brnm_acf_settings($options) {
    // activate add-ons
    $options['activation_codes']['repeater'] = 'QJF7-L4IX-UCNP-RF2W';
    $options['activation_codes']['options_page'] = 'OPN8-FA4J-Y2LW-81LS';
    //$options['activation_codes']['flexible_content'] = 'XXXX-XXXX-XXXX-XXXX';
    //$options['activation_codes']['gallery'] = 'XXXX-XXXX-XXXX-XXXX';

    // setup other options (http://www.advancedcustomfields.com/docs/filters/acf_settings/)

    return $options;

}
add_filter('acf_settings', 'brnm_acf_settings');
?>