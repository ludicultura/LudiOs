<div class="contenedorBitacoras">
  <div class="elegir">
    <button class="btn btn-primary" onclick="btnSubirBitacora()">Subir Bitácora</button>
    <button class="btn btn-primary" onclick="btnEvaluarBitacora()">Evaluar Bitácora</button>
  </div>
  
  <div class="card border-primary subir-bitacora">
    <h1 class="card-title bg-primary text-center text-white" id="bitacorasSemana">Semana</h1>
    <div class="card-body">
      <div class="dropzone">
        <div class="form-group fallback">
          <input type="file" name="bitacora" id="bitacora" class="form-control" multiple>
        </div>
      </div>
      <div class="form-group text-center mt-4"><button class="btn btn-success" id="btnSubir">Subir Bitácora</button></div>
    </div>
  </div>

  <div class="historial">
    <h1>Historial</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Semana</th>
          <th scope="col">Archivo</th>
          <th scope="col">Fecha</th>
          <th scope="col">Link</th>
          <th scope="col">Evaluación</th>
          <th scope="col">Comentarios</th>
        </tr>
      </thead>
      <tbody id="historial">
      </tbody>
    </table>
  </div>
  <div class="revision">
    <h1>Revisión</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Semana</th>
          <th scope="col">Ludi</th>
          <th scope="col">Fecha</th>
          <th scope="col">Link</th>
          <th scope="col">Evaluar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Alberto Algohehe</td>
          <td>12/05/2019</td>
          <td><a href="#" >Ver Bitácora</a></td>
          <td>
          <button class="btn btn-primary" data-toggle="modal" data-target="#evaluar">Evaluar</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Comentarios-->
<div class="modal fade" id="verComentarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="pComentarios">Comentario random</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Evaluar-->
<div class="modal fade" id="evaluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evaluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="div1">
      <label class="">Entregada:</label>
      <div class="btn-group ">
  
      <button type="button" class="btn btnEntrega"  id="si" onclick="entregado(1)">Si</button>
        <button type="button" class="btn btnEntrega" id="no" onclick="entregado(2)">No</button>
</div></div>
<div class="div2">
<label class="">Puntos Extras:</label>
<div>
<label class="">Valor:</label><input class="" type="text"><br>
<label class="">Valor:</label><input class="" type="text"><br>
<label class="">Valor:</label><input class="" type="text"><br>
<label class="">Valor:</label><input class="" type="text"><br>
<label class="">Valor:</label><input class="" type="text"><br>
</div>

</div>
<div class="div3">
<label class="">Comentarios:</label><br>
<textarea></textarea>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>