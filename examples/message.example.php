<?php

//  > Require the Discord API
require( "../discord.api.php" );

//  > Create a Discord Message with a content, username and avatarURL (you can also '$msg->setTTS( bool )')
$msg = new Discord_Message( "My __message__ **content**" );
$msg->setUsername( "My username" );
$msg->setAvatarURL( "https://images-ext-2.discordapp.net/external/CEkoO5zzGWW60OcNs-VNRYmXKu2GSk273QWK5Of8E78/%3Fv%3D4/https/avatars0.githubusercontent.com/u/33220603" );

//  > Send the message to a Discord webhook
$webhook = new Discord_WebHook( "YOUR_WEBHOOK" );
$webhook->send( $msg );

?>