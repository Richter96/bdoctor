@extends('layouts.admin')

@section('content')
<section class="bg-dark text-white mt-4 rounded-4 ">
    <div class="container py-3  position-relative">
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
            <div class="sponsor px-5 mx-1 py-3 mb-5">
                <h6 class="m-2">Do you want your services to be sponsored?</h6>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship-null" value="" checked>
                    <label class="form-check-label" for="sponsorship-null">
                        nessuna sponsorizzazione
                    </label>
                </div>
                <div class="col-12 d-flex">
                    @foreach ($sponsorships as $sponsor)
                    <div class="col-4 border p-1 pb-3">
                        <i class="fa-solid fa-medal fa-2xl px-3" style="{{($sponsor->id == '1') ? 'color:#CD7F32;' : (($sponsor->id == '2') ? 'color:#C0C0C0;' : 'color:#FFD700;' )}}"></i>
                        <div class="info px-5">
                            <h3><strong class=" text-uppercase">{{$sponsor->name}}</strong></h3>
                            <h4><strong>{{$sponsor->price}} $</strong></h4>
                            <p>Durata: {{$sponsor->duration}}h</p>
                            <div class="fs-6 d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship-{{$sponsor->id}}" value="{{$sponsor->id}}">
                                    <label class="form-check-label" for="sponsorship-{{$sponsor->id}}">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 mx-auto text-center pt-3 ">
                <button type="submit" class="btn btn-light text-dark px-4">Update</button>
            </div>
        </form>
        <!-- Modal trigger button -->
        <button type="button" class="btn btn-primary btn-lg payvment_btn" data-bs-toggle="modal" data-bs-target="#modalId">
            Paga
        </button>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="modalTitleId">Inserisci i dati della tua carta</h5>
                    </div>
                    <div class="modal-body">
                        <div class="div payvment">
                            <div id="dropin-container"></div>
                            <button id="submit-button" class="button button--small button--green">Purchase</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
