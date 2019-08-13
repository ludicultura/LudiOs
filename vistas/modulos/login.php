<div class="contenedorFormulario">
  <form class="formularioLogin" action="" method="post">
    <div class="form-group">
      <label for="loginEmail">Email</label>
      <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="loginPassword">Password</label>
      <input type="password" class="form-control" id="loginPassword" placeholder="Password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" id="btnLogin">Submit</button>
    <a href="?page=1" class="btn btn-primary">ir a Formulario</a>
  </form>
  <div id="loginDivErrors" class="alert alert-danger" role="alert"><a href="#">[X]</a><ul id="loginErrors"></ul></div>
</div>
