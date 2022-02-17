<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Nilai Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nis</td><td><?php echo $nis; ?></td></tr>
	    <tr><td>Nilai Ulangan</td><td><?php echo $nilai_ulangan; ?></td></tr>
	    <tr><td>Nilai Uts</td><td><?php echo $nilai_uts; ?></td></tr>
	    <tr><td>Nilai Uas</td><td><?php echo $nilai_uas; ?></td></tr>
	    <tr><td>Nilai Akhir</td><td><?php echo $nilai_akhir; ?></td></tr>
	    <tr><td>Id Guru Mapel</td><td><?php echo $id_guru_mapel; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nilai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>