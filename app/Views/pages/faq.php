<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>FAQ<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container my-5">
  <div class="text-center mb-5">
    <h1 class="display-5 fw-bold">Frequently Asked Questions</h1>
    <p class="lead">Got questions? We've got answers. Quick guide to shopping Nonchalant.</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="accordion" id="faqAccordion">
        <!-- Q1 -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
              How do I place an order?
            </button>
          </h2>
          <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Add items to cart → Checkout → Select payment (GCash, Maya, card) → Confirm. You'll get email confirmation. Educational note: Cart persists session.
            </div>
          </div>
        </div>
        <!-- Q2 -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
              What payments do you accept?
            </button>
          </h2>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              GCash, Maya, bank deposit (BPI/BDO), cards via PayMongo. No COD yet—digital first for speed.
            </div>
          </div>
        </div>
        <!-- Q3 -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
              Sizing guide?
            </button>
          </h2>
          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Asian fit: S (34-36 chest), M (38-40), L (42-44), XL (46-48). Check product pages for cm charts. Tip: Size up for hoodies.
            </div>
          </div>
        </div>
        <!-- Q4 Shipping -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
              Shipping details?
            </button>
          </h2>
          <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              P150 flat PH-wide (LBC/J&T). Free over P3,000. Metro Manila 2-3 days, provinces 3-7. Track via partner apps.
            </div>
          </div>
        </div>
        <!-- Q5 Returns -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
              Returns policy?
            </button>
          </h2>
          <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              14 days for unworn items w/ tags. Email photo/reason. Shipping back on you (P100 allowance >P2k orders).
            </div>
          </div>
        </div>
        <!-- Q6 Drops -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
              How do drops work?
            </button>
          </h2>
          <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Limited release (e.g., Drop26: 100 pcs). Live on date, first-paid-first-ship. Sold out = gone (no restocks).
            </div>
          </div>
        </div>
        <!-- Q7 Stock -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
              Out of stock?
            </button>
          </h2>
          <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Check back weekly or join waitlist (email signup coming). Follow IG for restock alerts.
            </div>
          </div>
        </div>
        <!-- Q8 Contact -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
              Need help?
            </button>
          </h2>
          <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              DM @nonchalant.ph or email info@nonchalant.ph. Response in 24hrs.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
