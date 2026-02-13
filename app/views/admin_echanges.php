<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Suivi des Échanges</h2>
        <p class="text-muted">Historique et monitoring des transactions entre membres.</p>
    </div>
    <div class="d-flex gap-2">
        <input type="text" class="form-control search-input" placeholder="ID Échange ou membre...">
        <button class="btn btn-light border rounded-3 bg-white"><i class="bi bi-filter me-2"></i>Filtres</button>
    </div>
</div>

<div class="card card-table mb-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 border-0 py-3 text-uppercase small fw-bold text-muted">ID</th>
                    <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Flux de l'échange</th>
                    <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Date</th>
                    <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Statut</th>
                    <th class="border-0 py-3 text-end pe-4 text-uppercase small fw-bold text-muted">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ps-4 text-muted fw-medium">#TK-8821</td>
                    <td>
                        <div class="exchange-flow">
                            <div class="text-center">
                                <div class="small fw-bold">Jean P.</div>
                                <div class="text-accent tiny" style="font-size: 0.7rem;">iPhone 13</div>
                            </div>
                            <i class="bi bi-arrow-left-right text-accent mx-2"></i>
                            <div class="text-center">
                                <div class="small fw-bold">Sarah M.</div>
                                <div class="text-accent tiny" style="font-size: 0.7rem;">PS5 Digital</div>
                            </div>
                        </div>
                    </td>
                    <td>Aujourd'hui, 14:20</td>
                    <td><span class="status-pill status-pending">En attente</span></td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-white border shadow-sm rounded-pill px-3">Détails</button>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4 text-muted fw-medium">#TK-8815</td>
                    <td>
                        <div class="exchange-flow">
                            <div class="text-center">
                                <div class="small fw-bold">Mamy T.</div>
                                <div class="text-accent tiny" style="font-size: 0.7rem;">VTT Scott</div>
                            </div>
                            <i class="bi bi-arrow-left-right text-accent mx-2"></i>
                            <div class="text-center">
                                <div class="small fw-bold">Rivo A.</div>
                                <div class="text-accent tiny" style="font-size: 0.7rem;">Appareil Photo</div>
                            </div>
                        </div>
                    </td>
                    <td>Hier, 09:15</td>
                    <td><span class="status-pill status-completed">Terminé</span></td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-white border shadow-sm rounded-pill px-3">Détails</button>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4 text-muted fw-medium">#TK-8790</td>
                    <td>
                        <div class="exchange-flow">
                            <div class="text-center">
                                <div class="small fw-bold">Luc K.</div>
                                <div class="text-accent tiny" style="font-size: 0.7rem;">Macbook Air</div>
                            </div>
                            <i class="bi bi-arrow-left-right text-accent mx-2"></i>
                            <div class="text-center">
                                <div class="small fw-bold">Tiana R.</div>
                                <div class="text-accent tiny" style="font-size: 0.7rem;">iPad Pro</div>
                            </div>
                        </div>
                    </td>
                    <td>12 Fév 2026</td>
                    <td><span class="status-pill status-canceled">Annulé</span></td>
                    <td class="text-end pe-4">
                        <button class="btn btn-sm btn-white border shadow-sm rounded-pill px-3">Détails</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row g-4 mt-2">
    <div class="col-md-4">
        <div class="card border-0 p-3 bg-white shadow-sm rounded-4">
            <h6 class="text-muted small fw-bold">Taux de réussite</h6>
            <h3 class="fw-bold mb-0">92%</h3>
            <div class="progress mt-2" style="height: 6px; background-color: #F0EDE6;">
                <div class="progress-bar" style="width: 92%; background-color: #2D6A4F;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 p-3 bg-white shadow-sm rounded-4">
            <h6 class="text-muted small fw-bold">Valeur estimée échangée</h6>
            <h3 class="fw-bold mb-0">12.5M Ar</h3>
            <p class="text-success small mb-0 mt-1"><i class="bi bi-graph-up"></i> +15% ce mois</p>
        </div>
    </div>
</div>