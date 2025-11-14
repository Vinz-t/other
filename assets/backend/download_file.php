<?php

    include 'connection.php';

    $connObj = new Connection();
    $conn = $connObj->getConnection();

    $connObj->openConnection();

    $id = (int)($_GET['id'] ?? 0);

    $sql = "SELECT file_name, file_data FROM uploadedFile_tbl WHERE id = ?";
        $stmt = sqlsrv_query($conn, $sql, [$id]);

        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            header("Content-Type: application/pdf");
            header("Content-Disposition: inline; filename=\"" . $row['file_name'] . "\"");

            // Handle stream or binary directly
            if (is_resource($row['file_data'])) {
                fpassthru($row['file_data']);
                fclose($row['file_data']);
            } else if (!empty($row['file_data'])) {
                echo $row['file_data'];
            } else {
                echo "File data is empty.";
            }
            exit;
        }

        echo "File not found.";
        exit;
    
    $connObj->closeConnection();

?>