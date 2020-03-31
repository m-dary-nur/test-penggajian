<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>" />
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

	<title>Test Penggajian</title>

    <style>
        a:hover {
            text-decoration: none;
        }

		.header-page {
			width: 100%;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.text-center {
			text-align: center;
		}
    </style>
</head>
<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal">
			<a href="<?= site_url('/'); ?>">Test Penggajian</a>
		</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="<?php echo site_url('/jabatan'); ?>">Jabatan</a>
			<a class="p-2 text-dark" href="<?php echo site_url('/karyawan'); ?>">Karyawan</a>
			<a class="p-2 text-dark" href="<?php echo site_url('/aturan_gaji'); ?>">Aturan Gaji</a>
			<a class="p-2 text-dark" href="<?php echo site_url('/gaji'); ?>">Gaji</a>
		</nav>
    </div>