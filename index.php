<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="pragma" content="no-cache" />

    <!-- Style -->
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <style>
    .hover_img a { position:relative; }
    .hover_img a span { position:absolute; display:none; z-index:99; }
    .hover_img a:hover span { display:block; }
    </style>


    <title>SSHGen</title>
  </head>

  <body>
  <div class="content">
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 class="text-center">SSHGen</h3>
            <form class="mb-5" method="post" id="rdpGenForm" name="rdpGenForm">
              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">CyberArk Hesabı</label>
                  <input type="text" class="form-control" name="cUser" id="cUser" placeholder="" required>
                  <div class="hover_img">
                    <small>
                      CyberArk hesabınız acme.local domain hesabı olmak ile birlikte genelde format <b>"ad.soyad"</b>
                      şeklindedir.
                    <a href="#">Örnek<span><img src="images/CyberArk-1.png" alt="image" height="400" /></span></a></small>
                  </div>
                </div>

                <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">Sunucu Hesabı</label>
                  <input type="text" class="form-control" name="pUser" id="pUser" placeholder="" required>
                    <div class="hover_img">
                      <small>
                      Hedef sunucuya bağlanırken kullandığınız ayrıcalıklı hedef hesabıdır. CyberArk kasasında saklanmaktadır.
                      <a href="#">Örnek<span><img src="images/CyberArk-2.png" alt="image" height="150" /></span></a></small>
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-12 form-group mb-3">
                <label for="" class="col-form-label">Hedef Sunucu</label>
                <input type="text" class="form-control" name="dIP" id="dIP" placeholder="" required>
                <div class="form-text">
                    <small>
                    Bağlantı yapmak istediğiniz sunucu <b>IP/Hostname</b> adresi.
                    </small>
                 </div>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12 form-group mb-3">
                  <label class="col-form-label">PSMP Sunucuları</label>
                  <select name="psmControl" class="form-control">
                    <option value="1.1.1.1">A PSMP</option>
                    <option value="2.2.2.2">B PSMP</option>
                    <option value="3.3.3.3">C PSMP</option>
                    <option value="4.4.4.4">D PSMP</option>
                    <option value="5.5.5.5">E PSMP</option>
                    <option value="6.6.6.6">F PSMP</option>
                  </select>
                  <div class="form-text">
                    <small>
                    Hangi CyberArk proxy sunucusu üzerinden bağlantı sağlanacak?
                    </small>
                 </div>
                </div>

              <?php
              if (isset($_POST['cUser'])){ ?>
                <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">SSH String<small> (Bağlantı için)</small></label>
                    <input type="text" class="form-control" name="sshString" id="sshString" value="<?php echo ("ssh" . " " . $_POST['cUser'] . "@" . $_POST['pUser'] . "@" . $_POST['dIP'] . "@" . $_POST['psmControl']);?>" placeholder="" required disabled>

                </div>

                <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">AD-Bridge SSH String<small> (AD-Bridge ile Bağlantı için)</small></label>
                    <input type="text" class="form-control" name="sshString" id="sshString" value="<?php echo ("ssh" . " " . $_POST['cUser'] . "@" . $_POST['dIP'] . "@" . $_POST['psmControl']);?>" placeholder="" required disabled>

                </div>


                <div class="col-md-12 form-group mb-3">
                  <label for="" class="col-form-label">SCP String<small> (Dosya transferi için)</small></label>
                    <input type="text" class="form-control" name="scpString" id="scpString" value="<?php 
                    
                  if ($_POST['pUser']=="root" OR $_POST['pUser']=="ROOT")
                  { 
                      echo ("scp -r" . " " . "dosyaAdı" . " " . $_POST['cUser'] . "@" . $_POST['pUser'] . "@" . $_POST['dIP'] . "@" . $_POST['psmControl'] . ":/" . $_POST['pUser'] );
                  }
                  else 
                  {
                    echo ("scp -r" . " " . "dosyaAdı" . " " . $_POST['cUser'] . "@" . $_POST['pUser'] . "@" . $_POST['dIP'] . "@" . $_POST['psmControl'] . ":/home/" . $_POST['pUser'] );
                  } 
                    
                    ?>" placeholder="" required disabled>

                  
                </div>
                <?php
              }
            
              ?>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                  <input type="submit" value="SSH Strıng Olustur" class="btn btn-block btn-primary rounded-0 py-2 px-10">
                </div>

              </div>
            </form>
          </div>
          <p><center><small>infosec@acme.com</small></center></p>
        </div>
      </div>
    </div>
  </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>