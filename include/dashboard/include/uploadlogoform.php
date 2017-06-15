<?php
$clubid=$_POST['clubid'];
$type=$_POST['type'];
?>
  <form action="include/uploadlogo.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Resimi Seçin:</td>
      </tr>
      <tr>
        <td>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="clubid" id="clubid" value="<?=$clubid;?>">
            <input type="hidden" name="type" id="type" value="<?=$type;?>">
        </td>
        <td>
            <input type="submit" value="Yükle" name="submit">
        </td>
      </tr>
    </table>
  </form>
