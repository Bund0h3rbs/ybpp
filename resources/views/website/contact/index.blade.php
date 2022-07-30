@extends('template.website')
@section('content')
<section id="header-top" class="d-flex py-4 align-items-center">
    <div class="container">
        <h1 >Hubungi Kami</h1>
    </div>
</section>
<main id="main">
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact</h2>
            <p>Kami Sangat mengahargai jika anda memberikan saran dan kritik yang membangun terhadap kami, silahkan menghubungi kami untuk pada alamat yang tercantung, atau dapat melalui form yang telah kami sediakan</p>
          </div>

          <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address row">
                    <div class="col-md-2 col-xs-3">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="col-md-10 col-xs-6">
                        <h4 class="p-0">Alamat:</h4>
                        <p class="p-0 mb-2">Jln Asri 1 No.45 RT.002 RW 005</p>
                        <p class="p-0 mb-2">Pondok Rangon Cipayung</p>
                        <p class="p-0 mb-2">Kota Adm Jakarta Timur</p>
                        <p class="p-0 ">DKI Jakarta</p>
                    </div>

                </div>

                <div class="email row pt-2">
                    <div class="col-md-2 col-xs-3">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="col-md-10 col-xs-6">
                        <h4 class="p-0">Email:</h4>
                        <p class="p-0">info@ybpp.com</p>
                    </div>

                </div>

                <div class="phone row pt-2">
                    <div class="col-md-2 col-xs-3">
                        <i class="bi bi-phone"></i>
                    </div>
                    <div class="col-md-10 col-xs-6">
                        <h4 class="p-0">Telp:</h4>
                        <p class="p-0">+62 3288 55s</p>
                    </div>
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4948.0824731319035!2d106.90117836716911!3d-6.356952024637794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ecc85f8f44d1%3A0xe4a2d9c167d7afe9!2sJl.%20Asri%20I%20No.45%2C%20RT.1%2FRW.5%2C%20Munjul%2C%20Kec.%20Cipayung%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013850!5e0!3m2!1sid!2sid!4v1657981018908!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>


                {{-- <iframe src="https://www.google.com/maps/@-6.355123719457488,106.9021184531784" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> --}}
              </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form method="post" role="form" class="php-email-form" novalidate="novalidate" id="form-contact" name="form-contact">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" rows="10" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

</main>
<script>

    $.validator.setDefaults({
        submitHandler: function () {
            swal({
            title:"",
            text: "Maaf Fungsi Dalam Perbaikan",
            icon: "warning",
            buttons: false,
            timer: 2000,
        });
        return false;
        }
    });
    $('#form-contact').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

</script>
@endsection
