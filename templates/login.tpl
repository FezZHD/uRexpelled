 <div class="top_login_icon"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><i class="fa fa-user"></i></div>
  <div class="top_login_panel">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Авторизация</h4>
          </div>
          <form id="login" action="phpWorking/auth.php" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Логин:</label>
                <input type="text" class="form-control" name="login">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Пароль:</label>
                <input class="form-control" name="password" type="password">
              </div>
          </div>
        </form>
          <div class="modal-footer">
            <input type="submit" onclick='location.href="forgotPassword.php"' value="Забыли пароль" class="btn btn-default"/>
            <input type="submit" onclick="location.href='registration.php'" class="btn btn-default" value="Регистрация"/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <input type="submit" id="loginAccept" value="Вход" form="login" class="btn btn-primary"/>
          </div>
        </div>
      </div>
    </div>
  </div>
