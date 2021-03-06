<div id="modal_Edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" role="document">
            <div class="modal-header bg-header-modal">
                <h4 class="modal-title">Edición de datos de Cliente </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                 <div class="container container-customer mt-2" name="container-customer"  id="container-customer" > 
                    <form method="POST" id="infoCustomer_form_edit" name ='infoCustomer_form_edit' enctype="multipart/form-data">
                        <div class="title text-center">
                            <img src="image/Logo.png" class="rounded mx-auto d-block" alt="Andes">
                            
                        </div>
                        <fieldset>                  
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="names_e" class="control-label">
                                            Nombres (*):
                                        </label>
                                        <input type="text" class="form-control" name="names_e" id="names_e" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastname_e" class="control-label">
                                            Apellidos (*):
                                        </label>
                                        <input type="text" class="form-control" name="lastname_e" id="lastname_e" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tlf" class="control-label">
                                            Teléfono (*):
                                        </label>
                                        <input type="tel" class="form-control" name="tlf_e" id="tlf_e" >
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_e" class="control-label">
                                            Email (*):
                                        </label>
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email_e" id="email_e" >
                                        </div>
                                    </div>
                                </div>              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="population_e" class="control-label">
                                            Población:
                                        </label>
                                        <input type="text" class="form-control" name="population_e" id="population_e" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address_e" class="control-label">
                                            Dirección(*):
                                        </label>
                                        <input type="text" class="form-control" name="address_e" id="address_e" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ml-auto">
                                    <button type="submit" class="btn btn-primary" style="margin: 5px;" >Editar</button>
                                    <button type="button" class="btn btn-danger" id="cancel_edit">Cancelar</button>
                                    
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="">
                            <input type="hidden" id="task" name="task" value="edit">
                        </fieldset>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <div class="">
                    <small>Andes SCD  &copy; - 2021</small>  
                </div> 
            </div>
        </div>
    </div>
</div>