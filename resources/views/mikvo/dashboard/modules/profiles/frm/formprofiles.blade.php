@if ( !empty ( $profiles->id) )
<div class="row">
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="name_profile">Nombre:</label>
           <input 
           id="name_profile"
           type="text" 
           class="form-control" 
           name="name_profile"
           required
           value="{{ $profiles->name_profile}}"
           placeholder="Ingresa un nombre" 
           >
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="addpool_profile">Dirección Pool:</label>
           <input 
           id="addpool_profile"
           type="text" 
           class="form-control" 
           name="addpool_profile"
           required
           value="{{ $profiles->addpool_profile }}"
           placeholder="Ingresa una dirección pool"
           >
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="vsubida_profile">Velocidad de subida:</label>
           <input 
           id="vsubida_profile"
           type="number" 
           class="form-control" 
           name="vsubida_profile"
           required
           value="{{ $profiles->vsubida_profile }}"
           placeholder="Ingresa la velocidad de subida"
           >
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <div class="form-group col-md-4">
               <select class="form-control" id="sbyte_profile">
               <option value="{{$profiles->sbyte_profile}}">Kb</option>
                   <option value="{{$profiles->sbyte_profile}}">Mb</option>
                   <option value="{{$profiles->sbyte_profile}}">Gb</option>
               </select>
           </div>
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
    <div class="form-group">
       <label for="vdescarga_profile">Velocidad de descarga:</label>
       <input 
          id="vdescarga_profile"
          type="number" 
          class="form-control" 
          name="vdescarga_profile"
          required
          value="{{ $profiles->vdescarga_profile }}"
          placeholder=""
          >
    </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <div class="form-group col-md-4">
               <select class="form-control" id="dbyte_profile">
               <option value="{{$profiles->dbyte_profile}}">Kb</option>
                   <option value="{{$profiles->dbyte_profile}}">Mb</option>
                   <option value="{{$profiles->dbyte_profile}}">Gb</option>
               </select>
           </div>
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="cost_profile">Costo:</label>
           <input 
           id="cost_profile"
           type="number" 
           class="form-control" 
           name="cost_profile"
           required
           value="{{ $profiles->cost_profile }}"
           placeholder=""
           >
       </div>
    </div>
   <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <div class="form-group col-md-4">
               <select class="form-control" id="typet_profile">
                   <option value="{{$profiles->typet_profile}}">Corrido</option>
                   <option value="{{$profiles->typet_profile}}">Pausado</option>
               </select>
           </div>
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="limitda_profiles">Límite de tiempo:</label>
           <input 
           id="limitda_profiles"
           type="number" 
           class="form-control" 
           name="limitda_profiles"
           required
           value="{{ $profiles->limitda_profiles }}"
           placeholder=""
           >
       </div>
       <div class="form-group col-md-1">
           <small>Dias</small>
       </div>
       <div class="form-group col-md-6">
           <input 
           id="limitho_profiles"
           type="time" 
           class="form-control" 
           name="limitho_profiles"
           required
           value="{{ $profiles->limitho_profiles }}"
           placeholder=""
           >
       </div>
       <div class="form-group col-md-2">
           <small>Horas</small>
       </div>
    </div>

    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="limitda_profiles">Voucher Expiración:</label>
           <input 
           id="expireda_profiles"
           type="number" 
           class="form-control" 
           name="expireda_profiles"
           required
           value="{{ $profiles->expireda_profiles }}"
           placeholder=""
           >
       </div>
       <div class="form-group col-md-1">
           <small>Dias</small>
       </div>
       <div class="form-group col-md-6">
           <input 
           id="expiredho_profiles"
           type="time" 
           class="form-control" 
           name="expiredho_profiles"
           required
           value="{{ $profiles->expiredho_profiles }}"
           placeholder=""
           >
       </div>
       <div class="form-group col-md-2">
           <small>Horas</small>
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
           <label for="cuttime_profile">Desconectar en:</label>
           <input 
           id="cuttime_profile"
           type="time" 
           class="form-control" 
           name="cuttime_profile"
           required
           value="{{ $profiles->cuttime_profile }}"
           placeholder="" 
           >
       </div>
    </div>
</div>      
@else
<div class="row">
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
          <label for="name_profile">Nombre:</label>
          <input 
             id="name_profile"
             type="text" 
             class="form-control" 
             name="name_profile"
             required
             placeholder="Ingresa el modelo" 
             >
       </div>
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
    <div class="form-group">
       <label for="addpool_profile">Dirección de pool:</label>
       <input 
          id="addpool_profile"
          type="text" 
          class="form-control" 
          name="addpool_profile"
          required
          placeholder="Ingresa la dirección de pool"
          >
    </div>
    </div>
    <div class="col-sm-10 col-md-2 col-lg-2">
        <label for="vsubida_profile">Velocidad de subida:</label>

    <div class="form-group">
       <input 
          id="vsubida_profile"
          type="number" 
          class="form-control" 
          name="vsubida_profile"
          required
          placeholder="Ingresa la velocidad de subida"
          >
    </div>
    <div class="form-group">
            <select class="form-control" id="sbyte_profile">
              <option>KB</option>
              <option>MB</option>
              <option>GB</option>
            </select>
    </div>
    </div>
    <div class="col-sm-10 col-md-2 col-lg-2">
    
    </div>
    <div class="col-sm-10 col-md-4 col-lg-4">
       <div class="form-group">
          <label for="vdescarga_profile">Velocidad de descarga:</label>
          <input 
             id="vdescarga_profile"
             type="text" 
             class="form-control" 
             name="vdescarga_profile"
             required
             placeholder="Ingresa la velocidad de descarga"
             >
       </div>
    </div>
    </div>
@endif
<button type="submit" style="margin-right: 5px;" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Guardar</button>
<a href="{{ route('/dashboard/profiles') }}" class="btn btn-warning">Cancelar</a>