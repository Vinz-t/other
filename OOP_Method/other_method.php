<?php

    $action = $_POST['action'];

    // 1. Define valid actions and their corresponding functions
    $routes = [
        '_createAccount'    => 'createAccountControl',
        '_signInAccount'    => 'signInAccountControl',
        '_loadAllAccount'   => 'loadAllAccountController',
        '_addAccount'       => 'addAccountController',
        '_viewAccount'      => 'viewAccountController',
        '_accountControl'   => 'accountController',
        '_editAccount'      => 'editAccountController',
        '_deleteAccount'    => 'deleteAccountController',
    ];

    // 2. Handle the Logout logic (since it's not a function call)
    if ($action === '_logOut') {
        session_unset();
        session_destroy();
        echo 'success';
        exit;
    }

    // 3. Check if the action exists in our routes
    if (array_key_exists($action, $routes)) {
        // Call the function dynamically
        call_user_func($routes[$action], $conn);
    } else {
        // Default / Error case
        echo json_encode(['statusCode' => 400, 'message' => 'Invalid Action']);
    }

?>
