<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<<<<<<< Updated upstream
    <h1>Latest News</h1>
    <p>This is placeholder text for the About page. You can replace it later with your brand story or company details.</p>
<?= $this->endSection() ?>
=======
<div class="container my-5">
  <div class="text-center mb-5">
    <h1 class="display-5 fw-bold">Latest News & Drops</h1>
    <p class="lead">Stay updated on new releases, collabs, and streetwear vibes.</p>
  </div>

  <div class="row g-4">
    <!-- Post 1: Drop26 -->
    <div class="col-lg-6">
      <div class="card card-news shadow h-100">
        <img src="https://via.placeholder.com/600x300/ff6b6b/fff?text=DROP+26" class="card-img-top" alt="Drop 26">
        <div class="card-body">
          <small class="text-muted">January 29, 2024</small>
          <h5 class="card-title mt-2">Drop 26 Live Now!</h5>
          <p class="card-text">Local drop alert! Hoodies and tees in bold colors for Manila winters. Limited to 100 pcs each. Sizes S-XXL. Pro tip: Pair with cargos for that nonchalant fit.</p>
          <a href="<?= base_url('collections/drop26') ?>" class="btn btn-non">Shop Drop 26</a>
        </div>
      </div>
    </div>

    <!-- Post 2: Manga Collab -->
    <div class="col-lg-6">
      <div class="card card-news shadow h-100">
        <img src="https://via.placeholder.com/600x300/4ecdc4/fff?text=MANGA26" class="card-img-top" alt="Manga26">
        <div class="card-body">
          <small class="text-muted">January 22, 2024</small>
          <h5 class="card-title mt-2">Manga26 Collab Sold Out</h5>
          <p class="card-text">Anime x Streetwear magic. Oversized tees with Manga26 art. Restock coming Feb—sign up for alerts. Inspired by classic Pinoy comics.</p>
          <a href="<?= base_url('collections/manga26') ?>" class="btn btn-outline-primary">Notify Me</a>
        </div>
      </div>
    </div>

    <!-- Post 3: DDD Tease -->
    <div class="col-lg-6">
      <div class="card card-news shadow h-100">
        <img src="https://via.placeholder.com/600x300/2c3e50/fff?text=DDD+COLLAB" class="card-img-top" alt="DDD">
        <div class="card-body">
          <small class="text-muted">January 15, 2024</small>
          <h5 class="card-title mt-2">DDD Collab Teaser</h5>
          <p class="card-text">Big collab incoming with DDD. Hoodies dropping next week. Tease: All-black everything. Follow IG for first look.</p>
          <a href="<?= base_url('collections/collab26') ?>" class="btn btn-non">View Teaser</a>
        </div>
      </div>
    </div>

    <!-- Post 4: Shipping Update -->
    <div class="col-lg-6">
      <div class="card card-news shadow h-100">
        <img src="https://via.placeholder.com/600x300/28a745/fff?text=SHIPPING" class="card-img-top" alt="Shipping">
        <div class="card-body">
          <small class="text-muted">January 8, 2024</small>
          <h5 class="card-title mt-2">Shipping Now Metro Manila-Wide</h5>
          <p class="card-text">New partners LBC & J&T for faster delivery. Free shipping over P3,000. Track your order live.</p>
          <a href="<?= base_url('shipping') ?>" class="btn btn-outline-success">Details</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
>>>>>>> Stashed changes
