<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>Contact Form</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="illustration">
        <img src="img/bg.jpg" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 ">
        <h4>Contact us</h4>
        <hr>
        <div class="mt-4">
          <div class="d-flex">
            <i class="bi bi-geo-alt-fill"></i>
            <p>Address: 198 West 21th Street, Suite 721 New York NY 10016</p>
          </div>
          <hr>
          <div class="d-flex">
            <i class="bi bi-telephone-fill"></i>
            <p>Contact: 8888888888</p>
          </div>
          <hr>
          <div class="d-flex">
            <i class="bi bi-envelope-fill"></i>
            <p>Email: Contact@gmail.com</p>
          </div>
          <hr>
          <div class="d-flex">
            <i class="bi bi-browser-chrome"></i>
            <p>Website: www.contact.com</p>
          </div>
          <hr>
        </div>
      </div>
      <div class="col-md-7">
        <h4>Get in touch</h4>
        <div class="mb-3">
          <label for="formGroupInput" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label for="formGroupInput2" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="formGroupInput3" class="form-label">Contact Number</label>
          <input type="text" class="form-control" id="contact" placeholder="Enter your number">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Message</label>
          <textarea type="text" class="form-control" id="message" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" onclick="submitForm()">Submit</button>
      </div>
    </div>
  </div>

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
        <strong class="me-auto">Success</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Your message has been saved successfully!
      </div>
    </div>

    <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto">Error</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        There was an error saving your message.
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function submitForm() {
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var contact = document.getElementById('contact').value;
      var message = document.getElementById('message').value;

      $.ajax({
        url: 'submit_form.php',
        type: 'POST',
        data: {
          name: name,
          email: email,
          contact: contact,
          message: message
        },
        success: function(data) {
          if (data === 'success') {
            var successToast = new bootstrap.Toast(document.getElementById('successToast'));
            successToast.show();
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('contact').value = '';
            document.getElementById('message').value = '';
          } else {
            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
            errorToast.show();
          }
        },
        error: function(error) {
          // Show error toast
          var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
          errorToast.show();
        }
      });
    }

    document.getElementById('contactForm').addEventListener('submit', function(event) {
      event.preventDefault();
      submitForm();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>