<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row ">
        <div class="col-md-12">
    <h1 class='text-center '>Login</h1>
    <form class="form-inline" action='checkout.php'>
  <label class="sr-only" for="inlineFormInputGroup">Email</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">@</div>
    <input type="email" class="form-control" id="inlineFormInputGroup"  name='email'>
  </div>
  <label class="sr-only" for="inlineFormInputGroup">Password</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">***</div>
    <input type="password" class="form-control" id="inlineFormInputGroup"name='password'>
  </div>
    <a href="forget.php" class='text-danger'>Forgot Password</a><br/><br/><br/>
  <button type="submit" class="btn btn-primary btn-block" name='submit'>Submit</button>
</form>
<a href="register.php"><h2 class='text-primary'>Register Here</h2></a>
        </div>
    </div>
</html>

