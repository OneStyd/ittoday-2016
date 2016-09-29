<?php
	// include "../../connect_adm.php";

	if(isset($_POST['del'])){
		mysqli_query($conn, "TRUNCATE TABLE isc_jawaban_user");
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<div class="row">
	<div class="col-lg-12">
		<div class="panel-body">
			<div class="alert alert-warning">This page is intended for debugging purpose. Only admin or privilege users can use this page.</div>
			<?php if(isset($_GET['secret']) && (md5($_GET['secret']) == "0dd878394668a56f7741b6283be18577")): ?>
			<form method="post">
				<input type="submit" name="del" value="Delete All Answers" onclick="confirm('Are you sure?')"/>
			</form>
			<?php else: ?>
				<p>Provide me the secret code please!</p>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>