<?php
/*
Plugin Name: Mumbai Meri Jaan
Plugin URI: http://www.kdclabs.com/?p=
Description: This plugin was design as a special feature to grow the WordPress Community in Mumbai.
Author: _KDC-Labs
Version: 1.1
Author URI: http://www.kdclabs.com/
*/

function mumbai_meri_jaan_get_lyric() {
	/** These are the lyrics to Yeh Hai Bombay Meri Jaan */
	$lyrics = "Aye Dil Hai Mushkil Jeena Yahan [O gentle heart...life is an uphill struggle]
Zara Hat Ke Zara Bach Ke, Yeh Hai Bombay Meri Jaan [Be alert, be street wise, this is Mumbai, my love]
Kahin Building Kahin Traame, Kahin Motor Kahin Mill [There are buildings and trams, and motor cars and mills]
Milta Hai Yahan Sab Kuchh Ik Milta Nahin Dil [There is everything to be had, except a heart's thrills]
Insaan Ka Nahin Kahin Naam-o-nishaan [There is not a trace of humanity in this bustling city]
Kahin Satta, Kahin Patta Kahin Chori Kahin Res [Some play the numbers, some go to races, others thieves]
Kahin Daaka, Kahin Phaaka Kahin Thokar Kahin Thes [Some starve, some suffer insults, others grieve]
Bekaaro Ke Hain Kai Kaam Yahan [Yet the idle manage to make both ends meet]
Beghar Ko Aawara Yahan Kehte Has Has [Here, vegabonds is another name for the homeless]
Khud Kaate Gale Sabke Kahe Isko Business [While others cut throats, and that's called business]
Ik Cheez Ke Hain Kai Naam Yahan [It may be the same game, but it goes under many a name]
Bura Duniya Woh Hai Kehta Aisa Bhola Tu Na Ban [You call the world unfair, don't be so naive, beware]
Jo Hai Karta Woh Hai Bharta Hai Yahan Ka Yeh Chalan [You will reap what you sow, that's the name of the game]
Tadbeer Nahin Chalne Ki Yahan [Flexing your muscles won't make old Mumbai tame]
Yeh Hai Bombay, Yeh Hai Bombay, Yeh Hai Bombay Meri Jaan [This is Mumbai, this is Mumbai, this is Mumbai, my love]
Suno Mister, Suno Bandhu, Yeh Hai Bombay Meri Jaan [Listen up mister & borthers, this is Mumbai, my love]";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function mumbai_meri_jaan() {
	$chosen = mumbai_meri_jaan_get_lyric();
	echo "<p id='wphubmmj'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'mumbai_meri_jaan' );

// We need some CSS to position the paragraph
function wphubmmj_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#wphubmmj {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'wphubmmj_css' );

?>