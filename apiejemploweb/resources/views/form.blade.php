<input required type="text" name="name" placeholder="name" 
value="{{isset($pokemon[0]['name'])?$pokemon[0]['name']:old('name')}}">
{!! $errors->first('name','<p style="color:red">Campo requerido*</p>') !!}
<button type="submit">Enviar</button>