<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Takalo-Takalo Admin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #A9958A; /* Ta couleur Rose Poudré */
            --bg-light: #dddcdbff;      /* Fond très légèrement rosé/sable */
            --sidebar-bg: #ffffff;
            --text-dark: #5A524E;     /* Texte gris-brun pour harmoniser */
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            margin: 0;
        }

        /* --- SIDEBAR STYLE --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0; top: 0;
            background: var(--sidebar-bg);
            border-right: 1px solid rgba(169, 149, 138, 0.2);
            padding: 1.5rem;
            z-index: 1050;
        }

        .sidebar-brand {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            margin-bottom: 2.5rem;
            text-decoration: none;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: #8E8682;
            border-radius: 12px;
            margin-bottom: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background-color: #fcfaf9;
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(169, 149, 138, 0.3);
        }

        /* --- CONTENT AREA --- */
        .main-content {
            margin-left: var(--sidebar-width); /* Ajusté pour coller à la sidebar */
            padding: 2.5rem;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        /* --- UI ELEMENTS --- */
        .card-table {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 15px -3px rgba(169, 149, 138, 0.1);
            background: white;
            overflow: hidden;
        }

        .category-icon {
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .badge-count {
            background: rgba(169, 149, 138, 0.15);
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        .search-input {
            border-radius: 10px;
            border: 1px solid rgba(169, 149, 138, 0.2);
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            width: 300px;
        }

        .search-wrapper { position: relative; }
        .search-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        
        .card-custom { 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 4px 6px -1px rgba(169, 149, 138, 0.1); 
            background: white; 
        }
    
        .footer {
            border-color: rgba(169, 149, 138, 0.2) !important;
            /* Suppression du padding-left excessif */
        }

        .footer strong {
            color: var(--primary-color);
            font-weight: 600;
        }

        .main-content {
            display: flex;
            flex-direction: column;
        }

        /* Style spécifique pour les icônes de stats */
        .stats-icon {
            width: 54px; 
            height: 54px;
            border-radius: 14px;
            display: flex; 
            align-items: center; 
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Animation au survol des cartes stats */
        .stats-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid rgba(169, 149, 138, 0.1);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(169, 149, 138, 0.15);
        }

        /* Boutons blancs personnalisés */
        .btn-white {
            background: white;
            color: var(--text-dark);
            border: 1px solid #e2e8f0;
        }

        /* Progress bar personnalisée */
        .progress {
            background-color: #eeeae7; /* Couleur de fond de la barre (argile très clair) */
            border-radius: 10px;
        }
        

        /* Styles spécifiques Utilisateurs */
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #F7F3F0;
        }

        .status-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.35rem 0.8rem;
            border-radius: 50px;
        }

        /* Couleurs des badges de statut */
        .bg-active { 
            background-color: #dcfce7; 
            color: #166534; 
        }
        .bg-banned { 
            background-color: #fee2e2; 
            color: #991b1b; 
        }

        /* Pagination couleur thème */
        .page-link {
            color: var(--primary-color);
        }
        .page-item.active .page-link {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        /* --- EXCHANGE SPECIFIC STYLE --- */
        .exchange-flow {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-pill {
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.4rem 0.9rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Couleurs douces pour les statuts */
        .status-pending { background: #FEF9C3; color: #854D0E; }
        .status-completed { background: #DCFCE7; color: #166534; }
        .status-canceled { background: #FEE2E2; color: #991B1B; }

        /* Petits textes d'objets en couleur accent */
        .tiny {
            font-weight: 500;
        }

        /* Boutons de détails blancs */
        .btn-white {
            background: white;
            color: var(--text-dark);
            font-size: 0.85rem;
            font-weight: 600;
        }
        .btn-white:hover {
            background: var(--bg-light);
            color: var(--primary-color);
        }
    </style>
</head>
<body>

    <nav class="sidebar">
        <a href="/admin/dashboard" class="sidebar-brand">
            <i class="bi bi-arrow-left-right me-2"></i> Takalo-Takalo
        </a>
        
        <div class="nav flex-column">
            <a href="/admin/dashboard" class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
            </a>
            <a href="/admin/categories" class="nav-link <?= $page == 'categories' ? 'active' : '' ?>">
                <i class="bi bi-tags me-2"></i> Catégories
            </a>
            <a href="/admin/users" class="nav-link <?= $page == 'users' ? 'active' : '' ?>">
                <i class="bi bi-people me-2"></i> Utilisateurs
            </a>
            <a href="/admin/echanges" class="nav-link <?= $page == 'echanges' ? 'active' : '' ?>">
                <i class="bi bi-arrow-repeat me-2"></i> Échanges
            </a>
            
            <div style="margin-top: auto;">
                <hr style="opacity: 0.1;">
                <a href="/logout" class="nav-link text-danger">
                    <i class="bi bi-box-arrow-left me-2"></i> Déconnexion
                </a>
            </div>
        </div>
    </nav>

    <main class="main-content d-flex flex-column" style="min-height: 100vh;">
        <div class="flex-grow-1">
            <?php include __DIR__ . '/' . $page . '.php'; ?>
        </div>

        <footer class="footer mt-5 pb-4 border-top pt-4">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 text-muted small">
                        &copy; 2026 : <strong>ETU003902</strong> - <strong>ETU004017</strong> - <strong>ETU004025</strong>
                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        Administration Takalo-Takalo v1.0
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>