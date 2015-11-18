<?php

function get_netease_music_dfsid( $sid ){
    $ch = curl_init();
    $srcURL = 'http://music.163.com/api/song/detail/?id=' . $sid . '&ids=%5B' . $sid . '%5D';
    curl_setopt($ch, CURLOPT_URL, $srcURL);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($ch);
    curl_close($ch);
    $dec = json_decode($res, true);
    $dfsid["h"] = $dec["songs"]["0"]["hMusic"]["dfsId"];
    $dfsid["m"] = $dec["songs"]["0"]["mMusic"]["dfsId"];
    $dfsid["l"] = $dec["songs"]["0"]["lMusic"]["dfsId"];
    $dfsid["name"] = $dec["songs"][0]["name"];
    return $dfsid;
}

function hexchr( $hex ) {
  $str = '';
  for ( $i = 0; $i < strlen($hex); $i += 2){
    $str .= chr( hexdec( substr( $hex, $i, 2 ) ) );
  }
  return $str;
}

function get_track_url( $dfsid ) {
    
    $byte_1 = "3go8&$8*3*3h0k(2)2";
    $byte_1_length = strlen( $byte_1 );
    $byte_2 = (string) $dfsid;
    $byte_2_length = strlen( $byte_2 );
    $byte_3 = "";
    
    for ($i = 0; $i < $byte_2_length; $i++) {
        $byte_3 .= chr( ord( $byte_2[$i] ) ^ ord( $byte_1[ $i % $byte_1_length ] ) );
    };

    $results = base64_encode( hexchr( md5( $byte_3 ) ) );
    $results = str_replace( '/', '_', $results );
    $results = str_replace( '+', '-', $results );
    $url =  'http://m1.music.126.net/' . $results . '/' . $byte_2 . '.mp3';
    return $url;

}

$sid = trim($argv[1]);

if( 0 !=  $sid ) {
    $dfsid = get_netease_music_dfsid( $sid );
    echo "\nID: $sid\t" . $dfsid["name"] . "\n";
    echo "H:\t" . get_track_url( $dfsid["h"] ) . "\n";
    echo "M:\t" . get_track_url( $dfsid["m"] ) . "\n";
    echo "L:\t" . get_track_url( $dfsid["l"] ) . "\n";
    echo "请用此命令下载： curl -o ABC.mp3 http://m1.music.126.net/XXXXX/YYYYY.mp3";
} else {
    echo "Error!";
}

?>


