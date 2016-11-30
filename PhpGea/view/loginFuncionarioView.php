<form method="post" action="loginFuncionario.php" name="cneLoginFuncionario" class="form-horizontal formulario" >
    <div class="form-group">
        <label for="inputPartido1" class="col-sm-2 control-label">Funcionario</label>
        <div class="col-sm-10">
            <input  class="form-control" type="text" id="inputLogin" name="funcionarioLogin" maxlength="10" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPartido2" class="col-sm-2 control-label">Contraseña</label>
        <div class="col-sm-10">
            <input  class="form-control" type="password" id="inputPassword" name="funcionarioPassword" maxlength="11" required/>
        </div>
    </div>  
    <button type="submit" id="idButtonInsertar" name="nameButtonLoginFuncionario" class="btn btn-primary center-block">Aceptar</button>
</form>
