<div id="confirmation" title="Confirmation">
        <p>Etes vous sur de vouloir supprimer cette categorie?</p>
    </div>

<div class="row">
    <div class="col-md-3">
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Libellé : <span class="text-danger">*</span></label>
                <input class="form-control" type="text" required="true" name="libelle_categorie" value="<?= isset($edit) ? $edit->libelle_categorie : "" ?>">
            </div>
            <?php if(isset($edit)) :?>
            <input type="submit" class="btn btn-warning" value="Modifier" name="modifierCategorie">
            <?php else :?>
            <input type="submit" class="btn btn-primary" value="Ajouter" name="ajouterCategorie">
            <?php endif; ?>
        </form>
    </div>
    <div class="col-md-9">
        <div class="table-responsive">
            <table class="table table-condensed myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libellé</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <?php while ($i = $list_cat->fetch_object()) {?>
                        <tr>
                            <td><?= $i->id_categorie ?></td>
                            <td><?= $i->libelle_categorie ?></td>
                            <td><a href="/controller/CategorieController.php?update=<?= $i->id_categorie ?>">Modifier</a>&nbsp;
                                <a class="boutonsupprimer" href="/controller/CategorieController.php?delete=<?= $i->id_categorie ?>">Supprimer</a></td>
                        </tr>    
                    <?php } ?>
            </table>
        </div>
    </div>
</div>