<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>S.no</th> 
			<th>Block</th>
			<th>Plot No</th>
			<th>Area(sq ft)</th>
			<th>Size(Gaj)</th>
			<th>Type</th>
			<th>Property status</th>   
			<th>Action</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $count = 1; if(isset($search)){ foreach($search as $pr){ ?>
		<tr>
			<td><?= $count++;?></td>
			<td><?=$pr->block;?></td>
			<td><?=$pr->plot_no;?></td>
			<td><?=$pr->area_sq; ?></td>
			<td><?=$pr->size_gaj;?></td>
			<td><?=$pr->type;?></td>
			<td><?php if($pr->prop_status == 'Available'){ ?>
				<button class="btn btn-primary">Available</button>
			<?php }elseif($pr->prop_status == 'Booked'){ ?>
				<button class="btn btn-success">Booked</button>
			<?php }elseif($pr->prop_status == 'Sold'){ ?>
				<button class="btn btn-danger">Sold</button>
				<?php }elseif($pr->prop_status == 'Partially_booked'){ ?>
				<button class="btn btn-warning">Partially Booked</button>
			<?php } ?>
			</td> 
			<td id="Object-<?=$pr->id;?>">
				<?= ($pr->status == 'D')?'<a href="#"  data-src="'.site_url('/web-admin/gallery/change_gallery_status').'" data-id="'.$pr->id.'" data-status="'.$pr->status.'" class="change-status btn btn-primary">ACTIVE</a>':'<a href="#" data-src="'.site_url('/web-admin/gallery/change_gallery_status').'"data-id="'.$pr->id.'" data-status="'.$pr->status.'" class="change-status btn btn-danger">DEACTIVE</a>'; ?>
			</td>
			<td>
				<button class="btn btn-success edit-object" data-id="<?=$pr->id;?>" data-img_id="<?=$pr->img_id;?>" data-image_src="<?=base_url('images/'.(isset($images[$pr->img_id])?$images[$pr->img_id]:''));?>" data-plot_no="<?=$pr->plot_no;?>"data-area_sq="<?=$pr->area_sq;?>" data-size_gaj="<?=$pr->size_gaj;?>" data-type="<?=$pr->type;?>" data-prop_status="<?=$pr->prop_status;?>" data-block="<?=$pr->block;?>" data-bs-toggle="modal" data-bs-target="#editObject"><i class="fa-sharp fa-solid fa-eye"></i></button>
			</td>
		</tr>
	<?php } } ?>
	</tbody>
</table>