<?php

class Discord_Message {
    public function __construct( $content = "My Content" ) {
        $this->setContent( $content );
    }

    public $content;
    public function setContent( $content ) {
        if ( !is_string( $content ) ) {
            echo "Bad content type";
            exit;
        }
        if ( strlen( $content ) >= 1000 ) {
            echo "Content must have less than 1000 letters";
            exit;
        }
        
        $this->content = $content;
    }

    public $username;
    public function setUsername( $username ) {
        if ( !is_string( $username ) ) {
            echo "Bad username type";
            exit;
        }
        
        $this->username = $username;
    }

    public $avatar_url;
    public function setAvatarURL( $url ) {
        if ( !is_string( $url ) ) {
            echo "Bad avatar URL type";
            exit;
        }

        $this->avatar_url = $url;
    }

    public $tts;
    public function setTTS( $tts ) {
        if ( !is_bool( $tts ) ) {
            echo "Bad TTS type";
            exit;
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