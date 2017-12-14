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

