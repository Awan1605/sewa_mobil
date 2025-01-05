<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CarBOOK | Rental Mobil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --primary-color: #2c3e50;
      --secondary-color: #e74c3c;
    }

    .navbar-brand {
      font-size: 2rem;
      font-weight: 700;
      color: white !important;
      transition: all 0.3s ease;
    }

    .navbar-brand:hover {
      transform: scale(1.05);
      color: var(--secondary-color) !important;
    }

    .nav-link {
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      color: var(--secondary-color) !important;
      transform: translateY(-2px);
    }

    .btn-logout {
      background-color: var(--secondary-color);
      border: none;
      padding: 8px 20px;
      transition: all 0.3s ease;
    }

    .btn-logout:hover {
      background-color: #c0392b;
      transform: translateY(-2px);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .main-header {
      background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
      position: sticky;
      /* Fixed navbar */
    }
  </style>
</head>

<body>
  <header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container py-2">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <i class="fas fa-car-side me-2"></i>
          CarBOOK
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-home me-1"></i>
                Home
              </a>
            </li>
            <li class="nav-item ms-2">
              <a href="sign/login.php" class="btn btn-logout">
                <i class="fas fa-sign-out-alt me-1"></i>
                Log Out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>