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
