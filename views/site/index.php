<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      Firewall Authentication
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f8f9fa;
      }
      .message-container {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        max-width: 550px;
        width: 100%;
        text-align: center;
      }
      .logo {
        background: url(%%IMAGE:logo_v3_fguard_app%%) no-repeat center;
        height: 120px;
        background-size: contain;
        margin-bottom: 1rem;
      }
    </style>
  </head>
  <body>
    <div class="message-container">
      <div class="logo">
      </div>
      <h3 class="mb-3">
        โรงพยาบาลสมเด็จพระสังฆราช องค์ที่ 17
      </h3>
      <form action="%%AUTH_POST_URL%%" method="post">
        <input type="hidden" name="%%REDIRID%%" value="%%PROTURI%%">
        <input type="hidden" name="%%MAGICID%%" value="%%MAGICVAL%%">
        <input type="hidden" name="%%METHODID%%" value="%%METHODVAL%%">
        <p class="text-muted">
          %%QUESTION%%
        </p>
        <div class="mb-3">
          <label for="ft_un" class="form-label">
            Username
          </label>
          <input name="%%USERNAMEID%%" id="ft_un" type="text" class="form-control" autocorrect="off" autocapitalize="off">
        </div>
        <div class="mb-3">
          <label for="ft_pd" class="form-label">
            Password
          </label>
          <input name="%%PASSWORDID%%" id="ft_pd" type="password" class="form-control" autocomplete="off">
        </div>
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-primary">
            สมัครใช้งานผ่าน ProvideID
          </button>
          <button type="button" class="btn btn-primary">
            ProvideID
          </button>
          <button type="submit" class="btn btn-success">
            Continue
          </button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
  </body>
</html>