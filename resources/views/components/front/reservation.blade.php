<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">

    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <div class="col-md-6 bg-dark align-items-center">
            <x-validations></x-validations>
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Book A Table Online</h1>
                <form action="{{ route('front.booking.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="first_name" class="form-control" id="name" placeholder="Your First Name">
                                <label for="name">Your First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Your Last name">
                                <label for="last_name">Your Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" name="phone_number" class="form-control" id="tel"  placeholder="Your Phone number">
                                <label for="tel">Your Phone number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="datetime-local" name="res_date" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                <label for="datetime">Date & Time</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date">
                                <input type="number" name="guest_number" class="form-control datetimepicker-input" id="guest_number" placeholder="Guest number" />
                                <label for="guest_number">Guest number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="table_id" class="form-select" id="select1">
                                    @foreach($tables as $table)
                                        <option value="{{ $table->id }}">From {{ $table->guest_number }} persons</option>
                                    @endforeach
                                </select>
                                <label for="select1">No Of People</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservation Start -->
