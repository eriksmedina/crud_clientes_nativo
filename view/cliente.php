<div class="container container-customer mt-2" name="container-customer"  id="container-customer" style="display: none;" >	
    <form method="POST" id="infoCustomer_form" name ='infoCustomer_form' enctype="multipart/form-data">
    	<div class="title text-center">
            <img src="image/Logo.png" class="rounded mx-auto d-block" alt="Andes">
    		<h4><u>1. Datos del Cliente</u></h4>
    	</div>
    	<fieldset>					
    		<div class="row">
    			<div class="col-md-4">
    				<div class="form-group">
    					<label for="names" class="control-label">
    						Nombres (*):
    					</label>
    					<input type="text" class="form-control" name="names" id="names" >
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="form-group">
    					<label for="lastname" class="control-label">
    						Apellidos (*):
    					</label>
    					<input type="text" class="form-control" name="lastname" id="lastname" >
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="form-group">
    					<label for="tlf" class="control-label">
    						Teléfono (*):
    					</label>
    					<input type="tel" class="form-control" name="tlf" id="tlf" >
    				</div>
    			</div>
    			
    		</div>
    		<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="control-label">
                            Email (*):
                        </label>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email" >
                        </div>
                    </div>
                </div>    			
    			<div class="col-md-6">
    				<div class="form-group">
    					<label for="population" class="control-label">
    						Población:
    					</label>
    					<input type="text" class="form-control" name="population" id="population" >
    				</div>
    			</div>
    		</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address" class="control-label">
                            Dirección(*):
                        </label>
                        <input type="text" class="form-control" name="address" id="address" >
                    </div>
                </div>
            </div>
    		<div class="row">
    			<div class="col-md-3 col-sm-4 ml-auto">
                    <button type="submit" class="btn btn-primary" style="margin: 5px;" >Guardar</button>
                    <button type="button" class="btn btn-danger" id="cancel">Cancelar</button>
    				
    			</div>
    		</div>
            <input type="hidden" id="task" name="task" value="new">
    	</fieldset>
    </form>
</div>

