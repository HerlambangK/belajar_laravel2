@extends('layout.checkout')
@section('title','checkout')

@section('content')

{{-- check out page --}}
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Detail
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        {{-- tampilin error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                        <h1>Who is Going</h1>
                        <p>Trip to {{$item->travel_package->title }}, {{$item->travel_package->location }}</p>
                        <div class="attemdee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nasionality</td>
                                        <td>Visa</td>
                                        <td>Passport</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                        <tr>
                                            <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username}}" height="60" class="rounded-circle">
                                            </td>
                                        <td class="align-middle">{{ $detail->username}}</td>
                                            <td class="align-middle">{{ $detail->nationality}}</td>
                                            <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                            <td class="align-middle">{{ \Carbon\Carbon::createFromDate( $detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                            <a href="{{ route('checkout-remove', $detail->id)}}">
                                                <img src="{{url('frontend/images/ic_remove.png')}}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                            <tr colspan="6" class="text-center">
                                                <td>
                                                    No Visitor
                                                </td>
                                            </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- MASUK KE FORMMMM --}}
                        <div class="member mt-3">
                            <h2>Add member</h2>
                        <form class="form-inline" method="POST" action="{{ route('checkout_create', $item->id)}}">
                            @csrf
                                <label
                                    for="username"
                                    class="sr-only">Name</label>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control mb-2 mr-sm-2"
                                    id="username"
                                    placeholder="Username">

                                <label
                                    for="nationality"
                                    class="sr-only">Nationality</label>
                                <input
                                    type="text"
                                    name="nationality"
                                    style="width: 50px"
                                    required
                                    class="form-control mb-2 mr-sm-2"
                                    id="nationality"
                                    placeholder="Nationality">

                                <label
                                    for="is_visa"
                                    class="sr-only">Visa</label>
                                <select
                                    name="is_visa" id="is_visa" required class="custom-select mb-2 mr-sm-2">
                                    <option value="" selected>VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>

                                <label for="doe_passport" class="sr-only">DOE Passport</label>
                                <div class="input-grup mb-2 mr-sm-2">
                                    <input type="text"
                                    class="form-control datepicker"
                                    name="doe_passport"
                                    id="doePassport"
                                    placeholder="DOE Passport">
                                </div>
                                <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">You are only able to invite member that has registered in
                                Nomand</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Member are going</h2>

                        <h2>Checkout informasion</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width='50%'>Members</th>
                                <td width='50%' class="text-right"> {{ $item->details->count()}} person</td>
                            </tr>
                            <tr>
                                <th width='50%'>Additional VISA</th>
                                <td width='50%' class="text-right"> $ {{ $item->additional_visa}}</td>
                            </tr>
                            <tr>
                                <th width='50%'>Trip Price</th>
                                <td width='50%' class="text-right"> $ {{ $item->travel_package->price}},00 / person</td>
                            </tr>
                            <tr>
                                <th width='50%'>Sub Total</th>
                                <td width='50%' class="text-right">$ {{ $item->transaction_total}},00</td>
                            </tr>
                            <tr>
                                <th width='50%'>Total (+uniqe)</th>
                                <td width='50%' class="text-right text-total">
                                    <span class="text-blue">$ {{ $item->transaction_total}},</span>
                                <span class="text-orange"> {{ mt_rand(0,99)}}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>
                            Payment Intruction
                        </h2>
                        <p class="payment-intructions">please complete your payment before to continue the wonderful
                            trip</p>
                        <div class="bank">
                            <div class="bank-items pb-3">
                            <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-images">
                                <div class="description">
                                    <h3>PT NOmads ID</h3>
                                    <p>0812 9102 1092
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-items pb-3">
                            <img src="{{ url('frontend/images/ic_bank.png')}}" alt="" class="bank-images">
                                <div class="description">
                                    <h3>PT NOmads ID</h3>
                                    <p>0812 2323 434
                                        <br>
                                        Bank Nasional Indonesia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{route('checkout-success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{route('detail', $item->travel_package->slug)}}" class="text-muted">Cancle Booking</a>
                    </div>
                </div>
            </div>
    </section>
    </section>
</main>


@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">

@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-d',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{url('frontend/images/ic_doe.png')}}" />'
            }
        })
    });

</script>
</script>
@endpush
