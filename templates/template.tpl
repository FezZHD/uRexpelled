<!DOCTYPE html>
<html>
<head>
  <title>uRexpelled</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css">
  <script src="js/jquery-1.12.2.js" type="text/javascript"></script>
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

            <!-- {LOGIN}from here -->
          {LOGIN}
            <!-- to here -->
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

  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/scripts.js" type="text/javascript"></script>
</body>
</html>
