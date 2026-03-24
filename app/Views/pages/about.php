<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>About Nonchalant<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container my-5">
  <!-- Hero -->
  <div class="hero text-center mb-5">
    <h1 class="display-4 fw-bold">Nonchalant.ph</h1>
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

  <div class="text-center">
    <a href="<?= base_url('shop') ?>" class="btn btn-non btn-lg px-5">Shop Drops</a>
  </div>
</div>
<?= $this->endSection() ?>
