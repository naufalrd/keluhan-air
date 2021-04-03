<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h3 class="fs-3 text-start"><?= $keluhan[0]['judul'] ?></h3>
        <p class="fs-6"><?= $keluhan[0]['keluhan'] ?></p>
        <p class="mb-3"><?= $keluhan[0]['username'] ?> ( <?= $keluhan[0]['tanggal_keluhan'] ?> )</p>

        <!-- <div class="d-flex justify-content-end">
            <div class="w-75 border border-info rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla dolore iure aperiam repudiandae, rem aspernatur neque! Odit est maxime optio voluptatem officiis consequatur in iste iusto alias expedita sapiente sed pariatur minima tempore ipsum, nisi fuga? Sed, adipisci quidem voluptates dolorum impedit iure odio nobis quia! Sint sequi nisi voluptas corrupti cumque sit illum officiis, ea, laborum incidunt nemo neque accusamus rem est eius magni! Error sed tempora molestias autem illum. Aliquid minima nihil debitis. Eum rerum pariatur ratione perferendis. Necessitatibus non error consequatur nobis deleniti impedit cum tenetur qui, beatae in modi nemo aperiam, ducimus facilis, possimus totam expedita.</p>
                <p class="mb-0">Bidang Penjaminan Mutu - 21-01-2022</p>
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <div class="w-75 border border-success rounded-3 shadow-sm p-3 mb-3">
                <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla dolore iure aperiam repudiandae, rem aspernatur neque! Odit est maxime optio voluptatem officiis consequatur in iste iusto alias expedita sapiente sed pariatur minima tempore ipsum, nisi fuga? Sed, adipisci quidem voluptates dolorum impedit iure odio nobis quia! Sint sequi nisi voluptas corrupti cumque sit illum officiis, ea, laborum incidunt nemo neque accusamus rem est eius magni! Error sed tempora molestias autem illum. Aliquid minima nihil debitis. Eum rerum pariatur ratione perferendis. Necessitatibus non error consequatur nobis deleniti impedit cum tenetur qui, beatae in modi nemo aperiam, ducimus facilis, possimus totam expedita.</p>
                <p class="mb-0">Username - 22-01-2022</p>
            </div>
        </div> -->

        <!-- Komentar User -->
        <div class="container mt-5">
            <div class="row" id="showForm text-center">
                <form action="<?= site_url(); ?>bidang/submit_tanggapan" method="POST">
                <input type="hidden" name="id_keluhan" value="<?= $keluhan[0]['id_keluhan'] ?>" required>
                    <textarea id="summernote" name="respon" class="text-start"></textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>
    </div>
</div>