<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 14/12/17
 * Time: 09:42
 */?>
<?php
echo form_error('service');
?>
<form method="POST" action="<?php echo base_url('crud/postservice');?>">
    Service  <input type="text" name="service">
    <button type="submit">Submit</button>
</form>



<table>
    <tr>
        <th>Name</th>

    </tr>
    <?php
    foreach ($service as $row) {
        ?>
        <tr>
            <td><?php echo $row->service_name; ?></td>
            <td><a href='<?php echo base_url("crud/deleteService/$row->service_id");?>'>Delete</a></td>

        </tr>

        <?php
    }
    ?>
</table>

