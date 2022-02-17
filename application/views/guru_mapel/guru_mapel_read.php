<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Guru mapel Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Id Mapel</td><td><?php echo $id_mapel; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('guru_mapel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>