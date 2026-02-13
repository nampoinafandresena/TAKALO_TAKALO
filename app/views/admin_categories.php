<!-- <div class="main-content"> -->
        
        <div class="page-header">
            <div>
                <h2 class="fw-bold mb-1">Gestion des Catégories</h2>
                <p class="text-muted">Organisez les types d'objets disponibles à l'échange.</p>
            </div>
            <button class="btn btn-primary px-4 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg me-2"></i> Nouvelle Catégorie
            </button>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="search-wrapper">
                <i class="bi bi-search"></i>
                <input type="text" class="form-control search-input" placeholder="Rechercher une catégorie...">
            </div>
            <div class="text-muted small">
                Total : <strong>8 catégories</strong>
            </div>
        </div>

        <div class="card card-table">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 border-0 py-3 text-uppercase small fw-bold text-muted">Nom</th>
                            <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Volume d'objets</th>
                            <th class="border-0 py-3 text-uppercase small fw-bold text-muted">Status</th>
                            <th class="border-0 py-3 text-end pe-4 text-uppercase small fw-bold text-muted">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($categories as $categorie) {
                        ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <span class="fw-semibold"><?= $categorie['nom_cat'];?></span>
                                </div>
                            </td>
                            <td><span class="badge-count"><?= $nombre_objets_cat[$categorie['id_cat']] ?? 0;?> objets</span></td>
                            <td><span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Actif</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-light border me-1" title="Modifier"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-sm btn-light border text-danger" title="Supprimer"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                        <!-- <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <span class="fw-semibold">Mode & Vêtements</span>
                                </div>
                            </td>
                            <td><span class="badge-count">856 objets</span></td>
                            <td><span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Actif</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <span class="fw-semibold">Maison & Déco</span>
                                </div>
                            </td>
                            <td><span class="badge-count">432 objets</span></td>
                            <td><span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Actif</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <form action="/admin/categories/create" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="fw-bold">Nouvelle Catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Nom de la catégorie</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="ex: Sports & Loisirs" name="nom_cat">
                        </div>
                        <!-- <div class="mb-0">
                            <label class="form-label small fw-bold text-muted">Icône (Emoji)</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="ex: ⚽">
                        </div> -->
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annuler</button>
                        <!-- <button type="button" class="btn btn-primary px-4">Enregistrer</button> -->
                        <input type="submit" class="btn btn-primary px-4" value="Enregistrer">
                    </div>
                </div>
            </div>
        </div>
    </form>
