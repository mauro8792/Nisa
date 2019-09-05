@section('title', 'Edit Sale')
<style>
    
.panel-default{
  border-color: transparent;
}

.panel-default>.panel-heading,
.panel{
  background-color: #e6e6e6; 
  border:0 none;
  box-shadow:none;
}

.panel-default>.panel-heading+.panel-collapse .panel-body{
  background: #fff;
  color: #858586;
}

.panel-body{
  padding: 20px 20px 10px;
}

.panel-group .panel+.panel{
  margin-top: 0;
  border-top: 1px solid #d9d9d9;
}

.panel-group .panel{
  border-radius: 0;
}

.panel-heading{
  border-radius: 0;
}

.panel-title>a{
  color: #4e4e4e;
}

</style>
@section('content')
    <div class="container">
      	<div class="row centered-form">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
			    	
					<form  method="POST" action="#">
						<div class="row">
			    			<div class="col-md-2" style="margin-left: 60px">
			    				<br>
			    				<div class="form-group">
									<label>Fecha</label>
									<input type="date" style="width: 140px" name="fechaPed" id="fechaPed">
									<br><br>
			    				</div>
			    			</div>
			    			<br>
			    			<div class="col-md-2" style="margin-left: 20px">
			    				<div class="form-group">
									<label>Cliente</label>
									<input type="text" style="width: 180px" name="clienteNom" id="clienteNom">
									<br><br>
			   					</div>
			   				</div>
			    			<div class="col-md-2" style="margin-left: 70px">
			    				<div class="form-group">
									<label for="sucursal">Sucursal</label>
									<select name="idSucursal" id="idSucursal" style="height: 25px; width: 250px">
										<option value=""></option>
										
									
									  		
									  	
									</select>
			   					</div>
			   				</div>
			   				<br>
			   				<div class="col-md-2" style="margin-left: 150px">
			    				<div class="form-group">
									<input type="submit" class="btn btn-primary btn-block" value="Aplicar" style="width: 100px">
			   					</div>
			   				</div>
			   			</div>
					</form>
				</div>
			</div>
		</div>
	</div>    

@endsection