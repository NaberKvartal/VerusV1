<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
global $wpdb;
$xml=simplexml_load_file("note_1.xml");
//print_r($xml);

//print_r($xml->offer[0]);
$counter = count($xml->offer);;
//echo $counter;
$counter = 2;
for($i=0; $i<$counter; ++$i) {
    $post_title = $xml->offer[$i]->type;
//    $post_title .= ' '.$xml->offer[$i]->property-type;
    $post_title .= ' '.$xml->offer[$i]->category.'<br>';

    $post_content = $xml->offer[$i]->description;

    $my_post = array(
        'post_title' => $post_title,
        'post_content' => $post_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_category' => array(8,39)
    );

    wp_insert_post( $my_post );


    $lastid = $wpdb->get_col("SELECT ID FROM wp_posts ORDER BY ID DESC LIMIT 0 , 1" );
    $id = $lastid[0];
    $price = $xml->offer[$i]->price->value;
    $price .= ' '.$xml->offer[$i]->price->currency;

            add_post_meta( $id, '_price', $price, true );

    $bedroom = $xml->offer[$i]->rooms;
            add_post_meta( $id, '_bedroom', $bedroom, true );

    $city = $xml->offer[$i]->location->region;
            add_post_meta( $id, '_city', $city, true );

    $location = $xml->offer[$i]->location->address;
    $location .= ' '.$xml->offer[$i]->location->region;
    $location .= ' '.$xml->offer[$i]->location->country;
            add_post_meta( $id, '_location', $location, true );

//    $my_post = array(
//        'post_title' => 'My post',
//        'post_content' => 'This is my post.',
//        'post_status' => 'publish',
//        'post_author' => 1,
//        'post_category' => array(8,39)
//    );

// Insert the post into the database
//    wp_insert_post( $my_post );
//
//    echo '<br>Цена '.$xml->offer[$i]->price->value.' ';
//    echo $xml->offer[$i]->price->currency.'<br>';
//    echo 'Комнат: '.$xml->offer[$i]->rooms.'<br><br>';
}


//echo $c;

?>
done!

</body>
</html>