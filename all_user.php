<?php
	
	session_start();
	include "Conn.php";
	if (!isset($_SESSION['type'])) {
    header("location:login.html");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	<title>All Users</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="icon" type="image/png" href="img/TC logo.png">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f8f9fa;
			margin: 0;
			padding: 0;
		}

		.container {
			max-width: 1200px;
			margin: 50px auto;
			padding: 0 15px;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		.table th,
		.table td {
			padding: 12px 15px;
			text-align: center;
			border: 1px solid #ddd;
		}

		.table th {
			background-color: #007bff;
			color: white;
			font-weight: bold;
		}

		.table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.table td img {
			width: 80px;
			height: 80px;
			object-fit: cover;
		}

		.table a {
			text-decoration: none;
		}

		.table button {
			border: none;
			padding: 6px 12px;
			background-color: #007bff;
			color: white;
			cursor: pointer;
			border-radius: 5px;
			font-size: 14px;
			transition: background-color 0.3s;
		}

		.table button:hover {
			background-color: #0056b3;
		}

		.table td a {
			margin-right: 10px;
		}

		h3 {
			text-align: center;
			font-size: 2rem;
			color: #333;
			margin-bottom: 30px;
		}

		/* Mobile-responsive styles */
		@media (max-width: 768px) {
			.table th, .table td {
				padding: 8px 10px;
				font-size: 12px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<h3>All USERS List</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>UserName</th>
					<th color="orange">Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "select * from resistration_tbl";
					$result = mysqli_query($conn, $sql);
					$data = mysqli_num_rows($result);

					if ($data) {
						while ($row = mysqli_fetch_array($result)) {
				?>
							<tr>
								
								
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td>
									<a onclick="return confirm('Delete User?')" href="delete_user.php?u_id=<?php echo $row['u_id']; ?>"><button>Delete</button></a>
								</td>
							</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
