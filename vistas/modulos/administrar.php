<div class="contenedorConfiguracion">
  <div class="row panelConfiguracion">
    <div class="col-3">
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item" class="btnConf" onclick="cambiarDiv(1)">Crear Nuevo Perfil</li>
          <li class="list-group-item" class="btnConf" onclick="cambiarDiv(2)">Editar Perfil</li>
          <li class="list-group-item" class="btnConf" onclick="cambiarDiv(3)">Notificaciones</li>
        </ul>
      </div>
    </div>
    <div class="col-9">
      <div class="panelConfig">
        <div class="card border-primary">
          <h1 class="card-title bg-primary text-white text-center h1Registro" id="h1Registro">Nuevo Perfil</h1>
          <div class="divEditar">
            <form class="card-body" method="post">
              <div class="mb-3"><b>Datos personales</b></div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                <input type="text" id="registroNombre" class="form-control" placeholder="Nombre completo">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-tag"></i></span></div>
                <input type="text" id="registroNickname" class="form-control" placeholder="Nickname">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                <input type="text" id="registroTelefono" class="form-control" placeholder="Telefono">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                <input type="email" id="registroEmail" class="form-control" placeholder="Correo">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-clock"></i></span></div>
                <select class="form-control" id="registroSemestre">
                  <option disabled selected>(Seleccionar semestre)</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                </select>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-university"></i></span></div>
                <select class="form-control" id="registroUniversidad">
                  <option disabled selected>(Seleccionar universidad)</option>
                </select>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-graduation-cap"></i></span></div>
                <select class="form-control" id="registroFacultad">
                  <option disabled selected>(Seleccionar facultad)</option>
                </select>
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-book-open"></i></span></div>
                <select class="form-control" id="registroCarrera">
                  <option disabled selected>(Seleccionar carrera)</option>
                </select>
              </div>
              <div class="mb-3"><b>Datos de cuenta</b></div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-tag"></i></span></div>
                <input type="email" id="registroUsername" class="form-control" placeholder="Username">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
                <input type="password" id="registroPassword" class="form-control" placeholder="Password">
              </div>
              <div class="form-group input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
                <input type="password" id="registroPassword2" class="form-control" placeholder="Confirm password">
              </div>
              <div class="mb-3"><b>Datos del Ludi</b></div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="registroEsLudi">
                <label class="form-check-label" for="registroEsLudi">¿Es Ludi?</label>
              </div>
              <div class="divDatosLudi">
                <div class="form-group input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-users"></i></span></div>
                  <select class="form-control" id="registroComision" >
                    <option disabled selected>(Seleccionar comisión)</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                  <div class="dropdown">
                    <button class="btn border-secondary bg-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      (Seleccionar función)
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="registroFuncion"></div>
                  </div>
                </div>
                <label>Fecha de ingreso</label>
                <div class="form-group input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>
                  <input type="date" class="form-control" id="registroFecha" >
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend"><span class="input-group-text align-items-start"><i class="fas fa-comment"></i></span></div>
                  <textarea cols="30" rows="10" class="form-control" placeholder="Personalidad" id="registroPersonalidad" ></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" id="btnRegistrar">Registrar</button>
            </form>  
          </div>
        </div>
        <div class="divCambiar">
          <form class="card-body" method="post">
            <label>Ingresa la nueva contraseña</label>
            <div class="form-group input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
              <input type="password" name="" class="form-control" placeholder="Password">
            </div>
            <label>Repite la nueva contraseña</label>
            <div class="form-group input-group">              
              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
              <input type="password" name="" class="form-control" placeholder="Password">
            </div>
          </form>
        </div>
<<<<<<< HEAD
     </div>
     <button type="submit" class="btn btn-primary">Registrar</button>
    </form>  
    </div>
    <div class="divCambiar">
    <form>
      <div class="form-group input-group">
      <label>Ingresa la nueva contraseña</label>
          <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
          <input type="password" name="" class="form-control" placeholder="Password">
        </div>
        <div class="form-group input-group">
        <label>Repite la nueva contraseña</label>
          <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
          <input type="password" name="" class="form-control" placeholder="Password">
        </div>
    </form>
    </div>
    <div class="divNotificacion"></div>
    
  </div>
</div>
=======
        <div class="divNotificacion"></div>
      </div>
>>>>>>> Alberto
    </div>
  </div>
  <div id="loginDivErrors" class="alert alert-danger" role="alert"><a href="#">[X]</a><ul id="loginErrors"></ul></div>
</div>

