<form @submit.prevent="updateItem(itemEdicion.id)" class="modal fade" id="edit" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" method="POST">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: inline-block">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editLabel" v-text="modal.title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div v-if="itemEdicion.id !=''" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12"  >
                        <label for="item">Actualizar Tarea : <span class="text-info" v-text="itemEdicion.item"></span> </label>
                        <input type="text" class="form-control" v-model="itemEdicion.item">
                        <span v-for="error in errors" class="text-danger" v-text="error"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-outline-grey" data-dismiss="modal" >Cancelar</button>
                <button type="submit"  class="btn btn-info" value="Actualizar">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</form>