<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Гостевая книга</title>
</head>
<body>

<div class="container">
<form>
  <div class="form-group">
    <label for="name">Имя</label>
    <input class="form-control" name="name" type="text" id="name">
  </div>

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="message">Сообщение</label>
    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
  </div>

  
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
</body>
</html>