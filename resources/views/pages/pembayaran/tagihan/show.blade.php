<div class="row">
	<div class="col-md-4">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Kode Tagihan</li>
			<li class="list-group-item">Jenis Tagihan</li>
			<li class="list-group-item">Bulan</li>
			<li class="list-group-item">Tahun</li>
			<li class="list-group-item">Nominal</li>
		</ul>
	</div>
	<div class="col-md-8">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">: {{$model['kd_tagihan']}}</li>
			<li class="list-group-item">: {{$model['jenis_tagihan']}}</li>
			<li class="list-group-item">: {{$model['bulan']}}</li>
			<li class="list-group-item">: {{$model['tahun']}}</li>
			<li class="list-group-item">: Rp. {{number_format($model['nominal'])}}</li>
		</ul>
	</div>
</div>
