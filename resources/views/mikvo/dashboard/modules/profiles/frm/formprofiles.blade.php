<head>
    <style>
        .non-selectable {
        -moz-user-select: none; 
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none; 
        }
        
    </style>    
    
  <script type="text/javascript">
    function deshabilitar(){      
        $(document).ready(function(){
	        $('#typet_profile').change(function(){
                if ($('#typet_profile').val() === "nada") {
                    $("#expireda_profiles").prop('disabled', false);
                    $("#expiredho_profiles").prop('disabled', false);
                } else if($('#typet_profile').val()  === "Corrido"){
                    $("#expireda_profiles").prop('disabled', true);
                    $("#expiredho_profiles").prop('disabled', true);
                }else if($('#typet_profile').val()  === "Pausado"){
                    $("#expireda_profiles").prop('disabled', false);
                    $("#expiredho_profiles").prop('disabled', false);
                }      
	        });
        });
    }
  </script>
</head>
    
@if ( !empty ( $profiles->id) )
<div class="row">
<div class="col-sm-10 col-md-6 col-lg-6">
       <div class="form-group">
          <label for="name_profile">Nombre:</label>
          <input 
             id="name_profile"
             type="text" 
             class="form-control" 
             name="name_profile"
             required
             value="{{ $profiles->name_profile}}"
             placeholder="Ingresa el nombre de perfil" 
             >
       </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="addpool_profile">Addres Pool:</label>
        <select class="form-control" required name="addpool_profile" id="addpool_profile">
                <option value="none">Ninguno</option>
                <?php $TotalReg = count($getpool);
                for ($i = 0; $i < $TotalReg; $i++) {

                echo "<option>" . $getpool[$i]['name'] . "</option>";
                }
                ?> 
                
              </select>
        </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="cost_profile">Costo:</label>
           <input 
              id="cost_profile"
              type="text" 
              class="form-control" 
              name="cost_profile"
              required
              value="{{ $profiles->cost_profile}}"
              placeholder="Ingresa el costo" 
              min="1"
              >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="sprice_profile">Precio de venta:</label>
           <input 
              id="sprice_profile"
              type="text" 
              class="form-control" 
              name="sprice_profile"
              required
              value="{{ $profiles->sprice_profile}}"
              placeholder="Ingresa el costo" 
              min="1"
              >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="sharedu_profile">Usuarios compartidos:</label>
           <input 
              id="sharedu_profile"
              type="number" 
              class="form-control" 
              name="sharedu_profile"
              required ="1"
              value="{{ $profiles->sharedu_profile}}"
              placeholder="Debe ser 1" 
              min="1"
              >
        </div>
     </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align:center"> 
    <label for="vsubida_profile">Velocidad de subida:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="vsubida_profile"
            type="number" 
            class="form-control" 
            name="vsubida_profile"
            required
            value="{{ $profiles->vsubida_profile}}"
            placeholder="Ingresa la velocidad de subida"
            min="1"
            >
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <select class="form-control" required name="sbyte_profile" id="sbyte_profile">
                <option > Elige una opción</option>
                <option value="K" @if ($profiles->sbyte_profile=="K" ) selected @endif >KB</option>
                <option value="M" @if ($profiles->sbyte_profile=="M" ) selected @endif >MB</option>
                <option value="G" @if ($profiles->sbyte_profile=="G" ) selected @endif >GB</option>
              </select>
        </div>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align:center"> 
    <label for="vdescarga_profile">Velocidad de descarga:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="vdescarga_profile"
            type="number" 
            class="form-control" 
            name="vdescarga_profile"
            required
            value="{{ $profiles->vdescarga_profile}}"
            placeholder="Ingresa la velocidad de descarga"
            min="1"
            >
        </div>
        </div>
        <br>
        <div class="col-md-6">
        <div class="form-group">
            <select class="form-control"  required name="dbyte_profile" id="dbyte_profile">
                <option selected> Elige una opción</option>
                <option value="K">KB</option>
                <option value="M">MB</option>
                <option value="G">GB</option>
              </select>
        </div>
    </div>
    </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="expmode_profile">Modo de expiración</label>
        <select class="form-control" onchange="RequiredV();" id="expmode_profile" name="expmode_profile" required="1">
        <option value="">Selecciona un modo de expiración</option>
        <option value="0">Ninguno</option>
        <option value="rem">Eliminar</option>
        <option value="ntf">Avisar</option>
        <option value="remc">Eliminar & Registrar</option>
        <option value="ntfc">Avisar & Registrar</option>
      </select>
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="validation_profile">Validación:</label>
           <input 
            id="validation_profile"
            type="text" 
            class="form-control" 
            name="validation_profile"
            required
            value="{{ $profiles->validation_profile}}"
            placeholder="Ejemplo: 1d, 5m"
            min="1"
            >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="gracep_profile">Tiempo de espera:</label>
           <input 
            id="gracep_profile"
            type="text" 
            class="form-control" 
            name="gracep_profile"
            required
            value="{{ $profiles->gracep_profile}}"
            placeholder="Ejemplo: 1d, 5m"
            min="1"
            >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="typet_profile">Tipo de tiempo:</label>
           <select class="form-control" name="typet_profile" id="typet_profile" onclick="deshabilitar()">
            <option value ="nada" selected>Seleciona un tipo de tiempo</option>
            <option value="Corrido">Corrido</option>
            <option value="Pausado">Pausado</option>
          </select>
        </div>
     </div>
     <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align: center">
    <label for="limitda_profiles">Limite de tiempo:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="limitda_profiles"
            type="number" 
            class="form-control" 
            name="limitda_profiles"
            required
            value="{{ $profiles->limitda_profiles}}"
            placeholder="Días"
            min="1"
            >
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="limitho_profiles"
            type="time"
            class="form-control" 
            name="limitho_profiles"
            step="1"
            value="{{ $profiles->limitho_profiles}}"
            placeholder="Horas, minútos y/o segundos"
            >
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align: center">
    <label for="expireda_profiles">Voucher expira en:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="expireda_profiles"
            type="number" 
            class="form-control" 
            name="expireda_profiles"
            required
            value="{{ $profiles->expireda_profiles}}"
            placeholder="Días"
            min="1"
            >
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="expiredho_profiles"
            type="time"
            class="form-control" 
            name="expiredho_profiles"
            step="1"
            value="{{ $profiles->expiredho_profiles}}"
            placeholder="Horas, minútos y/o segundos"
            >
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="cuttime_profile">Desconectar en:</label>
           <input 
            id="cuttime_profile"
            type="time" 
            class="form-control" 
            name="cuttime_profile"
            step="1"
            value="{{ $profiles->cuttime_profile}}"
            placeholder="Ingresa la velocidad de subida"
            >
        </div>
     </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label class="non-selectable" for="lockuser_profile">Bloqueo de usuario:</label>
        <select class="form-control" id="lockuser_profile" name="lockuser_profile" required="1">
        <option value="Disable">Desactivado</option>
        <option value="Enable">Activado</option>
      </select>
        </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label class="non-selectable" for="parentq_profiles">Parent Queue:</label>
        <select class="form-control" id="parentq_profiles" name="parentq_profiles">
        <option value="none">Ninguno</option>
        <?php $TotalReg = count($getallqueue);
        for ($i = 0; $i < $TotalReg; $i++) {

          echo "<option>" . $getallqueue[$i]['name'] . "</option>";
        }
        ?>
      </select>
        </div>
    </div>  
