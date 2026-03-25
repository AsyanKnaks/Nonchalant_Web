<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<<<<<<< Updated upstream
    <h1>About Us</h1>
    <p>Placeholder text for the About page.</p>
<?= $this->endSection() ?>
=======
<div class="container my-5">
  <!-- Hero -->
  <div class="hero text-center mb-5">
    <h1 class="display-4 fw-bold">NONCHALANT</h1>
    <p class="lead">Effortless streetwear for the modern Pinoy.</p>
  </div>

  <!-- Our Vibe -->
  <div class="row mb-5">
    <div class="col-lg-8 mx-auto">
      <h2 class="text-center mb-4"><i class="bi bi-heart-fill text-primary"></i> Our Vibe</h2>
      <p class="lead text-center">Nonchalant is all about that casual, no-fuss style. Inspired by Manila streets and limited drops, we bring you premium tees, hoodies, and collabs that look good without trying too hard. Made for the everyday Pinoy who wants quality gear for work, hangouts, or hypebeast moments.</p>
    </div>
  </div>

  <!-- Drops -->
  <div class="row mb-5">
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow">
        <div class="card-body text-center">
          <i class="bi bi-droplet-fill text-primary fs-1 mb-3"></i>
          <h5>Limited Drops</h5>
          <p>Seasonal releases like Drop26 and collabs. First come, first served—gone when stock hits zero.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow">
        <div class="card-body text-center">
          <i class="bi bi-people-fill text-secondary fs-1 mb-3"></i>
          <h5>PH Roots</h5>
          <p>Proudly Manila-based. Supporting local artists and drops tailored for tropical heat.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow">
        <div class="card-body text-center">
          <i class="bi bi-shield-check text-success fs-1 mb-3"></i>
          <h5>Quality First</h5>
          <p>Premium cotton blends, ethical prints. Built to last wash after wash.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Developers -->
<div class="row mt-5">
  <div class="col-lg-10 mx-auto">
    <h2 class="text-center mb-5">
      <i class="bi bi-code-slash text-dark"></i> Meet the Developers
    </h2>

    <div class="row text-center">

      <!-- Dev 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow border-0">
          <div class="card-body">
            <i class="bi bi-person-circle fs-1 mb-3"></i>
            <h5 class="fw-bold">Reuel Nathan N. Gison</h5>
            <p class="text-muted">UI / Developer</p>
          </div>
        </div>
      </div>

      <!-- Dev 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow border-0">
          <div class="card-body">
            <i class="bi bi-person-circle fs-1 mb-3"></i>
            <h5 class="fw-bold">Oscar Dekit Jr.</h5>
            <p class="text-muted">Backend Developer</p>
          </div>
        </div>
      </div>

      <!-- Dev 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow border-0">
          <div class="card-body">
            <i class="bi bi-person-circle fs-1 mb-3"></i>
            <h5 class="fw-bold">Andres Luis C. Taylan</h5>
            <p class="text-muted">Frontend Developer</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
>>>>>>> Stashed changes
