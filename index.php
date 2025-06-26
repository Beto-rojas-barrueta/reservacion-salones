<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Casa de Cultura - Sistema de Reservas</title>
  
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  
  <style>
    /* Personaliza aquí si quieres */
    .content-wrapper {
      padding: 30px;
      max-width: 900px;
      margin: 0 auto;
    }
    .header h1 {
      font-weight: 700;
      margin-bottom: 0;
    }
    .header p.subtitle {
      color: #6c757d;
      margin-top: 5px;
      margin-bottom: 30px;
      font-size: 1.1rem;
    }
  </style>
  
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DEG6KHBXPJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DEG6KHBXPJ');
</script>

</head>
<body class="hold-transition sidebar-mini">
<script>
  // Simular un evento de vista de página personalizada
  gtag('event', 'simulacion_visita', {
    'event_category': 'Pruebas',
    'event_label': 'Visita Simulada',
    'value': 1
  });
</script>
  <div class="wrapper">

    <div class="content-wrapper">
      <header class="header text-center mb-4">
        <h1>Casa de Cultura Veracruz</h1>
        <p class="subtitle">Sistema de Reservas</p>
      </header>

      <section class="row">
        <div class="col-md-4">
          <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-calendar-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Reservar Salón</span>
              <span class="info-box-number">Realiza una nueva reserva para los salones.</span>
              <a href="reservar.php" class="btn btn-light btn-sm mt-2">Ir a Reservar</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-calendar-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ver Reservas</span>
              <span class="info-box-number">Consulta y administra las reservas existentes.</span>
              <a href="listar.php" class="btn btn-light btn-sm mt-2">Ver Reservas</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-info-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Información</span>
              <span class="info-box-number">Gestiona eventos artísticos, teatrales y culturales.</span>
            </div>
          </div>
        </div>
      </section>
    </div>

  </div>

  <!-- FontAwesome para iconos -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- jQuery y Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
