@extends('layouts.admin')

@section('content')
    <section class="bg-dark text-white mt-4 rounded-4 ">
        <div class="container py-3">
            <h3 class="py-3 px-4">Edit your profile</h3>
            <form class="row g-3" action="{{ route('doctor.update', ['doctor' => $doctor->slug]) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="col-12 d-flex justify-content-around">
                    <div class="col-5">
                        <label for="name" class="form-label">Name</label>
                        <input required maxlength="255" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- name --}}

                    <div class="col-5">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input required maxlength="255" type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                        @error('lastname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- lastname --}}
                </div>

                <div class="col-12 d-flex justify-content-around">
                    <div class="col-5">
                        <label for="address" class="form-label">Address</label>
                        <input required maxlength="100" type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $doctor->address) }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- address --}}

                    <div class="col-5">
                        <label for="phone" class="form-label">Phone</label>
                        <input required maxlength="10" type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}">

                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- phone --}}
                </div>

                <div class="col-12 d-flex justify-content-around">
                    <div class="col-5">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control " name="photo" id="photo">
                        <button class="d-block my-2 rounded" name="photo" id="photo" class="btn btn-primary" value="">Elimina</button>
                    </div>
                    {{-- photo --}}

                    <div class="col-5">
                        <label for="cv" class="form-label">Curriculum Vitae</label>
                        <input type="file" class="form-control " name="cv" id="cv">
                        <button class="d-block my-2 rounded" name="cv" id="cv" class="btn btn-primary" value="">Elimina</button>
                    </div>
                    {{-- cv --}}
                </div>

                <div class="col-12 d-flex px-5 mx-1">
                    <div class="col-5">
                        <label for="service" class="form-label">Service</label>
                        <textarea required class="form-control @error('service') is-invalid @enderror" name="service" id="service" cols="30" rows="10">{{ old('service', $doctor->service) }}</textarea>
                        {{-- <input type="text" class="form-control @error('service') is-invalid @enderror" name="service" id="service" value=""> --}}
                        @error('service')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- service --}}
                </div>

                <div class="col-12 px-5 mx-1">
                    <p>Select specializations:</p>
                    <div class="form-check @error('specializations') is-invalid @enderror">
                        <div class="row">
                            <div class="col-md-4">
                                @foreach ($specializations as $index => $specialization)
                                    <div class="form-check @error('specializations') is-invalid @enderror">
                                        <label class="form-check-label">
                                            <input name="specializations[{{ $specialization->id }}]" type="checkbox" value="{{ $specialization->id }}" class="form-check-input" {{ in_array($specialization->id, old('specializations', $doctor->specializations->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            {{ $specialization->name }}
                                        </label>
                                    </div>
                                    @if (($index + 1) % 3 === 0)
                            </div>
                            <div class="col-md-4">
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @error('specializations')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- specializations  --}}
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1"> A </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2"> B </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                    <label class="form-check-label" for="flexRadioDefault2"> C </label>
                </div>

                <div class="sponsor px-5 mx-1 py-3">
                    <h6>Do you want your services to be sponsored?</h6>
                    <div class="col-12 d-flex">
                        @foreach ($sponsorships as $sponsor)
                            <div class="col-4 border p-1 pb-3">
                                <form action="{{ route('checkout') }}" method="get">
                                    @csrf
                                    <i class="fa-solid fa-medal fa-2xl px-3"></i>
                                    <div class="info px-5">
                                        <h3>{{ $sponsor->name }}</h3>
                                        <h4> <strong> € {{ $sponsor->price }}</strong></h4>
                                        <p>Durata: {{ $sponsor->duration }}h</p>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-light" role="button">Clicca qui</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <div id="dropin-container"></div>
                    <button id="submit-button" class="button button--small button--green">Purchase</button>
                </div>

                <div class="col-md-4 mx-auto text-center pt-3">
                    <button type="submit" class="btn btn-light text-dark px-4">Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection
