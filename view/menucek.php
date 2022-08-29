	<li class="active nav-item has-treeview">
		<a href="http://localhost/newspk/" class="nav-link">
			<i class="nav-icon fas fa-desktop"></i>
			<p>
				Dashboard
			</p>
		</a>
	</li>



	<li class="nav-item has-treeview">
		<a href="#" class="nav-link">
			<i class="nav-icon fas fa-hourglass-end"></i>
			<p>
				Hasil Estimasi
				<i class="fas fa-angle-left right"></i>
			</p>
		</a>
		<ul class="nav nav-treeview">
			<li class="nav-item">
				<a href="?page=proses_esti" class="nav-link">
					<i class="nav-icon far fa-circle text-primary"></i>
					<p>Hasil Estimasi</p>
				</a>
			</li>
		</ul>
	</li>


	<li class="nav-item has-treeview">
		<a href="?page=menu_setting" class="nav-link">
			<i class="nav-icon fas fa-wrench"></i>
			<p>
				Setting
				<i class="fas fa-angle-left right"></i>
			</p>
		</a>
		<ul class="nav nav-treeview">
			<li class="nav-item">
				<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
					<i class="nav-icon far fa-circle text-danger"></i>
					<p>
						Logout
					</p>
				</a>
			</li>
		</ul>
	</li>