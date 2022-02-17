<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>
		<a href="'.site_url('guru').'"><i class="fa fa-list fa-fw"></i> Guru</a>
	</li><li>
		<a href="'.site_url('guru_mapel').'"><i class="fa fa-list fa-fw"></i> Guru mapel</a>
	</li><li>
		<a href="'.site_url('mapel').'"><i class="fa fa-list fa-fw"></i> Mapel</a>
	</li><li>
		<a href="'.site_url('nilai').'"><i class="fa fa-list fa-fw"></i> Nilai</a>
	</li><li>
		<a href="'.site_url('siswa').'"><i class="fa fa-list fa-fw"></i> Siswa</a>
	</li>';
	}
