<br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h1 class="text-center">Edit A Room</h1>
			<form action="<?php echo base_url();?>room/update_rooms?loc_id=<?php echo $this->input->get('loc_id'); ?>&room_id=<?php echo $this->input->get('room_id'); ?>&loc_name=<?php echo $this->input->get('loc_name'); ?>" method="post" enctype="multipart/form-data">
				<?php foreach ($update_room as $value): ?>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $value->room_name; ?>" required="">
				</div>
				<div class="form-group">
					<?php 
						$loc_id = $this->input->get('loc_id');
						$this->session->set_userdata('loc_id', $loc_id);
					?>
					<label for="">Manager Name</label>
					<select class="form-control" name="manager" id="" required="">
						<?php   
							foreach ($manager as $row) {
						?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->firstname."&nbsp;".$row->lastname; ?></option>
						<?php 
							} 
						?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Floor</label>
						<input type="text" name="floor" class="form-control" value="<?php echo $value->floor; ?>" required="">
					</div>
					<div class="form-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" accept="image/*" value="<?php echo $value->room_image; ?>" name="photo">
							<label class="custom-file-label" for="customFile">Upload floor map</label>
						</div>
					</div>
					<div class="form-group">
						<label for="comment">Description</label>
						<textarea class="form-control" rows="5" id="comment" style="resize: none;" name="description"><?php echo $value->description; ?></textarea>
					</div>
					<?php endforeach ?>
					<div class="form-group">
						<div>
							<button class="btn btn-primary" type="submit" name="send" value="login">
								<i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip"></i><span style="color: #fff">&nbsp; Update </span>
							</button>

							<a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $this->input->get('loc_id'); ?>&loc_name=<?php echo $this->input->get('room_name'); ?>" class="btn btn-danger float-right">
								<i class="mdi mdi-cancel "></i>&nbsp;Cancel</a>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
<?php 
	$room_id = $this->input->get('room_id');
	$this->session->set_userdata('room_id', $room_id);
	$loc_id = $this->input->get('loc_id');
	$this->session->set_userdata('loc_id', $loc_id);
?>

