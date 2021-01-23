 <!-- ======= Contact Us Section ======= -->
 <section id="contact" class="contact section-bg">

    <div class="container">
      <div class="section-title">
        <h2>Contact Us</h2>
        <p>Send us message incase of any concern!</p>
      </div>
    </div>

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-6 d-flex align-items-stretch infos">

          <div class="row">

            <div class="col-lg-6 info d-flex flex-column align-items-stretch">
              <i class="bx bx-map"></i>
              <h4>Address</h4>
              <p>Kenyatta ave. Street,<br>NAIROBI, 535022</p>
            </div>
            <div class="col-lg-6 info info-bg d-flex flex-column align-items-stretch">
              <i class="bx bx-phone"></i>
              <h4>Call Us</h4>
              <p>+254 705 5488 55<br>+254 735 5488 55</p>
            </div>
            <div class="col-lg-6 info info-bg d-flex flex-column align-items-stretch">
              <i class="bx bx-envelope"></i>
              <h4>Email Us</h4>
              <p>contact@bbis.com<br>info@bbis.com</p>
            </div>
            <div class="col-lg-6 info d-flex flex-column align-items-stretch">
              <i class="bx bx-time-five"></i>
              <h4>Working Hours</h4>
              <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
            </div>
          </div>

        </div>

        <div class="col-lg-6 d-flex align-items-stretch contact-form-wrap">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" rows="8" data-rule="required" data-msg="Please write something for us"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Us Section -->