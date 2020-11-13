<div class="row text-sm">
	<div class="col-md-4">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Tanggal Bayar</li>
			<li class="list-group-item">Kode Bayar</li>
			<li class="list-group-item">Siswa</li>
			<li class="list-group-item">Jenis Pembayaran</li>
			<li class="list-group-item">Bayar</li>
			<li class="list-group-item">Status</li>
		</ul>
	</div>
	<div class="col-md-8">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">: {{ $model['0']['created_at'] }}</li>
			<li class="list-group-item">: {{ $model['0']['kd_bayar'] }}</li>
			<li class="list-group-item">: {{ $model['0']['nis'] }} / {{ $model['0']['nama'] }}</li>
			<li class="list-group-item">: 
				{{ $model['0']['jenis_tagihan'] }} {{ $model['0']['bulan'] }} {{ $model['0']['tahun'] }} / Rp. {{ number_format($model['0']['nominal']) }}
			</li>
			<li class="list-group-item">: Rp. {{ number_format($model['0']['bayar']) }}</li>
			<li class="list-group-item">: 
				@if ($model['0']['nominal']-$model['0']['bayar'] == 0)
            	<b class="text-green">Lunas</b>
        		@else
            	<b class="text-red">Belum Lunas</b>
        		@endif
    		</li>
		</ul>
	</div>
</div>