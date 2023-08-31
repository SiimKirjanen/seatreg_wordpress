<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit(); 
}

class SeatregUploadsRepository {
    /**
     *
     * Returns URL of the directory where custom payment icons are stored
     *
     */
    public static function getCustomPaymentIconLocationURL($registrationCode) {
        return SEATREG_TEMP_FOLDER_URL . '/' . $registrationCode;
    }

}