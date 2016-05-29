<div class="profil_photo">
  <form  action="phpWorking/updateAvatar.php" enctype="multipart/form-data" method="POST">
    <img src="{IMAGE}" style="margin-bottom: 10px"/>
    <input type="file" name="update" accept="image/*" сlass="btn btn-primary"></input>
    <input type="submit" name="updateAvatar" style="margin-top: 10px;" value="Обновить аватар"  class="btn btn-primary"></input>
  </div>
  </form>
  <div class="profil_block">
    <div class="profil_title">
    {NAME}
    </div>
    <div class="profil_block_descr">
      <div class="profil_descr_item">
        <span class="profil_descr_title">Количество подач заявлений: </span>
        <span class="profil_descr_message">{COUNT}</span>
      </div>
      <form action="phpWorking/logout.php" method="POST">
        <div><input type="submit" name="logout" style="margin-top: 10px;" value="Выйти" class="btn btn-default"/></div>
      </form>
    </div>
  </div>
