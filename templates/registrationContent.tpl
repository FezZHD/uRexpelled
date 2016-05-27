<form action="phpWorking/register.php" enctype="multipart/form-data" method="POST">
  <div class="modal-body">
  <div class="form-group">
    <label for="recipient-name" class="control-label">Ваше имя:</label>
    <input type="text" class="form-control" name="name">
  </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Логин:</label>
        <input type="text" class="form-control" name="login">
      </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Ваша почта:</label>
        <input type="text" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Пароль:</label>
        <input class="form-control" name="password" type="password">
      </div>
      <div class="form-group">
        <label for="recipient-name" class="control-label">Повторите пароль:</label>
        <input class="form-control" name="repeat_password" type="password">
      </div>
  </div>
  <input type="file" name="profileAvatarUpload" value="Добавить аватар" accept="image/*" сlass="btn btn-primary"></input>
  <input type="submit" id="registration" style="margin-top: 10px;" value="Зарегистрировать"  class="btn btn-primary"></input>
  </form>
