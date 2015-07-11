<?php

include_once('src/Mandrill.php');

try {
    $mandrill = new Mandrill('LtBbvjIthLObhrLOVyKGxA');
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => 'example subject',
        'from_email' => 'swaranjames@gmail.com',
        'from_name' => 'Swaran',
        'to' => array(
            array(
                'email' => 'swaranjames@live.com',
                'name' => 'swaranLive',
                'type' => 'to'
            )
        ));
        
        $async = false;
        $result = $mandrill->messages->send($message, $async);
        print_r($result);
} 
        catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}

?>