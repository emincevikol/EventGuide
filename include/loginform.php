<?php
if(isset($_SESSION['login'])){
  $direct="include/logout.php";
  $btn="button";
}
else {
  $direct="include/ldap.php";
  $btn="submit";
}
?>
<div class="container padTop50">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link"></a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php echo $direct ?>" method="post" role="form" style="display: block;">
									<div class="input-group" style=" margin-bottom: 10px; ">
                    <input type="text" name="email" class="form-control" placeholder="CBU E-mail" aria-describedby="basic-addon2">
                    <span class="input-group-addon "  style="padding-right: 20%;"  id="basic-addon2">@ogr.cbu.edu.tr</span>
                  </div>
									<div class="form-group">
										<input type="password" name="password"  tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Giriş">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
