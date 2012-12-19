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
          <div class="input-prepend input-append">
            <div class="btn-group">
              <button class="btn dropdown-toggle select" data-toggle="dropdown">
                <span class="value" data-index="{{ date('m') - 1 }}">{{ Helper::month_as_string(date('m')) }}</span>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a data-index="0" tabindex="-1" href="#">Gennaio</a></li>
                <li><a data-index="1" tabindex="-1" href="#">Febbraio</a></li>
                <li><a data-index="2" tabindex="-1" href="#">Marzo</a></li>
                <li><a data-index="3" tabindex="-1" href="#">Aprile</a></li>
                <li><a data-index="4" tabindex="-1" href="#">Maggio</a></li>
                <li><a data-index="5" tabindex="-1" href="#">Giugno</a></li>
                <li><a data-index="6" tabindex="-1" href="#">Luglio</a></li>
                <li><a data-index="7" tabindex="-1" href="#">Agosto</a></li>
                <li><a data-index="8" tabindex="-1" href="#">Settembre</a></li>
                <li><a data-index="9" tabindex="-1" href="#">Ottobre</a></li>
                <li><a data-index="10" tabindex="-1" href="#">Novembre</a></li>
                <li><a data-index="11" tabindex="-1" href="#">Dicembre</a></li>
              </ul>
            </div>
            <input class="span2" type="text">
            <button class="btn change">Ciaos</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script src="js/jquery.scrollTo-min.js"></script>
  <script src="js/bootstrap-dropdown.js"></script>
  <script src="js/web.js"></script>
</body>
</html>