</div>
@else
<div class="row">
<div class="col-sm-10 col-md-6 col-lg-6">
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
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="addpool_profile">Addres Pool:</label>
        <select class="form-control" required name="addpool_profile" id="addpool_profile">
                <option value="none">Ninguno</option>
                <?php $TotalReg = count($getpool);
                for ($i = 0; $i < $TotalReg; $i++) {

                echo "<option>" . $getpool[$i]['name'] . "</option>";
                }
                ?> 
                
              </select>
        </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="cost_profile">Costo:</label>
           <input 
              id="cost_profile"
              type="text" 
              class="form-control" 
              name="cost_profile"
              required
              placeholder="Ingresa el costo" 
              min="1"
              >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="sprice_profile">Precio de venta:</label>
           <input 
              id="sprice_profile"
              type="text" 
              class="form-control" 
              name="sprice_profile"
              required
              placeholder="Ingresa el costo" 
              min="1"
              >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="sharedu_profile">Usuarios compartidos:</label>
           <input 
              id="sharedu_profile"
              type="number" 
              class="form-control" 
              name="sharedu_profile"
              required ="1"
              value ="1"
              placeholder="Debe ser 1" 
              min="1"
              >
        </div>
     </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align:center"> 
    <label for="vsubida_profile">Velocidad de subida:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
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
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <select class="form-control" required name="sbyte_profile" id="sbyte_profile">
                <option selected> Elige una opción</option>
                <option value="K">KB</option>
                <option value="M">MB</option>
                <option value="G">GB</option>
              </select>
        </div>
    </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align:center"> 
    <label for="vdescarga_profile">Velocidad de descarga:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
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
        </div>
        <br>
        <div class="col-md-6">
        <div class="form-group">
            <select class="form-control"  required name="dbyte_profile" id="dbyte_profile">
                <option selected> Elige una opción</option>
                <option value="K">KB</option>
                <option value="M">MB</option>
                <option value="G">GB</option>
              </select>
        </div>
    </div>
    </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="expmode_profile">Modo de expiración</label>
        <select class="form-control" onchange="RequiredV();" id="expmode_profile" name="expmode_profile" required="1">
        <option value="">Selecciona un modo de expiración</option>
        <option value="0">Ninguno</option>
        <option value="rem">Eliminar</option>
        <option value="ntf">Avisar</option>
        <option value="remc">Eliminar & Registrar</option>
        <option value="ntfc">Avisar & Registrar</option>
      </select>
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="validation_profile">Validación:</label>
           <input 
            id="validation_profile"
            type="text" 
            class="form-control" 
            name="validation_profile"
            required
            placeholder="Ejemplo: 1d, 5m"
            min="1"
            >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="gracep_profile">Tiempo de espera:</label>
           <input 
            id="gracep_profile"
            type="text" 
            class="form-control" 
            name="gracep_profile"
            required
            placeholder="Ejemplo: 1d, 5m"
            min="1"
            >
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="typet_profile">Tipo de tiempo:</label>
           <select class="form-control" name="typet_profile" id="typet_profile" onclick="deshabilitar()">
            <option value ="nada" selected>Seleciona un tipo de tiempo</option>
            <option value="Corrido">Corrido</option>
            <option value="Pausado">Pausado</option>
          </select>
        </div>
     </div>
     <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align: center">
    <label for="limitda_profiles">Limite de tiempo:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="limitda_profiles"
            type="number" 
            class="form-control" 
            name="limitda_profiles"
            required
            placeholder="Días"
            min="1"
            >
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="limitho_profiles"
            type="time"
            class="form-control" 
            name="limitho_profiles"
            step="1"
            placeholder="Horas, minútos y/o segundos"
            >
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-md-12" style="text-align: center">
    <label for="expireda_profiles">Voucher expira en:</label>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="expireda_profiles"
            type="number" 
            class="form-control" 
            name="expireda_profiles"
            required
            placeholder="Días"
            min="1"
            >
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <input 
            id="expiredho_profiles"
            type="time"
            class="form-control" 
            name="expiredho_profiles"
            step="1"
            placeholder="Horas, minútos y/o segundos"
            >
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="cuttime_profile">Desconectar en:</label>
           <input 
            id="cuttime_profile"
            type="time" 
            class="form-control" 
            name="cuttime_profile"
            step="1"
            placeholder="Ingresa la velocidad de subida"
            >
        </div>
     </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label class="non-selectable" for="lockuser_profile">Bloqueo de usuario:</label>
        <select class="form-control" id="lockuser_profile" name="lockuser_profile" required="1">
        <option value="Disable">Desactivado</option>
        <option value="Enable">Activado</option>
      </select>
        </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label class="non-selectable" for="parentq_profiles">Parent Queue:</label>
        <select class="form-control" id="parentq_profiles" name="parentq_profiles">
        <option value="none">Ninguno</option>
        <?php $TotalReg = count($getallqueue);
        for ($i = 0; $i < $TotalReg; $i++) {

          echo "<option>" . $getallqueue[$i]['name'] . "</option>";
        }
        ?>
      </select>
        </div>
    </div>  
</div>
@endif
<hr>
<button type="submit" style="margin-right: 5px;" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Guardar</button>
<a href="{{ route('/dashboard/profiles') }}" class="btn btn-warning">Cancelar</a>