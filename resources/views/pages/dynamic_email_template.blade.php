    <!DOCTYPE html>
    <html>
      <head>
        <title>Welcome Email</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      </head>
      <body>
          <div class="container" style="text-align:center;">
              <div class="row" style="background-color:lightred;padding:30px 50px;">
                  <h2 style="color:green;" >Hi {{$user['firstname']}}, Welcome to Remitty!</h2>
              </div>
              <div class="row">
                  <p> Your registered email-id is {{$user['email']}} , <br>Please click on the below link to verify your email account<p>
                      <br/>
                      <a href="{{url('user/verify', $user->verifyUser->token)}}"><button class="btn btn-success btn-primary" style="padding:10px 20px;">Please Verify Your Email</button></a>
                  </div>
            </div>
      </body>
    </html>
