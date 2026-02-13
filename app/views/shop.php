<!DOCTYPE html>
<html>

<head>
  <title>Shop - takalo-takalo</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="TemplatesJungle">
  <meta name="keywords" content="ecommerce,ceramic,shop">
  <meta name="description" content="Shop - takalo-takalo">
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

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" id="navbar-icon" viewBox="0 0 16 16">
      <path
        d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 512 512">
      <path fill="currentColor"
        d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3ZM97.92 222.72a124.8 124.8 0 1 1 124.8 124.8a124.95 124.95 0 0 1-124.8-124.8Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-up" viewBox="0 0 24 24">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 5v14m6-8l-6-6m-6 6l6-6" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="trade" viewBox="0 0 24 24">
      <path fill="currentColor" d="M6 9c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm12 0c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zM6 15c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm12 0c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
      <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-5h2v5zm4-8h-2V7h2v2zm4 8h-2v-5h2v5z"/>
    </symbol>
  </svg>

  <!-- HEADER -->
  <header id="header" class="site-header fixed-top border-bottom p-3 bg-primary">
    <div class="container-lg">
      <div class="row">
        <nav class="navbar navbar-expand-lg">
          <button class="navbar-toggler d-flex d-lg-none order-3 p-2 border-0 shadow-none" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false"
            aria-label="Toggle navigation">
            <svg class="navbar-icon svg-white" width="40" height="40">
              <use xlink:href="#navbar-icon"></use>
            </svg>
          </button>
          <a href="/home" class="navbar-brand order-2 order-lg-2 d-flex d-lg-none">
          </a>
          <div class="offcanvas offcanvas-end order-3" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
            <div class="offcanvas-body">
              <div class="offcanvas-header px-0">
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
                  data-bs-target="#bdNavbar"></button>
              </div>
              <div class="navbar-collapse order-1 order-lg-1" id="navbarMenu">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white me-4" href="/home"> Home </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white me-4" href="shop.php"> Shop </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white me-4" href="profile.php"> My Profile </a>
                  </li>
                </ul>
              </div>
              <a href="/home" class="navbar-brand order-2 order-lg-2 d-none d-lg-flex">
              </a>
              <ul class="user-items list-unstyled d-none d-lg-flex justify-content-end align-items-center order-3 flex-grow-1 gap-5 m-0">
                <li>
                  <a href="login.php" class="text-white">
                    <svg class="user svg-white" width="18" height="18">
                      <use xlink:href="#user"></use>
                    </svg>
                    <span>Logout</span>
                  </a>
                </li>
                <li class="d-flex align-items-center">
                  <svg class="search svg-white" width="18" height="18">
                    <use xlink:href="#search"></use>
                  </svg>
                  <input type="text" placeholder="Search..."
                    class="ps-1 form-control border-0 bg-transparent outline-none text-white">
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <!-- SHOP SECTION -->
  <section class="py-5" style="margin-top: 80px;">
    <div class="container-lg">
      <div class="row mb-5">
        <div class="col-lg-12">
          <div class="display-header">
            <h1 class="display-5 m-0 mb-2">Available Items</h1>
            <p class="text-muted">Browse and trade items from our community</p>
          </div>
        </div>
      </div>

      <!-- FILTER -->
      <div class="row mb-4">
        <div class="col-lg-12">
          <div class="card shadow-sm p-3">
            <div class="row g-3">
              <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search items...">
              </div>
              <div class="col-md-4">
                <select class="form-select">
                  <option value="">All Categories</option>
                  <option value="ceramic">Ceramic</option>
                  <option value="pottery">Pottery</option>
                  <option value="art">Art</option>
                </select>
              </div>
              <div class="col-md-4">
                <select class="form-select">
                  <option value="">Sort by</option>
                  <option value="newest">Newest</option>
                  <option value="price-low">Price: Low to High</option>
                  <option value="price-high">Price: High to Low</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ITEMS GRID -->
      <div class="row">
        <!-- Item 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm h-100 border-0">
            <div class="image-holder position-relative" style="height: 280px; overflow: hidden;">
              <img src="assets/images/product-item6.jpg" alt="ceramic" class="img-fluid w-100 h-100" style="object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-2">Available</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Rose ceramic</h5>
              <p class="text-muted small mb-2">Beautiful handcrafted ceramic piece with intricate rose design</p>
              
              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Owner:</strong></small>
                  <small class="d-flex align-items-center gap-1">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">JD</span>
                    John Doe
                  </small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Value:</strong></small>
                  <small class="text-primary fw-bold">$14.00</small>
                </div>
              </div>

              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Condition:</strong></small>
                  <small>Like New</small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Posted:</strong></small>
                  <small>Feb 8, 2026</small>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tradeModal">
                  <svg class="trade" width="18" height="18" style="display: inline; margin-right: 5px;">
                    <use xlink:href="#trade"></use>
                  </svg>
                  Propose Trade
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm h-100 border-0">
            <div class="image-holder position-relative" style="height: 280px; overflow: hidden;">
              <img src="assets/images/product-item5.jpg" alt="ceramic" class="img-fluid w-100 h-100" style="object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-2">Available</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Purple Rose ceramic</h5>
              <p class="text-muted small mb-2">Elegant purple ceramic design with floral motifs</p>
              
              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Owner:</strong></small>
                  <small class="d-flex align-items-center gap-1">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">SM</span>
                    Sarah Miller
                  </small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Value:</strong></small>
                  <small class="text-primary fw-bold">$14.00</small>
                </div>
              </div>

              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Condition:</strong></small>
                  <small>Good</small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Posted:</strong></small>
                  <small>Feb 7, 2026</small>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tradeModal">
                  <svg class="trade" width="18" height="18" style="display: inline; margin-right: 5px;">
                    <use xlink:href="#trade"></use>
                  </svg>
                  Propose Trade
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm h-100 border-0">
            <div class="image-holder position-relative" style="height: 280px; overflow: hidden;">
              <img src="assets/images/product-item2.jpg" alt="ceramic" class="img-fluid w-100 h-100" style="object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-2">Available</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Apple Flower ceramic</h5>
              <p class="text-muted small mb-2">Floral ceramic piece with apple motif and detailed patterns</p>
              
              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Owner:</strong></small>
                  <small class="d-flex align-items-center gap-1">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">MC</span>
                    Mike Chen
                  </small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Value:</strong></small>
                  <small class="text-primary fw-bold">$14.00</small>
                </div>
              </div>

              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Condition:</strong></small>
                  <small>Like New</small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Posted:</strong></small>
                  <small>Feb 6, 2026</small>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tradeModal">
                  <svg class="trade" width="18" height="18" style="display: inline; margin-right: 5px;">
                    <use xlink:href="#trade"></use>
                  </svg>
                  Propose Trade
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 4 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm h-100 border-0">
            <div class="image-holder position-relative" style="height: 280px; overflow: hidden;">
              <img src="assets/images/product-item3.jpg" alt="ceramic" class="img-fluid w-100 h-100" style="object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-2">Available</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Butterfly Pea ceramic</h5>
              <p class="text-muted small mb-2">Artistic butterfly design ceramic with vibrant colors</p>
              
              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Owner:</strong></small>
                  <small class="d-flex align-items-center gap-1">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">EJ</span>
                    Emma Johnson
                  </small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Value:</strong></small>
                  <small class="text-primary fw-bold">$14.00</small>
                </div>
              </div>

              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Condition:</strong></small>
                  <small>Good</small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Posted:</strong></small>
                  <small>Feb 5, 2026</small>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tradeModal">
                  <svg class="trade" width="18" height="18" style="display: inline; margin-right: 5px;">
                    <use xlink:href="#trade"></use>
                  </svg>
                  Propose Trade
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 5 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm h-100 border-0">
            <div class="image-holder position-relative" style="height: 280px; overflow: hidden;">
              <img src="assets/images/product-item4.jpg" alt="ceramic" class="img-fluid w-100 h-100" style="object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-2">Available</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Masala ceramic</h5>
              <p class="text-muted small mb-2">Spiced ceramic collection item with traditional design</p>
              
              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Owner:</strong></small>
                  <small class="d-flex align-items-center gap-1">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">RP</span>
                    Raj Patel
                  </small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Value:</strong></small>
                  <small class="text-primary fw-bold">$13.00</small>
                </div>
              </div>

              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Condition:</strong></small>
                  <small>Fair</small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Posted:</strong></small>
                  <small>Feb 4, 2026</small>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tradeModal">
                  <svg class="trade" width="18" height="18" style="display: inline; margin-right: 5px;">
                    <use xlink:href="#trade"></use>
                  </svg>
                  Propose Trade
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Item 6 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm h-100 border-0">
            <div class="image-holder position-relative" style="height: 280px; overflow: hidden;">
              <img src="assets/images/product-item1.jpg" alt="ceramic" class="img-fluid w-100 h-100" style="object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-2">Available</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Roselle ceramic</h5>
              <p class="text-muted small mb-2">Classic roselle pattern ceramic with timeless appeal</p>
              
              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Owner:</strong></small>
                  <small class="d-flex align-items-center gap-1">
                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">LA</span>
                    Lisa Anderson
                  </small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Value:</strong></small>
                  <small class="text-primary fw-bold">$12.00</small>
                </div>
              </div>

              <div class="row g-2 mb-3 text-sm">
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Condition:</strong></small>
                  <small>Like New</small>
                </div>
                <div class="col-6">
                  <small class="d-block text-muted"><strong>Posted:</strong></small>
                  <small>Feb 3, 2026</small>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tradeModal">
                  <svg class="trade" width="18" height="18" style="display: inline; margin-right: 5px;">
                    <use xlink:href="#trade"></use>
                  </svg>
                  Propose Trade
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TRADE MODAL -->
  <div class="modal fade" id="tradeModal" tabindex="-1" aria-labelledby="tradeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tradeModalLabel">Propose Trade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="tradeItem" class="form-label">Select your item to trade</label>
              <select class="form-select" id="tradeItem" required>
                <option value="">Choose an item from your collection...</option>
                <option value="rose">Rose ceramic - $14.00</option>
                <option value="purple">Purple Rose ceramic - $14.00</option>
                <option value="apple">Apple Flower ceramic - $14.00</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message to owner</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Tell them why you want to trade..."></textarea>
            </div>
            <div class="alert alert-info" role="alert">
              <strong>Trade Note:</strong> Once you propose, the owner will review and can accept or decline your offer.
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Send Trade Proposal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer id="footer" class="border-top mt-5">
    <div class="container-lg">
      <div class="row justify-content-between pb-5">
        <div class="col-lg-2 col-md-6">
          <div class="footer-menu">
            <h5 class="widget-title">Quick Links</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item fw-medium pb-2">
                <a href="/home" class="item-anchor">Home</a>
              </li>
              <li class="menu-item fw-medium pb-2">
                <a href="shop.php" class="item-anchor">Shop</a>
              </li>
              <li class="menu-item fw-medium pb-2">
                <a href="profile.php" class="item-anchor">My Profile</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-menu">
            <h5 class="widget-title">Help</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item fw-medium pb-2">
                <a href="#" class="item-anchor">Contact</a>
              </li>
              <li class="menu-item fw-medium pb-2">
                <a href="#" class="item-anchor">How it works</a>
              </li>
              <li class="menu-item fw-medium pb-2">
                <a href="#" class="item-anchor">Store policy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="border-top py-4">
      <div class="container-lg">
        <div class="d-flex justify-content-between">
          <div>
            <p class="mb-0">©2026 - takalo-takalo BY ETU004025, ETU004017, ETU003902
            </p>
          </div>
          <div>
            <a href="#" class="d-flex">
              <svg class="arrow-up svg-primary position-absolute" width="20" height="20">
                <use xlink:href="#arrow-up"></use>
              </svg>
              <span class="ps-4">Back to top</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="/assets/js/plugins.js"></script>
</body>

</html>
