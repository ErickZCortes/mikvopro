<head>
    <style>
        .non-selectable {
        -moz-user-select: none; 
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none; 
        }
        .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }
    </style>    
    <script type="text/javascript">
   document.getElementById("settime").value = "13:24:00";    
  </script>
</head>
    
@if ( !empty ( $profiles->id) )
<div class="row">
    <div class="col-sm-10 col-md-3 col-lg-3">
       <div class="form-group">
           <label for="name_profile">Nombre:</label>
           <input 
           id="name_profile"
           type="text" 
           class="form-control" 
           name="name_profile"
           required
           value="{{ $profiles->name_profile}}"
           placeholder="Ingresa el nombre del perfil" 
           >
       </div>
    </div>
    <div class="col-sm-10 col-md-3 col-lg-3">
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
    <div class="col-sm-10 col-md-3 col-lg-3">
        <div class="form-group">
            <label for="cost_profile">Costo:</label>
            <input 
            id="cost_profile"
            type="number" 
            class="form-control" 
            name="cost_profile"
            required
            value="{{ $profiles->cost_profile }}"
            placeholder="Ingresa el costo"
            min="1"
            >
        </div>
    </div>
    <div class="col-sm-10 col-md-3 col-lg-3">
        <div class="form-group">
           <label for="typet_profile">Tipo de tiempo:</label>
           <select class="form-control" name="typet_profile" id="typet_profile">
            <option selected>Seleciona un tipo de tiempo</option>
           <option value="Corrido" @if ($profiles->typet_profile=="Corrido" ) selected @endif
            >Corrido</option>
            <option value="Pausado" @if ($profiles->typet_profile=="Pausado" ) selected @endif>Pausado</option>
          </select>
        </div>
     </div>
    <div class="row col-md-6">
       <div class="col-md-6">
           <label for="vsubida_profile">Velocidad de subida:</label>
           <input 
           id="vsubida_profile"
           type="number" 
           class="form-control" 
           name="vsubida_profile"
           required
           value="{{ $profiles->vsubida_profile }}"
           placeholder="Ingresa la velocidad de subida"
           min="1"
           >
       </div>
        <div class="col-md-6">
            <label class="non-selectable" for="sbyte_profile" style="color: transparent;">Tipo de velocidad:</label>
            <select class="form-control" name="sbyte_profile" id="sbyte_profile">
                <option selected> Elige una opción</option>
                <option value="KB" @if ($profiles->sbyte_profile=="KB" ) selected @endif>KB</option>
                <option value="MB" @if ($profiles->sbyte_profile=="MB" ) selected @endif>MB</option>
                <option value="GB" @if ($profiles->sbyte_profile=="GB" ) selected @endif>GB</option>
            </select>
        </div>
    </div>

    <div class="row col-md-6">
        <div class="col-md-6">
            <label for="vdescarga_profile">Velocidad de descarga:</label>
            <input 
            id="vdescarga_profile"
            type="number" 
            class="form-control" 
            name="vdescarga_profile"
            required
            value="{{ $profiles->vdescarga_profile }}"
            placeholder="Ingresa la velocidad de descarga"
            min="1"
            >
        </div>
        <div class="col-md-6">
            <label class="non-selectable" for="dbyte_profile" style="color: transparent;">Velocidad de subida:</label>
            <select class="form-control" name="dbyte_profile" id="dbyte_profile">
                <option selected> Elige una opción</option>
                <option value="KB"@if ($profiles->dbyte_profile=="KB" ) selected @endif>KB</option>
                <option value="MB"@if ($profiles->dbyte_profile=="MB" ) selected @endif>MB</option>
                <option value="GB" @if ($profiles->dbyte_profile=="GB" ) selected @endif>GB</option>
            </select>
        </div>
    </div>
    
    <div class="row col-md-6">
       <div class="col-md-6">
            <label for="limitda_profiles">Límite de tiempo:</label>
            <input 
            id="limitda_profiles"
            type="number" 
            class="form-control" 
            name="limitda_profiles"
            required
            value="{{ $profiles->limitda_profiles }}"
            placeholder="Ingresa el limite de tiempo"
            min="1"
            >
       </div>
    <div class="col-md-6">
        <label class="non-selectable" for="limitho_profiles" style="color: transparent;">Velocidad de subida:</label>
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
    </div>

    <div class="row col-md-6">
       <div class="col-md-6">
           <label for="expireda_profiles">Voucher Expiración:</label>
           <input 
           id="expireda_profiles"
           type="number" 
           class="form-control" 
           name="expireda_profiles"
           required
           value="{{ $profiles->expireda_profiles }}"
           placeholder="Ingresa la velocidad de subida"
           min="1"
           >
       </div>
       <div class="col-md-6">
        <label class="non-selectable" for="expiredho_profiles" style="color: transparent;">Velocidad de subida:</label>
           <input 
           id="expiredho_profiles"
           type="time" 
           class="form-control" 
           name="expiredho_profiles"
           required
           value="{{ $profiles->expiredho_profiles }}"
           placeholder="Ingresa la velocidad de subida"
           >
       </div>
    </div>
    <div class="col-md-2">
       <div class="form-group">
           <label for="cuttime_profile">Desconectar en:</label>
           <input 
           id="cuttime_profile"
           type="time" 
           class="form-control" 
           name="cuttime_profile"
           required
           value="{{ $profiles->cuttime_profile }}"
           placeholder="Ingresa el tiempo de desconexión" 
           >
       </div>
    </div>
