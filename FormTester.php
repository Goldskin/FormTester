<?php

/**
 * form tester
 * @version 2.0
 * @since 2.0
 */
class FormTester
{


    /**
     * nonce custructor
     * @param string $id code
     * @param string $slug slug
     * verifyNonce($_SERVER['REMOTE_ADDR'], 'contact-front')
     */
    public function constructNonce( $id, $slug )
    {
        ob_start();
        wp_nonce_field( 'nonce-' . $id, $slug, false );
        $out = ob_get_clean();
        return $out;
    }

    /**
     * verify nonce
     * @param string $id code
     * @param string $slug slug
     * verifyNonce($_SERVER['REMOTE_ADDR'], 'contact-front')
     */
    public function verifyNonce( $id, $slug )
    {
        return ( isset($_POST[$slug]) && wp_verify_nonce( $this->clean( $_POST[ $slug ] ), 'nonce-' . $id ) );
    }

    /**
     * clean $_POST
     * @param string $value submit text
     */
    public function clean( $value )
    {
        if ( isset($value) || isset($value) != null )
            return trim( htmlspecialchars( $value ) );
        return false;
    }
}
