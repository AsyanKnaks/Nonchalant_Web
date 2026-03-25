<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">

<section class="hero-section">
    <canvas class="hero-canvas" id="heroCanvas"></canvas>

    <div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="<?= base_url('assets/images/Local1.webp') ?>" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Collection DROP 2026</h1>
                    <p>Jock swagger, otaku soul.</p>
                    <a href="<?= base_url('collections/drop26') ?>" class="btn btn-light">Explore Collections</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="<?= base_url('assets/images/Local2.webp') ?>" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Collection DROP 2025</h1>
                    <p>Showcase your latest drop.</p>
                    <a href="<?= base_url('collections/drop25') ?>" class="btn btn-light">Explore Collections</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="<?= base_url('assets/images/Collab1.webp') ?>" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1>MANGA26</h1>
                    <p>Gear up like a mecha pilot</p>
                    <a href="<?= base_url('collections/manga26') ?>" class="btn btn-light">Explore Collections</a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="<?= base_url('assets/images/Collab2.webp') ?>" class="d-block w-100" alt="Slide 4">
                <div class="carousel-caption d-none d-md-block">
                    <h1>COLLAB26 (DanDaDan)</h1>
                    <p>Cosmic chaos meets streetwear cool.</p>
                    <a href="<?= base_url('collections/collab26') ?>" class="btn btn-light">Explore Collections</a>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<<<<<<< Updated upstream
    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/Local2.webp') ?>" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block">
        <h1>Collection Highlight</h1>
        <p>Showcase your latest drop.</p>
        <a href=<?= base_url('collections/local/drop25') ?> class="btn btn-light">Explore Collections</a>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/Collab1.webp') ?>" class="d-block w-100" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block">
        <h1>Collaboration</h1>
        <p>Placeholder for collab announcement.</p>
        <a href=<?= base_url('collections/collab/Manga26') ?> class="btn btn-light">Explore Collections</a>
      </div>
    </div>

        <!-- Slide 4 -->
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/Collab2.webp') ?>" class="d-block w-100" alt="Slide 4">
      <div class="carousel-caption d-none d-md-block">
        <h1>Collaboration</h1>
        <p>Placeholder for collab announcement.</p>
        <a href=<?= base_url('collections/collab/DDD') ?> class="btn btn-light">Explore Collections</a>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
=======
>>>>>>> Stashed changes
<?= $this->endSection() ?>