<?php
$emailaddr=$_POST['email']; ?>
<form  action="Javascript:SendMail();" role="form" method="post" style="display: block;">

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <input type="text" name="emailaddr" id="emailaddr" class="form-control input-sm" placeholder="e-mail address"  value="<?=$emailaddr;?>" required disabled>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <input type="text" name="subject" id="subject" class="form-control input-sm" placeholder="Subject" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <textarea  name="message" id="message" rows="5"  placeholder="Enter message Here.." class="form-control" required></textarea>
        </div>
      </div>
    </div>

    <input type="submit" value="Send" class="btn btn-info btn-block">
</form>
