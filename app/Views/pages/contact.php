<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Contact Us<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container my-5">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <h2><i class="bi bi-telephone text-primary"></i> Get in Touch</h2>
      <ul class="list-unstyled">
        <li class="mb-3"><i class="bi bi-envelope me-3"></i> info@nonchalant.ph</li>
        <li class="mb-3"><i class="bi bi-geo-alt me-3"></i> Unit 123, Sampaloc, Manila 1008</li>
        <li class="mb-3"><i class="bi bi-phone me-3"></i> 0927-123-4567 (Mon-Fri 10AM-6PM)</li>
        <li><i class="bi bi-instagram me-3"></i> @nonchalant.ph (DM fastest!)</li>
      </ul>
      <div class="alert alert-info">
        Response within 24hrs. For orders/returns, include #.
      </div>
    </div>
    <div class="col-lg-6">
      <h2>Send Message</h2>
      <form class="contact-form">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="Your name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="your@email.com" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Subject</label>
          <input type="text" class="form-control" placeholder="Order issue, collab idea, etc.">
        </div>
        <div class="mb-3">
          <label class="form-label">Message</label>
          <textarea class="form-control" rows="5" placeholder="Tell us what's up..." required></textarea>
        </div>
        <button type="submit" class="btn btn-non btn-lg w-100">Send Message</button>
      </form>
      <div class="alert alert-secondary mt-3">
        <small>Educational: JS demo below; prod uses Email service/CI4 validation.</small>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$('form').on('submit', function(e) {
  e.preventDefault();
  alert('Thanks! Message sent (demo). Prod: AJAX + PHP mailer.');
});
</script>
<?= $this->endSection() ?>
