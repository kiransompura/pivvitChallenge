<html>
  <head>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <style>
      .navbar { border-radius:0; }
    </style>

    <!--<script src="http://code.angularjs.org/1.2.13/angular.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    
    <script src="js/lib/angular-datatables/demo/src/archives/dist/angular-datatables.min.js"></script>
    <link rel="stylesheet" href="js/lib/angular-datatables/demo/src/archives/dist/css/angular-datatables.css">
    
    
    <script src="js/app.js"></script>
    <script src="js/controller/purchaseController.js" type="text/javascript"></script>
  </head>

  <body ng-app="routerApp" >

    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" ui-sref="#">Purchase Demo</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a ui-sref="home.list">Purchaselist</a></li>
        <li><a ui-sref="home.create" href="">Add Purchase</a></li>
      </ul>
    </nav>

    <div class="container">
      <div ui-view></div>
    </div>

  </body>
</html>