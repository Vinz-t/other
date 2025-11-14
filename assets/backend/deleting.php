<?php

    function delete_monitoring_data_controller($connection) {
        $unique_code = $_POST['uniqueCode'] ?? '';
        $question_number = $_POST['questionNumber'] ?? '';
        $trigger = $_POST['trigger'] ?? '';

        $sql = "{CALL sp_Deleting(?, ?, ?)}";
        
        $params = array(
            array($unique_code, SQLSRV_PARAM_IN),
            array($question_number, SQLSRV_PARAM_IN),
            array($trigger, SQLSRV_PARAM_IN)
        );
        
        $stmt = sqlsrv_query($connection, $sql, $params);

        if ($stmt === false) {
            echo 'Database error during deletion.';
            return;
        }

        echo 'success';
    }

?>