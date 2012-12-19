<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width">
  <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
  <!--[if IE]>
      <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Project name</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="span9">
        {{ $content }}
      </div>
      <div class="span3">
        <div id="change_month">
          <select>
            <option value="0">Gennaio</option>
            <option value="1">Febbraio</option>
            <option value="2">Marzo</option>
            <option value="3">Aprile</option>
            <option value="4">Maggio</option>
            <option value="5">Giugno</option>
            <option value="6">Luglio</option>
            <option value="7">Agosto</option>
            <option value="8">Settembre</option>
            <option value="9">Ottobre</option>
            <option value="10">Novembre</option>
            <option value="11">Dicembre</option>
          </select>
          <input type="text" value="2012" />
          <button class="btn">Ciao</button>
        </div>
      </div>
    </div>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script src="js/jquery.scrollTo-min.js"></script>
  <script src="js/web.js"></script>
</body>
</html>