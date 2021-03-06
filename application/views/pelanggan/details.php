<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/rater.js"></script>

<div class="container mb-container">

    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="fs-1 text-start"><?= $keluhan[0]['judul'] ?></h1>
        <p class="fs-2 text-start"><?= $keluhan[0]['keluhan'] ?></p>
        <p class="text-start"><?= $this->session->userdata('username'); ?> - <?= date_indo($keluhan[0]['tanggal_keluhan']) ?></p>
        <?php foreach ($feedback as $data) : ?>
            <div class="d-flex justify-content-end">
                <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                    <p class="text-secondary"><?= $data['respon'] ?></p>
                    <p class="mb-0"><?= $data['nama_bidang'] ?> - <?= date_indo($data['tanggal_respon']) ?></p>
                </div>
            </div>
            <div class="d-flex justify-content-start <?= $data['feedback'] == '' ? 'd-none' : '' ?>">
                <div class="w-75 border border-success rounded-3 shadow-sm p-3 mb-3">
                    <p class="text-secondary"><?= $data['feedback'] ?></p>
                    <p class="mb-0"><?= $data['username'] ?> - <?= date_indo($data['tanggal_feedback']) ?></p>
                </div>
            </div>
        <?php endforeach ?>
        <!-- Komentar User -->
        <?php if ($feedback != NULL) {
            $getLastFeedback = $feedback[count($feedback) - 1]['id_feedback']; ?>
            <div class="container mt-5 <?= $data['status'] == "Selesai" || $data['feedback'] != NULL ? 'd-none' : '' ?>">
                <p class="fs-6" id="questionForm">Apakah keluhan anda telah terjawab ? <span><a onclick="showRating()" class="btn btn-primary btn-sm">Ya</a> <button class="btn btn-outline-danger btn-sm" onclick="showForm()">Tidak</button></span></p>
                <div class="row d-none" id="showForm">
                    <form action="<?= site_url() ?>pelanggan/tambah_respon/<?= $getLastFeedback ?>/<?= $data['id_keluhan'] ?>" method="POST">
                        <textarea id="summernote" name="respon_pelanggan"></textarea>
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Submit</button>
                    </form>
                </div>
                <div class="row d-none" id="showRating">
                    <p class="fs-6">Berikan rating kepada kami :)</p>
                    <div class="rating fs-1" data-rate-value=0 style="color: #ffe900"></div>
                    <form action="<?= site_url() ?>pelanggan/selesai/<?= $data['id_keluhan'] ?>/<?= $getLastFeedback ?>" method="POST">
                        <input type="hidden" name="rating" id="ratingValue">
                        <label for="" class="mt-3">Berikan juga ulasan atas kinerja kami :)</label>
                        <div class="row">
                            <textarea name="rating_desc" class="form-control mx-2" placeholder="contoh : respon baik, ramah, dll" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        <?php }; ?>

    </div>


    <script>
        function showForm() {
            const showForm = document.getElementById('showForm');
            const hideQuestion = document.getElementById('questionForm');
            showForm.className = 'row d-block'
            hideQuestion.className = 'd-none'
        }

        function showRating() {
            const showForm = document.getElementById('showRating');
            const hideQuestion = document.getElementById('questionForm');
            showForm.className = 'row d-block'
            hideQuestion.className = 'd-none'
        }

        $(document).ready(function() {
            $('#summernote').summernote();
        });

        // Options
        var options = {
            max_value: 5,
            step_size: 1,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'pointer',
            readonly: false,
            change_once: false, // Determines if the rating can only be set once
        }

        $(".rating").rate(options);
        $(".rating").on("change", function(ev, data) {
            document.querySelector('#ratingValue').value = data.to
        });
    </script>
</div>
</div>