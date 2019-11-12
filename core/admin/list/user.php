<?php

require_once ("../../database/config.php");

$listAvailableUsers = "SELECT 
                            ID, 
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

while ($row = $run->fetch(PDO::FETCH_ASSOC)) { ?>

<tbody>
    <tr>
        <th scope="row"><?php echo $row['id'] ?></th>
        <td><?php echo $row['fullname'] ?></td>
        <td>
            <a href="edit.php?<?php echo $row['id'] ?>" class="btn btn-warning">
                <i class="fas fa-edit"></i> Módositás
            </a>
        </td>
        <td>
            <a href="delete.php?<?php echo $row['id'] ?>" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i> Törlés
            </a>
        </td>
    </tr>
</tbody>

<?php } ?>
    
