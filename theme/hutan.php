<div class="wrapper">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<center><img src="<?= $config['logo']; ?>" style="width: 200px;border-radius: 350px;"></center>
						<div class="card-header card-header-success">
							<h4 class="card-title"><?= $config['judul']; ?></h4>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<form method="post" action="" class="form">
									<div class="form-group">
										<input type="text" class="form-control" name="my-link" placeholder="Your URL" required>
									</div>
									<p><input type="submit" class="btn btn-success" value="Shorten!"></p>
								</form>
								<div class="form-group">
									<input readonly class="form-control" value="<?= $response; ?>" style="padding-left:10px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>