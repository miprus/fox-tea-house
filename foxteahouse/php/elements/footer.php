<?php
	$crYear = date("Y");
	
	echo('
		<footer class="row no-gutters text-center">
			<div class="col-sm-6 pt-3">
				<h5>
					<a href="policy.php">
						Returning Policy<i class="fas fa-external-link-alt pl-2"></i>
					</a>
				</h5>
			</div>

			<div class="col-sm-6 pt-3">
				<h5>
					<a href="copyright_notice.php">
						Copyright Notice<i class="fas fa-external-link-alt pl-2"></i>
					</a>
				</h5>
			</div>

			<div class="col-sm-12 px-5">
			<hr>
			<h6>&copy; ' . $crYear. ' Copyright: Michal Pruszkowski EC1822839 - Edinburgh College 2nd year project</h6>
			</div>
		</footer>
	');
?>