<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accueil - takalo-takalo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <script src="/assets/js/modernizr.js"></script>
</head>
<body class="bg-light">

  <header class="site-header border-bottom p-3">
    <div class="container-lg d-flex justify-content-between align-items-center">
      <a href="index.php" class="navbar-brand">takalo-takalo</a>
    </div>
  </header>

  <main class="container-lg d-flex align-items-center" style="min-height:80vh;">
    <div class="row w-100">
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h3 class="card-title mb-3 text-center">I am an...</h3>
            <div class="row gx-3">
              <div class="col-6">
                <a href="/login?role=user" style="text-decoration: none; color: inherit;">
                  <div class="card choice-card text-center p-3" style="cursor:pointer; transition: all 0.3s; border: 2px solid transparent;">
                    <div class="card-body">
                      <h5 class="card-title">User</h5>
                      <p class="card-text small text-muted">Log in as an user</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-6">
                <a href="/login?role=admin" style="text-decoration: none; color: inherit;">
                  <div class="card choice-card text-center p-3" style="cursor:pointer; transition: all 0.3s; border: 2px solid transparent;">
                    <div class="card-body">
                      <h5 class="card-title">Admin</h5>
                      <p class="card-text small text-muted">Log in as an admin</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>
</html>
