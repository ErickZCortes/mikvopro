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
    function ttimechange(op) {
            if(op.value=="Corrido"){
                divI = document.getElementById("limittime");
                divI.style.display = "";
                divC = document.getElementById("expiretime");
                divC.style.display = "none";
                divD = document.getElementById("cuttime");
                divD.style.display = "none";
            }else if(op.value=="Pausado"){
                divC = document.getElementById("limittime");
                divC.style.display ="";
                divI = document.getElementById("expiretime");
                divI.style.display = "";
                divD = document.getElementById("cuttime");
                divD.style.display = "";
            }else if(op.value=="nada"){
                divC = document.getElementById("limittime");
                divC.style.display ="none";
                divI = document.getElementById("expiretime");
                divI.style.display = "none";
                divD = document.getElementById("cuttime");
                divD.style.display = "none";
            }
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
             maxlength="20"
             value="{{ $profiles->name_profile}}"
             placeholder="Ingresa el nombre de perfil" 
             >
       </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="addpool_profile">Addres Pool:</label>
        <select class="form-control" required name="addpool_profile" id="addpool_profile">
                <option value="none" @if ($profiles->addpool_profile=="none" ) selected @endif>Ninguno</option>
                @foreach($getpool as $pool)
                @if ($profiles->addpool_profile==$pool['name'] )
                <option selected>{{$pool['name']}}</option>
                @else
                <option >{{$pool['name']}}</option>

                 @endif
  
                @endforeach 
                
                
                
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
                <option value="K" @if ($profiles->dbyte_profile=="K" ) selected @endif >KB</option>
                <option value="M" @if ($profiles->dbyte_profile=="M" ) selected @endif >MB</option>
                <option value="G" @if ($profiles->dbyte_profile=="G" ) selected @endif >GB</option>
              </select>
        </div>
    </div>
    </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="expmode_profile">Modo de expiración</label>
        <select class="form-control" id="expmode_profile" name="expmode_profile" required="1">
        <option value="0"    @if ($profiles->expmode_profile=="0" ) selected @endif >Ninguno</option>
        <option value="rem"  @if ($profiles->expmode_profile=="rem" ) selected @endif >Eliminar</option>
        <option value="ntf"  @if ($profiles->expmode_profile=="ntf" ) selected @endif >Avisar</option>
        <option value="remc" @if ($profiles->expmode_profile=="remc" ) selected @endif >Eliminar & Registrar</option>
        <option value="ntfc" @if ($profiles->expmode_profile=="ntfc" ) selected @endif >Avisar & Registrar</option>
      </select>
        </div>
     </div>
     <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
           <label for="typet_profile">Tipo de tiempo:</label>
           <select class="form-control" name="typet_profile" id="typet_profile" onchange="ttimechange(this)">
            <option value ="nada" selected>Seleciona un tipo de tiempo</option>
            <option value="Corrido" @if ($profiles->typet_profile=="Corrido" ) selected @endif >Corrido</option>
            <option value="Pausado" @if ($profiles->typet_profile=="Pausado" ) selected @endif >Pausado</option>
          </select>
        </div>
     </div>
     <div class="col-md-6" id="limittime" style="display: none;">
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
            min="0"
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
    <div class="col-md-6" id="expiretime" style="display: none;">
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
    <div class="col-sm-10 col-md-6 col-lg-6" id="cuttime" style="display: none;">
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
             maxlength="20"
             placeholder="Ingresa el nombre de perfil" 
             >
       </div>
    </div>
    <div class="col-sm-10 col-md-6 col-lg-6">
        <div class="form-group">
        <label for="addpool_profile">Addres Pool:</label>
        <select class="form-control" required name="addpool_profile" id="addpool_profile">
                <option value="none">Ninguno</option>
                @foreach($getpool as $pool)
                <option value ="{{$pool['name']}}" >{{$pool['name']}}</option>  
                @endforeach 
                
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
        <select class="form-control" id="expmode_profile" name="expmode_profile" required="1">
        <option value="nada">Seleccione un modo de expiración</option>
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
           <label for="typet_profile">Tipo de tiempo:</label>
           <select class="form-control" name="typet_profile" id="typet_profile" onchange="ttimechange(this)">
            <option value ="nada" selected>Seleciona un tipo de tiempo</option>
            <option value="Corrido">Corrido</option>
            <option value="Pausado">Pausado</option>
          </select>
        </div>
     </div>
     <div class="col-md-6" id="limittime" style="display: none;">
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
            placeholder="Días"
            min="0"
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
    <div class="col-md-6" id="expiretime" style="display: none;">
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
            placeholder="Días"
            min="0"
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
    <div class="col-sm-10 col-md-6 col-lg-6" id="cuttime" style="display: none;">
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
</div>
@endif
<hr>
<button type="submit" style="margin-right: 5px;" class="btn btn-success btn-xs"><i class="fas fa-save"></i> Guardar</button>
<a href="{{ route('/dashboard/profiles') }}" class="btn btn-warning"> <i class="fas fa-ban"></i> Cancelar</a>