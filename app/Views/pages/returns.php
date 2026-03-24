<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Returns<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold"><i class="bi bi-arrow-return-left text-warning"></i> Returns Policy</h1>
        <p class="lead">14 days to return unworn items. Hassle-free.</p>
      </div>

      <!-- Policy Overview -->
      <div class="card shadow mb-4">
        <div class="card-header bg-light">
          <h5>14-Day Returns</h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled">
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Unworn with tags</strong> – Tees/hoodies must be new.</li>
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Full refund</strong> – Original payment method (7 days process).</li>
            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Exchange available</strong> – Size/color swap if in stock.</li>
            <li class="mb-3"><i class="bi bi-x-circle text-danger me-2"></i><strong>No returns</strong> on final sale drops or underwear.</li>
          </ul>
        </div>
      </div>

      <!-- How to Return -->
      <div class="card shadow mb-4">
        <div class="card-header bg-light">
          <h5>How to Return</h5>
        </div>
        <div class="card-body">
          <ol class="list-numbered">
            <li>Email <a href="mailto:returns@nonchalant.ph">returns@nonchalant.ph</a> w/ order # + photo + reason (48hr response).</li>
            <li>Print return label (sent via email).</li>
            <li>Ship back to: Nonchalant PH, Unit 123, Sampaloc Manila 1008 (you pay shipping; P100 credit >P2k orders).</li>
            <li>Refund after inspection (3-5 days).</li>
          </ol>
          <div class="alert alert-info mt-3">
            <small>Educational note: Production uses return forms + carrier integration.</small>
          </div>
        </div>
      </div>

      <div class="text-center">
        <a href="<?= base_url('contact') ?>" class="btn btn-outline-warning btn-lg">Contact for Return</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
