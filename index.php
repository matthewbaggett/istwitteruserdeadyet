<html>
  <?php
    require_once("config.php");
  ?>
  <head>
    <title>Is <?=$alias?$alias:$username?> Dead Yet?</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <style>
      body{
        background-color: #DDDDDD;
      }
      .deadyet{
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        font-size: 40px;
        text-align: center;
        position: absolute;
        top: 50%;
        margin-top: -30px;

      }
    </style>
  </head>
  <body>
    <div class="deadyet">No. Sadly.</div>
  </body>
</html>
