<!DOCTYPE html>
<html>
<head>
  <title>uRexpelled</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div id="page">
    <header>
      <div class="header">
        <div class="middle">
          <div class="top_logo">
            <a href="/">uRexpelled</a>
          </div>
          <div class="top_menu">
          <div class="menu_opener"><i class="fa fa-bars"></i></div>
          <div class="top_login">
            <div class="top_login_icon"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><i class="fa fa-user"></i></div>
            <div class="top_login_panel">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Авторизация</h4>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="recipient-name" class="control-label">Логин:</label>
                          <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="control-label">Пароль:</label>
                          <input class="form-control" id="recipient-password" type="password">
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default">Регистрация</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                      <button type="button" class="btn btn-primary">Вход</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <nav>
              <div class="menu_overflow">
                <ul class="menu">
                  {MENU_SELECTED}
                </ul>
            </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div style="clear:both;"></div>
    <div id="page_body">
      <div class="middle middle_content">
        <div class="content page_content">
          {CONTENT}
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="middle">
        <p class="text-muted">(C) Copyright by FezZ.</p>
      </div>
    </footer>
  </div>

  <script src="js/jquery-1.12.2.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/scripts.js" type="text/javascript"></script>
</body>
</html>
