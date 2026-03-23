<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <h1>Contact Us</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
       Sed posuere consectetur est at lobortis.</p>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Send</button>
    </form>
<?= $this->endSection() ?>