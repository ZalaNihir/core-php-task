<?php
include 'connection.php';
?>

<?php
$select ="select * from studimg";
$res = mysqli_query($conn,$select);
$sno =1;
while($row = mysqli_fetch_assoc($res))
{
    ?>
    <table>
        <tr>
            <td>
                <?php
                // echo $row['id'];
                echo $sno++;
                ?>
                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
            </td>
            <td>
                <img src="<?php echo $row['imgupload'];?>" width="100px" height="100px" alt="">
            </td>
            <td>
               <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
            </td>
        </tr>
    </table>
    <?php
}
?>