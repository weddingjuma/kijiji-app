<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 14/12/17
 * Time: 09:16
 */?>

<?php
echo form_error('gender');
?>
<form method="POST" action="<?php echo base_url('crud/postGender');?>">
   Gender  <input type="text" name="gender">
    <button type="submit">Submit</button>
</form>

<table>
    <tr>
        <th>Name</th>

    </tr>
    <?php
    foreach ($gender as $row) {
        ?>
        <tr>
            <td><?php echo $row->gender_name; ?></td>
            <td><a href='<?php echo base_url("crud/deleteGender/$row->gender_id");?>'>Delete</a></td>

        </tr>

        <?php
    }
    ?>
</table>
