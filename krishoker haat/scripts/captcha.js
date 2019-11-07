
  grecaptcha.ready(function() {
    grecaptcha.execute('6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw', {action:'validate_captcha'})
              .then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
              });
  });
