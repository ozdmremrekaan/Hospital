<?php
$page = 'admin';
require './config/database.php';
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] === false) {
    header('location:' . ROOT_URL);
    die();
}

// Calling Procedure
$result = $connection->query("CALL GetAllPeople()");
?>
<div class="container">
    <h2>Appointments From Cities</h2>
    <div class="table-responsive"> <!-- Add table-responsive class here -->
        <table class="table"> <!-- Add table class here -->
            <!-- table headers -->
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City</th>
            </tr>
            <!-- table data -->
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['FirstName'] ?></td>
                    <td><?= $row['LastName'] ?></td>
                    <td><?= $row['city'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
