<?php

    class App {

        private $conn;

        public function __construct($connection) {
            $this->conn = $connection;
        }

        // -----------------------
        // CREATE ACCOUNT
        // -----------------------
        public function createAccount() {

            $name = $_POST['firstName'] . ' ' . $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['confirmPassword'];
            $interest = $_POST['interest'];

            $sql = "
                INSERT INTO users_tbl (name, email, password, role, tel, interest)
                VALUES (?, ?, ?, 'user', ?, ?)
            ";

            $params = [$name, $email, $password, $phone, $interest];
            $stmt = sqlsrv_query($this->conn, $sql, $params);

            if (!$stmt) {
                echo json_encode([
                    'status' => 'failed',
                    'message' => sqlsrv_errors()
                ]);
                return;
            }

            echo json_encode(['status' => 'success']);
        }

        // -----------------------
        // SIGN IN ACCOUNT
        // -----------------------
        public function signInAccount() {
            // Login logic here...
        }

        // -----------------------
        // LOGOUT
        // -----------------------
        public function logout() {
            session_unset();
            session_destroy();
            echo 'success';
        }

        // -----------------------
        // LOAD ACCOUNTS
        // -----------------------
        public function loadAllAccount() {
            // Your SQL fetch logic here...
        }
    }

?>