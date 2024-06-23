@extends('adminlte::page')

@section('title','Dashboard')
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
}

.container {
    margin: 20px;
}

.card {
    width: 90%;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f8f8f8;
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: center;
    font-weight: bold;
}

.card-body {
    padding: 20px;
}

.details {
    display: flex;
    flex-direction: column;
}

.media {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.actions {
    margin-top: 20px;
    text-align: center;
}

.btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.9);
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

    </style>
</head>
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12" style="padding:10px;">
            <div class="card" style="width: 90%;">
                <div class="card-header">Detail Pengaduan</div>
                <div class="card-body">
                    <div class="d-flex" style="justify-content: space-around; flex-direction: column">
                        <p><strong>ID:</strong> {{ $aduan->id_aduan }}</p>
                        <p><strong>Nama:</strong> {{ $aduan->user->name }}</p>
                        <p><strong>Tanggal Kejadian:</strong> {{ $aduan->tanggal_kejadian }}</p>
                        <p><strong>Alamat Kejadian:</strong> {{ $aduan->alamat_kejadian }}</p>
                        <p><strong>Judul:</strong> {{ $aduan->judul }}</p>
                        <p><strong>Pesan:</strong> {{ $aduan->pesan }}</p>
                        <p><strong>Status:</strong> {{ $aduan->status }}</p>
                        <p><strong>Cluster:</strong> {{ $aduan->cluster }}</p>
                    </div>
                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-column">
                            <div style="display: flex; justify-content:space-between">
                                <div>
                                    <p><strong>Bukti Kejadian:</strong></p>
                                    <img src="../../../golang-api/{{$aduan->bukti_kejadian}}" width='200' height='200' class="img img-responsive clickable-image"/>
                                </div>
                            </div>
                            <p class="text-start">Klik gambar untuk melihat lebih detail.</p>
                        </div>
                        <div class="d-flex flex-column">
                            <div style="display: flex; justify-content:space-between">
                                <div>
                                    <p><strong>Video Kejadian:</strong></p>
                                    <video src="../../../golang-api/{{$aduan->video_kejadian}}" width='200' height='200' class="img img-responsive clickable-video" controls/>
                                </div>
                            </div>
                            <p class="text-start">Klik video untuk melihat lebih detail.</p>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <a href="{{ route('adminaduan') }}" class="btn btn-secondary">Back</a>
                    </div>
                    @if($aduan->status == 'pending')
                        <form action="{{ route('admin.updateStatus', $aduan->id_aduan) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea name="comments" id="comments" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="bukti_solved">Upload Bukti Solved</label>
                                <input type="file" name="bukti_solved" id="bukti_solved" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modal-img">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modal-img");
    const clickableImages = document.querySelectorAll('.clickable-image');
    const closeBtn = document.getElementsByClassName("close")[0];

    clickableImages.forEach(image => {
        image.addEventListener('click', function () {
            modal.style.display = "block";
            modalImg.src = this.src;
        });
    });

    closeBtn.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});

</script>

@endsection
