<?php

class Discord_WebHook {
    public function __construct( $url ) {
        $this->setURL( $url );
    }

    private $url;
    public function setURL( $url ) {
        if ( !is_string( $url ) ) {
            throw new Exception( "Given URL must be a string" );
        }
        
        if ( !preg_match( "/^https:\/\/discordapp.com\/api\/webhooks\/\d+\/[\w-]+$/", $url ) ) {
            throw new Exception( "Given URL doesn’t match with a valid Discord Webhook URL" );
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
            throw new Exception( curl_error( $ch ) );
        }
        curl_close( $ch );

        return $response;
    }
}

?>
