<?php
    error_reporting(E_ALL ^ E_WARNING);
    error_reporting(0);
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Reinaldo José Nunes - github.com/reinaldonunes">
        <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-folder-512.png" type="image/x-icon">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/server.css">
        <title> Servidor Local</title>
    </head>
    <body>
        <header class="containter">
            <div class="main flex">
                <figure class="center"><img src="assets/rn_server.png" alt="WebServer" title="WebServer" /></figure>
            </div>
        </header>
        <ul class="flex_r flex_w list-folder">
        <?php
            $diretorio = '.'; 
            $ponteiro = opendir($diretorio);
            while ($nome_itens = readdir($ponteiro)) {
                if($nome_itens == 'assets' || $nome_itens == '.git') continue; // este if ignora páginas do sistema, como a Assets.
                $itens[] = $nome_itens;
            }
            sort($itens);
            foreach ($itens as $listar) {
                if ($listar!="." && $listar!=".."){ 
                    if (is_dir($listar)) { 
                        $pastas[]=$listar; 
                    } else{ 
                        $arquivos[]=$listar;
                    }
                }
            }
            if ($pastas != "" ) { foreach($pastas as $listar){ ?>
                <li><a href="<?=$listar?>" title="<?=$listar?>"><i class="fas fa-folder"></i>&nbsp;&nbsp;<?=$listar?></a></li>
            <?php } }else{echo '<p class="message">Nada para listar aqui</p>';}?>
        </ul>
        <p class="text_footer">&copy; 2020 - <?=date('Y');?> Localhost - Desenvolvido por Reinaldo J. Nunes</p>
    </body>
</html>
