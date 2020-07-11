<?php

class Discord_RichEmbed extends Discord_Message {
    public $type = "rich";

    public function __construct( $content = "", $desc = "" ) {
        $this->setContent( $content );
        $this->setDescription( $desc );
    }

    public $title;
    public function setTitle( $title ) {
        if ( !is_string( $title ) ) {
            throw new Exception( "Given title must be a string" );
        }

        $this->title = $title;
    }

    public $desc;
    public function setDescription( $desc ) {
        if ( !is_string( $desc ) ) {
            throw new Exception( "Given description must be a string" );
        }

        $this->description = $desc;
    }

    public $url;
    public function setURL( $url ) {
        if ( !is_string( $url ) ) {
            throw new Exception( "Given URL must be a string" );
        }

        $this->url = $url;
    }

    public $timestamp;
    public function setTimestamp( $timestamp = -1 ) {
        if ( !is_int( $timestamp ) ) {
            throw new Exception( "Given timestamp must be a integer" );
        }

        $this->timestamp = date( DATE_ISO8601, $timestamp == -1 ? mktime() : $timestamp );
    }

    public $color;
    public function setColor( $color = "000000" ) {
        if ( !is_string( $color ) ) {
            throw new Exception( "Given color must be a string" );
        }

        $this->color = hexdec( $color );
    }

    public $footer;
    public function setFooter( $text = "Footer", $icon_url = "" ) {
        if ( !is_string( $text ) ) {
           throw new Exception( "Given text must be a string" );
        }

        $this->footer = [
            "text" => $text,
            "icon_url" => $icon_url,
        ];
    }

    public $image;
    public function setImage( $url, $width = 100, $height = 100 ) {
        if ( !is_string( $url ) ) {
            throw new Exception( "Given URL must be a string" );
        }

        $this->image = [
            "url" => $url,
            "width" => $width,
            "height" => $height,
        ];
    }

    public $thumbnail;
    public function setThumbnail( $url, $width = 100, $height = 100 ) {
        if ( !is_string( $url ) ) {
            throw new Exception( "Given URL must be a string" );
        }

        $this->thumbnail = [
            "url" => $url,
            "width" => $width,
            "height" => $height,
        ];
    }

    public $video;
    public function setVideo( $url, $width = 100, $height = 100 ) {
        if ( !is_string( $url ) ) {
            throw new Exception( "Given URL must be a string" );
        }

        $this->video = [
            "url" => $url,
            "width" => $width,
            "height" => $height,
        ];
    }

    public $provider;
    public function setProvider( $name = "Provider", $url = "" ) {
        if ( !is_string( $name ) ) {
            throw new Exception( "Given name must be a string" );
        }

        $this->provider = [
            "name" => $name,
            "url" => $url,
        ];
    }

    public $author;
    public function setAuthor( $name, $url = "", $icon_url = "" ) {
        if ( !is_string( $name ) ) {
            throw new Exception( "Given name must be a string" );
        }

        $this->author = [
            "name" => $name,
            "url" => $url,
            "icon_url" => $icon_url,
        ];
    }

    public $fields = [];
    public function addField( $name = "Name", $value = "Value", $inline = false ) {
        if ( !is_string( $name ) ) {
            throw new Exception( "Given name must be a string" );
        }
        if ( !is_string( $value ) ) {
            throw new Exception( "Given value must be a string" );
        }

        array_push( $this->fields, [
            "name" => $name,
            "value" => $value,
            "inline" => $inline,
        ] );
    }

    private function arrayFromThis() {
        $array = [];

        foreach ( $this as $key => $value ) {
            $array[$key] = $value;
        }

        return $array;
    }

    public function toArray() {
        return array_merge( parent::toArray(), [
            "embeds" => [ $this->arrayFromThis() ]
        ] );
    }
}

?>
