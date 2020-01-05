<?php

//  > Require the Discord API
require( "../discord.api.php" );

//  > Create a $avatar variable, use it later for Thumbnail and Author
$avatar = "https://images-ext-2.discordapp.net/external/CEkoO5zzGWW60OcNs-VNRYmXKu2GSk273QWK5Of8E78/%3Fv%3D4/https/avatars0.githubusercontent.com/u/33220603";

//  > Create a Discord RichEmbed (inherited from the Discord Message class)
$msg = new Discord_RichEmbed();
$msg->setUsername( "DiscordPHP" );
$msg->setColor( "#c0392b" );
$msg->setDescription( "I am a description" );
$msg->addField( "Lua", "<:duck_heart:622353366273490954>", true );
$msg->addField( "PHP", "<:duck_smirk:622353366491594762>", true );
$msg->setAuthor( "Guthen", "", $avatar );
$msg->setFooter( "I am a footer" );
$msg->setThumbnail( $avatar );
$msg->setTimestamp();

//  > Echo the JSON of our RichEmbed
echo $msg->toJSON();

//  > Create a Discord Webhook and send our RichEmbed
$webhook = new Discord_WebHook( "YOUR_WEBHOOK" );
$webhook->send( $msg );

?>