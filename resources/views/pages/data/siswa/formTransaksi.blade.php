<form action="/siswa/{{$model->id}}/transaksi/create" method="POST" autocomplete="off">
	@csrf

	<div class="form-group row">
		<label for="inputjenis_tagihan" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
		<div class="col-sm-12 spanerror">
			<select name="tagihan" id="inputjenis_tagihan" class="form-control form-control-sm" {{ count($tagihan) == 0 ? 'disabled' : '' }} required="">
				@if(count($tagihan) == 0)                     
				<option>Pilihan tidak ada</option>
				@else                     
					<option value="">Silahkan Pilih</option>                      
					@foreach($tagihan as $value)      
					<option value="{{ $value->id }}" <?php if ($value->id == 0): ?> disabled <?php endif ?>>
						{{ $value->jenis_tagihan }} - {{ $value->bulan }} {{ $value->tahun }} - Rp. {{ number_format($value->nominal) }}
					</option>
					@endforeach
				@endif  
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputnohp" class="col-sm-4 form-control-label pt-0">Bayar</label>
		<div class="col-sm-12 spanerror">
			<input name="bayar" type="text" class="form-control form-control-sm" id="inputnohp" required="">
		</div>
	</div>
	
</form>