<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Add Files Payload
        // Payload::js('/mvc_practice/examples/register/register.js');
        // Payload::css('/mvc_practice/bower_components/ReptileForms/dist/reptileforms.min.css');

        // More code could go here depending on what you want to do with this page

        $sql = "
            UPDATE inline_item
               SET quantity = '{$_POST['qty']}'
             WHERE inline_item_id = '{$_POST['inline_item_id']}'
        ";
        // Execute SQL Statement
        $results = db::execute($sql);

        session_start();
        // set state to decide whether reload form or not
        // 1: reload; 2: not reload
        $_SESSION['state_flag'] = '2';

    }

}
$controller = new Controller();

?>