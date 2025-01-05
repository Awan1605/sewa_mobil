<html>
 <head>
  <title>
   CarBook
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   .navbar {
            background-color: #f8f9fa;
            border-bottom: 2px solid #007bff;
        }
        .navbar-brand img {
            height: 40px;
        }
        .search-bar {
            width: 100%;
            max-width: 500px;
        }
        .car-info {
            margin-top: 20px;
        }
        .car-info h2 {
            font-weight: bold;
        }
        .car-info .price {
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
        }
        .car-info .details {
            font-size: 14px;
            color: #6c757d;
        }
        .car-info .details i {
            margin-right: 5px;
        }
        .car-info .availability {
            color: #28a745;
            font-weight: bold;
        }
        .car-info .form-control {
            margin-bottom: 10px;
        }
        .car-info .btn-primary {
            background-color: #6c757d;
            border: none;
        }
        .car-info .btn-success {
            background-color: #28a745;
            border: none;
        }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-expand-lg navbar-light">
   <div class="container">
    <a class="navbar-brand" href="#">
     <img alt="CarBook logo" height="40" src="https://storage.googleapis.com/a1aa/image/l3rag9OcZrp0OBSS7nLr4qDtx4UieByD5BYRbJ2aeIP4wQAUA.jpg" width="100"/>
    </a>
    <form class="d-flex search-bar">
     <input aria-label="Search" class="form-control me-2" placeholder="Cari" type="search"/>
    </form>
    <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
     <span class="navbar-toggler-icon">
     </span>
    </button>
   </div>
  </nav>
  <div class="container car-info">
   <div class="row">
    <div class="col-md-6">
     <img alt="Mercedes-Benz E Class car" class="img-fluid" height="300" src="https://storage.googleapis.com/a1aa/image/IrMekkZ027XSekOOHOed4SfgKSlgVNMR8U5fbzdB1hYXHGCgC.jpg" width="500"/>
    </div>
    <div class="col-md-6">
     <h2>
      Mercedes-Benz E Class
     </h2>
     <div class="details">
      <i class="fas fa-cogs">
      </i>
      Automatic
      <i class="fas fa-calendar-alt">
      </i>
      2023
      <i class="fas fa-gas-pump">
      </i>
      Bensin
      <i class="fas fa-car">
      </i>
      4 Kursi
     </div>
     <div class="price">
      $500/hari
     </div>
     <div class="availability">
      Buka 10.00 - 22.00
     </div>
     <form>
      <div class="mb-3">
       <label class="form-label" for="pickupDate">
        Waktu Pengembalian
       </label>
       <input class="form-control" id="pickupDate" placeholder="Pickup Date" type="date"/>
       <input class="form-control" id="pickupTime" placeholder="Pickup Time" type="time"/>
      </div>
      <div class="mb-3">
       <label class="form-label" for="dropoffDate">
        Waktu Pengembalian
       </label>
       <input class="form-control" id="dropoffDate" placeholder="Drop-off Date" type="date"/>
       <input class="form-control" id="dropoffTime" placeholder="Drop-off Time" type="time"/>
      </div>
      <button class="btn btn-primary btn-lg btn-block" type="button">
       Pesan Sekarang
      </button>
      <button class="btn btn-success btn-lg btn-block" type="button">
       Rincian
      </button>
     </form>
    </div>
   </div>
  </div>
  <script crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOg6tv6Wz7Yp6l26p1AMz6pH/e5b6D6b6b6Y6Y6Y6Y6" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
  </script>
  <script crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOg6tv6Wz7Yp6l26p1AMz6pH/e5b6D6b6b6Y6Y6Y6Y6" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
  </script>
 </body>
</html>
