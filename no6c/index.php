<?php
include('config.php');
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>ARKADEMY BOOTCAMP</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">ARKADEMY BOOTCAMP</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>


  <div class="container" style="margin-top:20px">
		<h2>Database Dev</h2>
		
		<hr>
        
    <button class="badge badge-warning" class="badge badge-warning" data-toggle="modal" data-target="#TambahModal">Add Data</a></button>
    <br><br>  
        
    <table  class="table table-striped table-hover table-sm table-bordered">
    <thead class="thead-dark">
				<tr>
					
					<th>Name</th>
					<th>Work</th>
					<th>Salary</th>
					<th>Action</th>
				</tr>
			</thead>
        <?php
				$sql = mysqli_query($connection,"SELECT table_name.`id`,table_name.`id_work`,table_name.`id_salary`,table_name.`name`,table_work.`name` AS work,table_kategori.salary 
				From table_name INNER JOIN table_work ON table_name.id_work=table_work.id 
				INNER JOIN table_kategori ON table_name.id_salary=table_kategori.id") or die(mysqli_error($connection));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_array($sql)){
				?>
						<tr>
							<td><?php echo$data['name']?></td>
							<td><?php echo$data['work']?></td>
							<td><?php echo$data['salary']?></td>
							<td>
							<a href="#" data-toggle="modal" data-target="#editdataModal<?php echo $data['id'] ?>"  class="badge badge-warning">Edit Data</a>
								<a href="delete.php?id=<?php echo$data['id'] ?>" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
	
					<!-- Modal Edit -->
					<div class="modal fade" id="editdataModal<?php echo $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body">
	  <form action="edit.php?kode=<?php echo $data['id'] ?>" method="post">
		<input type="hidden" name="id" class="form-control" value = "<?php echo $data['id']; ?>" >
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value = "<?php echo $data['name']; ?>" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Work</label>
				<div class="col-sm-10">
					<select name="id_work" class="form-control" required>
						<option value="">Choose Work</option>
						<option value="1" <?php if($data['id_work'] == '1'){ echo 'selected'; } ?> >Frontend Dev</option>
						<option value="2" <?php if($data['id_work'] == '2'){ echo 'selected'; } ?>>Backend Dev</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Salary</label>
				<div class="col-sm-10">
					<select name="id_salary" class="form-control" required>
						<option value="">Choose Salary</option>
						<option value="1" <?php if($data['id_salary'] == '1'){ echo 'selected'; } ?> >10000000</option>
						<option value="2" <?php if($data['id_salary'] == '2'){ echo 'selected'; } ?>>12000000</option>
					</select>
				</div>
			</div>
		
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="Edit">
      </div>
	  </form>
    </div>
  </div>
</div>
				<?php
				} 
				}else{
				?>

					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
			<?php	}
				?>
        </tbody>
      </table>
    </div>

<!-- Modal Tambah -->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="add.php" method="post">
		<input type="hidden" name="id" class="form-control">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Work</label>
				<div class="col-sm-10">
					<select name="id_work" class="form-control" required>
						<option value="">Choose Work</option>
						<option value="1">Frontend Dev</option>
						<option value="2">Backend Dev</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Salary</label>
				<div class="col-sm-10">
					<select name="id_salary" class="form-control" required>
						<option value="">Choose Salary</option>
						<option value="1">10000000</option>
						<option value="2">12000000</option>
					</select>
				</div>
			</div>
      </div>
      <div class="modal-footer">
	  <input type="submit" name="submit" value="Save" class="btn btn-primary btn-default">
      </div>
	  </form>
    </div>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>