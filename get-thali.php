<?php
include 'dbconnect.php';

$rs = mysqli_query($con, 'select * from thali where v_id=' . $_GET['v_id']);
?>
<label for="tid" style="font-weight: 600;">Thali</label>
<select name='tid' class="form-control shadow-none" id="tid" required>
<option value=''>Select Thali</option>
<?php while ($row = mysqli_fetch_row($rs)) { ?>
<option value=<?= $row[0] ?>><?= $row[1] ?>(<?= $row[2] ?>-<?= $row[3] ?>)</option>
<?php } ?>
</select>    