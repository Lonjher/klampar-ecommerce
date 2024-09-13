<div class="modal fade" id="tambah-produk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    @if ($errors->any())
        <div class="container alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('create-stock') }}" style="font-size: 12px"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="product_image" class="form-label">Gambar</label>
                        <input
                            class="form-control form-control-sm input-blue @error('product_image') is-invalid @enderror"
                            id="product_image" type="file" name="product_image" style="font-size: 12px" required
                            onchange="previewImage()">
                        <img class="mt-2 img-preview img-fluid col-sm-3">
                        @error('product_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" name="product_name" class="form-control input-blue form-control-sm"
                            value="{{ old('product_name') }}">
                        @error('product_name')
                            <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="first_price" class="form-label">Harga Awal</label>
                            <input type="number" name="first_price" value="{{ old('first_price') }}"
                                class="form-control input-blue form-control-sm">
                        </div>
                        <div class="mb-3 col">
                            <label for="price_sell" class="form-label">Harga Jual</label>
                            <input type="number" name="price_sell" value="{{ old('price_sell') }}"
                                class="form-control input-blue form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}"
                                class="form-control input-blue form-control-sm">
                        </div>
                        <div class="col">
                            <label for="status" class="mb-2">Status Produk</label>
                            <select name="status" id="status" class="form-select form-select-sm input-blue"
                                style="font-size: 12px">
                                <option value="">Status</option>
                                <option value=1>Tersedia</option>
                                <option value=0>Habis</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Detail</label>
                        <textarea name="description" placeholder="Write some description here..."
                            class="form-control input-blue form-control-sm" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>

            {{-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-sm">Save</button> --}}

        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#product_image');
        // const old_img = document.querySelector('#old_image');
        const imgPreview = document.querySelector('.img-preview');

        // old_img.style.display = 'none';
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
