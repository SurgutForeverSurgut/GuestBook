<table class="table table-dark mt-5">
    <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">Имя</th>
        <th scope="col">E-mail</th>
        <th scope="col">Сообщение</th>
        <th scope="col">Дата</th>
      </tr>
    </thead>
    <tbody>
        
      <?php if(!empty($data)):?>
        <?php foreach($data as $guest): ?>
          <tr>
            <th scope="row"><?= $guest['id'] ?></th>
            <td><?= $guest['name'] ?></td>
            <td><?= $guest['email'] ?></td>
            <td><?= $guest['body'] ?></td>
            <td><?= $guest['dtime'] ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      
    </tbody>
</table>