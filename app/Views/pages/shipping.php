<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Shipping<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold"><i class="bi bi-truck text-primary"></i> Shipping Info</h1>
        <p class="lead">Fast, reliable delivery across PH. Partners: LBC & J&T.</p>
      </div>

      <!-- Rates -->
      <div class="card shadow mb-4">
        <div class="card-header bg-light">
          <h5><i class="bi bi-currency-php"></i> Shipping Rates</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <span>Standard (PH-wide)</span> <strong>P150</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Free Shipping</span> <strong>Orders over P3,000</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Metro Manila Express</span> <strong>P250</strong>
            </li>
          </ul>
        </div>
      </div>

      <!-- Timeline -->
      <div class="card shadow mb-4">
        <div class="card-header bg-light">
          <h5><i class="bi bi-clock"></i> Delivery Timeline</h5>
        </div>
        <div class="card-body">
          <div class="row text-center">
            <div class="col-md-4">
              <div class="border-end">
                <h6>Order Confirmed</h6>
                <small>Within 1 hour</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="border-end">
                <h6>Processing & Pack</h6>
                <small>1-2 days</small>
              </div>
            </div>
            <div class="col-md-4">
              <h6>Delivery</h6>
              <small>Metro: 2-3 days<br>Provinces: 3-7 days</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Tracking -->
      <div class="card shadow">
        <div class="card-header bg-light">
          <h5><i class="bi bi-geo-alt"></i> Tracking & Partners</h5>
        </div>
        <div class="card-body">
          <p>Track via LBC or J&T app/site. Number sent via SMS/email after ship.</p>
          <div class="row text-center">
            <div class="col-6">
              <i class="bi bi-building fs-1 text-info mb-2 d-block"></i>
              <strong>LBC</strong>
            </div>
            <div class="col-6">
              <i class="bi bi-box-seam fs-1 text-success mb-2 d-block"></i>
              <strong>J&T Express</strong>
            </div>
          </div>
          <div class="text-center mt-4">
            <p class="small text-muted">Educational: Real sites use API for live tracking.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
