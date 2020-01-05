<?php

class Discord_WebHook {
    public function __construct( $url ) {
        $this->setURL( $url );
    }

    private $url;
    public function setURL( $url ) {
        if ( !is_string( $url ) ) {
            echo "Bad URL type";
            exit;
        }

        $this->url = $url;
    }

    public function send( $msg ) {
        $ch = curl_init( $this->url );

        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $msg->toJSON() );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ] );

        $response = curl_exec( $ch );
        if ( curl_error( $ch ) ) {
            echo curl_error( $ch );
        }
        /* else {
            echo "Sended!";
        } */
        curl_close( $ch );

        return $response;
    }
}

?>