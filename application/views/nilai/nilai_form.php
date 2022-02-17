<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Nilai <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nis <?php echo form_error('nis') ?></label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Ulangan <?php echo form_error('nilai_ulangan') ?></label>
            <input type="text" class="form-control" name="nilai_ulangan" id="nilai_ulangan" placeholder="Nilai Ulangan" value="<?php echo $nilai_ulangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Uts <?php echo form_error('nilai_uts') ?></label>
            <input type="text" class="form-control" name="nilai_uts" id="nilai_uts" placeholder="Nilai Uts" value="<?php echo $nilai_uts; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Uas <?php echo form_error('nilai_uas') ?></label>
            <input type="text" class="form-control" name="nilai_uas" id="nilai_uas" placeholder="Nilai Uas" value="<?php echo $nilai_uas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Guru Mapel <?php echo form_error('id_guru_mapel') ?></label>
            <input type="text" class="form-control" name="id_guru_mapel" id="id_guru_mapel" placeholder="Id Guru Mapel" value="<?php echo $id_guru_mapel; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nilai') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>