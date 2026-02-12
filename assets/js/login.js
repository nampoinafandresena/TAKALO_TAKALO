document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('authContainer');
  if (!container) return;

  // Affiche les 2 choix (Utilisateur / Admin)
  function renderChoices() {
    container.innerHTML = `
      <div class="row gx-3">
        <div class="col-6">
          <div class="card choice-card text-center p-3" data-role="user" style="cursor:pointer; border: 2px solid transparent; transition: all 0.3s;">
            <div class="card-body">
              <h5 class="card-title">Utilisateur</h5>
              <p class="card-text small text-muted">Se connecter en tant qu'utilisateur</p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card choice-card text-center p-3" data-role="admin" style="cursor:pointer; border: 2px solid transparent; transition: all 0.3s;">
            <div class="card-body">
              <h5 class="card-title">Admin</h5>
              <p class="card-text small text-muted">Se connecter en tant qu'admin</p>
            </div>
          </div>
        </div>
      </div>
    `;

    // Attache les listeners au clic
    container.querySelectorAll('.choice-card').forEach(card => {
      card.addEventListener('click', () => {
        const role = card.getAttribute('data-role') || 'user';
        showForm(role);
      });
      card.addEventListener('mouseenter', () => card.style.borderColor = '#0d6efd');
      card.addEventListener('mouseleave', () => card.style.borderColor = 'transparent');
    });
  }

  // Affiche le formulaire de connexion après le choix
  window.showForm = function (role = 'user') {
    const title = role === 'admin' ? 'Connexion Admin' : 'Se connecter';
    container.innerHTML = `
      <h3 class="card-title mb-3 text-center">${title}</h3>
      <form id="login-form">
        <input type="hidden" name="role" value="${role}">
        <div class="mb-3">
          <input type="text" name="username" class="form-control ps-3" placeholder="Nom d'utilisateur ou email" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control ps-3" placeholder="Mot de passe" required>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
      </form>
      <div class="text-center mt-3">
        <a href="#" id="backToChoices" class="small">Retour au choix</a>
      </div>
    `;

    const form = document.getElementById('login-form');
    if (form) {
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const payload = Object.fromEntries(formData.entries());
        console.log('Connexion:', payload);
        alert(`Connexion pour ${payload.username} (${payload.role})`);
        // Redirection: window.location = 'profile.html';
      });
    }

    const backBtn = document.getElementById('backToChoices');
    if (backBtn) {
      backBtn.addEventListener('click', (e) => {
        e.preventDefault();
        renderChoices();
      });
    }
  };

  // Init : affiche les choix au départ
  renderChoices();
});
