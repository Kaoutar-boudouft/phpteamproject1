<?php
include_once '../../../../Traitement/dbFunctions.php';

if (isset($_GET["codeMat"]) && isset($_GET["cne"])) {
    $code = $_GET["codeMat"];
    $cne = $_GET["cne"];
    $res = SupprimerNote($code, $cne);
}
/****Code fonction SupprimerNote utiliser 
  
function SupprimerNote($codeMat, $cne)
{
    $req = "delete from notes where codeMat='$codeMat' and CNE='$cne'";
    return miseajour($req);
}
 */
?>
<!DOCTYPE HTML>
<html>

<head>
    <title> WELCOME</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        tr,
        td {
            width: 100px;
        }
    </style>
</head>

<body>


    <div class="exe3">
        <a href="codesource.php?page=afficherNotes.php" class="btn btn-link">Voir le code source ici</a>
        <div style="width: 80%" class="mx-auto">

            <div class='overflow-x-auto w-full'>

                <table class='table table-responsive mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden table-hover table-striped'>
                    <thead class="bg-light">
                        <tr class="text-dark text-left">
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">CodeMat</th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">CNE</th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Note</th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        /****Code fonction AfficherNotes utiliser 

                    function AfficherNotes()
                    {
                        $req = "select * from notes";
                        return selection($req);
                    }
                         */
                        $cursor = AfficherNotes();
                        while ($row = $cursor->fetch()) {

                            echo (' <tr>
                    <td class="px-6 py-4 mx-auto text-center">                 
                                ' . $row[0] . '                      
                    </td>
                    <td class="px-6 py-4 text-center mx-auto text-center"> ' . $row[1] . ' </td>
                    <td class="px-6 py-4 text-center mx-auto text-center"> ' . $row[2] . ' </td>
                        <td class="pt-2 text-center" > 
                        <span class="badge badge-primary text-white  bg-primary font-semibold px-2 rounded-full w-100">
                         <a style="text-decoration: none;color: white" href="modifierNote.php?codeMat=' . $row[0] . '&&cne=' . $row[1] . '&&note=' . $row[2] . '" >Modifier</a><br>
                        </span><br><span class="badge badge-secondary text-white text-sm w-1/3 pb-1 bg-secondary font-semibold px-2 rounded-full w-100">
                        <a style="text-decoration: none;color: white"  href="afficherNotes.php?codeMat=' . $row[0] . '&&cne=' . $row[1] . '" >Supprimer</a></span>  </td>
                </tr>');
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>