       <!-- jQuery  -->
	   <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/waves.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/feather.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/simplebar.min.js"></script>

		<script type="text/javascript">
			let passwordInput = document.getElementById('password'),
			toggle = document.getElementById('btnToggle'),
			icon =  document.getElementById('eyeIcon');

			function togglePassword() {
			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
				icon.classList.add("fa-eye-slash");
				//toggle.innerHTML = 'hide';
			} else {
				passwordInput.type = 'password';
				icon.classList.remove("fa-eye-slash");
				//toggle.innerHTML = 'show';
			}
			}

			function checkInput() {
			}

			toggle.addEventListener('click', togglePassword, false);
			passwordInput.addEventListener('keyup', checkInput, false);
		</script>

		</body>

</html>
