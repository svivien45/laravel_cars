<fieldset>
		<label for="maker_id">Gyártó</label>
		<select name="maker_id" id="select-maker" title="Gyártók">
			<option value="0">-- Válassz gyártót --</option>
			@foreach($makers as $maker)
				<option value="{{ $maker->id }}">{{ $maker->name }}</option>
			@endforeach
		</select>
	</fieldset>
	<fieldset>
		<label for="model_id">Model</label>
		<select name="model_id" id="select-model"  title="Modellek">
			<option value="0">-- Válassz modelt --</option>
			@foreach($models as $model)
				<option value="{{ $model->id }}">{{ $model->name }}</option>
			@endforeach
		</select>
	</fieldset>