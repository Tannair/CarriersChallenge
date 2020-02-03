<!-- Modal -->
<div class="modal fade" id="modalFiltrarFuncs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFuncLabel">Relatório dos Funcionários </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="offset-3 col-md-6">
                        <label for="">Escolha o relatório que deseja</label>
                        <select name="" class="form-control input" id="selectTiposRelatorio">
                            <option value="">Selecione...</option>
                            <option value="SM">Total do Sexo Masculino</option>
                            <option value="SF">Total do Sexo Feminino</option>
                            <option value="MI">Média de Idade</option>
                            <option value="IMN">Funcionário mais novo</option>
                            <option value="IMV">Funcionário mais velho</option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="row" id="cardResultReport" style="display: none">
                    <div class="offset-2 col-md-8">
                        <!-- small box -->
                        <div class="small-box text-center">
                            <div class="inner">
                                <h4></h4>
                                <p></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab1-loading overlay loadModal" style="display: none"></div>
                <div class="tab1-loading loading-img loadModal" style="display: none"></div>
            </div>
        </div>
    </div>
</div>