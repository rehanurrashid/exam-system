<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Animation CSS -->
    <link href="<?= base_url() ?>assets/css/animation.css" rel="stylesheet">
    
    <title>User Exercises</title>
    <style type="text/css">
    body{
        background-color: rgba(233, 236, 239, 0.15);
    }
    .button5 {
    background-color: white;
    color: black;
    border: 2px solid #74B874;
    border-radius:45%;
    font-size:25px;
    }
    .button5:hover{
      background-color: #74B874;
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

    </style>
  </head>
  <body id="body" class="body">
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">User: <span class="text-success">Screen: 1</span></h2>
        <h2 class="text-primary ml-5">Here you can Solve <span class="text-success">Exercises</span></h2>
    </div>
    <div class="container" style="margin-top: 1%">
          <?php if($feedback = $this->session->flashdata('feedback')): 
              $feedback_class = $this->session->flashdata('feedback_class');
            ?>
          <div class="col-sm-10">
              <div class="alert alert-dismissible <?= $feedback_class ?>">  
              <?=  $feedback //display alert message if article is inserted ?> 
              </div>
          </div>
          <?php endif; ?>
       <br>
       <div class="row">
            <div class="col-md-6">
            <h4 class="text-info">
            You have <span id="count"></span> Exercises</h4>
            </div>
        </div>
        <br>
        <div class="row d-flex flex-row justify-content-center">
        <?php if($data == 0){ ?>
            <h3 class="text-dark">No Exercises Found!</h3>
        <?php     
        }
        else{
            foreach ($data['exercise'] as $exercise): ?>
                <div id="catid" style="display: none;"><?= $exercise['eid'] ?></div>
                <div class="col-md-4 text-center mr-5 shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="row">
                        <div class="col-md-5"> <h5 class="float-right">Exercise No:</h5> </div>
                        <div class="col-md-7"><h5 class="float-left text-dark"><?= $exercise['eid'] ?></h5> </div>
                    </div>
                    <div class="row">
                    <div class="col-md-5"> <h5 class="float-right">Subject:</h5> </div>
                        <?php foreach ($data['categories'] as $category): 
                        if($category['cid'] == $exercise['cid']){?>
                    <div class="col-md-7"><u> <h5 class="float-left text-primary"><?= $category['category'] ?></u></h5> </div>
                        <?php } endforeach; ?>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-5"> <h5 class="float-right">Type:</h5> </div>
                            <?php foreach ($data['types'] as $types): 
                            if($types['tid'] == $exercise['tid']){?>
                    <div class="col-md-7">
                    <?php if($types['tid']==1) { ?>
                        <h5 class="float-left text-danger"><u><?= $types['type'] ?></u></h5>
                    <?php }
                    else if($types['tid']==2){ ?>
                            <h5 class="float-left text-success"><u><?= $types['type'] ?></u></h5>
                   <?php }
                    else if($types['tid']==3)
                    {
                        ?>
                            <h5 class="float-left text-info"><u><?= $types['type'] ?></u></h5>
                    <?php
                    }
                    else{ ?>
                            <h5 class="float-left text-primary"><u><?= $types['type'] ?></u></h5>
                    <?php }
                    ?>
                    </div>
                            <?php } endforeach; ?>  
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5"> <h5 class="float-right">Created at:</h5> </div>
                        <div class="col-md-7"> <h5 class="float-left text-secondary"><u><?= $exercise['created_at']?></u></h5> </div>
                    </div>
                    <hr>
                    <?php  echo form_open('user/solve_exercise'); ?>
                    <input style="display: none;" type="text" class="form-control" id="exerciseid" name="eid" value="<?= $exercise['eid'] ?>" >
                    <?php foreach ($data['types'] as $types): 
                            if($types['tid'] == $exercise['tid']){?>
                    <input style="display: none;" type="text" class="form-control" id="typeid" name="tid" value="<?= $types['tid'] ?>"  >
                    <?php } endforeach; ?>
                    <?php echo form_submit(['name'=> 'submit','value'=>'Solve this Exercise','class'=>'btn btn-success w-75 p-2 ','id' => 'editExercise']); ?>
                    <?php  echo form_close(); ?>
                </div> 
            <?php endforeach; ?>
        <?php
        }; ?>     
        </div>
    </div>
    <div style="height:300px" ></div>
    <!-- <footer class="col-md-12" style="position:fixed;bottom:0;padding:0">
        <nav class="navbar navbar-light d-flex bd-highlight" style="background-color:#E9ECEF">
            <div class="mr-auto bd-highlight w-50">
                <a href="<?= base_url('user/categories') ?>" class="btn btn-primary w-50"><i class="fas fa-arrow-left"></i> Back to Category</a>
            </div>
            <div class="p-1 bd-highlight">
                <h5 class=" mr-3">Add New Exercise:</h5>
            </div>
            <div class="bd-highlight">
                <button onclick="location.href='<?= base_url('user/type') ?>'" id="add" class="button button5 btn "><b> <img src="<?= base_url() ?>assets/images/rightarrow.png" alt="Add New Exercise" height="40px" width="40px" > </b></button>
            </div>
        </nav>
    </footer> -->
<script type="text/javascript">
    jQuery(document).ready(function(){ 
       // Number of Categories
       var count = $('.btn-success').length;
        $('#count').html(count);

    });   
    </script>
  </body>
</html>