</div>      
@else
<div class="row">
    <div class="col-sm-10 col-md-3 col-lg-3">
       <div class="form-group">
          <label for="name_profile">Nombre:</label>
          <input 
             id="name_profile"
             type="text" 
             class="form-control" 
             name="name_profile"
             required
             placeholder="Ingresa el nombre de perfil" 
             >
       </div>
    </div>
    <div class="col-sm-10 col-md-3 col-lg-3">
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
    <div class="col-sm-10 col-md-3 col-lg-3">
        <div class="form-group">
           <label for="cost_profile">Costo:</label>
           <input 
              id="cost_profile"
              type="number" 
              class="form-control" 
              name="cost_profile"
              required
              placeholder="Ingresa el costo" 
              min="1"
              >
        </div>
     </div>
     <div class="col-sm-10 col-md-3 col-lg-3">
        <div class="form-group">
           <label for="typet_profile">Tipo de tiempo:</label>
           <select class="form-control" name="typet_profile" id="typet_profile">
            <option selected>Seleciona un tipo de tiempo</option>
            <option value="Corrido">Corrido</option>
            <option value="Pausado">Pausado</option>
          </select>
        </div>
     </div>

    <div class="row col-md-6">
        <div class="col-md-6">
            <label for="vsubida_profile">Velocidad de subida:</label>
            <input 
            id="vsubida_profile"
            type="number" 
            class="form-control" 
            name="vsubida_profile"
            required
            placeholder="Ingresa la velocidad de subida"
            min="1"
            >
        </div>
        <div class="col-md-6">
            <label class="non-selectable" for="sbyte_profile" style="color: transparent;">Tipo de velocidad:</label>
            <select class="form-control" name="sbyte_profile" id="sbyte_profile">
                <option selected> Elige una opción</option>
                <option value="KB">KB</option>
                <option value="MB">MB</option>
                <option value="GB">GB</option>
              </select>
        </div>
    </div>
<br>
    <div class="row col-md-6">
        <div class="col-md-6">
            <label for="vdescarga_profile">Velocidad de descarga:</label>
            <input 
            id="vdescarga_profile"
            type="number" 
            class="form-control" 
            name="vdescarga_profile"
            required
            placeholder="Ingresa la velocidad de descarga"
            min="1"
            >
        </div>
        <div class="col-md-6">
            <label class="non-selectable" for="dbyte_profile" style="color: transparent;">Velocidad de subida:</label>
            <select class="form-control" name="dbyte_profile" id="dbyte_profile">
                <option selected> Elige una opción</option>
                <option value="KB">KB</option>
                <option value="MB">MB</option>
                <option value="GB">GB</option>
              </select>
        </div>
    </div>
    
     <div class="row col-md-6">
        <div class="col-md-6">
            <label for="limitda_profiles">Limite de tiempo:</label>
            <input 
            id="limitda_profiles"
            type="number" 
            class="form-control" 
            name="limitda_profiles"
            required
            placeholder="Ingresa el limite de tiempo"
            min="1"
            >
        </div>
        <div class="col-md-6">
            <label class="non-selectable" for="limitho_profiles" style="color: transparent;">Limite horas:</label>
            <input class="form-control"  id="settime" type="time" step="1" />
        </div>
    </div>
    <div class="row col-md-6">
        <div class="col-md-6">
            <label for="expireda_profiles">Voucher expira en:</label>
            <input 
            id="expireda_profiles"
            type="number" 
            class="form-control" 
            name="expireda_profiles"
            required
            placeholder="Ingresa la velocidad de subida"
            min="1"
            >
        </div>
        <div class="col-md-6">
            <label class="non-selectable" for="expiredho_profiles" style="color: transparent;">Velocidad de subida:</label>
            <input 
            id="expiredho_profiles"
            type="time" 
            class="form-control" 
            name="expiredho_profiles"
            
            placeholder="Ingresa la velocidad de subida"
            >
        </div>
    </div>
    <div class="col-md-2">
            <label for="cuttime_profile">Desconectar en:</label>
            <input 
            id="cuttime_profile"
            type="time" 
            class="form-control" 
            name="cuttime_profile"
            required
            placeholder="Ingresa la velocidad de subida"
            >
    </div>
</div>
@endif
<hr>
<button type="submit" style="margin-right: 5px;" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Guardar</button>
<a href="{{ route('/dashboard/profiles') }}" class="btn btn-warning">Cancelar</a>