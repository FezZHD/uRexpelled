<form action="phpWorking/restorePassword.php?id={ID}" method="POST">
  <div class="modal-body">
  <div class="form-group">
    <label for="recipient-name" class="control-label">Пароль:</label>
    <input class="form-control" name="password" type="password">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="control-label">Повторите пароль:</label>
    <input class="form-control" name="repeat_password" type="password">
  </div>
</div>
<input type="submit" id="restore" style="margin-top: 10px;" value="Востановить" class="btn btn-primary"></input>
</form>
