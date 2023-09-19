<?php

header('Content-Type: application/json; charset=utf8');

try {
    $conn = mysqli_connect("localhost", "root", "", "bank");

    function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    if (!$result) {
        throw new Exception("Error dalam menjalankan query: " . mysqli_error($conn));
    }

    // Jika query adalah UPDATE, INSERT, atau DELETE, tidak perlu mengambil hasil
    if ($result === true) {
        return true;
    }
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

} catch (Exception $e) {

    $response = [
        'error' => true,
        'message' => $e->getMessage()
    ];
    echo json_encode($response);

}

?>
