<form method="post" action="changeFuncionario.php" id="formChangeFuncionario"></form>
<form method="post" action="insertarVotos.php" name="cneform" class="form-horizontal formulario" id="formularioVotos">
    <div class="form-group">
        <label for="inputFuncionarioName" class="col-sm-2 control-label">Funcionario</label>
        <div class="col-sm-10 input-group">
            <input readonly="true" class="form-control" type="text" id="inputFuncionarioName" name="funcionarioName" value="<?php echo $funcionario['name'] ?>" required/>
            <span class="input-group-btn">                
                <button class="btn btn-default" type="button" id="bthChangeFuncionario" onclick="document.getElementById('formChangeFuncionario').submit()"><span class="glyphicon glyphicon-refresh"></span></button>
            </span>            
            <input readonly="true" class="form-control" type="hidden" id="inputFuncionarioId" name="funcionarioId" value="<?php echo $funcionario['id'] ?>" required/>
        </div>
    </div>    
    <div class="form-group">
        <label for="inputCentroName" class="col-sm-2 control-label">Centro</label>
        <div class="col-sm-10 input-group">
            <input readonly="true" class="form-control" type="text" id="inputCentroName" name="centroName"  value="<?php echo $funcionario['centroName'] ?>" required/>
            <input readonly="true" class="form-control" type="hidden" id="inputCentroId" name="centroId"  value="<?php echo $funcionario['centroId'] ?>" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido1" class="col-sm-2 control-label">Partido #1</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido1" name="datos[candidato_1]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido2" class="col-sm-2 control-label">Partido #2</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido2" name="datos[candidato_2]" min="0" value="0" required/>
        </div>
    </div>    
    <div class="form-group">
        <label for="inputPartido3" class="col-sm-2 control-label">Partido #3</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido3" name="datos[candidato_3]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido4" class="col-sm-2 control-label">Partido #4</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido4" name="datos[candidato_4]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido5" class="col-sm-2 control-label">Partido #5</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido5" name="datos[candidato_5]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido6" class="col-sm-2 control-label">Partido #6</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido6" name="datos[candidato_6]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido7" class="col-sm-2 control-label">Partido #7</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido7" name="datos[candidato_7]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido8" class="col-sm-2 control-label">Partido #8</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido8" name="datos[candidato_8]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido9" class="col-sm-2 control-label">Partido #9</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido9" name="datos[candidato_9]" min="0" value="0" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido10" class="col-sm-2 control-label">Partido #10</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido10" name="datos[candidato_10]" min="0" value="0" required/>
        </div>
    </div>   
    <div class="form-group">
        <label for="inputPartido11" class="col-sm-2 control-label">Partido #11</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido11" name="datos[candidato_11]" min="0" value="0" required/>
        </div>
    </div>   
    <div class="form-group">
        <label for="inputPartido12" class="col-sm-2 control-label">Partido #12</label>
        <div class="col-sm-10 input-group">
            <input  class="form-control" type="number" id="inputPartido12" name="datos[candidato_12]" min="0" value="0" required/>
        </div>
    </div>    

    <button type="submit" id="idButtonInsertar" name="nameButtonInsertar" class="btn btn-primary center-block">Aceptar</button>
</form>
