@extends('adminlte::page')

@section('title','Dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12" style="padding:10px;">
            <div class="card" style="width: 90%;">
                <div class="card-header">Detail Pengaduan</div>
                <div class="card-body">
                    <div class="d-flex" style="justify-content: space-around">
                        <p><strong>ID:</strong> {{ $aduan->id_aduan }}</p>
                        <p><strong>Nama:</strong> {{ $aduan->user->name }}</p>
                        <p><strong>Tanggal Kejadian:</strong> {{ $aduan->tanggal_kejadian }}</p>
                        <p><strong>Alamat Kejadian:</strong> {{ $aduan->alamat_kejadian }}</p>
                        <p><strong>Pesan:</strong> {{ $aduan->pesan }}</p>
                        <p><strong>Status:</strong> {{ $aduan->status }}</p>
                    </div>
                    <div style="display: flex; justify-content:space-between">
                        <div>
                            <p><strong>Bukti Kejadian:</strong></p>
                            <img src="../../../golang-api/{{$aduan->bukti_kejadian}}" width='200' height='200' class="img img-responsive clickable-image" data-bs-toggle="modal" data-bs-target="#fotoKTPModal"/>
                        </div>
                    </div>
                    <h4 class="text-center">Klik gambar untuk melihat lebih detail.</h4>
                    <div style="margin-top: 20px;">
                        <a href="{{ route('adminaduan') }}" class="btn btn-secondary">Back</a>
                    </div>
                    @if($aduan->status == 'pending')
                        <form action="{{ route('admin.updateStatus', $aduan->id_aduan) }}" method="POST" style="display:inline;">
                            @csrf
                            <div class="form-group">
                                <label for="comments">Comments</label>
                                <textarea name="comments" id="comments" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fotoKTPModal" tabindex="-1" aria-labelledby="fotoKTPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoKTPModalLabel">Bukti Kejadian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="modal-img" class="img-fluid"/>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const clickableImages = document.querySelectorAll('.clickable-image');
    const modalImg = document.getElementById('modal-img');

    clickableImages.forEach(image => {
        image.addEventListener('click', function () {
            const imgSrc = this.getAttribute('src');
            modalImg.setAttribute('src', imgSrc);
        });
    });
});
</script>

@endsection
