<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "_app/isConnect.php";
if (is_connect() && $_SESSION['user']['id_cat'] == "1"){

}else{
    $_SESSION['msg']['type'] = "danger";
    $_SESSION['msg']["txt"] = "vous n'avez pas le droit d'acceder à cette page";
    header("location:index.php");
    exit();
}
include "_inc/header.php";
include "_inc/menu.php"?>
<div class="col-xs-8">
    Le nombre d'enregistrement est : <?php
    $q = $db->query("SELECT count(*) FROM fichiers");
    $nb = $q->fetch();
    echo $nb[0]."<br/>";
    ?>
    Supprimer un fichier :
    <?php
    $q = $db->query("SELECT * FROM fichiers");
    while ($fic = $q->fetch()):
        ?>
        <?php foreach ($fic as $item => $value):?>
        <a href="delete.php?<?=sha1("files")?>=<?=$fic['id_fic']?>"><?= $item." : ".$value;?></a>
    <?php endforeach; ?>
    <?php endwhile;?>
</div>

    <div class="col-xs-2 col3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ajouter
            </div>
            <ul class="nav nav-staked">
                <li><a href="addCategorie.php">Ajouter Categorie</a></li>
                <li><a href="addservice.php">Ajouter Service</a></li>
            </ul>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Factures
            </div>
            <a href="#"><img src="img/index.jpg" class="img-responsive"></a>
        </div>
    </div><!--fin col3-->
<?php include "_inc/footer.php";?>