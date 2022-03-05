<!DOCTYPE html>
<html>
<head>
	<title>LOGIN | HR System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<style type="text/css">
		.divider:after,
		.divider:before {
			content: "";
			flex: 1;
			height: 1px;
			background: #eee;
		}
	</style>
</head>
<body>
	<section class="vh-100">
		<div class="container py-5 h-100">
			<div class="row d-flex align-items-center justify-content-center h-100">
				<div class="col-md-8 col-lg-7 col-xl-6">
					<img src="<?= base_url('assets/img/login.png');?>" class="img-fluid" alt="Phone image">
				</div>
				<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
					<form id="form-login" autocomplete="off">
						<!-- Email input -->
						<div class="form-floating form-outline mb-4">
							<input type="email" name="email" id="form1Example13" class="form-control form-control-lg" placeholder="Email address" />
							<label class="form-label" for="form1Example13">Email address</label>
						</div>

						<!-- Password input -->
						<div class="form-floating form-outline mb-4">
							<input type="password" name="password" id="form1Example23" class="form-control form-control-lg" placeholder="Password" />
							<label class="form-label" for="form1Example23">Password</label>
						</div>

						<div class="d-flex justify-content-around align-items-center mb-4">
							<!-- Checkbox -->
							<div class="form-check">
								<input
								class="form-check-input"
								type="checkbox"
								value=""
								id="form1Example3"
								checked
								/>
								<label class="form-check-label" for="form1Example3"> Remember me </label>
							</div>
							<a href="#!">Forgot password?</a>
						</div>
						<div class="divider d-flex align-items-center my-4">
							<!-- <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p> -->
						</div>
						<!-- Submit button -->
						<button type="submit" class="btn btn-flat btn-primary btn-lg btn-block" style="float: right;">Sign in</button>
						<!-- <div class="divider d-flex align-items-center my-4">
							<p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
						</div>
						<a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
							<i class="fab fa-facebook-f me-2"></i>Continue with Facebook
						</a>
						<a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
							<i class="fab fa-twitter me-2"></i>Continue with Twitter
						</a> -->
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		const FormLogin = $("#form-login");
        FormLogin.submit(function(event) {
			event.preventDefault(); // menghilangkan loading
			const url = "<?= base_url('login/proses');?>",
				data  = FormLogin.serialize();

			$.post(url, data).done((res,status,xhr) => {
				console.log(res);
				console.log(status);
				console.log(xhr);
				if (xhr.status == 200) {
					window.location = "<?= site_url('dashboard');?>";
				}
			}).fail((xhr,status,err) => {
				// 400 - 500
				console.log(xhr);
				console.log(status);
				console.log(err);
			})
		});
	});
</script>
</html>
