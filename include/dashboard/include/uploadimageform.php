<?php
$eventid=$_POST['eventid'];
?>
  <form action="include/uploadimage.php" method="post" enctype="multipart/form-data">
    <table>
    <tr>
      <td>Select image to upload:</td>
    </tr>
    <tr>
      <td>
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="hidden" name="eventids" id="eventids" value="<?=$eventid;?>">
      </td>
      <td>
          <input type="submit" value="Upload Image" name="submit">
      </td>
    </tr>
    </table>
  </form>
