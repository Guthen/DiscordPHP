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
            echo "Bad title type";
            exit;
        }

        $this->title = $title;
    }

    public $desc;
    public function setDescription( $desc ) {
        if ( !is_string( $desc ) ) {
            echo "Bad description type";
            exit;
        }

        $this->description = $desc;
    }

    public $url;
    public function setURL( $url ) {
        if ( !is_string( $content ) ) {
            echo "Bad URL type";
            exit;
        }

        $this->url = $url;
    }

    public $timestamp;
    public function setTimestamp( $timestamp = -1 ) {
        if ( !is_int( $timestamp ) ) {
            echo "Bad timestamp type";
            exit;
        }

        $this->timestamp = date( DATE_ISO8601, $timestamp == -1 ? mktime() : $timestamp );
    }

    public $color;
    public function setColor( $color = "000000" ) {
        if ( !is_string( $color ) ) {
            echo "Bad color type";
            exit;
        }

        $this->color = hexdec( $color );
    }

    public $footer;
    public function setFooter( $text = "Footer", $icon_url = "" ) {
        if ( !is_string( $text ) ) {
            echo "Bad text type";
            exit;
        }

        $this->footer = [
            "text" => $text,
            "icon_url" => $icon_url,
        ];
    }

    public $image;
    public function setImage( $url, $width = 100, $height = 100 ) {
        if ( !is_string( $url ) ) {
            echo "Bad URL type";
            exit;
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
            echo "Bad URL type";
            exit;
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
            echo "Bad URL type";
            exit;
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
            echo "Bad name type";
            exit;
        }

        $this->provider = [
            "name" => $name,
            "url" => $url,
        ];
    }

    public $author;
    public function setAuthor( $name, $url = "", $icon_url = "" ) {
        if ( !is_string( $name ) ) {
            echo "Bad name type";
            exit;
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
            echo "Bad name type";
            exit;
        }
        if ( !is_string( $value ) ) {
            echo "Bad value type";
            exit;
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
