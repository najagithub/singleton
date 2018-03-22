<div id="confirmation" title="Confirmation">
        <p>Etes vous sur de vouloir supprimer cette fiche?</p>
    </div>
<div class="row">
    <div class="col-md-3">
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Libellé Fiche: <span class="text-danger">*</span></label>
                <input class="form-control" type="text" required="true" name="libelle_fiche" value="<?= isset($edit) ? $edit->libelle_fiche : "" ?>">
            </div>
            <div class="form-group">
                <label class="control-label">Description: <span class="text-danger">*</span></label>
                <textarea class="form-control" type="text" required="true" name="description"><?= isset($edit) ? $edit->description : "" ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Libellé Catégorie: <span class="text-danger">*</span></label>
                <select name="id_categorie" class="form-control">
                    <option value="">Selectionner catégorie</option>
                    <?php while($i = $list_cat->fetch_object()) {?>
                    <option value="<?= $i->id_categorie ?>" <?= (isset($edit) && $edit->id_categorie == $i->id_categorie) ? "selected" : ""?> ><?= $i->libelle_categorie ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php if(isset($edit)) :?>
            <input type="submit" class="btn btn-warning" value="Modifier" name="modifierFiche">
            <?php else :?>
            <input type="submit" class="btn btn-primary" value="Ajouter" name="ajouterFiche">
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
                        <th>Description</th>
                        <th>Libellé Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php while ($i = $list_fic->fetch_object()) {?>
                <tr>
                    <td><?= $i->id_fiche ?></td>
                    <td><?= $i->libelle_fiche ?></td>
                    <td><?= $i->description ?></td>
                    <td><?= $i->libelle_categorie ?></td>
                    <td><a href="/controller/FicheController.php?update=<?= $i->id_fiche ?>">Modifier</a>&nbsp;
                                <a class="boutonsupprimer" href="/controller/FicheController.php?delete=<?= $i->id_fiche ?>">Supprimer</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>