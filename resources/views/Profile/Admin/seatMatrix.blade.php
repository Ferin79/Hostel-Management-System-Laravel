<h1 class="d-flex justify-content-center align-items-center p-3">Add Rooms</h1>
<div class="container">
    <div class="row">
        <form method="POST" id="addRoom__form" enctype="multipart/form-data" action="/admin/add-room">
            @csrf
            <div class="col-sm-12 input_field_area">

                <div class="form-group row">
                    <label for="room_type" class="col-md-4 col-form-label text-md-right">Room Name</label>
                    <div class="col-md-8">
                        <input id="room_type" type="text"
                               class="form-control @error('room_type') is-invalid @enderror"
                               name="room_type" value="{{ old('room_type') }}" required
                               autocomplete="room_type" placeholder="Eg: Delux, Double Sharing" autofocus>

                        @error('room_type')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="room_select"
                           class="col-md-4 col-form-label text-md-right">Room Type</label>
                    <div class="col-md-8">
                        <select class="form-control" required name="room_select" id="room_select">
                            <option value="0" selected disabled>Select Room Type</option>
                            <option value="Single">Single</option>
                            <option value="Double">Double Sharing</option>
                            <option value="Triple">Triple Sharing</option>
                            <option value="other">Other</option>
                        </select>
                        @error('room_select')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Price per Head</label>
                    <div class="col-md-8">
                        <input id="price" type="number" min="1"
                               class="form-control @error('number_bed') is-invalid @enderror"
                               name="price" value="{{ old('price') }}" required
                               autocomplete="price" placeholder="Price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image1" class="col-md-4 col-form-label text-md-right">Image 1</label>
                    <div class="col-md-8">
                        <input id="image1" type="file" onchange="loadFile(event)"
                               class="form-control @error('image1') is-invalid @enderror"
                               name="image1" required autofocus accept="image/*">
                        @error('image1')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image2" class="col-md-4 col-form-label text-md-right">Image 2</label>
                    <div class="col-md-8">
                        <input id="image2" type="file"
                               class="form-control @error('image2') is-invalid @enderror"
                               name="image2" required autofocus accept="image/*">
                        @error('image2')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="pl-5 ml-5 pb-5">
                    <button type="submit" class="btn btn-primary ml-5 mt-3">Add Room</button>
                </div>
            </div>
            <div class="col col-sm-12 img-wrapper">
                <img id="blah1" class="img-fluid" src="#" alt="your image"/>
                <img id="blah2" src="#" class="img-fluid" alt="your image"/>
            </div>
        </form>
    </div>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image1").change(function () {
            readURL1(this);
        });


        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image2").change(function () {
            readURL2(this);
        });
    </script>
</div>
