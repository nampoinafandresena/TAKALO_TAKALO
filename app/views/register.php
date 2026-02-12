<?php
function e($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
function cls_invalid($errors, $field){ return ($errors[$field] ?? '') !== '' ? 'is-invalid' : ''; }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <script src="/assets/js/modernizr.js"></script>
</head>
<body class="bg-light">

  <header class="site-header border-bottom p-3">
    <div class="container-lg d-flex justify-content-between align-items-center">
      <a href="/" class="navbar-brand">takalo-takalo</a>
    </div>
  </header>

  <main class="container-lg d-flex align-items-center" style="min-height:80vh;">
    <div class="row w-100">
      <div class="col-lg-4 col-md-6 mx-auto">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <div class="text mb-3">
              <a href="/login?role=<?= e($role ?? 'user') ?>" class="small">Retour</a>
            </div>
            <h3 class="card-title mb-3 text-center">S'inscrire</h3>

            <?php if (!empty($errors['_global'] ?? '')): ?>
              <div class="alert alert-danger" role="alert">
                <?= e($errors['_global']) ?>
              </div>
            <?php endif; ?>

            <form method="post" action="/auth/register" novalidate>
                <input type="hidden" name="role" value="<?= e($role ?? 'user') ?>">
                <div class="mb-3">
                  <label for="pseudo" class="form-label">Pseudo</label>
                  <input id="pseudo" name="pseudo" class="form-control <?= cls_invalid($errors, 'pseudo') ?>" value="<?= e($values['pseudo'] ?? '') ?>" required>
                  <?php if (!empty($errors['pseudo'])): ?>
                    <div class="invalid-feedback d-block"><?= e($errors['pseudo']) ?></div>
                  <?php endif; ?>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" name="email" type="email" class="form-control <?= cls_invalid($errors, 'email') ?>" value="<?= e($values['email'] ?? '') ?>" required>
                  <?php if (!empty($errors['email'])): ?>
                    <div class="invalid-feedback d-block"><?= e($errors['email']) ?></div>
                  <?php endif; ?>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Mot de passe</label>
                  <input id="password" name="password" type="password" class="form-control <?= cls_invalid($errors, 'password') ?>" required>
                  <?php if (!empty($errors['password'])): ?>
                    <div class="invalid-feedback d-block"><?= e($errors['password']) ?></div>
                  <?php endif; ?>
                </div>

                <div class="mb-3">
                  <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                  <input id="confirm_password" name="confirm_password" type="password" class="form-control <?= cls_invalid($errors, 'confirm_password') ?>" required>
                  <?php if (!empty($errors['confirm_password'])): ?>
                    <div class="invalid-feedback d-block"><?= e($errors['confirm_password']) ?></div>
                  <?php endif; ?>
                </div>

                <button class="btn btn-primary w-100" type="submit">S'inscrire</button>
            </form>

            <div class="text-center mt-3">
              <small>Vous avez déjà un compte? <a href="/login">Se connecter</a></small>
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