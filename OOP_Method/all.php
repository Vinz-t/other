<?php
    require_once 'App.php';
    require_once 'connection.php';

    $connObj = new Connection();
    $conn = $connObj->getConnection();
    $connObj->openConnection();

    $app = new App($conn);

    if (!isset($_POST['action'])) {
        echo json_encode(['status' => 400, 'message' => 'No action provided']);
        exit;
    }

    switch ($_POST['action']) {

        case '_createAccount':
            $app->createAccount();
            break;

        case '_signInAccount':
            $app->signInAccount();
            break;

        case '_logOut':
            $app->logout();
            break;

        case '_loadAllAccount':
            $app->loadAllAccount();
            break;

        default:
            echo json_encode(['status' => 400, 'message' => 'Invalid Action']);
    }

    $connObj->closeConnection();
?>