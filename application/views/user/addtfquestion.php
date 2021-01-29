<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>user</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Step js library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    
    <!-- Ajaxx cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <!-- data tables -->

    <style type="text/css">
    body{
        background-color: rgba(233, 236, 239, 0.15);
    }
    .button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
    border-radius:50%;
    font-size:25px;
    }
    .button5:hover{
      background-color: #555555;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:active{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:visited{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
      border: 2px solid #555555;
      border-radius:50%;
    }
    .dash{
    background: transparent;
    border-top: none;
    border-right: none;
    border-left: none;
    width: 100px;
    border-radius: 0;
    border-bottom: 2p;
    border-bottom: groove;
    transition: 1s;
    color:white;
    pointer-events:none;
    }
    .dash:visited{
        border:5px solid black;
    }
    .correct{
        width:30px;
        height:30px;
    }
    #alreadyadd{
        height:50px;
    }
    .wordid , .wordname{
        display:none;
    }
    .questionid{
        display:none;
    }
    footer{
        bottom:0;
    }
    </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">user: <span class="text-success">Screen: 4</span></h2>
        <h2 class="text-primary ml-5">Here you can Add and Edit <span class="text-success">Questions</span></h2>
    </div>
    <div class="container" style="margin-top: 1%">
    <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-3">
                    <h4 class="float-right">Subject: </h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?Php echo $data['category']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3">
                    <h4 class="float-right">Question Title:</h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?Php echo $data['qtitle']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3">
                    <h4 class="float-right">Type: </h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?Php echo $data['type']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3">
                    <h4 class="float-right">Exercise No.</h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary" id="exeno"><?= $data['eid']; ?></h4>
                </div>
            </div>
        </div>
    <?php if($feedback = $this->session->flashdata('feedback')): 
      $feedback_class = $this->session->flashdata('feedback_class');
      ?>
      <div class="col-sm-10">
        <div class="alert alert-dismissible <?= $feedback_class ?>">  
          <?=  $feedback //display alert message if article is inserted ?> 
        </div>
      </div>
    <?php endif; ?>
    <div class="row mt-5">
      <div class="col-md-6">
        <?php  echo form_open_multipart('user/store_tf_question'); ?>
          <div class="form-group">
            <h5 >Question:</h5>
            <input type="text" class="form-control" id="question" name="question"  placeholder="Enter Question">
          </div>
          <div class="form-group">
            <h5 for="exampleFormControlFile1"> Select Image:</h5>
            <?php echo form_upload(['name' => 'image']); ?>
          </div>
          <input style="display:none" type="text" name="eid"  value="<?= $data['eid']; ?>">
          <div class="form-group">
            <h5 >Answer:</h5> <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="answer" id="true" value="true">
            <h5 class="form-check-label" for="inlineRadio1">True</h5>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="answer" id="false" value="false">
            <h5 class="form-check-label" for="inlineRadio2">False</h5>
          </div>
          </div>  <hr>
          <?php  
          echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
            form_submit(['name'=> 'submit','value'=>'Save Question','class'=>'btn btn-primary']); 
            ?>
       <?php  echo form_close(); ?>
      </div>
      <div class="col-md-6">
        <div class="row mt-5">
          <div class="col-md-12 " style="height:60px;">
            <?php echo form_error('question'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 " style="height:60px;color:#DC3545">
          <?php if(isset( $upload_error)) {echo $upload_error; } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 " style="height:60px;">
            <?php echo form_error('answer'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
      <div class="col-md-3 mt-5 mb-5">
      <a href="<?= base_url('user/select') ?>" class="btn btn-info float-right w-100">Seel All Questions</a>
      </div>
    </div>
    <div style="height:100px" >
    </div> 
<script type="text/javascript">
    
</script>
  </body>
</html>