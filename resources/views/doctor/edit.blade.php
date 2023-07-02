@extends('layouts.admin')

@section('content')
<section class="bg-dark text-white">
    <div class="container py-3">
        <h3 class="py-3 px-4">Edit your profile</h3>
        <form class="row g-3" action="{{ route('doctor.update', ['doctor' => $doctor->slug]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-12 d-flex justify-content-around">
                <div class="col-5">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name' , $userDetail->name)}}">

                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-5">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname' , $userDetail->lastname)}}">

                    @error('lastname')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-12 d-flex justify-content-around">
                <div class="col-5">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address' , $doctor->address)}}">

                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-5">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone' , $doctor->phone)}}">

                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-12 d-flex justify-content-around">
                <div class="col-5">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control " name="photo" id="photo">
                </div>
                <div class="col-5">
                    <label for="cv" class="form-label">Curriculum Vitae</label>
                    <input type="file" class="form-control " name="cv" id="cv">
                </div>
            </div>

            <div class="col-12 d-flex px-5 mx-1">
                <div class="col-5">
                    <label for="service" class="form-label">Service</label>
                    <textarea class="form-control @error('service') is-invalid @enderror" name="service" id="service" cols="30" rows="10">{{ old('service' , $doctor->service)}}</textarea>

                    {{-- <input type="text" class="form-control @error('service') is-invalid @enderror" name="service" id="service" value=""> --}}

                    @error('service')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
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



            <div class="col-md-4 mx-auto text-center pt-3">
                <button type="submit" class="btn btn-light text-dark px-4">Update</button>
            </div>
        </form>
    </div>
</section>
@endsection
