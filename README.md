# DiscordPHP
PHP API to use with Discord 

## Example

#### RichEmbed example:
```php
require( "discord.php" );

$avatar = "https://images-ext-2.discordapp.net/external/CEkoO5zzGWW60OcNs-VNRYmXKu2GSk273QWK5Of8E78/%3Fv%3D4/https/avatars0.githubusercontent.com/u/33220603";

$msg = new RichEmbed();
$msg->setUsername( "DiscordPHP" );
$msg->setColor( "#c0392b" );
$msg->setDescription( "I am a description" );
$msg->addField( "Lua", "<:duck_heart:622353366273490954>", true );
$msg->addField( "PHP", "<:duck_smirk:622353366491594762>", true );
$msg->setAuthor( "Guthen", "", $avatar );
$msg->setFooter( "I am a footer" );
$msg->setThumbnail( $avatar );
$msg->setTimestamp();

$webhook = new WebHook( "YOUR_WEBHOOK" );
$webhook->send( $msg );
```
