# DiscordPHP
PHP API to use with Discord (WebHooks, Messages and RichEmbeds) 

## Require
Before using the API, you need to include it in your code like this :
```php
require( "path/to/discord.api.php" );
```

## Examples
See examples [here](https://github.com/Guthen/DiscordPHP/tree/master/examples).

## Classes

### WebHook

#### Construct
```php
$webhook = new Discord_WebHook( $url = "" );
```

#### Methods
|        Methods          |       Description      |
|-------------------------|------------------------|
| `setURL( string $url );` | Change the Webhook URL | 
| `send( Discord_Message $msg );` | Send the Message/RichEmbed |

### Message

#### Construct
```php
$msg = new Discord_Message( $content = "" );
```

#### Methods
|        Methods          |       Description      |
|-------------------------|------------------------|
| `setContent( string $content );` | Change the Message content | 
| `setUsername( string $username );` | Change the Message username | 
| `setAvatarURL( string $url );` | Change the Message avatar URL | 
| `setTTS( bool $tts );` | Set whenever the TTS option is activated |
| `toArray();` | Return an array version of the message |
| `toJSON();` | Return the JSON of the array from `toArray()` |

### RichEmbed
Inherited Class: **Discord_Message**

#### Construct
```php
$embed = new Discord_RichEmbed( $content = "", $description = "" );
```

#### Methods
**NOTE: You can also use the methods of the class `Discord_Message`.**

| Methods | Description |
|---------|-------------|
| `setTitle( string $title );` | Change the Embed title |
| `setDescription( string $desc );` | Change the Embed description |
| `setURL( string $url );` | Change the Embed URL (on title) |
| `setTimestamp( int $timestamp = -1 );` | Change the Embed timestamp (-1 = current time) |
| `setColor( string $color = "000000" );` | Change the Embed color (hexadecimal) |
| `setFooter( string $text = "Footer", string $icon_url = "" );` | Change the Embed footer |
| `setImage( string $url, int $width = 100, int $height = 100 );` | Change the Embed image |
| `setThumbnail( string $url, int $width = 100, int $height = 100 );` | Change the Embed thumbnail |
| `setVideo( string $url, int $width = 100, int $height = 100 );` | Change the Embed video |
| `setProvider( string $name = "Provider", string $url = "" );` | Change the Embed provider |
| `setAuthor( string $name, string $url = "", string $icon_url = "" );` | Change the Embed author |
| `addField( string $name = "Name", string $value = "Value", bool $inline = false );` | Add a field to the Embed (max 24) |
| `toArray();` | Return an array version of the embed |
