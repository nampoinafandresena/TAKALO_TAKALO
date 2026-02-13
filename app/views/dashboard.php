<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h1 class="h3 fw-bold mb-1">Tableau de bord</h1>
        <p class="text-muted small mb-0">Rapport général de l'activité du site</p>
    </div>
    <div class="d-none d-md-block">
        <div class="dropdown">
            <button class="btn btn-white bg-white border dropdown-toggle px-3 shadow-sm rounded-3" type="button" data-bs-toggle="dropdown">
                Derniers 30 jours
            </button>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stats-card h-100 p-3">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-primary bg-opacity-10 text-accent">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted small mb-0">Total Membres</p>
                    <h4 class="fw-bold mb-0"><?= $userCount ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stats-card h-100 p-3">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted small mb-0">Échanges finis</p>
                    <h4 class="fw-bold mb-0"><?= $echangesFinisCount ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stats-card h-100 p-3">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted small mb-0">Objets actifs</p>
                    <h4 class="fw-bold mb-0"><?= $objetCount ?></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stats-card h-100 p-3">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-exclamation-octagon"></i>
                </div>
                <div class="ms-3">
                    <p class="text-muted small mb-0">Signalements</p>
                    <h4 class="fw-bold mb-0">12</h4>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 p-4 card-custom">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Popularité des Catégories</h5>
                <a href="/admin/categories" class="btn btn-primary btn-sm">Gérer</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr class="small text-uppercase text-muted">
                            <th>Nom</th>
                            <th>Objets</th>
                            <th>Popularité</th>
                            <th class="text-end">Tendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="p-2 bg-light rounded me-2">🚗</span> Véhicules</td>
                            <td>124</td>
                            <td>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar" style="width: 80%; background-color: var(--primary-color);"></div>
                                </div>
                            </td>
                            <td class="text-end text-success small"><i class="bi bi-graph-up"></i> +12%</td>
                        </tr>
                        <tr>
                            <td><span class="p-2 bg-light rounded me-2">🎧</span> Technologie</td>
                            <td>456</td>
                            <td>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar" style="width: 65%; background-color: var(--primary-color);"></div>
                                </div>
                            </td>
                            <td class="text-end text-success small"><i class="bi bi-graph-up"></i> +5%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 p-4 card-custom">
            <h5 class="fw-bold mb-4">Derniers Échanges</h5>
            <div class="activity-feed">
                <div class="d-flex mb-3 align-items-center">
                    <img src="https://ui-avatars.com/api/?name=JS&background=A9958A&color=fff" class="rounded-circle me-3" width="40">
                    <div>
                        <p class="mb-0 small fw-bold">Jean S. a échangé sa Montre</p>
                        <small class="text-muted">Il y a 5 min</small>
                    </div>
                </div>
                <div class="d-flex mb-3 align-items-center">
                    <img src="https://ui-avatars.com/api/?name=MK&background=A9958A&color=fff" class="rounded-circle me-3" width="40">
                    <div>
                        <p class="mb-0 small fw-bold">Nouveau membre : Mike K.</p>
                        <small class="text-muted">Il y a 12 min</small>
                    </div>
                </div>
            </div>
            <a href="/admin/echanges" class="btn btn-light w-100 btn-sm mt-3 text-accent fw-bold border">Voir tout l'historique</a>
        </div>
    </div>
</div>