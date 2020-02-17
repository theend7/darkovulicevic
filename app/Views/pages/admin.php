<div class="container adminPanel">  
  <div id="tabelaAdmin">
  <h1 class="naslovAdmin">Destinations</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="thTabele">ID</th>
          <th class="thTabele">Name</th>
          <th class="thTabele">AltPicture</th>
          <th class="thTabele">Price</th>
          <th class="thTabele">Edit</th>
          <th class="thTabele">Delete</th>
          
        </tr>
      </thead>
      <tbody>
      <?php foreach($data['destinations'] as $destination): ?>
        <tr>
          <td><?=$destination->idProizvoda?></td>
          <td><?=$destination->naziv?></td>
          <td><?=$destination->alt?></td>
          <td><?=$destination->cena?></td>
          <td><a href="index.php?page=update&id=<?=$destination->idProizvoda?>" class="dugmeIzmeni">Edit</a></td>
          <td><a href="index.php?page=delete&id=<?=$destination->idProizvoda?>" class="dugmeDeleteStil" >Delete</a></td>
        </tr>
      <?php endforeach ; ?>
      </tbody>
    </table>
    <a href="index.php?page=insert" class="btn btn-primary">Insert Destination</a>
    
    </div>

    <div id="tabelaAdminUsers">
    <h1 class="naslovAdmin">Users</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="thTabele">ID</th>
          <th class="thTabele">Name</th>
          <th class="thTabele">Last Name</th>
          <th class="thTabele">Email</th>
          <th class="thTabele">Username</th>
          <th class="thTabele">idUloga</th>
          <th class="thTabele">Edit</th>
          <th class="thTabele">Delete</th>
          
          
        </tr>
      </thead>
      <tbody>
      <?php foreach($data['korisnici'] as $user): ?>
        <tr>
          <td><?=$user->idKorisnik?></td>
          <td><?=$user->ime?></td>
          <td><?=$user->prezime?></td>
          <td><?=$user->email?></td>
          <td><?=$user->username?></td>
          <td><?=$user->idUloga?></td>
          <td><a href="index.php?page=userUpdate&idUser=<?=$user->idKorisnik?>" class="dugmeIzmeni">Edit</a></td>
          <td><a href="index.php?page=userDel&idUser=<?=$user->idKorisnik?>" class="dugmeDeleteStil" >Delete</a></td>
          
        </tr>
      <?php endforeach ; ?>
      </tbody>
    </table>
    
    
    </div>
    <div id="tabelaAdminUsers">
    <h1 class="naslovAdmin">Admin Operations</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="thTabele">ID</th>
          <th class="thTabele">Name</th>
          <th class="thTabele">Last Name</th>
          <th class="thTabele">Table</th>
          <th class="thTabele">Operation</th>
          <th class="thTabele">Date</th>
       
          
          
        </tr>
      </thead>
      <tbody>
      <?php foreach($data['operations'] as $operation): ?>
        <tr>
          <td><?=$operation->idAktivnost?></td>
          <td><?=$operation->ime?></td>
          <td><?=$operation->prezime?></td>
          <td><?=$operation->nazivTabele?></td>
          <td><?=$operation->nazivAktivnosti?></td>
          <td><?=$operation->datum?></td>
          
          
          
        </tr>
      <?php endforeach ; ?>
      </tbody>
    </table>
    
    
    </div>
</div>
