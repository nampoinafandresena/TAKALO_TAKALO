<div class="page-header">
    <div>
        <h2 class="fw-bold mb-1">Communauté</h2>
        <p class="text-muted">Gérez les membres inscrits sur la plateforme.</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary rounded-3 border-muted">
            <i class="bi bi-download me-2"></i> Exporter CSV
        </button>
        <button class="btn btn-primary px-4 rounded-3 fw-bold">
            <i class="bi bi-person-plus me-2"></i> Inviter
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm p-3 mb-4 rounded-4">
    <div class="row g-3 align-items-center">
        <div class="col-md-6">
            <div class="search-wrapper">
                <i class="bi bi-search text-accent"></i>
                <input type="text" class="form-control search-input" placeholder="Rechercher par nom, email...">
            </div>
        </div>
        <div class="col-md-6 text-md-end">
            <select class="form-select d-inline-block w-auto border-0 bg-light rounded-3 fw-medium">
                <option>Tous les statuts</option>
                <option>Actif</option>
                <option>Banni</option>
            </select>
        </div>
    </div>
</div>

<div class="card card-table">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 border-0 py-3 text-uppercase small fw-bold text-muted">Utilisateur</th>
                    <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Date d'inscription</th>
                    <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Échanges</th>
                    <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Statut</th>
                    <th class="border-0 py-3 text-end pe-4 text-uppercase small fw-bold text-muted">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Rakoto+Ben&background=A9958A&color=fff" class="user-avatar me-3" alt="">
                            <div>
                                <div class="fw-bold">Rakoto Ben</div>
                                <div class="small text-muted">rakoto.ben@email.com</div>
                            </div>
                        </div>
                    </td>
                    <td>12 Mai 2024</td>
                    <td><span class="badge-count">24</span></td>
                    <td><span class="status-badge bg-active">Actif</span></td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-light border text-accent" title="Voir profil"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-light border text-danger" title="Bannir"><i class="bi bi-slash-circle"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Sarah+M&background=A9958A&color=fff" class="user-avatar me-3" alt="">
                            <div>
                                <div class="fw-bold">Sarah Mihaja</div>
                                <div class="small text-muted">sarah.m@email.mg</div>
                            </div>
                        </div>
                    </td>
                    <td>08 Juin 2024</td>
                    <td><span class="badge-count">12</span></td>
                    <td><span class="status-badge bg-active">Actif</span></td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-light border text-accent"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-light border text-danger"><i class="bi bi-slash-circle"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Jean+Marc&background=A9958A&color=fff" class="user-avatar me-3" alt="">
                            <div>
                                <div class="fw-bold">Jean Marc</div>
                                <div class="small text-muted">jm@test.com</div>
                            </div>
                        </div>
                    </td>
                    <td>01 Janv 2024</td>
                    <td><span class="badge-count">0</span></td>
                    <td><span class="status-badge bg-banned">Banni</span></td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-light border text-accent"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-light border text-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="p-3 border-top d-flex justify-content-between align-items-center">
        <span class="small text-muted">Affichage de 1 à 3 sur 1,240</span>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                <li class="page-item active"><a class="page-link" href="#" style="background-color: var(--primary-color); border-color: var(--primary-color);">1</a></li>
                <li class="page-item"><a class="page-link" href="#" style="color: var(--primary-color);">2</a></li>
                <li class="page-item"><a class="page-link" href="#" style="color: var(--primary-color);">Suivant</a></li>
            </ul>
        </nav>
    </div>
</div>