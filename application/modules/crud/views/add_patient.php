<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 14/12/17
 * Time: 09:52
 */?>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<form method="POST" action="<?php echo base_url('crud/postpatient');?>">
    <?php
    echo form_error('name');
    ?>
    Name  <input type="text" name="name">
    <br>
    <?php
    echo form_error('dob');
    ?>
    DOB  <input type="date" name="dob">
    <br>
    Gender
        <select required name="gender" class="form-control show-tick">
            <?php
            foreach ($gender as $row) {
                ?>
                <option value="<?php echo $row->gender_id; ?>"><?php echo $row->gender_name; ?></option>
                <?php
            }
            ?>
        </select>
    <br>
    Service type
    <select required name="service" class="form-control show-tick">
        <?php
        foreach ($service as $row) {
            ?>
            <option value="<?php echo $row->service_id; ?>"><?php echo $row->service_name; ?></option>
            <?php
        }
        ?>
    </select>
    <br>
    <?php
    echo form_error('observation');
    ?>
    Observation <input type="text" name="observation">
    <br>
    <button type="submit">Submit</button>
</form>


<table>
    <tr>
        <th>Name</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Service</th>
        <th>Observation</th>
        <th>Delete</th>
<!--        <th>Edit</th>-->

    </tr>
    <?php
    foreach ($patient as $row) {
        ?>
    <tr>
        <td><?php echo $row->patient_name; ?></td>
        <td><?php echo $row->patient_dob; ?></td>
        <td><?php echo $row->gender_name; ?></td>
        <td><?php echo $row->service_name; ?></td>
        <td><?php echo $row->patient_observation; ?></td>
        <td><a href='<?php echo base_url("crud/deletePatient/$row->patient_id");?>'>Delete</a></td>

    </tr>

        <?php
    }
    ?>
</table>


