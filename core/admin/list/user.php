<?php

require_once ("../../database/config.php");

$listAvailableUsers = "SELECT 
                            ID as id, 
                            CONCAT(
                                szemely.Vezeteknev, 
                                SPACE(1), 
                                szemely.Keresztnev, 
                                SPACE(1), 
                                szemely.Utonev
                                ) as fullname
                       FROM szemely";

$run = $databaseConnection -> prepare($listAvailableUsers);
$run->execute();

?>

<table class="table" data-toggle="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Név</th>
            <th scope="col" colspan="2">Műveletek</th>
        </tr>
    </thead>
    <tbody>

<?php while ($row = $run->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr>
        <th scope="row">
            <?php echo $row['id'] ?>
        </th>
        <td>
            <?php echo $row['fullname'] ?>
        </td>
        <td>
            <a href="edit.php" class="btn btn-warning">
                <i class="fas fa-edit"></i> Módositás
            </a>
        </td>
        <td>
            <a href="delete.php" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i> Törlés
            </a>
        </td>
    </tr>

<?php } ?>
</table>
    
