<?php

class Discord_Message {
    public function __construct( $content = "My Content" ) {
        $this->setContent( $content );
    }

    public $content;
    public function setContent( $content ) {
        if ( !is_string( $content ) ) {
            throw new Exception( "Given content must be a string" );
        }
        if ( strlen( $content ) >= 1000 ) {
            throw new Exception( "Given content must have less than 1000 letters" );
        }
        
        $this->content = $content;
    }

    public $username;
    public function setUsername( $username ) {
        if ( !is_string( $username ) ) {
            throw new Exception( "Given username must be a string" );
        }
        
        $this->username = $username;
    }

    public $avatar_url;
    public function setAvatarURL( $url ) {
        if ( !is_string( $url ) ) {
            throw new Exception( "Given URL must be a string" );
        }

        $this->avatar_url = $url;
    }

    public $tts;
    public function setTTS( $tts ) {
        if ( !is_bool( $tts ) ) {
            throw new Exception( "Given TTS must be a boolean" );
        }

        $this->tts = $tts;
    }

    public function toArray() {
        return [
            "content" => $this->content,
            "username" => $this->username,
            "avatar_url" => $this->avatar_url,
            "tts" => $this->tts,
        ];
    }

    public function toJSON() {
        return json_encode( $this->toArray() );
    }
}

?>