<div class="element-wrapper">
    <h6 class="element-header">
        Insertion des Fichiers
    </h6>


    <div class="element-box">
      @if (session()->has('listeTravailleursSuccess'))
          <div class="alert alert-success">
            <p>{{ session('listeTravailleursSuccess') }}</p>
          </div>
      @endif
      <h5 class="form-header">
        Liste des travailleurs recrutés par contrat à durée indéterminée CDI
      </h5>
      @if (true)
      <form action="" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="file-upload form-file-upload mb-1 listeTravailleurs ">
              <label class="file-select form-group rounded-pill" for="listeTravailleurs">
                  <div class="file-select-button" id="fileName">Choisir le fichier</div>
                  <div class="file-select-name" id="noFilelisteTravailleurs">Aucun fichier choisi...</div>
                  <input type="file" name="listeTravailleurs" id="listeTravailleurs">
              </label>
          </div>
          <button class="btn btn-primary" type="submit">Ajouter</button>
      </form>
      @else
      <p>le fichier a déjà été inséré</p>
      @endif
    </div>

    <div class="element-box">
      @if (session()->has('sdiSalariesSuccess'))
          <div class="alert alert-success">
            <p>{{ session('sdiSalariesSuccess') }}</p>
          </div>
      @endif
      <h5 class="form-header">
        CDI des salariés
      </h5>
      @if (true)
      <form action="" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="file-upload form-file-upload mb-1 sdiSalaries ">
              <label class="file-select form-group rounded-pill" for="sdiSalaries">
                  <div class="file-select-button" id="fileName">Choisir le fichier</div>
                  <div class="file-select-name" id="noFilesdiSalaries">Aucun fichier choisi...</div>
                  <input type="file" name="sdiSalaries" id="sdiSalaries">
              </label>
          </div>
          <button class="btn btn-primary" type="submit">Ajouter</button>
      </form>
      @else
        <p>le fichier a déjà été inséré</p>
      @endif
    </div>


    

</div>
