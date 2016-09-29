
<?php if(isset($_SESSION['token']) && $_GET['token'] == $_SESSION['token']): ?>
	<div class="divider">&nbsp;</div>
	<div class="row text-norm">
		<div class="col-md-6 col-md-offset-3">
			<script type="text/javascript">var acara="<?php echo $_GET['acara'] ?>";</script>
			<script src="absensi.js"></script>
			<div id="errMsg"></div>
			<form id="absensi" method="post">
				<input type="hidden" id="acara" value="<?php echo $_GET['acara'] ?>">
				<div class="form-group">
					<label name="identity">Masukkan E-mail</label>
					<input type="text" id="identity" value="" class="form-control"/>
				</div>
				<div class="form-group">
					<input type="submit" id="btn-oke" value="Oke" class="btn btn-default"/>
				</div>
			</form>
		</div>
	</div>
<?php else: ?>
	<p>Token Mismatch!</p>
<?php endif; ?>
