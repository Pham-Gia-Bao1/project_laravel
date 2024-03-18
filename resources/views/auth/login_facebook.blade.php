<!DOCTYPE html>
<html lang="en">
  <head>

    <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId            : 'your-app-id',
            xfbml            : true,
            version          : 'v19.0'
          });
        };
      </script>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

  </head>
  <body>

    <h2>Add Facebook Login to your webpage</h2>

    <a href="{{ url('/login/facebook') }}">
    <div class="fb-login-button" data-width="" data-size="" data-button-type="" data-layout="" data-auto-logout-link="true" data-use-continue-as="false"></div>
      <!-- Set the element id for the JSON response -->
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="exgBrBU8"></script>
      <p id="profile"></p>
    </a>


  </body>
</html>
