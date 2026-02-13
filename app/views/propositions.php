<?php
use app\models\Objet;
use app\models\Echange;

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

// Récupérer les propositions d'échange en attente pour l'utilisateur
$echange = new Echange(Flight::db());
$objet = new Objet(Flight::db());

// Récupérer tous les échanges en attente
$all_echanges = $echange->readAll();

// Filtrer les échanges où l'utilisateur est propriétaire de l'objet demandé
$propositions = [];
foreach ($all_echanges as $e) {
    $obj_demande = new Objet(Flight::db());
    $obj_demande->read($e['id_obj_demande']);
    
    if ($obj_demande && $obj_demande->getIdProprietaire() == $_SESSION['user_id'] && $e['statut'] == 0) {
        // Récupérer les détails de l'objet proposé
        $obj_propose = new Objet(Flight::db());
        $obj_propose->read($e['id_obj_propose']);
        // Récupérer le pseudo du propriétaire de l'objet proposé
        $user_model = new \app\models\User(Flight::db());
        $user_propose = $user_model->read($obj_propose->getIdProprietaire());
        
        $propositions[] = [
            'echange' => $e,
            'objet_demande' => $obj_demande,
            'objet_propose' => $obj_propose,
            'user_propose' => $user_propose
        ];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Propositions - takalo-takalo</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="TemplatesJungle">
  <meta name="keywords" content="ecommerce,ceramic,shop">
  <meta name="description" content="Propositions - takalo-takalo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Quattrocento:wght@400;700&display=swap"
    rel="stylesheet">
  <script src="/assets/js/modernizr.js"></script>
</head>

<body>

  <!-- PROPOSITIONS SECTION -->
  <section class="py-5" style="margin-top: 80px;">
    <div class="container-lg">
      <div class="row mb-5">
        <div class="col-lg-12">
          <div class="display-header">
            <h1 class="display-5 m-0 mb-2">Pending Trade Proposals</h1>
            <p class="text-muted">Review and manage trade proposals from other users</p>
          </div>
        </div>
      </div>

      <!-- PROPOSITIONS LIST -->
      <div class="row">
        <?php if (count($propositions) > 0): ?>
          <?php foreach ($propositions as $prop): ?>
            <!-- Proposition Card -->
            <div class="col-lg-8 offset-lg-2 mb-4">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <div class="row">
                    <!-- Objet Demandé (Votre objet) -->
                    <div class="col-md-5 border-end">
                      <h6 class="text-muted mb-3"><strong>Votre Objet</strong></h6>
                      <h5 class="card-title mb-2"><?= htmlspecialchars($prop['objet_demande']->getNomObj()); ?></h5>
                      <p class="text-muted small mb-2">
                        <strong>Description:</strong> <?= htmlspecialchars($prop['objet_demande']->getDescription()); ?>
                      </p>
                      <p class="text-primary fw-bold">
                        Valeur estimée: $<?= number_format($prop['objet_demande']->getPrixEstimatif(), 2); ?>
                      </p>
                    </div>

                    <!-- Objet Proposé (Objet de l'autre utilisateur) -->
                    <div class="col-md-5">
                      <h6 class="text-muted mb-3"><strong>Objet Proposé</strong></h6>
                      <h5 class="card-title mb-2"><?= htmlspecialchars($prop['objet_propose']->getNomObj()); ?></h5>
                      <p class="text-muted small mb-2">
                        <strong>Description:</strong> <?= htmlspecialchars($prop['objet_propose']->getDescription()); ?>
                      </p>
                      <p class="text-primary fw-bold">
                        Valeur estimée: $<?= number_format($prop['objet_propose']->getPrixEstimatif(), 2); ?>
                      </p>
                      <p class="text-muted small">
                        <strong>De:</strong> <?= htmlspecialchars($prop['user_propose']->getPseudo()); ?>
                      </p>
                    </div>

                    <!-- Actions -->
                    <div class="col-md-2 d-flex flex-column gap-2 justify-content-center">
                      <button class="btn btn-success btn-sm accept-btn" data-id="<?= $prop['echange']['id']; ?>">
                        Accepter
                      </button>
                      <button class="btn btn-danger btn-sm refuse-btn" data-id="<?= $prop['echange']['id']; ?>">
                        Refuser
                      </button>
                    </div>
                  </div>

                  <!-- Date de la proposition -->
                  <div class="mt-3 text-muted small">
                    <strong>Proposition reçue:</strong> <?= date('d/m/Y à H:i', strtotime($prop['echange']['date_demande'])); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <!-- Empty state -->
          <div class="col-lg-8 offset-lg-2">
            <div class="alert alert-info text-center py-5">
              <h5>Aucune proposition en attente</h5>
              <p class="text-muted mb-0">Vous recevrez une notification quand quelqu'un proposera un échange</p>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="/assets/js/plugins.js"></script>

  <script>
    // Accepter une proposition
    document.querySelectorAll('.accept-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        if (confirm('Êtes-vous sûr de vouloir accepter cette proposition?')) {
          const id = this.getAttribute('data-id');
          fetch('/echange/accepter', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: parseInt(id) })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Proposition acceptée!');
              location.reload();
            } else {
              alert('Erreur: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Erreur lors de l\'acceptation');
          });
        }
      });
    });

    // Refuser une proposition
    document.querySelectorAll('.refuse-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        if (confirm('Êtes-vous sûr de vouloir refuser cette proposition?')) {
          const id = this.getAttribute('data-id');
          fetch('/echange/refuser', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: parseInt(id) })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Proposition refusée!');
              location.reload();
            } else {
              alert('Erreur: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Erreur lors du refus');
          });
        }
      });
    });
  </script>
</body>

</html>