<div class="container">
  <form id="form">
    <div class="form-group">
      <label for="name">Имя</label>
      <input class="form-control input" name="name" type="text" id="name">
      <div class="alert alert-danger error" id="name-error" role="alert"></div>
    </div>

    <div class="form-group">
      <label for="email">email</label>
      <input type="email" name="email" class="form-control input" id="email">
      <div class="alert alert-danger error" id="email-error" role="alert"></div>
    </div>

    <div class="form-group">
      <label for="body">Сообщение</label>
      <textarea class="form-control input" id="body" name="body" rows="3"></textarea>
      <div class="alert alert-danger error" id="body-error" role="alert"></div>
    </div>
    <button type="button" class="btn btn-primary" id="add">Добавить</button>
  </form>
  <div id="table">
    <?php include VIEWS . 'book/table.php'; ?>
  </div>

</div>
    
